<?php session_start();
include'koneksi.php';
if(isset($_SESSION['Hak_akses']))
{
  if($_SESSION[Hak_akses]=="admin"){header('location:dashboard/index.php');}
}?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">
        <link rel="shortcut icon" href="assets/images/Logo1.png">
        <title>POS INDONESIA - LOGIN</title>
        <link href="../plugins/switchery/switchery.min.css" rel="stylesheet" />
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="assets/css/style.css" rel="stylesheet" type="text/css">
        <script src="assets/js/modernizr.min.js"></script>
    </head>
      
<?php if(!empty($_SESSION['pesan'])){ 
if($_SESSION['pesan'] == "password"){?>
  <body onload="pass()">
<?php }else{ ?>
    <body onload="ip()">   
<?php }unset($_SESSION['pesan']);}?>

        <div class="wrapper-page">
    
       

            <div class="text-center">
                <a href="index.html" class="logo-lg"><img src="assets/images/Logo1.png" alt="" width="70px" height="60px">  <span>POS INDONESIA</span> </a>
            </div>

            <form class="form-horizontal m-t-20" action="action.php?act=login" method="POST">

                <div class="form-group row">
                    <div class="col-12">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="mdi mdi-account"></i></span>
                            <input class="form-control" type="text" name="username" required="" placeholder="Username">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-12">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="mdi mdi-radar"></i></span>
                            <input class="form-control" type="password" name="password" required="" placeholder="Password">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-12">
                        <div class="checkbox checkbox-primary">
                            <input id="checkbox-signup" type="checkbox">
                            <label for="checkbox-signup">
                                Remember me
                            </label>
                        </div>

                    </div>
                </div>

                <div class="form-group text-right m-t-20">
                    <div class="col-xs-12">
                        <button class="btn btn-primary btn-custom w-md n-btn waves-effect waves-light" type="submit">Log In
                        </button>
                    </div>
                </div>
            </form>
               <!--  <div class="form-group row m-t-30">
                    <div class="col-sm-7">
                        <a href="pages-recoverpw.html" class="text-muted"><i class="fa fa-lock m-r-5"></i> Forgot your
                            password?</a>
                    </div>
                    <div class="col-sm-5 text-right">
                        <a href="pages-register.html" class="text-muted">Create an account</a>
                    </div>
                </div> -->
        </div>


        <script>
            var resizefunc = [];
            function pass(){
                    $.Notification.notify('error','top center', 'Peringantan', 'Username atau Password yang anda gunakan salah !');
                }
            function ip(){
                    $.Notification.notify('warning','top center', 'Peringantan', 'Maaf akun anda saat ini telah digunakan oleh seseorang!');
                }    
        </script>

        <!-- Plugins  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/popper.min.js"></script><!-- Popper for Bootstrap -->
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>
        <script src="assets/plugins/switchery/switchery.min.js"></script>
        <script src="assets/plugins/notify/notify.min.js"></script>
        <script src="assets/plugins/notify/notify-metro.js"></script>
       <!--   <script src="http://coderthemes.com/minton/plugins/notifyjs/dist/notify.min.js"></script>
        <script src="http://coderthemes.com/minton/plugins/notifications/notify-metro.js"></script> -->
        <!-- Custom main Js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>
	
	</body>
</html>