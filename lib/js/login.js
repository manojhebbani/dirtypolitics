$('#hospLogin').on('click',function(e)
{
    e.preventDefault();

    $('#sessAlert').html('&nbsp;');

    var strHospCode = $('#hospIdentity').val();

    var strPassword = $('#hospPass').val();

    hasErrors = false;

    if(strHospCode === "" || !strHospCode)
    {
      hasErrors = true;
      $('#sessAlert').html('Please enter User Name.');
      return false;
    }
    else if(strPassword === "" || !strPassword)
    {
      hasErrors = true;
      $('#sessAlert').html('Please enter Password.');
      return false;
    }

    if(!hasErrors)
    {
      jQuery.ajax({
        url 	: 	window.location.protocol + "//" + window.location.host +'/index.php/login/login',
        method	: 	'POST',
        cache	:	false,
        async	:	true,
        dataType:	'json',
        data	:	{ strHospCode : $.trim(strHospCode), strPassword:$.trim(strPassword) },
        success	:	function(result)
        {
          if(result.Status !== true)
          {
            $('#sessAlert').html(result.response);
            return false;
          }
          else
            window.location.href = window.location.protocol + "//" + window.location.host + "/index.php/"+'dashboard';
        },
        failure	:function(result)
        {

        }
      });
      }
    else
    {
      return false;
    }
});
