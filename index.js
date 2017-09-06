const express = require("express");
const hbs = require("hbs");

const port = process.env.PORT || 3000;
var app = express();

app.set('view engine','hbs');
app.use( express.static( __dirname + '/public' ) );

hbs.registerPartials( __dirname + '/views/partials');

//var mongoose = require("./db/mongoose");
//var posts = require('./models/posts');

  app.get('/',(req,res)=>{
    res.send(process.env);
  });
  app.listen(port);

// posts.find().then((posts)=>{
//   app.get('/',(req,res)=>{
//     res.render('posts.hbs',{
//       page  : 'posts',
//       title : 'Dirty Politics',
//       posts   : posts
//     });
//   });
//   app.listen(port);
// },(e)=>{
//   console.log(e);
// });
