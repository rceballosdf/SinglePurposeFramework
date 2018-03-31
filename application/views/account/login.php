<?php
//Note: This resolves as true even if all $_POST values are empty strings
$start_datetime = $this->start_datetime;
$end_datetime = DateTime::createFromFormat('U.u', microtime(true));
$interval = $start_datetime->diff($end_datetime);
$executionTime = 'tiempo: ' . $interval->y .'/' . $interval->m . '/' . $interval->d . ' ' . $interval->h . ':' . $interval->i . ':' . $interval->s . 'm' . $interval->f;
?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Login </title>
    <link href="<?php echo CSS_URL; ?>bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo PUBLIC_URL; ?>font-awesome/css/font-awesome.css" rel="stylesheet">
    <!-- Gritter -->
    <link href="<?php echo JS_URL; ?>plugins/gritter/jquery.gritter.css" rel="stylesheet">
    <link href="<?php echo CSS_URL; ?>animate.css" rel="stylesheet">
    <link href="<?php echo CSS_URL; ?>style.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen  animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">IN+</h1>

            </div>
            <h3>Welcome to IN+</h3>
            <p>Perfectly designed and precisely prepared admin theme with over 50 pages with extra new web app views.
                <!--Continually expanded and constantly improved Inspinia Admin Them (IN+)-->
            </p>
            <?php 
                        if($this->errorMessage!==''){?>
                            <div class="alert alert-danger alert-dismissable">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                <?php echo $this->errorMessage;?>.
                            </div>
                            <?php
                        }
                    ?>
            <form name="loginform" class="m-t" role="form" method="POST" action="<?php echo BASE_URL; ?>account/login/">
                <div class="form-group">
                    <input type="email" name='email' id='email' class="form-control" placeholder="Username" required="">
                </div>
                <div class="form-group">
                    <input type="password" name='password' id='password' class="form-control" placeholder="Password" required="">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

                <a href="#"><small>Forgot password?</small></a>
                <p class="text-muted text-center"><small>Do not have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="register.html">Create an account</a>
            </form>
            <p class="m-t"> <small>tiempo de ejecución: <?php echo $executionTime; ?></small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="<?php echo JS_URL; ?>jquery-2.1.1.js"></script>
    <script src="<?php echo JS_URL; ?>bootstrap.min.js"></script>

</body>

</html>
