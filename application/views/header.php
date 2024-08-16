<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title><?php echo $page_title; ?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?php echo base_url(); ?>assets/img/favicon.png" rel="icon">
  <link href="<?php echo base_url(); ?>assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  
  <!-- Vendor CSS Files -->
  <link href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <!-- <link href="<?php echo base_url(); ?>assets/vendor/aos/aos.css" rel="stylesheet"> -->
  <link href="<?php echo base_url(); ?>assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <link href="<?php echo base_url(); ?>assets/css/profile.css" rel="stylesheet">
  
  <!-- Main CSS File -->
  <link href="<?php echo base_url(); ?>assets/css/main.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet">

</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="<?php echo base_url(); ?>index.html" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1 class="sitename">Mentor</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="<?php echo base_url(); ?>home" class="active">Home<br></a></li>
          <li><a href="<?php echo base_url(); ?>about">About</a></li>
          <li><a href="<?php echo base_url(); ?>courses">Courses</a></li>
          <li><a href="<?php echo base_url(); ?>trainers">Trainers</a></li>
          <li><a href="<?php echo base_url(); ?>events">Events</a></li>
          <li><a href="<?php echo base_url(); ?>pricing">Pricing</a></li>
          <li><a href="<?php echo base_url(); ?>contact-us">Contact</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

         <!-- Dropdown Button with Login/Logout -->
<div class="dropdown">
    <button class="btn btn-getstarted dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
        <?php if ($this->session->userdata('auth_user')) : ?>
          Logout
        <?php else : ?>
            Login
        <?php endif; ?>
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <?php if ($this->session->userdata('authenticated')) : ?>
            <li><a class="dropdown-item" href="<?php echo base_url(); ?>Auth/Login/logout">Logout</a></li>
            <li><a class="dropdown-item" href="<?php echo base_url(); ?>Profile">Profile</a></li>
            <li><a class="dropdown-item" href="<?php echo base_url(); ?>change-password">Change Password</a></li>
        <?php else : ?>
            <li><a class="dropdown-item" href="<?php echo base_url(); ?>Auth/Login/loginUser">Login</a></li>
        <?php endif; ?>
        <!-- Additional Options can be added here -->
       
    </ul>
</div>
</div>
</header>