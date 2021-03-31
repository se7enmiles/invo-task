<!DOCTYPE html>
<html lang="en" class="body-full-height">
<head>
    <!-- META SECTION -->
    <title>Log In</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="icon" href="/template/favicon.ico" type="image/x-icon" />
    <!-- END META SECTION -->

    <!-- CSS INCLUDE -->
    <link rel="stylesheet" type="text/css" id="theme" href="/template/css/theme-default.css"/>
    <!-- EOF CSS INCLUDE -->
</head>
<body>
    <div class="login-container">
        <div class="login-box animated fadeInDown">
            <div class="login-body">
                <?php if (isset($errors) && is_array($errors)): ?>
                    <div class="login-title col-12">
                        <span class="badge badge-danger">
                            <?php foreach ($errors as $error): ?>
	                            <?php echo $error; ?><br>
                            <?php endforeach; ?>
                        </span>
                    </div>
                <?php endif; ?>
	            <?php if (isset($errorMessage)): ?>
                    <div class="login-title">
                    <p class="badge badge-danger block-full-width">
                            <?php echo $errorMessage; ?>
                    </p>
                    </div>
	            <?php endif; ?>
                <div class="login-title"><strong>Welcome</strong>, Please login</div>
                <form action="/user/login" class="form-horizontal" method="post">
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" name="username" class="form-control" placeholder="Username" value=""/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="password" name="password" class="form-control" placeholder="Password" value=""/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <a href="/user/register" class="btn btn-success btn-block">Register</a>
                        </div>
                        <div class="col-md-6">
                            <input type="submit" name="submit" class="btn btn-info btn-block" value="Log In">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>