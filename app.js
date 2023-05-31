const express = require("express");
const path = require('path');
const mysql = require("mysql");
const dotenv = require('dotenv');
const cookieParser = require("cookie-parser");

dotenv.config({path:'./.env'});
const app = express();

const db = mysql.createConnection({
    root: process.env.DATABASE_HOST,
    user: process.env.DATABASE_USER,
    password: process.env.DATABASE_PASSWORD,
    database: process.env.DATABASE
});

//make sure express use the directory
const publicDirectory = path.join(__dirname, './')
app.use(express.static(publicDirectory));

//Parse URL -encoded bodies (as sent by HTML forms)
app.use(express.urlencoded({extended:false}));
//Parse Json bodies (as sent by API clients)
app.use(express.json());

app.use(cookieParser());

app.set('view engine' , 'html');

db.connect((error)=>{
    if(error){
        console.log(error);
    }else{
        console.log("MySQL Connected...");
    }
});

//Define Routers
app.use('/',require('./routes/pages'));
// app.use('/auth',require('./routes/auth'));

//tell express which port to listen
app.listen(5001,()=>{
    console.log("Server start on port 5001");
})