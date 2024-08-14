<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?php echo $page_title; ?></title>

  <!-- Favicons -->
  <link href="<?php echo base_url(); ?>assets/admin/assets/img/favicon.png" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo base_url(); ?>assets/admin/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/admin/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?php echo base_url(); ?>assets/admin/assets/css/style.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="<?php echo base_url(); ?>home" class="logo d-flex align-items-center w-auto">
                   <img src="<?php echo base_url(); ?>assets/admin/assets/img/logo.png" alt="">
                </a>
              </div><!-- End Logo -->

              <div class="col">
                <?php
                  if($this->session->flashdata('status')) : ?>
                  <div class="alert alert-info">
                    <?php echo $this->session->flashdata('status'); ?>
                  </div>
                <?php endif; ?>
              </div>

              <div class="card mb-3 p-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center p-0 fs-4">Change Your Password</h5>
                    <p class="text-center small">Reset you new password</p>
                  </div>

                  <form class="row g-3 needs-validation" novalidate action="<?php echo base_url('Auth/ResetPassword/reset');?>" method="POST">
                    <div class="col-12">
                      <label for="current_password" class="form-label">Current Password</label>
                      <input type="password" name="current_password" class="form-control" id="current_password" required>
                      <small><?php echo form_error('current_password'); ?></small>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    <div class="col-12">
                      <label for="new_password" class="form-label">New Password</label>
                      <input type="password" name="new_password" class="form-control" id="new_password" required>
                      <small><?php echo form_error('new_password'); ?></small>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>
                    
                    <div class="col-12">
                      <label for="confirm_password" class="form-label">Confirm Password</label>
                      <input type="password" name="confirm_password" class="form-control" id="confirm_password" required>
                      <small><?php echo form_error('confirm_password'); ?></small>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    <div class="col-12">
                      <button class="btn btn-custom w-100" type="submit">Save</button>
                    </div>
                    <div class="col-6">
                      <a href="<?php echo base_url('home'); ?>" class="small mb-0 custom-clr">← Back to Home</a>
                    </div>
                  </form>

                </div>
              </div>
           
            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="<?php echo base_url(); ?>#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?php echo base_url(); ?>assets/admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/admin/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/admin/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="<?php echo base_url(); ?>assets/admin/assets/js/main.js"></script>

</body>

</html>