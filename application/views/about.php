<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="A Bootstrap Blog Template">
	<meta name="author" content="Vijaya Anand">

	<title>About Me</title>

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
				<a href="<?= base_url(); ?>" class="navbar-brand" style="font-size:30px;margin-right:50px;color:#BE0505;">DirtyPolitics</a>
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
					<li><a href="<?= base_url(); ?>index.php/contact">Contact</a></li>
					<li class="active"><a href="<?= base_url(); ?>index.php/about">About</a></li>
				</ul>
			</nav>
		</div>
	</header>

	<!-- Body -->
	<div class="container">
		<h1>DirtyPolitics<br>(డర్టీ పాలిటిక్స్)</h1>
                       <br></br>
		       <div class="row">
                        <div class="col-md-3 col-sm-3"> 
			<img src="<?= base_url(); ?>images/dplogo1.png" style="height:100%;width:100%;margin-left:-25px;margin-top:-75px;" class="img-responsive">
			</div>
			<div class="col-md-9 col-sm-9">
				<p style="font-weight:bold;font-size:19px;">డర్టీ పాలిటిక్స్</p><br>
<p>70 సంవత్సరాల దేశ స్వాతంత్ర్యానంతరం కూడా  కనీస అవసరాలకోసం  ఎదురుచూస్తున్న ప్రజలు. ఇంకా మీకు అదిస్తాం.. ఇదిస్తాం అంటూ ప్రలోభ పెట్టే నాయకులు, నాయకులకు తానతందానా అంటున్న బ్యూరోక్రాట్స్. ఈ పరిస్థితి కేవలం తెలుగు రాష్ట్రాల్లో వున్నది కాదు యావత్భారతమంతా ఇదే.  అవినీతి, కులగజ్జి, మత రాజకీయాలతో కుళ్ళు వాసన వేస్తున్న ఈ రాజకీయాల స్వరూప స్వభావాలను మార్చగలిగిన యువతరంతో పార్టీలన్నీ నిండిపోవాలి. అనుభవజ్ఞులైన రాజకీయనాయకుల వల్ల అవినీతి తప్ప మరేదీ యువతరానికి మార్గదర్శకంగా లేకపోవడం విచారకరం. ప్రస్తుత రాజకీయాల్లోని ముసుగుని, మోసాన్ని తీసి అచ్చమైన రాజకీయాలను ప్రజలముందుంచే ఒక చిన్న ప్రయత్నం మా డర్టీ పాలిటిక్స్ లక్ష్యం. </br>
				</p>
			</div>
		</div>

		<p class="social-buttons text-center">
                 <a href="https://www.facebook.com/Dirty-Politics-120921348537877/" >
		  <button type="button" 
                   class="btn btn-primary btn-lg">Visit Our Facebook page</button> </a>&nbsp;
		  <button type="button" class="btn btn-default btn-lg">Follow Us on Twitter</button>
		</p>

		<br />



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
	<script src="<?= base_url(); ?>lib/js/posts.js"></script>
</body>
</html>
