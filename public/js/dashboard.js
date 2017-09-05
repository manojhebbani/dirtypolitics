$(document).ready(function(){

  $('.btn-search').on('click',function(){

    var _search = $('._search').val();

    if( _search === undefined || _search === "" )
      alert("Please enter the serch word!");
    else
      window.location.href = window.location.origin + window.location.pathname + "?_search=" + _search

  });

  $('.next').on('click',function(){

    var page =  getParameterByName('page');

    var _search = getParameterByName('_search');

    if( page === null || +( page ) === NaN){
      if( _search !== null )
          window.location.href = window.location.origin + window.location.pathname + "?page=2" + "&_search=" + _search
      else
          window.location.href = window.location.origin + window.location.pathname + "?page=2"
    }else{
      if( _search !== null )
          window.location.href = window.location.origin + window.location.pathname + "?page=" + ( +( page ) + 1 ) + "&_search=" + _search
      else
          window.location.href = window.location.origin + window.location.pathname + "?page=" + ( +( page ) + 1 )
    }

  });

  $('.previous').on('click',function(){

    var page =  getParameterByName('page');

    var _search = getParameterByName('_search');

    if( page === null || +( page ) === NaN){

    }else if( +( page ) > 2 ){
      if( _search !== null )
          window.location.href = window.location.origin + window.location.pathname + "?page=" + ( +( page ) - 1 ) + "&_search=" + _search;
      else
          window.location.href = window.location.origin + window.location.pathname + "?page=" + ( +( page ) - 1 );
    }else{
      if( _search !== null )
          window.location.href = window.location.origin + window.location.pathname + "?_search=" + _search;
      else
          window.location.href = window.location.origin  + window.location.pathname;
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
