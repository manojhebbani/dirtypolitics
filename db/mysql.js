const express = require("express");
const hbs = require("hbs");

const port = process.env.PORT || 3000;
var app = express();

app.set('view engine','hbs');
app.use( express.static( __dirname + '/public' ) );

const mysql = require("mysql");

var conn = mysql.createConnection({
  host :'182.50.133.86:3306',
  user:'dirtypolitics',
  password:'gTvz1!79',
  database:'dirtypolitics'
});

conn.connect(function(err) {
  if (err) throw err;
  app.get('/',(req,res)=>{
    res.send('posts.hbs');
  });
  app.listen(port);
});
