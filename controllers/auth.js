const mysql= require("mysql");
const jwt = require('jsonwebtoken');
const bcrypt = require('bcryptjs');
const { promisify } = require("util");
const uuid = require('uuid');
const db = mysql.createConnection({
    root: process.env.DATABASE_HOST,
    user: process.env.DATABASE_USER,
    password: process.env.DATABASE_PASSWORD,
    database: process.env.DATABASE
});

exports.register = (req,res)=>{
    console.log(req.body);

    const {name, email, password, passwordConfirm}=req.body;

    db.query('SELECT email FROM users WHERE userEmail=?', [email],async (error, results)=>{
        if(error){
            console.log(error);
        }

        if(results && results.length>0){
            return res.render('register',{
                message: 'That email is already in use'
            })

        }else if(password!=passwordConfirm){
            return res.render('register',{
                message: 'Password do not match'
            })
        }

        let hashedPassword = await bcrypt.hash(password,8);
        console.log(hashedPassword);

        db.query('INSERT INTO users SET ?', {userFirstName:name,userLastName:'-', userEmail:email, userPassword: hashedPassword, userContactNo:'-', userBirthDate:'-',userGender:'-',userProfilePic:'/profileImages/profile_logo.png'},(error, results)=>{
            if(error){
                console.log(error);
            } else {
                return res.render('register',{
                    message: 'User registered'
                });
            }
        })

    });

}

exports.login = async (req, res) => {
    try {
        const { email, password } = req.body;
        if (!email || !password) {
            return res.render('login',{
                message: "Please Provide an email and password"
            })
        }
        db.query('SELECT * FROM users WHERE userEmail = ?', [email], async (err, results) => {
            console.log(results);
            if (!results || !await bcrypt.compare(password, results[0].userPassword)) {
                return res.render('login',{
                    message: "Email or Password Incorrect"
                })
            } else {
                const userID = results[0].userID;

                const token = jwt.sign({ userID,value:8 }, process.env.JWT_SECRET, {
                    expiresIn: process.env.JWT_EXPIRES_IN
                });

                console.log("the token is " + token);

                const expiresInDays = process.env.JWT_COOKIE_EXPIRES;
                const expires = new Date(Date.now() + expiresInDays * 24 * 60 * 60 * 1000);

                const cookieOptions = {
                    expires,
                    httpOnly: true,
                };

                // Generate a unique session identifier (e.g., a UUID)
                const sessionId = uuid.v4();

                // Store the session identifier in the cookie
                res.cookie('sessionId', sessionId, { httpOnly: true, secure: true });

                console.log(expires);
                res.cookie('userSave', token, cookieOptions);
                console.log("iedjfwei0jfg");
                res.status(200).redirect("/");
            }
        })
    } catch (err) {
        console.log(err);
    }
}


exports.isLoggedIn = async (req, res, next) => {
    if (req.cookies.userSave) {
        try {
            // 1. Verify the token
            const decoded = await promisify(jwt.verify)(req.cookies.userSave,
                process.env.JWT_SECRET
            );
            console.log(decoded);

            // 2. Check if the user still exist
            db.query('SELECT * FROM users WHERE userID = ?', [decoded.userID], (err, results) => {
                console.log(results);
                if (!results) {
                    return next();
                }
                req.user = results[0];
                return next();
            });
        } catch (err) {
            console.log(err)
            return next();
        }
    } else {
        next();
    }
}


exports.logout = (req, res) => {
    // res.cookie('userSave', 'logout', {
    //     expires: new Date(Date.now() + 2 * 1000),
    //     httpOnly: true
    // });
    res.clearCookie('userSave'); // Clear the "userSave" cookie
    // Set cache-control header to prevent caching of secured pages
    res.clearCookie('sessionId');


    res.status(200).redirect("/");
}


// Middleware function to check if the user is authenticated
exports.checkAuth = (req, res, next) => {
    if (!req.cookies.userSave) {
      // User is not authenticated, redirect to login page or appropriate route
      return res.redirect("/login");
    }
    next();
  };

