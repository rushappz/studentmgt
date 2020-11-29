<?php
ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?php echo get_bloginfo('name'); ?></title>

  <link href="<?php echo get_bloginfo('template_directory'); ?>/style.css" rel="stylesheet">
  <!-- Bootstrap core CSS -->
  <link href="<?php echo get_bloginfo('template_directory'); ?>/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <?php wp_head(); ?>
</head>

<body>

  <!-- Navigation -->
  <!--<nav class="navbar navbar-expand-lg navbar-white bg-white static-top">
    <div class="container">
      <a class="navbar-brand" href="#">
        <?php
        /*if (function_exists('the_custom_logo')) {
          the_custom_logo();
        }*/
        ?>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Student
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">New User</a>
          </li>
          <li class="nav-item">
            <a class="nav-link logout-btn" href="<?php //echo wp_logout_url('/login') ?>"><i class="fa fa-sign-out"></i> SIGN OUT</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>-->