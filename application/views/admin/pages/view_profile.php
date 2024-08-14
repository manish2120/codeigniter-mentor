<main id="main" class="main">
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3 mb-3">
                <h6 class="m-0 fw-bold text-primary">Profile Details</h6>
            </div>
            <div class="card-body">
                <?php if ($profile) : ?>
                    <div class="row mb-3">
                        <label for="fullName" class="col-sm-3 col-form-label">Full Name</label>
                        <div class="col-sm-9">
                            <input type="text" placeholder="User Full Name" value="<?php echo isset($profile['first_name']) || isset($profile['last_name']) ? $profile['first_name'] . ' ' . $profile['last_name'] : 'N/A' ?>" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="email" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" placeholder="example@gmail.com" value="<?php echo isset($profile['email_id']) ? $profile['email_id'] : '' ; ?>" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="phone" class="col-sm-3 col-form-label">Phone Number</label>
                        <div class="col-sm-9">
                        <input type="number" placeholder="User Phone Number" value="<?php echo $profile['phone_number']; ?>" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="country" class="col-sm-3 col-form-label">Country</label>
                        <div class="col-sm-9">
                        <input type="text" value="<?php echo isset($country_name) ? $country_name : 'N/A'; ?>" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="state" class="col-sm-3 col-form-label">State</label>
                        <div class="col-sm-9">
                        <input type="text" value="<?php echo isset($state_name) ? $state_name : 'N/A'; ?>" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="district" class="col-sm-3 col-form-label">District</label>
                        <div class="col-sm-9">
                        <input type="text" value="<?php echo isset($district_name) ? $district_name : 'N/A'; ?>" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="pinCode" class="col-sm-3 col-form-label">Pin Code</label>
                        <div class="col-sm-9">
                        <input type="number" placeholder="User Pin Code" value="<?php echo $profile['pin_code']; ?>" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="profileImage" class="col-sm-3 col-form-label">Profile Image</label>
                        <div class="col-sm-9">
                            <img id="imagePreview" src="<?php echo base_url('uploads/' . $profile['profile_image']); ?>" alt="Profile Image" class="img-thumbnail mt-2" width="200px">
                        </div>
                    </div>
                <?php else : ?>
                    <p>No user profile data found.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</main>
