<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Sign up Event Gen</title>
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();?>global/admin/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url()?>global/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url();?>global/admin/signin.css" rel="stylesheet">
    <link href="<?php echo base_url();?>global/bootstrap/dist/css/styles.css" rel="stylesheet">
     <!-- Bootstrap core CSS -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="<?= base_url()?>global/bootstrap/dist/css/radio-button.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>global/bootstrap/css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>global/bootstrap/fonts/font-awesome-4.2.0/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>global/bootstrap/css/demo.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>global/bootstrap/css/set1.css" />
</head>

<body>
    <form class="form-signin" method="post" action="<?php echo base_url();?>Intro/ProcessRegisterForm">
        <span id="qr-logo-span"><i class="fa fa-qrcode" id="qr-black-logo"></i></span>
        <h2 class="form-signin-heading text-header">Sign up Now</h2>
        <?php if($alert != ""){ ?>
            <div class="alert">
              <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
              <strong>Error!</strong> <?php echo $alert; ?>
            </div>
        <?php } ?>
        <span class="input input--haruki">
            <input class="input__field input__field--haruki" type="text" id="input-1" name="name" maxlength="100" autocomplete="off" required="required" />
            <label class="input__label input__label--haruki" for="input-1">
                <span class="input__label-content input__label-content--haruki">Your Name</span>
            </label>
        </span>
        <span class="input input--haruki">
            <input class="input__field input__field--haruki" type="text" id="input-1" name="username" maxlength="100" autocomplete="off" required="required" />
            <label class="input__label input__label--haruki" for="input-1">
                <span class="input__label-content input__label-content--haruki">Username</span>
            </label>
        </span>
        <span class="input input--haruki">
            <input class="input__field input__field--haruki" type="email" id="input-1" name="email" maxlength="100" autocomplete="off" required="required" />
            <label class="input__label input__label--haruki" for="input-1">
                <span class="input__label-content input__label-content--haruki">Email</span>
            </label>
        </span>
        <span class="input input--haruki">
            <input class="input__field input__field--haruki" type="password" id="input-1" name="password" maxlength="100" autocomplete="off" required="required" />
            <label class="input__label input__label--haruki" for="input-1">
                <span class="input__label-content input__label-content--haruki">Password</span>
            </label>
        </span>
        <span class="inputs-1">
            Are you a
            <span class="inputs">
                <label class="containers">Male
                  <input type="radio" checked="checked" name="radio" value="male">
                  <span class="checkmark"></span>
                </label>
                <label class="containers">Female
                  <input type="radio" name="radio" value="female">
                  <span class="checkmark"></span>
                </label>
            </span>
        </span>
        <button class="btn btn-lg btn-primary btn-block btn-submits" id="btn-submits" type="submit">Sign Up</button>
        <p id="register-href" >Already Join? <a id="href" href="<?= base_url() ?>Intro/LoginForm">Login Now!</a></p>
    </form>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="<?php echo base_url(); ?>global/admin/site/assets/js/ie10-viewport-bug-workaround.js"></script>
<script src="<?php echo base_url();?>global/bootstrap/js/classie.js"></script>
<script>
    var close = document.getElementsByClassName("closebtn");
    var i;

    for (i = 0; i < close.length; i++) {
        close[i].onclick = function(){
            var div = this.parentElement;
            div.style.opacity = "0";
            setTimeout(function(){ div.style.display = "none"; }, 600);
        }
    }
</script>
</body>
</html>
