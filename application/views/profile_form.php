<form id="profileForm" method="post" action="<?php echo base_url('Profile/user_profile'); ?>" enctype="multipart/form-data" class="file-upload mb-5">
    <div class="container">
        <div class="row mb-5 gx-5">
            <!-- Contact detail -->
            <div class="col-xxl-8 mb-5 mb-xxl-0">
                <div class="bg-secondary-soft px-4 py-5 rounded">
                    <div class="row g-3">
                        <h4 class="mb-4 mt-0 fw-semibold">Contact detail</h4>
                        <!-- First Name -->
                        <div class="col-md-6">
                            <label class="form-label">First Name*</label>
                            <input type="text" class="form-control" name="first_name" aria-label="First name" value="<?php echo set_value('first_name', isset($user_profile_data['first_name']) ? $user_profile_data['first_name'] : ''); ?>">
                            <small class="text-danger"><?php echo form_error('first_name'); ?></small>
                        </div>
                        <!-- Last name -->
                        <div class="col-md-6">
                            <label class="form-label">Last Name*</label>
                            <input type="text" class="form-control" name="last_name" aria-label="Last name" value="<?php echo set_value('last_name', isset($user_profile_data['last_name']) ? $user_profile_data['last_name'] : ''); ?>">
                            <small class="text-danger"><?php echo form_error('last_name'); ?></small>
                        </div>
                        <!-- Phone number -->
                        <div class="col-md-6">
                            <label class="form-label">Phone number*</label>
                            <input type="number" class="form-control" name="phone_number" aria-label="Phone number" value="<?php echo set_value('phone_number', isset($user_profile_data['phone_number']) ? $user_profile_data['phone_number'] : ''); ?>">
                            <small class="text-danger"><?php echo form_error('phone_number'); ?></small>
                        </div>
                        <!-- Email -->
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Email*</label>
                            <input type="email" class="form-control" id="inputEmail4" name="email_id" value="<?php echo set_value('email_id', isset($user_profile_data['email_id']) ? $user_profile_data['email_id'] : ''); ?>">
                            <small class="text-danger"><?php echo form_error('email_id'); ?></small>
                        </div>
                        <!-- Country -->
                        <div class="col-md-6">
                            <label class="form-label">Country</label>
                            <select class="form-select" name="country" id="country">
                                <option selected>Select Country</option>
                                <?php
                                    foreach($countries as $country) {
                                        $selected = (isset($user_profile_data['country']) && $user_profile_data['country'] == $country->country_id) ? 'selected' : '';
                                        echo '<option value="'.$country->country_id.'" '.$selected.'>'.$country->country_name.'</option>';
                                    }
                                ?> 
                            </select>
                            <div class="invalid-feedback">This Field is required</div>
                        </div>
                        <!-- State -->
                        <div class="col-md-6">
                            <label class="form-label">State</label>
                            <select class="form-select form-control" name="state" id="state">
                                <option selected>Select State</option>
                                <?php foreach($states as $state): ?>
                                    <option value="<?php echo $state->state_id; ?>" <?php echo (isset($user_profile_data['state']) && $user_profile_data['state'] == $state->state_id) ? 'selected' : ''; ?>>
                                        <?php echo $state->state_name; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">This Field is required</div>
                        </div>
                        <!-- District -->
                        <div class="col-md-6">
                            <label class="form-label">District</label>
                            <select class="form-select" name="district" id="district">
                                <option selected>Select District</option>
                                <?php foreach($districts as $district): ?>
                                    <option value="<?php echo $district->district_id; ?>" <?php echo (isset($user_profile_data['district']) && $user_profile_data['district'] == $district->district_id) ? 'selected' : ''; ?>>
                                        <?php echo $district->district_name; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">This Field is required</div>
                        </div>
                        <!-- Pincode -->
                        <div class="col-md-6">
                            <label class="form-label">Pincode*</label>
                            <input type="number" class="form-control" name="pin_code" aria-label="Pin Code" value="<?php echo set_value('pin_code', isset($user_profile_data['pin_code']) ? $user_profile_data['pin_code'] : ''); ?>">
                            <small class="text-danger"><?php echo form_error('pin_code'); ?></small>
                        </div>
                    </div> <!-- Row END -->
                </div>
            </div>
            <!-- Upload profile -->
            <div class="col-xxl-4">
                <div class="bg-secondary-soft px-4 py-5 rounded">
                    <div class="row g-3">
                        <h4 class="mb-4 mt-0 fw-semibold">Upload your profile photo</h4>
                        <div class="text-center">
                            <!-- Image upload -->
                            <div class="square position-relative display-2 mb-2 overflow-hidden d-flex align-items-center">
                            <?php if (!empty($user_profile_data['profile_image'])): ?>
                                <img src="<?php echo base_url('uploads/' . $user_profile_data['profile_image']); ?>" alt="Profile Image" class="img-fluid" style="transform: scale(1.5);">
                                <?php else: ?>
                                    <i class="fas fa-fw fa-user position-absolute top-50 start-50 translate-middle text-secondary"></i>
                            <?php endif; ?>
                            </div>
                            <!-- File upload input -->
                            <div class="mb-4 mx-4">
                                <label for="formFileSm" class="form-label"></label>
                                <input class="form-control form-control-sm" type="file" id="formFileSm" name="profile_image" accept="image/*">
                            </div>
                            <small class="text-danger"><?php echo form_error('profile_image'); ?></small>
                            <!-- AJAX upload button -->
                            <button type="button" id="uploadButton" class="btn btn-success-soft custom-btn-soft-success">
                                Upload
                            </button>
                            <button type="button" id="removeButton" class="btn btn-danger-soft custom-btn-soft-danger">Remove</button>
                            <div id="uploadError" class="text-danger"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- Row END -->

        <!-- button -->
        <div class="gap-3 d-flex justify-content-center text-center">
            <button type="submit" class="btn btn-custom" id="saveBtn">Save profile</button>
        </div>
    </div> <!-- Container END -->
</form> <!-- Form END -->

<script>
// JQUERY WITH AJAX TO HANDLE DROPDOWN DATA STARTS
$(document).ready(function() {
    // Handle country dropdown change
    $('#country').change(function() {
        let country_id = $(this).val();

        if (country_id !== '') {
            $.ajax({ 
                url: "<?php echo base_url('Profile/fetch_states'); ?>",
                method: "POST",
                data: { country_id: country_id },
                dataType: "json",
                success: function(response) {
                    // console.log('States response:', response);

                    if (response) {
                        let stateOptions = '<option value="">Select State</option>';
                        $.each(response, function(index, state) {
                            stateOptions += `<option value="${state.state_id}">${state.state_name}</option>`;
                        });
                        // .html is used for both - to get the html or to set the html
                        // to get - let test = $('#state').html();
                        // to set - let test = $('#state').html('<p>New Content</p>');
                        $('#state').html(stateOptions);
                        $('#district').html('<option value="">Select District</option>');

                        // Trigger the state change to prefill districts
                        let selectedState = "<?php echo isset($user_profile_data['state']) ? $user_profile_data['state'] : ''; ?>";
                        if (selectedState) {
                            $('#state').val(selectedState).trigger('change');
                        }
                    } else {
                        console.error('Invalid response format:', response);
                    }
                },
            });
        } else {
            $('#state').html('<option value="">Select State</option>');
            $('#district').html('<option value="">Select District</option>');
        }
    });

    // Handle state dropdown change
    $('#state').change(function() {
        let state_id = $(this).val();

        if (state_id !== '') {
            $.ajax({
                url: "<?php echo base_url('Profile/fetch_districts'); ?>",
                method: "POST",
                data: { state_id: state_id },
                dataType: "json",
                success: function(response) {
                    console.log('Districts response:', response);

                    if (response) {
                        let districtOptions = '<option value="">Select District</option>';
                        $.each(response, function(index, district) {
                            districtOptions += `<option value="${district.district_id}">${district.district_name}</option>`;
                        });
                        $('#district').html(districtOptions);

                        // Set the selected district if available
                        let selectedDistrict = "<?php echo isset($user_profile_data['district']) ? $user_profile_data['district'] : ''; ?>";
                        if (selectedDistrict) {
                            $('#district').val(selectedDistrict);
                        }
                    } else {
                        console.error('Invalid response format:', response);
                    }
                },
            });
        } else {
            $('#district').html('<option value="">Select District</option>');
        }
    });
    // Set selected country on page load
    let selectedCountry = "<?php echo isset($user_profile_data['country']) ? $user_profile_data['country'] : ''; ?>";
    if (selectedCountry) {
        $('#country').val(selectedCountry).trigger('change');
    }
});
// JQUERY WITH AJAX TO HANDLE DROPDOWN DATA ENDS

    // AJAX FOR IMAGE UPLOAD STARTS
    document.getElementById('uploadButton').addEventListener('click', function() {
    var formData = new FormData(document.getElementById('profileForm'));

    var xhr = new XMLHttpRequest();
    xhr.open('POST', '<?php echo base_url('profile/upload'); ?>', true);
    // true - asynchronous request to sent.

    // onload triggers when the xmlhttprequest completes to process the response
    xhr.onload = function() {
        if (xhr.status === 200) {
            var response = JSON.parse(xhr.responseText); 
            // responseText is a property of xmlhttprequest
            // responseText - type is string, contains the text response from the server after the completion of an HTTP request.

            // error key is obtained from controller
            if (response.error) {
                document.getElementById('uploadError').textContent = response.error;
            } else {
                var img = document.createElement('img');
                img.src = '<?php echo base_url('uploads/'); ?>' + response.file_name;
                img.className = 'img-fluid';
                var imgContainer = document.querySelector('.square');
                imgContainer.innerHTML = '';
                imgContainer.appendChild(img);
            }
        } else {
            document.getElementById('uploadError').innerHTML = 'An error occurred while uploading the image.';
        }
    };

    xhr.send(formData);
});
// AJAX FOR IMAGE UPLOAD ENDS

// HANDLE REMOVE BUTTON CLICK STARTS
document.getElementById('removeButton').addEventListener('click', function() {
    // Clear the file input
    document.getElementById('formFileSm').value = '';

    // Remove the image preview
    var imgContainer = document.querySelector('.square');
    imgContainer.innerHTML = '<i class="fas fa-fw fa-user position-absolute top-50 start-50 translate-middle text-secondary"></i>';

    // AJAX request to delete the image from the server
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '<?php echo base_url('profile/remove_image'); ?>', true);

    xhr.onload = function() {
        if (xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);
            if (response.error) {
                document.getElementById('uploadError').textContent = response.error;
            } else {
                document.getElementById('uploadError').textContent = 'Image removed successfully';
            }
        } else {
            document.getElementById('uploadError').textContent = 'An error occurred while removing the image.';
        }
    };

    xhr.send(); // Send the AJAX request
});
// HANDLE REMOVE BUTTON CLICK STARTS
</script>