<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="A Bootstrap Blog Template">
	<meta name="author" content="Vijaya Anand">

	<title>Dirty Politics</title>

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
				<a href="<?= base_url(); ?>" class="navbar-brand" style="color:#BE0505;font-size:30px;margin-right:50px;">Dirty Politics</a>
			</div>
			<nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
				<form class="navbar-form navbar-right" role="search">
			      <div class="form-group">
			        <input type="text" class="form-control _search" name="_search" value="<?= isset($_GET['_search']) ? $_GET['_search'] : '' ; ?>" placeholder="Search">
			      </div>
			      <button type="button" class="btn-search btn btn-default">Submit</button>
			    </form>
				<ul class="nav navbar-nav">
					<li class="active"><a href="<?= base_url(); ?>">Home</a></li>
					<li><a href="<?= base_url(); ?>index.php/contact">Contact</a></li>
					<li><a href="<?= base_url(); ?>index.php/about">About</a></li>
				</ul>
			</nav>
		</div>
	</header>
<div class="clear-fix"></div>
	<!-- Body -->
	<div class="container">
		<div class="row">
			<div class="col-md-8">

				<h1>Latest Posts</h1>

      <?php
				if(count( $Posts ) > 0){
        foreach($Posts as $Post){
      ?>
				<article>
					<h2><a href="<?= base_url().'index.php/post/'.$Post['IdPost'] ?>"><?= $Post['PostName']; ?></a></h2>

			        <div class="row">
			          	<div class="col-sm-5 col-md-5">
			          		<span></span> &nbsp;<a href="javascript:void">By <?= $Post['PostedBy']; ?></a>
			          	</div>
			          	<div class="col-sm-7 col-md-7">
										<span class="glyphicon glyphicon-eye-open"></span> <a href="#comments"><?= $Post['PostViews'] ?> Views</a>
			          		&nbsp;&nbsp;<span class="glyphicon glyphicon-pencil"></span> <a href="<?= base_url().'index.php/post/'.$Post['IdPost'].'#comments' ?>"><?= $Post['CommentsCount']; ?> Comments</a>
			          		&nbsp;&nbsp;<span class="glyphicon glyphicon-time"></span> <?= date("F j, Y, g:i a", strtotime ($Post['PostedDate'])) ?>
			          	</div>
			          </div>

			          <hr>

								<p class="lead"><?= $Post['PostDescription']; ?></p>

								<br />

			          <img src="<?= base_url().$Post['PostImage']; ?>" class="img-responsive" style="width:100%">


			          <p><?= $Post['PostContent']; ?></p>

					  <p class="text-right">
				          <a href="<?= base_url().'index.php/post/'.$Post['IdPost'] ?>">
				          	continue reading...
				          </a>
				      </p>

			          <hr>
				</article>

        <?php
						}
					}else{
				?>
					<article>
						<h2> No posts available. <a href="<?php base_url(); ?>" >Click Here</a> for main page.  </h2>
					</article>
				<?php } ?>
				<ul class="pager">
					<li class="previous"><a href="javascript:void">&larr; Previous</a></li>
				<?php
					if(count( $Posts ) > 0){
				?>
					<li class="next"><a href="javascript:void">Next &rarr;</a></li>
				<?php } ?>
				</ul>

			</div>
			<div class="col-md-4">

				<!--<div class="well text-center">
					<p class="lead">
						Don't want to miss updates? Please click the below button!
					</p>
					<button class="btn btn-primary btn-lg">Subscribe to my feed</button>
				</div>-->
                                 <div style="height:100%;width:100%;margin-bottom:20px;margin-top:-50px;"> 
			                  <img src="images/dplogo1.png" style="height:100%;width:100%;" class="img-responsive">
			          </div>

				<!-- Latest Posts -->
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4>Latest Posts</h4>
					</div>
					<ul class="list-group">
						<?php
						$count = 1;
			        foreach($RecentPosts as $Post){
			      ?>
						<li class="list-group-item"><a href="<?= base_url().'index.php/post/'.$Post['IdPost'] ?>"> <?= $count.". ".$Post['PostName'] ?></a></li>
						<?php $count++;} ?>
					</ul>
				</div>

				<div class="panel panel-default">
					<div class="panel-heading">
						<h4>Recent Comments</h4>
					</div>
					<ul class="list-group">
						<?php
			        foreach($RecentComments as $Comment){
			      ?>
						<li class="list-group-item"><a href="<?= base_url().'index.php/post/'.$Comment['IdPost'].'#comments' ?>"><?= $Comment['Comment']; ?> - <em> <?= $Comment['CommenterName']; ?> </em></a></li>
						<?php } ?>
					</ul>
				</div>

			</div>
		</div>
	</div>

	<!-- Footer -->
	<footer>
		<div class="container">
			<hr />
			<p class="text-center">Copyright &copy; DirtyPolitics. All rights reserved.</p>
		</div>
	</footer>

	<!-- Jquery and Bootstrap Script files -->
	<script src="<?= base_url(); ?>lib/jquery-2.0.3.min.js"></script>
	<script src="<?= base_url(); ?>lib/bootstrap-3.0.3/js/bootstrap.min.js"></script>
	<script>
  var pagename = '<?= $Page; ?>';
  </script>
	<script src="<?= base_url(); ?>lib/js/posts.js"></script>
</body>
</html>
