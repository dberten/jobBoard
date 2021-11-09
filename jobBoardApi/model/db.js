const mysql = require('mysql');
const dbConf = require('../configuration/db.config.js');

const conn = mysql.createConnection({
    host: dbConf.HOST,
    user: dbConf.USER,
    password: dbConf.PASSWORD,
    database: dbConf.DB
});

conn.connect(error => {
    if (error) throw error;
    console.log('Connection successfull');
});

module.exports = conn;