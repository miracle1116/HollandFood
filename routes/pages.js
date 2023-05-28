const express = require("express");
// const authController = require('../controllers/auth');
const router = express.Router();
const jwt = require('jsonwebtoken');
const path = require('path');
const secretKey = process.env.JWT_SECRET; // Replace with your own secret key

// //for changing page
// router.get('/',(req,res)=>{
//     res.render('index');
// });;
const cookieParser = require('cookie-parser');

const app = express();
app.use(cookieParser());


router.get('/',( req, res) => {
    res.render('index.html');
});

router.get('/login',(req,res)=>{
    res.sendFile("user/user_sign_InOut.html", { root: './Layout/' });
});

router.get('/menu',( req, res) => {
    res.sendFile("menu.html", { root: './' });
});


module.exports= router;