<?php include (ROOT.'/views/layouts/header.php'); ?>

<!-- START PAGE CONTAINER -->
<div class="page-container">

	<?php include (ROOT.'/views/layouts/sidebar_admin.php'); ?>

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
                        <div class="panel panel-danger">
                            <div class="panel-heading">
                                <h3 class="text-uppercase panel-title"><b><span class="fa fa-recycle"></span> DELETE BOOK №<?php echo $id; ?></b></h3>
                            </div>
                            <div class="panel-body">
                                <h4 class="col-md-3 text-right"><b>Title:</b></h4><h4 class="col-md-9"> <?php echo $book['title']; ?></h4>
                                <p class="col-md-3 text-right"><b>Topic:</b></p><p class="col-md-9"> <?php echo $book['topic']; ?></p>
                                <p class="col-md-3 text-right"><b>Pages:</b></p><p class="col-md-9"> <?php echo $book['pages']; ?></p>
                                <p class="col-md-3 text-right"><b>Price:</b></p><p class="col-md-9"> $ <?php echo $book['price']; ?></p>
                                <p class="col-md-3 text-right"><b>Author(s):</b></p>
                                <ul class="col-md-9 list-unstyled">
		                            <?php foreach ( $book['authors'] as $author ): ?>
                                        <li><a href="/author/<?php echo $author['id']; ?>"><?php echo $author['name']; ?></a></li>
		                            <?php endforeach; ?>
                                </ul>
                                <div class="clearfix"></div>
                                <p class="col-md-3 text-right"><b>Date:</b></p><p class="col-md-9"> <?php echo $book['date_added']; ?></p>
                            </div>
                            <div class="panel-footer">
                                <a href="javascript:history.back()" class="btn btn-default">Back</a>
                                <input type="submit" name="submit" class="btn btn-danger pull-right" value="Delete">
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

