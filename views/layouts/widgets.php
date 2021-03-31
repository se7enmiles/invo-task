<?php
    $bookCount = Book::countBooks();
    $authorsCount = Author::countAuthors();
	$usersCount = User::countUsers();
?>
<!-- START WIDGETS -->
<div class="row">
	<div class="col-md-3">

		<!-- START WIDGET BOOKS -->
		<div class="widget widget-primary widget-item-icon">
			<div class="widget-item-left">
				<span class="fa fa-book"></span>
			</div>
			<div class="widget-data">
				<div class="widget-int num-count"><?php echo $bookCount; ?></div>
				<div class="widget-title">Books</div>
				<div class="widget-subtitle">In your database</div>
			</div>
		</div>
		<!-- END WIDGET BOOKS -->

	</div>
	<div class="col-md-3">

		<!-- START WIDGET BOOKS -->
		<div class="widget widget-danger widget-item-icon">
			<div class="widget-item-left">
				<span class="fa fa-pencil"></span>
			</div>
			<div class="widget-data">
				<div class="widget-int num-count"><?php echo $authorsCount; ?></div>
				<div class="widget-title">Authors</div>
				<div class="widget-subtitle">In your database</div>
			</div>
		</div>
		<!-- END WIDGET BOOKS -->

	</div>
	<div class="col-md-3">

		<!-- START WIDGET BOOKS -->
		<div class="widget widget-success widget-item-icon">
			<div class="widget-item-left">
				<span class="fa fa-users"></span>
			</div>
			<div class="widget-data">
				<div class="widget-int num-count"><?php echo $usersCount; ?></div>
				<div class="widget-title">Registered Users</div>
				<div class="widget-subtitle">On system</div>
			</div>
		</div>
		<!-- END WIDGET BOOKS -->

	</div>
	<div class="col-md-3">

		<!-- START WIDGET CLOCK -->
		<div class="widget widget-default widget-padding-sm">
			<div class="widget-big-int plugin-clock">00:00</div>
			<div class="widget-subtitle plugin-date">Loading...</div>
		</div>
		<!-- END WIDGET CLOCK -->

	</div>
</div>
<!-- END WIDGETS -->