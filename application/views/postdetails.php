<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?= $PostDetails[0]['PostName'] ?> </title>

  <!-- Bootstrap CSS file -->
  <link href="<?= base_url(); ?>lib/bootstrap-3.0.3/css/bootstrap.min.css" rel="stylesheet" />
  <link href="<?= base_url(); ?>lib/bootstrap-3.0.3/css/bootstrap-theme.min.css" rel="stylesheet" />
  <link href="<?= base_url(); ?>lib/css/blog.css" rel="stylesheet" />
  <link href="<?= base_url(); ?>lib/css/blog2.css" rel="stylesheet" />
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
        <a href="<?= base_url(); ?>" class="navbar-brand">Dirty Politics</a>
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

  <!-- Body -->
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <?php if( count( $PostDetails ) > 0 ){ ?>
        <article>
          <h1><a href="javascript:void"><?= $PostDetails[0]['PostName'] ?></a></h1>

              <div class="row">
                  <div class="col-sm-5 col-md-5">
                  <span></span> &nbsp;<a href="javascript:void">By <?= $PostDetails[0]['PostedBy'] ?></a>
                </div>
                  <div class="col-sm-7 col-md-7">
                    <span class="glyphicon glyphicon-eye-open"></span> <a href="#comments"><?= $PostDetails[0]['PostViews'] ?> Views</a>
                    &nbsp;&nbsp;<span class="glyphicon glyphicon-pencil"></span> <a href="#comments"><?= $PostDetails[0]['CommentsCount'] ?> Comments</a>
                    &nbsp;&nbsp;<span class="glyphicon glyphicon-time"></span> <?= date("F j, Y, g:i a", strtotime ($PostDetails[0]['PostedDate'])) ?>
                  </div>
                </div>

                <hr>

                <p class="lead"><?= $PostDetails[0]['PostDescription']; ?></p>

<br />

                <img src="<?= base_url().$PostDetails[0]['PostImage']; ?>" class="img-responsive" style="width:100%">


                <p>
                    <?= $PostDetails[0]['PostContent']; ?>
                </p>

                <hr>
        </article>
        <?php }else{ ?>
          <article>
            <h1>This post is not available.</h1>
          </article>
        <?php } ?>
        <ul class="pager">
          <li class="previous"><a href="<?= base_url();?>">&larr; Back to posts</a></li>
        </ul>

        <!-- Comment form -->
        <?php if( count( $PostDetails ) > 0 ){ ?>
        <div class="well">
          <h4>Leave a comment</h4>
          <form role="form" class="clearfix">
            <div class="col-md-6 form-group">
              <label class="sr-only" for="name">Name</label>
              <input type="text" class="form-control" id="name" placeholder="Name">
              <span id="name-err" class="err-msg" style="visibility:hidden;color:red;">name should be minimum 4 letters length.</span>
            </div>
            <div class="col-md-6 form-group">
              <label class="sr-only" for="email">Email</label>
              <input type="email" class="form-control" id="email" placeholder="Email">
              <span id="email-err" class="err-msg" style="visibility:hidden;color:red;">Not valid Email.</span>
            </div>
            <div class="col-md-12 form-group">
              <label class="sr-only" for="email">Comment</label>
              <textarea class="form-control" id="comment" placeholder="Comment"></textarea>
              <span id="comment-err" class="err-msg" style="visibility:hidden;color:red;">Please provide the comment.</span>
            </div>
            <div class="col-md-12 form-group text-right">
              <button type="button" class="btn-comment btn btn-primary">Submit</button>
            </div>
          </form>
        </div>

        <hr />


        <ul id="comments" class="comments">
          <?php $count = 0; foreach($Comments as $Comment){ ?>
          <li class="comment <?= ( $count > 0 )? 'clearfix':''; ?>">
            <div class="clearfix">
              <h4 class="pull-left"><?= $Comment['CommenterName'] ?></h4>
              <p class="pull-right"> <?= date("F j, Y, g:i a", strtotime ($Comment['CommentDate'])) ?> </p>
            </div>
            <p>
              <em><?= $Comment['Comment'] ?></em>
            </p>
          </li>
          <?php $count++; } ?>
        </ul>
        <?php } ?>
      </div>
      <div class="col-md-4">

        <!-- <div class="well text-center">
          <p class="lead">
            Don't want to miss updates? Please click the below button!
          </p>
          <button class="btn btn-primary btn-lg">Subscribe to my feed</button>
        </div> -->

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

        <!-- Recent Comments -->
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
      <p class="text-center">Copyright &copy; Dirtypolitics. All rights reserved.</p>
    </div>
  </footer>

  <!-- Bootstrap Script file -->
  <script src="<?= base_url(); ?>lib/jquery-2.0.3.min.js"></script>
  <script src="<?= base_url(); ?>lib/bootstrap-3.0.3/js/bootstrap.min.js"></script>
  <script>
  var pagename = '<?= $Page; ?>';
  var IdPost = '<?= $PostDetails[0]["IdPost"]?>';
  </script>
  <script src="<?= base_url(); ?>lib/js/posts.js"></script>
</body>
</html>
