<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="A Bootstrap Blog Template">
	<meta name="author" content="Vijaya Anand">

	<title>Contact Me</title>

	<!-- Bootstrap CSS file -->
  <link href="<?= base_url(); ?>lib/bootstrap-3.0.3/css/bootstrap.min.css" rel="stylesheet" />
  <link href="<?= base_url(); ?>lib/bootstrap-3.0.3/css/bootstrap-theme.min.css" rel="stylesheet" />
  <link href="<?= base_url(); ?>lib/css/blog.css" rel="stylesheet" />
</head>

<body>

	<!-- Header -->
	<header class="navbar navbar-inverse navbar-fixed-top bs-docs-nav" role="banner">
		<div class="container">
			<div class="navbar-header">
				<button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="<?= base_url(); ?>" class="navbar-brand" style="color:#BE0505;font-size:30px;margin-right:50px;">DirtyPolitics</a>
			</div>
			<nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
        <form class="navbar-form navbar-right" role="search">
          <div class="form-group">
            <input type="text" class="form-control _search" name="_search" value="<?= isset($_GET['_search']) ? $_GET['_search'] : '' ; ?>" placeholder="Search">
          </div>
          <button type="button" class="btn-search btn btn-default">Submit</button>
        </form>
				<ul class="nav navbar-nav">
					<li><a href="<?= base_url(); ?>">Home</a></li>
					<li class="active"><a href="<?= base_url(); ?>index.php/contact">Contact</a></li>
					<li><a href="<?= base_url(); ?>index.php/about">About</a></li>
				</ul>
			</nav>
		</div>
	</header>



		<div class="container1" style="margin-top:-50px;">
		  <form id="contact1" action="" method="post">
		     <div style="height:350px;width:100%;margin-bottom:-30px;margin-top:-115px;"> 
			<img src="<?= base_url(); ?>images/dplogo1.png" style="height:100%;width:100%;" class="img-responsive">
			</div>
		    <h4>Have a question or Just want to get in touch?</h4>
		    <fieldset>
		      <input id="cname" placeholder="Your name" type="text" tabindex="1" required autofocus>
          <span id="cname-err" class="err-msg" id="" style="color:red;display:none;">Name Should Be min 4 letters in length.</span>
		    </fieldset>
		    <fieldset>
		      <input id="cemail" placeholder="Your Email Address" type="email" tabindex="2" required>
          <span id="cemail-err" class="err-msg" style="color:red;display:none;">Not a valid Email.</span>
		    </fieldset>
		    <fieldset>
		      <input id="cmobno" placeholder="Your Phone Number (optional)" min-length="10" type="tel" tabindex="3" >
          <span id="cmobno-err" class="err-msg" style="color:red;display:none;">Not a valid mobile number.</span>
		    </fieldset>
		    <fieldset>
		      <input id="cwebsite" placeholder="Your Web Site (optional)" type="url" tabindex="4" >
		    </fieldset>
		    <fieldset>
		      <textarea id="cmessage" placeholder="Type your message here...." tabindex="5" required></textarea>
          <span id="cmessage-err" class="err-msg" style="color:red;display:none;">Not a valid mobile number.</span>
		    </fieldset>
		    <fieldset>
		      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
		    </fieldset>
		    
		  </form>
		</div>

	<!-- Footer -->
	<footer>
		<div class="container">
			<hr />
			<p class="text-center">Copyright &copy; Dirtypolitics. All rights reserved.</p>
		</div>
	</footer>

	<!-- Jquery and Bootstrap Script files -->
  <script src="<?= base_url(); ?>lib/jquery-2.0.3.min.js"></script>
	<script src="<?= base_url(); ?>lib/bootstrap-3.0.3/js/bootstrap.min.js"></script>
  <script>
  var strBaseUrl = window.location.origin;
  </script>
	<script src="<?= base_url(); ?>lib/js/posts.js"></script>
</body>
</html>
