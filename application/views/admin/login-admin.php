<!-- STARTS MAIN -->
  <main>
    <div class="container-fluid">
      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <!-- Starts - Toast message -->
          <?php if($this->session->flashdata('error')): ?>
          <div class="toast align-items-center text-bg-danger border-0 d-flex m-auto" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="toast-body">
          <?php echo $this->session->flashdata('error'); ?>
          </div>
          <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
          </div>
          <?php endif; ?>
          <!-- Ends - Toast message -->

          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="<?php echo base_url(); ?>home" class="logo d-flex align-items-center w-auto">
                </a>
              </div><!-- End Logo -->
              <div class="card mb-3 p-3">
                <div class="card-body">
                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center p-0 fs-4">Welcome Back!</h5>
                    <p class="text-center small">Login into your account</p>
                  </div>

                  <!-- Form Starts -->
                  <form class="row g-3 needs-validation" novalidate action="" method="POST">
                    <!-- Email -->
                    <div class="col-12">
                      <label for="email_id" class="form-label">Your Email</label>
                      <input type="email" name="email_id" class="form-control" id="email_id" required>
                      <small class="text-danger"><?php echo form_error('email_id'); ?></small>
                      <div class="invalid-feedback">Please enter a valid Email address!</div>
                    </div>

                    <!-- Password -->
                    <div class="col-12">
                      <label for="password" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="password" required>
                      <small class="text-danger"><?php echo form_error('password'); ?></small>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>
                  
                    <!-- Login Button -->
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Login</button>
                    </div>
                  </form>
                  <!-- Form Ends -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </main>
  <!-- ENDS MAIN -->

  <!-- STARTS - HANDLE TOAST TO SHOW ERROR MESSAGE -->
  <script>
  document.addEventListener('DOMContentLoaded', function () {
  var toastEl = document.querySelector('.toast');
  if (toastEl) {
    var toast = new bootstrap.Toast(toastEl, {
      autohide: false
    });
    toast.show();
  }
});
  </script>
  <!-- ENDS - HANDLE TOAST TO SHOW ERROR MESSAGE -->
