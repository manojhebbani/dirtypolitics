var request = require('request');
var headersOpt = {
    "content-type": "application/json",
};
request('http://prmdemo.in/index.php/appapi/dp', function (error, response, body) {
  var posts = JSON.parse(body);
  for(var post of posts.Data){

    request({url:'http://prmdemo.in/index.php/appapi/views',method:'post',body:JSON.stringify({ 'IdPost' : post.IdPost }),headers: headersOpt,},function (error, response, vbody) {
      var views = JSON.parse(vbody).Data;
      //console.log(vbody);
      request({url:'http://prmdemo.in/index.php/appapi/comments',method:'post',body:JSON.stringify({ 'IdPost' : post.IdPost }),headers: headersOpt}, function (error, response, cbody) {
        var comments = JSON.parse(cbody).Data;
        console.log( post.IdPost + ' - '+ views.length + ' - ' + comments.length);
      });
    });

  }

});
