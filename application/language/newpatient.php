<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $this->session->userdata('DISPLAYNAME'); ?> </title>
    <!-- Bootstrap -->
    <link href="<?php echo base_url(); ?>assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url(); ?>assets/nprogress/nprogress.css" rel="stylesheet">
    <!-- jQuery -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/clockpicker-gh-pages/dist/bootstrap-clockpicker.min.css">
    <!-- Custom Theme Style -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/clockpicker-gh-pages/assets/css/github.min.css">

  <link href="<?php echo base_url(); ?>assets/select2/dist/css/select2.min.css" rel="stylesheet">
  <link href="https://colorlib.com/polygon/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>assets/css/custom.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/common.css" rel="stylesheet">
<script>
var registrationType = '<?php echo $RegistrationType ?>';
</script>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?php echo base_url();?>index.php/dashboard" class="site_title"><i class="fa fa-paw"></i> <span><?php echo $this->session->userdata('DISPLAYNAME'); ?>!</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile">
              <div class="profile_pic">
                <img src="<?php echo base_url(); ?>assets/images/img.PNG" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $this->session->userdata('DISPLAYNAME'); ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>&nbsp;&nbsp;</h3>
                <ul class="nav side-menu">
                <?php foreach( $this->session->userdata('ROLES') as $key=>$roles ){ ?>
					<li><a href="<?php echo base_url().$roles['RedirectUrl'] ; ?>"><i class="fa fa-laptop"></i> <?php echo $roles['RoleDisplayName'] ?></a></li>
				<?php } ?>                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?php echo base_url();?>assets/images/img.PNG" alt=""><?php echo $this->session->userdata('DISPLAYNAME'); ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="<?php echo base_url(); ?>index.php/login/hosplogout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main"  >
          <div class="">

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" id="main-page">
                  <div class="x_title">
                    <h2>New Patient <small>Registration</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">




                    <form class="form-horizontal form-label-left" novalidate>

                      <input type="hidden" id="patientId" value="">

                      <div class="item col-md-4 col-sm-12 col-xs-12 form-group">
                        <label>Mobile number</label>
                        <input type="number" id="MobileNumber" data-validate-minmax="10,10" required="required" class="form-control" placeholder="Mobile Number">
                      </div>

                      <div class="item col-md-4 col-sm-12 col-xs-12 form-group">
                        <label>Name</label>
                        <input type="text" id="Name" class="form-control" required="required" placeholder="Name">
                      </div>

                      <div class="item col-md-4 col-sm-12 col-xs-12 form-group">
                        <label>Email</label>
                        <input type="email" id="email" name="email" required="required" class="form-control" placeholder="Email">
                      </div>

                      <div class="item col-md-4 col-sm-12 col-xs-12 form-group">
                      <label>Gender *:</label>
                        <p>
                          Male:
                          <input type="radio" class="flat" name="gender" id="genderM" value="M"  required />
                          Female:
                          <input type="radio" class="flat" name="gender" id="genderF" value="F" checked=""/>
                        </p>
                      </div>

                      <div class="item col-md-4 col-sm-12 col-xs-12 form-group">
                        <label>Date Of Birth</label>
                        <input type="text" id="DateOfBirth" name="DateOfBirth" required="required" class="form-control" placeholder="Date-Of-Birth">
                      </div>

                      <div class="item col-md-4 col-sm-12 col-xs-12 form-group">
                        <input type="text" id="days" name="days" required="required" class="form-control" placeholder="Days">
                      </div>

                      <div class="item col-md-4 col-sm-12 col-xs-12 form-group">
                        <input type="text" id="years" name="years" required="required" class="form-control" placeholder="Years">
                      </div>

                      <div class="item col-md-4 col-sm-12 col-xs-12 form-group">
                        <input type="text" id="months" name="months" required="required" class="form-control" placeholder="Months">
                      </div>

                      <div class="item col-md-4 col-sm-12 col-xs-12 form-group">
                        <input type="text" id="days" name="days" required="required" class="form-control" placeholder="Days">
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Weight">Baby Weight/Height <span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-6 form-group has-feedback">
                          <input type="number" class="form-control has-feedback-left" id="Weight" placeholder="Weight in Kg">
                          <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-6 form-group has-feedback">
                          <input type="number" class="form-control" id="Height" placeholder="Height In cms" required="required">
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="payment-type">Payment type</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="select2_single form-control" id="payment-type" tabindex="-1">
                            <option value="0"></option>
                            <?php foreach($PaymentType as $Payment){
                                echo '<option value="'.$Payment['IdPaymentType'].'">'.$Payment['PName'].'</option>';
                             }
                             ?>
                          </select>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="visit-type">Visit Type</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="select2_single form-control" id="visit-type" tabindex="-1">
                            <option value="0"></option>
                            <?php foreach($VisitTypeList as $visitType){
                                echo '<option value="'.$visitType['IdVisitType'].'">'.$visitType['Name'].'</option>';
                             }
                             ?>
                          </select>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="referedby">Refered By
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="referedby" name="referedby" required="required" class="form-control col-md-7 col-xs-12 optional">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="adress">Address <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="adress" name="adress" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text"></textarea>
                        </div>
                      </div>
                    </form>

                  </div>
                </div>
                <div class="x_panel" id="successMsg" style="display:none;">
                    Your Registraion With Dr.<span class="doctorName"></span> Has made Between the timings <span class="fromTime">9:10</span> to <span class="toTime">9:30</span>.
                    Please be avilable in those timings. And Your patient Id is <span class="patietUniqueKey"></span>. Use this Id or Mobile Number next Time.
                    <a href="<?php echo base_url(); ?>index.php/registration/newpatient" style="color:#34495E;">Click Here</a> For Another registration.
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>

        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <script src="<?php echo base_url(); ?>assets/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url(); ?>assets/bootstrap/dist/js/bootstrap.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/js/moment/moment.min.js"></script>


    <script src="https://colorlib.com/polygon/vendors/iCheck/icheck.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/js/datepicker/daterangepicker.js"></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/clockpicker-gh-pages/dist/bootstrap-clockpicker.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url(); ?>assets/fastclick/lib/fastclick.js"></script>

    <!-- NProgress -->
    <script src="<?php echo base_url(); ?>assets/nprogress/nprogress.js"></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js"></script>

    <!-- jQuery Smart Wizard -->
    <script src="<?php echo base_url(); ?>assets/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>

    <script src="<?php echo base_url(); ?>assets/select2/dist/js/select2.full.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url(); ?>assets/js/custom.min.js"></script>

    <!-- jQuery Smart Wizard -->
    <script>
      $(document).ready(function() {
        $('#date-of-birth').daterangepicker({
          singleDatePicker: true,
          calender_style: "picker_4",
          format: "YYYY-MM-DD",
		  showDropdowns: true
        }, function(start, end, label) {
          //$('#date-of-birth').val(start.format("YYYY-MM-DD"));
        });

        $( "#date-of-birth" ).keydown(function() {
          return false;
        });
		$( "#days,#months,#years" ).keydown(function( event ) {
			 regexp = /^[0-9]+$/;
			if ( !regexp.test(event.key) && event.key !=="Backspace")
			   return false;
		});
		$( "#days,#months,#years" ).keyup(function( event ) {
			var dateofbirth = new Date();
			dateofbirth.setDate(dateofbirth.getDate() - +($("#days").val()));
			dateofbirth.setMonth(dateofbirth.getMonth() - +($("#months").val()));
			dateofbirth.setFullYear(dateofbirth.getFullYear() - +($("#years").val()));
			$( "#date-of-birth" ).val(dateofbirth.getFullYear() + "-" + ( +(dateofbirth.getMonth()) + 1 ) + "-" + dateofbirth.getDate());
		});
		  $('input[type=radio][name=gender]').change(function(){
			  $(this).parent().removeClass('btn-default').addClass('btn-primary');
			  $(this).parent().siblings().removeClass('btn-primary').addClass('btn-default');
		  });
        $('#wizard').smartWizard();

        $('#wizard_verticle').smartWizard({
          transitionEffect: 'slide'
        });
        $('.stepContainer').css('overflow-x','visible');
		$('.clockpicker').clockpicker();
        $('.buttonNext').addClass('btn btn-success');
        $('.buttonPrevious').addClass('btn btn-primary');
        $('.buttonFinish').addClass('btn btn-default');
        $(".select2_single").select2({
          placeholder: "Select a state",
          allowClear: true
        });
        $('.select2').css('width','100%');
      });
    </script>
	<script type="text/javascript">
  $('.clockpicker').clockpicker()
  	.find('input').change(function(){
  		$('#timeSlotAlert').hide(500);
      $('.fromTime').text($('#fromTime').val());
      $('.toTime').text($('#toTime').val());
  	});
  $('.clockpicker').find('input').keypress(function(){
  		return false;
  	});
// Manually toggle to the minutes view
$('#check-minutes').click(function(e){
	// Have to stop propagation here
	e.stopPropagation();
	input.clockpicker('show')
			.clockpicker('toggleView', 'minutes');
});
if (/mobile/i.test(navigator.userAgent)) {
	$('input').prop('readOnly', true);
}
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/clockpicker-gh-pages/assets/js/highlight.min.js"></script>
<script type="text/javascript">
hljs.configure({tabReplace: '    '});
hljs.initHighlightingOnLoad();
</script>
<!-- validator -->
<script>

  $('form').submit(function(e) {
    e.preventDefault();

    //return false;
  });
  $('.profile_details').click(function(){
    $('#doctorAlert').hide(500);
    $(this).find('.profile_view').addClass('doctorselect').addClass('active');
    $(this).siblings().find('.profile_view').removeClass('doctorselect').removeClass('active');
    $('.doctorName').text($('.profile_view.active #doctorName').val());
  });
</script>
    <!-- /jQuery Smart Wizard -->
  </body>
</html>
