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
                <div class="col-md-8 col-md-offset-2">

                    <!-- START FORM -->
                    <form method="post" role="form" class="form-horizontal" action="#">
                        <div class="panel panel-colorful">
                            <div class="panel-heading">
                                <h3 class="text-uppercase panel-title"><b>ADD NEW BOOK TO DATABASE</b></h3>
                                <div class="clearfix"></div>
	                            <?php if (isset($errors) && is_array($errors)): ?>
                                    <ul>
			                            <?php foreach ($errors as $error): ?>
                                            <li> - <?php echo $error; ?></li>
			                            <?php endforeach; ?>
                                    </ul>
	                            <?php endif; ?>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Title:</label>
                                    <div class="col-md-9">
                                        <input name="title" type="text" class="form-control" value=""/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Topic:</label>
                                    <div class="col-md-9">
                                        <textarea name="topic" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Pages:</label>
                                    <div class="col-md-9">
                                        <input name="pages" type="number" class="form-control" value=""/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Price:</label>
                                    <div class="col-md-9    ">
                                        <input name="price" type="number" class="form-control" value=""/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 text-right">Author(s):<br>(can choose multiple)</label>
                                    <div class="col-md-9">
                                        <select name="authors[]" multiple class="form-control">
	                                        <?php foreach ($authorsList as $author): ?>
                                            <option value="<?php echo $author['id']; ?>"><?php echo $author['name']; ?></option>
	                                        <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 text-right">Add new author(s):<br>(comma separated)</label>
                                    <div class="col-md-9">
                                        <textarea name="authors_new" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <a href="javascript:history.back()" class="btn btn-primary">Back</a>
                                <input type="submit" name="submit" class="btn btn-success pull-right" value="Add to database">
                            </div>
                        </div>
                    </form>
                    <!-- END FORM -->

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