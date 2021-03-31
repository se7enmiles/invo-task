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

			<?php include (ROOT.'/views/layouts/widgets.php'); ?>

			<!-- START RESPONSIVE TABLES -->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">

                        <div class="panel-heading">
                            <span class="h2">Authors</span>
                        </div>

						<div class="panel-body panel-body-table">

							<div class="table-responsive">
								<table class="table table-bordered table-striped table-actions">
									<thead>
									<tr>
										<th width="50">id</th>
										<th>Name</th>
										<th>Book(s)</th>
									</tr>
									</thead>
									<tbody>
									<?php foreach ($authorsList as $author): ?>
									<tr id="trow_1">
										<td class="text-center"><?php echo $author['id']; ?></td>
										<td class="text-capitalize"><a href="/author/<?php echo $author['id']; ?>"><strong><?php echo $author['name']; ?></strong></a></td>
										<td>
                                        <?php foreach ($author['books'] as $book): ?>
                                            <a href="/book/<?php echo $book['id']; ?>"><span class="label label-primary"><?php echo $book['title']; ?></span></a>
                                        <?php endforeach; ?>
										</td>
									</tr>
									<?php endforeach; ?>
									</tbody>
								</table>
							</div>

						</div>
					</div>

				</div>
			</div>
			<!-- END RESPONSIVE TABLES -->

		</div>
		<!-- END PAGE CONTENT WRAPPER -->
	</div>
	<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->
<!-- MESSAGE BOX-->
<div class="message-box animated fadeIn" data-sound="alert" id="mb-remove-row">
	<div class="mb-container">
		<div class="mb-middle">
			<div class="mb-title"><span class="fa fa-times"></span> Remove <strong>Data</strong> ?</div>
			<div class="mb-content">
				<p>Are you sure you want to remove this row?</p>
				<p>Press Yes if you sure.</p>
			</div>
			<div class="mb-footer">
				<div class="pull-right">
					<button class="btn btn-success btn-lg mb-control-yes">Yes</button>
					<button class="btn btn-default btn-lg mb-control-close">No</button>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END MESSAGE BOX-->
<!-- MESSAGE BOX-->
<div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
	<div class="mb-container">
		<div class="mb-middle">
			<div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
			<div class="mb-content">
				<p>Are you sure you want to log out?</p>
				<p>Press No if youwant to continue work. Press Yes to logout current user.</p>
			</div>
			<div class="mb-footer">
				<div class="pull-right">
					<a href="pages-login.html" class="btn btn-success btn-lg">Yes</a>
					<button class="btn btn-default btn-lg mb-control-close">No</button>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END MESSAGE BOX-->

<?php include (ROOT.'/views/layouts/footer.php'); ?>