<?php

	include_once (ROOT.'/models/Author.php');
	include_once (ROOT.'/models/Book.php');

	include (ROOT.'/views/layouts/header.php');
?>

<!-- START PAGE CONTAINER -->
<div class="page-container">

	<?php include (ROOT.'/views/layouts/sidebar.php'); ?>

	<!-- PAGE CONTENT -->
	<div class="page-content">

		<?php include (ROOT.'/views/layouts/navbar.php'); ?>

		<!-- PAGE TITLE -->
		<div class="page-title">
			<h2>Basic Tables</h2>
		</div>
		<!-- END PAGE TITLE -->

		<!-- PAGE CONTENT WRAPPER -->
		<div class="page-content-wrap">

			<!-- START WIDGETS -->
			<div class="row">
				<div class="col-md-3">

					<!-- START WIDGET MESSAGES -->
					<div class="widget widget-default widget-item-icon" onclick="location.href='pages-messages.html';">
						<div class="widget-item-left">
							<span class="fa fa-envelope"></span>
						</div>
						<div class="widget-data">
							<div class="widget-int num-count">48</div>
							<div class="widget-title">New messages</div>
							<div class="widget-subtitle">In your mailbox</div>
						</div>
						<div class="widget-controls">
							<a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
						</div>
					</div>
					<!-- END WIDGET MESSAGES -->

				</div>
				<div class="col-md-3">

					<!-- START WIDGET REGISTRED -->
					<div class="widget widget-default widget-item-icon" onclick="location.href='pages-address-book.html';">
						<div class="widget-item-left">
							<span class="fa fa-user"></span>
						</div>
						<div class="widget-data">
							<div class="widget-int num-count">375</div>
							<div class="widget-title">Registred users</div>
							<div class="widget-subtitle">On your website</div>
						</div>
						<div class="widget-controls">
							<a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
						</div>
					</div>
					<!-- END WIDGET REGISTRED -->

				</div>
				<div class="col-md-3">

					<!-- START WIDGET CLOCK -->
					<div class="widget widget-danger widget-padding-sm">
						<div class="widget-big-int plugin-clock">00:00</div>
						<div class="widget-subtitle plugin-date">Loading...</div>
						<div class="widget-controls">
							<a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="left" title="Remove Widget"><span class="fa fa-times"></span></a>
						</div>
						<div class="widget-buttons widget-c3">
							<div class="col">
								<a href="#"><span class="fa fa-clock-o"></span></a>
							</div>
							<div class="col">
								<a href="#"><span class="fa fa-bell"></span></a>
							</div>
							<div class="col">
								<a href="#"><span class="fa fa-calendar"></span></a>
							</div>
						</div>
					</div>
					<!-- END WIDGET CLOCK -->

				</div>
			</div>
			<!-- END WIDGETS -->

			<!-- START RESPONSIVE TABLES -->
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-default">

						<div class="panel-heading">
							<h3 class="panel-title">Books</h3>
						</div>

						<div class="panel-body panel-body-table">

							<div class="table-responsive">
								<table class="table table-bordered table-striped table-actions">
									<thead>
									<tr>
										<th width="50">id</th>
										<th>Title</th>
										<th width="100">Author(s)</th>
										<th>Topic</th>
										<th width="100">Pages</th>
										<th width="100">Price</th>
										<th width="120">actions</th>
									</tr>
									</thead>
									<tbody>
									<?php foreach ($booksList as $book):
										$authorsOfBook = Author::getAuthorByBookId($book['id']);
										?>
									<tr id="trow_1">
										<td class="text-center"><?php echo $book['id']; ?></td>
										<td class="text-capitalize"><strong><?php echo $book['title']; ?></strong></td>
										<td>
											<?php foreach ($authorsOfBook as $author_id):
												$author = Author::getAuthorById($author_id['author_id']);
												?>
											<span class="label label-success text-capitalize"><?php echo $author['name']; ?></span>
											<?php endforeach; ?>
										</td>
										<td><?php echo $book['topic']; ?></td>
										<td><?php echo $book['pages']; ?></td>
										<td>$ <?php echo $book['price']; ?></td>
										<td>
											<button class="btn btn-default btn-rounded btn-condensed btn-sm"><span class="fa fa-pencil"></span></button>
											<button class="btn btn-danger btn-rounded btn-condensed btn-sm" onClick="delete_row('trow_1');"><span class="fa fa-times"></span></button>
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