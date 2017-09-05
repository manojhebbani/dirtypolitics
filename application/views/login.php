<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> Login </title>

    <!-- Bootstrap CSS file -->
  	<link href="<?= base_url(); ?>lib/bootstrap-3.0.3/css/bootstrap.min.css" rel="stylesheet" />
  	<link href="<?= base_url(); ?>lib/bootstrap-3.0.3/css/bootstrap-theme.min.css" rel="stylesheet" />
  	<link href="<?= base_url(); ?>lib/css/blog.css" rel="stylesheet" />

  </head>
  <style>
  body {
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
    }

    .panel-default {
    opacity: 0.9;
    margin-top:40%;
    }
    .form-group.last { margin-bottom:0px; }
  </style>

  <body style="background-image:url('http://cardio.prmdemo.in/images/writing.jpg')">
    <div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-lock"></span> Login <span id="sessAlert" style="padding-left: 25%;color:red;"></span></div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">
                            User Name</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="hospIdentity" placeholder="User Name" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">
                            Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="hospPass" autocomplete="new-password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="form-group last">
                        <div class="col-sm-offset-3 col-sm-9">
                            <button type="submit" id="hospLogin" class="btn btn-success btn-sm">
                                Sign in</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Jquery and Bootstrap Script files -->
<script src="<?= base_url(); ?>lib/jquery-2.0.3.min.js"></script>
<script src="<?= base_url(); ?>lib/bootstrap-3.0.3/js/bootstrap.min.js"></script>
<script src="<?= base_url(); ?>lib/js/login.js"></script>
  </body>
</html>
