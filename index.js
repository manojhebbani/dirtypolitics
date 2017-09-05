const express = require("express");
const hbs = require("hbs");


const port = process.env.PORT || 3000;
var app = express();

app.set('view engine','hbs');
app.use( express.static( __dirname + '/public' ) );

hbs.registerPartials( __dirname + '/views/partials');

app.get('/',(req,res)=>{
  res.render('posts.hbs',{
    page : 'posts'
  });
});

app.listen(port);
