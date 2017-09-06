var mongoose = require('mongoose');

var comments      = mongoose.Schema({
  user:{
    type:String,
    required : true,
    minlength : 3,
    trim : true
  },
  email:{
    type:String,
    required : true,
    minlength : 5,
    trim : true
  },
  comment : {
    type:String,
    required : true,
    minlength :2,
    trim : true
  },
  date: {
      type: Number
  },
  ip:{
      type : String,
      required : true,
      minlength :10,
      trim:true
  }
});

var views   = mongoose.Schema({ip:String,date:Number});


var postsSchema = mongoose.Schema({
name:{
  type : String,
  required : true,
  minlength :10,
  trim:true
},
description:{
  type : String,
  required : true,
  minlength :10,
  trim:true
},
image:{
  type : String,
  required : true,
  minlength :10,
  trim:true
},
content:{
  type : String,
  required : true,
  minlength :10,
  trim:true
},
author:{
  type : String,
  required : true,
  minlength :10,
  trim:true
},
active: {
    type: Boolean,
    default: false
  },
date: {
    type: Date
  },
ip:{
    type : String,
    required : true,
    minlength :10,
    trim:true
  },
views :[views],
comments : [comments]
});
var posts = mongoose.model('posts',postsSchema);
module.exports = posts;
