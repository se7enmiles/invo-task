<?php include (ROOT.'/views/layouts/header.php'); ?>

<!-- START PAGE CONTAINER -->
<div class="page-container">

	<?php if (User::checkAdmin()) :
		include (ROOT.'/views/layouts/sidebar_admin.php');
	else:
		include (ROOT.'/views/layouts/sidebar.php');
	endif; ?>


	<!-- PAGE CONTENT -->
	<div class="page-content">

		<?php include (ROOT.'/views/layouts/navbar.php'); ?>
		<!-- PAGE TITLE -->
		<div class="page-title">
		</div>
		<!-- END PAGE TITLE -->

		<!-- PAGE CONTENT WRAPPER -->
		<div class="page-content-wrap">

			<!-- START SIMPLE PANELS -->
			<div class="row">
                <div class="col-md-6 col-md-offset-3">

					<!-- START DANGER PANEL -->
					<form method="post">
						<div class="panel panel-primary">
							<div class="panel-heading">
								<h3 class="text-uppercase panel-title"><b><?php echo $author['name']; ?></b></h3>
							</div>
							<div class="panel-body">
                                <p class="col-md-3 text-right"><b>Book(s):</b></p>
                                <ul class="col-md-9 list-unstyled">
									<?php foreach ( $author['books'] as $book ): ?>
                                        <li><a href="/book/<?php echo $book['id']; ?>"><?php echo $book['title']; ?></a></li>
									<?php endforeach; ?>
                                </ul>
                                <p class="col-md-3 text-right"><b>Date:</b></p><p class="col-md-9"> <?php echo $author['date_added']; ?></p>
							</div>
							<div class="panel-footer">
                                <a href="javascript:history.back()" class="btn btn-default">Back</a>
								<div class="pull-right">
									<a href="/admin/update/<?php echo $book['id']; ?>" class="btn btn-success">Update</a>
									<a href="/admin/delete/<?php echo $book['id']; ?>" class="btn btn-danger">Delete</a>
								</div>
							</div>
						</div>
					</form>
					<!-- END DEFAULT PANEL -->

				</div>
			</div>
			<!-- END SIMPLE PANELS -->

		</div>
		<!-- PAGE CONTENT WRAPPER -->
	</div>
	<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->

<?php include ROOT . '/views/layouts/footer.php'; ?>