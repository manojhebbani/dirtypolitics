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
	<script src="<?= base_url(); ?>lib/tinymce/js/tinymce/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
<style>

</style>
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
			</div>
			<nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
				<ul class="nav navbar-nav">
					<li class="active"><a href="<?= base_url(); ?>index.php/dashboard">Posts</a></li>
				</ul>
			</nav>
		</div>
	</header>
<div class="clear-fix"></div>


<div class="container">
	<div class="row">


        <div class="col-md-12">
				<button type="button" class="btn btn-success" data-title="add-edit" data-toggle="modal" data-target="#add-edit">&nbsp;&nbsp;&nbsp;&nbsp;Add&nbsp;&nbsp;&nbsp;&nbsp;</button>
        <div class="table-responsive">

              <table id="mytable" class="table table-bordred table-striped">

                   <thead>

                     <th style="width=40%;">Post</th>
                     <th>Posted Date</th>
                     <th>Posted By</th>
                     <th>Views</th>
                     <th>Comments</th>
                      <th>Edit</th>
                    <th>Delete</th>
                   </thead>
    <tbody>
<?php foreach( $Posts as $Post){ ?>
    <tr>
    <td><?= $Post['PostName'] ?></td>
    <td><?= $Post['PostedDate'] ?></td>
    <td><?= $Post['PostedBy'] ?></td>
    <td><?= $Post['PostViews'] ?></td>
    <td><?= $Post['CommentsCount'] ?></td>
    <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="add-edit" data-toggle="modal" data-target="#add-edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
    <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
    </tr>

<?php } ?>
    </tbody>

</table>

<div class="clearfix"></div>

            </div>

        </div>
	</div>
</div>


<div class="modal fade" id="add-edit" tabindex="-1" role="dialog" aria-labelledby="add-edit" aria-hidden="true">
    <div class="modal-dialog" style="width:90%;">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Post Details</h4>
      </div>
          <div class="modal-body">
          <div class="form-group">
						<label>Post Name<span style="color:red;">*</span> : </label>
        		<input class="form-control " type="text" placeholder="Post Name">
        	</div>
					<div class="form-group">
						<label>Posted By<span style="color:red;">*</span> : </label>
        		<input class="form-control " type="text" placeholder="Posted By">
        	</div>
	        <div class="form-group">
						<label>Post Description<span style="color:red;">*</span> : </label>
						<textarea rows="4" class="form-control" placeholder="Post Desciption"></textarea>
	        </div>
					<div class="form-group">
						<label>Post Content<span style="color:red;">*</span> : </label>
						<textarea rows="4" class="form-control" placeholder="Post Content"></textarea>
	        </div>
					<div class="form-group">
						<label>Image Upload<span style="color:red;">*</span> : </label>
						<input type="file" name="fileToUpload" id="fileToUpload">
					</div>
					<div class="form-group" style="float: right;margin-top: -5%;margin-right: 40%;">
						<label class="active">
							<input type="checkbox" autocomplete="off" checked>
							<span class="">Active</span>
						</label>
	        </div>
      </div>
          <div class="modal-footer ">
        <button type="button" class="btn btn-success btn-lg" style="width: 50%;margin-right: 25%;"><span class="glyphicon glyphicon-ok-sign"></span> Submit</button>
      </div>
        </div>
    <!-- /.modal-content -->
  </div>
      <!-- /.modal-dialog -->
    </div>



    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
      </div>
          <div class="modal-body">

       <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>

      </div>
        <div class="modal-footer ">
        <button type="button" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
      </div>
        </div>
    <!-- /.modal-content -->
  </div>
      <!-- /.modal-dialog -->
    </div>
	<!-- Footer -->
	<footer>
		<div class="container">
			<hr />
			<p class="text-center">Copyright &copy; PRM Softwares 2016. All rights reserved.</p>
		</div>
	</footer>

	<!-- Jquery and Bootstrap Script files -->
	<script src="<?= base_url(); ?>lib/jquery-2.0.3.min.js"></script>
	<script src="<?= base_url(); ?>lib/bootstrap-3.0.3/js/bootstrap.min.js"></script>
	<script src="<?= base_url(); ?>lib/js/dashboard.js"></script>

  <script>
  $(document).ready(function(){
      $("#mytable #checkall").click(function () {
        if ($("#mytable #checkall").is(':checked')) {
            $("#mytable input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });

        } else {
            $("#mytable input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
    $("[data-toggle=tooltip]").tooltip();
});
  </script>
</body>
</html>
