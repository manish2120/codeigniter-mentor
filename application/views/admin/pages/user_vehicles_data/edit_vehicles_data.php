<main id="main" class="main">
  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center">
      <h1 class="h3 mb-2 text-gray-800">Edit Vehicle</h1>
      <a href="<?php echo base_url("admin/user-vehicle-data"); ?>" class="btn btn-primary btn-sm rounded-pill text-center">View Users</a>
    </div>

    <!-- DataTables Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Vehicle Details</h6>
      </div>
      <div class="card-body">
        <!-- Display success or error messages -->
        <?php if (isset($success_message)): ?>
          <div class="alert alert-success"><?php echo $success_message; ?></div>
        <?php elseif (isset($fail_message)): ?>
          <div class="alert alert-danger"><?php echo $fail_message; ?></div>
        <?php endif; ?>
        
        <!-- FORM STARTS -->
        <form id="editForm" action="" method="POST" class="d-flex flex-column gap-3">
          <!-- passing id to cross validate -->
          <input type="hidden" value="<?php echo $edit_user_data['id']; ?>" name="id" />

          <!-- CSRF TOKEN STARTS - CSRF Token to validate, it is send my user or robot -->
          <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
          <!----- CSRF TOKEN ENDS ------>

          <div class="form-group">
            <label for="user_id">User ID</label>
            <input type="text" name="user_id" id="user_id" value="<?php echo $edit_user_data['user_id']; ?>" placeholder="Enter User ID" class="form-control" required>
          </div>
          <div class="row">
            <div class="form-group col-md-6">
              <label for="vehicle_name">Vehicle Name</label>
              <select class="form-select" name="vehicle_name" id="vehicle_name" class="form-control">
                <option>Select Vehicle</option>
                <?php foreach ($vehicles_name as $vehicle): ?>
                  <option value="<?php echo $vehicle['vehicle_name']; ?>" <?php echo $edit_user_data['vehicle_name'] == $vehicle['vehicle_name'] ? 'selected' : ''; ?>>
                    <?php echo $vehicle['vehicle_name']; ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group col-md-6">
              <label for="vehicle_number">Vehicle Number</label>
              <input type="text" name="vehicle_number" id="vehicle_number" value="<?php echo $edit_user_data['vehicle_number']; ?>" placeholder="Enter Vehicle Number" class="form-control" required>
            </div>
          </div>

          <div class="align-self-center mt-3">
            <input type="submit" value="Save" class="btn btn-primary">

            <a href="<?php echo base_url("admin/user-vehicle-data"); ?>">
              <button type="button" class="btn btn-primary ml-2">Back</button>
            </a>
          </div>
        </form>
        <!-- FORM ENDS -->
      </div>
    </div>
  </div>

</main>
<!-- /.container-fluid -->

<!-- SweetAlert CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
