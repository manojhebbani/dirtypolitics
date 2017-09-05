$(document).ready(function(){

  $('.btn-search').on('click',function(){

    var _search = $('._search').val();

    if( _search === undefined || _search === "" )
      alert("Please enter the serch word!");
    else
      window.location.href = window.location.origin + "?_search=" + _search

  });

  $('.next').on('click',function(){

    var page =  getParameterByName('page');

    var _search = getParameterByName('_search');

    if( page === null || +( page ) === NaN){
      if( _search !== null )
          window.location.href = window.location.origin + "?page=2" + "&_search=" + _search
      else
          window.location.href = window.location.origin + "?page=2"
    }else{
      if( _search !== null )
          window.location.href = window.location.origin + "?page=" + ( +( page ) + 1 ) + "&_search=" + _search
      else
          window.location.href = window.location.origin + "?page=" + ( +( page ) + 1 )
    }

  });

  $('.previous').on('click',function(){

    var page =  getParameterByName('page');

    var _search = getParameterByName('_search');

    if( page === null || +( page ) === NaN){

    }else if( +( page ) > 2 ){
      if( _search !== null )
          window.location.href = window.location.origin + "?page=" + ( +( page ) - 1 ) + "&_search=" + _search;
      else
          window.location.href = window.location.origin + "?page=" + ( +( page ) - 1 );
    }else{
      if( _search !== null )
          window.location.href = window.location.origin + "?_search=" + _search;
      else
          window.location.href = window.location.origin;
    }

  });
  $('#cmobno').on('keypress',function(e){
    if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57) ) {
       return false;
    }
    if( $('#cmobno').val().length >= 10 )
    return false;
  });
  $(".btn-comment").on('click',function(){

      $(".err-msg").css("visibility","hidden");

      var name = $.trim( $('#name').val() );

      var email = $.trim( $('#email').val() );

      var comment = $.trim( $('#comment').val() );

      var hasError  = false;

      if( name === undefined || name.length < 4 ){
        hasError = true;
        $("#name-err").css("visibility","visible");
      }

      if( email === undefined || email === "" || !validateEmail(email) ){
        hasError = true;
        $("#email-err").css("visibility","visible");
      }

      if( comment === undefined || comment === ""){
        hasError = true;
        $("#comment-err").css("visibility","visible");
      }

      if( hasError === false ){


        $.ajax({
                url     :   window.location.origin+"/index.php/posts/addcomment",
                type    :   'POST',
                ajax    :   true,
                async   :   false,
                cache   :   false,
                dataType:   'json',
                data    :   { id_post : IdPost, name : name, email : email , comment : comment},
                success :   function(count)
              {
                  if( count > 0 ){
                    $('.well').empty();
                    $('.well').html("<p>Comment Added.</p>");
                    $('#comments li').addClass('clearfix');
                    var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];;
                    var date = new Date();
                    var time = months[date.getMonth()] + date.getDate() + ", " + date.getFullYear() + ", " + formatAMPM(date);
                    $('#comments').prepend('<li class="comment"><div class="clearfix"><h4 class="pull-left">'+name+'</h4><p class="pull-right"> '+time+'</p></div><p><em>' + comment + '</em></p></li>');
                  }
              },
              failure :   function(count)
              {

              }
            });
      }

  });

  $( "#contact1" ).submit(function( event ) {

    var name = $.trim( $('#cname').val() );

    var email = $.trim( $('#cemail').val() );

    var message = $.trim( $('#cmessage').val() );

    var mobno = $.trim( $('#cmobno').val() );

    var url = $.trim( $('#cwebsite').val() );

    $.ajax({
            url     :   window.location.origin+"/index.php/posts/addcontact",
            type    :   'POST',
            ajax    :   true,
            async   :   false,
            cache   :   false,
            dataType:   'json',
            data    :   { mob_no : mobno, name : name, email : email , message : message, url:url },
            success :   function(count)
          {
              if( count > 0 ){
                $('.container1').empty();
                $('.container1').html("<p>Your query was saved. Thank you for contacting us. <a href='"+strBaseUrl+"'>Click Here</a> for Home Page.</p>");
              }
              event.preventDefault();
          },
          failure :   function(count)
          {
              event.preventDefault();
          }
        });
        event.preventDefault();
  });
if( pagename == 'PostDetails' )
  $.ajax({
          url     :   window.location.origin+"/index.php/posts/views",
          type    :   'POST',
          ajax    :   true,
          async   :   false,
          cache   :   false,
          dataType:   'json',
          data    :   { IdPost : IdPost, },
          success :   function(count)
        {

        },
        failure :   function(count)
        {

        }
      });


});

function getParameterByName(name) {
    var url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}

function validateEmail(email) {
  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
}

function formatAMPM(date) {
  var hours = date.getHours();
  var minutes = date.getMinutes();
  var ampm = hours >= 12 ? 'pm' : 'am';
  hours = hours % 12;
  hours = hours ? hours : 12; // the hour '0' should be '12'
  minutes = minutes < 10 ? '0'+minutes : minutes;
  var strTime = hours + ':' + minutes + ' ' + ampm;
  return strTime;
}
