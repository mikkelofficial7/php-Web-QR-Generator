<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Event Gen </title>

    <!-- Bootstrap core CSS -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link href="<?= base_url()?>global/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url()?>global/bootstrap/dist/css/styles.css" rel="stylesheet">
  <link href="<?= base_url()?>global/bootstrap/dist/css/nav.css" rel="stylesheet">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script type='text/javascript' src='<?= base_url()?>global/bootstrap/dist/js/nav.js'></script>
    <script type='text/javascript' src='<?= base_url()?>global/TimePicki-master/js/timepicki.js'></script>
    <link href="<?= base_url() ?>global/TimePicki-master/css/timepicki.css" rel="stylesheet">
    <!-- Custom styles for this template -->
   <link href="<?= base_url() ?>global/site/starter-template.css" rel="stylesheet">
</head>

<body>
<nav class="navbar navbar-fixed-top navbar-dark bg-inverse">
    <div class="topnav" id="myTopnav">
      <a class="nav-link logos"><i class="fa fa-qrcode"></i></a>
      <a class="nav-link" href="<?= base_url() ?>Qr_code_generate">Home</a>
      <a class="nav-link" href="<?= base_url() ?>Qr_code_generate/ListEvent">Event List</a>
      <a class="nav-link" href="<?= base_url() ?>Qr_code_generate/CreateEvent">Create Event</a>
      <a class="nav-link" href="<?= base_url() ?>Qr_code_generate/ContactUs">Contact Us</a>
      <a class="nav-link" href="<?= base_url() ?>Qr_code_generate/Setting">Setting</a>
      <a class="nav-link" href="<?php echo base_url('Qr_code_generate/Logout'); ?>">Logout</a>
      <a href="javascript:void(0);" class="icon" onclick="myFunction()">
        <i class="fa fa-bars"></i>
      </a>
    </div>
</nav>