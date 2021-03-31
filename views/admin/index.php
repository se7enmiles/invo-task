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
                            <h2 class="h2 pull-left">Books</h2>
                            <a class="btn btn-danger btn-lg pull-right" href="/admin/create">Add a new Book</a>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-actions datatable">
                                    <thead>
                                    <tr>
                                        <th width="50">id</th>
                                        <th>Title</th>
                                        <th width="100">Author(s)</th>
                                        <th>Topic</th>
                                        <th width="100">Pages</th>
                                        <th width="100">Price</th>
                                        <?php if (!User::isGuest() && AdminBase::checkAdmin()): ?>
                                            <th width="120">actions</th>
                                        <?php endif; ?>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($booksList as $book): ?>
                                    <tr id="<?php echo $book['id']; ?>">
                                        <td class="text-center"><?php echo $book['id']; ?></td>
                                        <td class="text-capitalize"><a href="/book/<?php echo $book['id']; ?>"><strong><?php echo $book['title']; ?></strong></a></td>
                                        <td>
                                            <?php foreach ($book['authors'] as $author): ?>
                                                <a href="/author/<?php echo $author['id']; ?>"><span class="label label-success text-capitalize"><?php echo $author['name']; ?></span></a>
                                            <?php endforeach; ?>
                                        </td>
                                        <td><?php echo $book['topic']; ?></td>
                                        <td><?php echo $book['pages']; ?></td>
                                        <td>$ <?php echo $book['price']; ?></td>

                                        <?php if (!User::isGuest() && AdminBase::checkAdmin()): ?>
                                            <td>
                                                <a href="/admin/update/<?php echo $book['id']; ?>" class="btn btn-default btn-rounded btn-condensed btn-sm"><span class="fa fa-pencil"></span></a>
                                                <a href="/admin/delete/<?php echo $book['id']; ?>" class="btn btn-danger btn-rounded btn-condensed btn-sm"><span class="fa fa-times"></span></a>
                                            </td>
                                        <?php endif; ?>
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

<?php include (ROOT.'/views/layouts/footer.php'); ?>