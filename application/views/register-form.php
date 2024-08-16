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

  <!-- Main CSS File -->
  <link href="<?php echo base_url(); ?>assets/css/main.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet">
</head>
<body>
  <main>
    <div class="container">
      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="col">
                <?php
                  if($this->session->flashdata('status')) : ?>
                  <div class="alert <?php echo $this->session->flashdata('alert_class');?>">
                    <?php echo $this->session->flashdata('status'); ?>
                  </div>
                <?php endif; ?>
              </div>
              
              <div class="card mb-3 p-3 border-0 shadow">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center p-0 fs-4">Create an Account</h5>
                    <p class="text-center small">Enter your personal details to create account</p>
                  </div>

                  <form class="row g-3 needs-validation" novalidate action="<?php echo site_url('Auth/Register/register'); ?>" method="POST">
                    <div class="col-12">
                      <label for="email_id" class="form-label">Your Email</label>
                      <input type="email" name="email_id" class="form-control" id="email_id" required>
                      <small><?php echo form_error('email_id'); ?></small>
                      <div class="invalid-feedback">Please enter a valid Email address!</div>
                    </div>

                    <div class="col-12">
                      <label for="user_name" class="form-label">Username</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" name="user_name" class="form-control" id="user_name" required>
                      <small><?php echo form_error('user_name'); ?></small>
                      <div class="invalid-feedback">Please enter username!</div>

                      </div>
                    </div>

                    <div class="col-12">
                      <label for="password" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="password" required>
                      <small><?php echo form_error('password'); ?></small>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    <div class="col-12">
                      <label for="cpassword" class="form-label">Confirm Password</label>
                      <input type="password" name="cpassword" class="form-control" id="cpassword" required>
                      <small><?php echo form_error('cpassword'); ?></small>
                      <div class="invalid-feedback">Please enter confirm your password!</div>
                    </div>

                    <div class="col-12">
                      <button class="btn btn-custom w-100" type="submit">Register</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Already have an account? <a href="<?php echo base_url('Auth/Login/loginUser'); ?>" class="custom-clr">Log in</a></p>
                    </div>
                    <div class="col-12 text-end">
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Vendor JS Files -->
<script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/php-email-form/validate.js"></script>


<!-- Template Main JS File -->
<script src="<?php echo base_url(); ?>assets/js/main.js"></script>



</body>
</html>