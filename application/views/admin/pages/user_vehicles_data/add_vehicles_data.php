<main id="main" class="main">
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="h3 mb-2 text-gray-800 fw-bold">Add Vehicle</h1>
            <a href="<?php echo base_url("admin/user-vehicle-data"); ?>" class="btn btn-primary btn-sm rounded-pill text-center">View Users</a>
        </div>

        <!-- DataTables Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 mb-2">
                <h6 class="m-0 font-weight-bold text-primary fw-bold">Add New Vehicle</h6>
            </div>
            <div class="card-body">
                <?php if (!empty($status_message)) { ?>
                    <div class='alert alert-info' id="status-message"><?php echo $status_message; ?></div>
                <?php } ?>
                <!-- Form Starts -->
                <form id="saveForm" action="" method="POST" class="d-flex flex-column gap-3" novalidate>
                    <div class="form-group">
                        <label for="new_user_id">User ID</label>
                        <input type="text" name="new_user_id" id="new_user_id" value="<?php echo set_value('new_user_id', isset($new_user_data[0]['user_id']) ? $new_user_data[0]['user_id'] : ''); ?>" placeholder="Enter User ID" class="form-control" required>
                        <small id="check-username"></small>
                        <small class="text-danger"><?php echo form_error('new_user_id'); ?></small>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="vehicle_name">Vehicle Type</label>
                            <select class="form-select" name="vehicle_name" id="vehicle_name">
                                <option value="" <?php echo set_select('vehicle_name', '', TRUE); ?>>Select Vehicle</option>
                                <option value="Two Wheeler" <?php echo set_select('vehicle_name', 'Two Wheeler', isset($new_user_data[0]['vehicle_name']) && $new_user_data[0]['vehicle_name'] == 'Two Wheeler'); ?>>Two Wheeler</option>
                                <option value="Four Wheeler" <?php echo set_select('vehicle_name', 'Four Wheeler', isset($new_user_data[0]['vehicle_name']) && $new_user_data[0]['vehicle_name'] == 'Four Wheeler'); ?>>Four Wheeler</option>
                            </select>
                            <small class="text-danger"><?php echo form_error('vehicle_name'); ?></small>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="vehicle_number">Vehicle Number</label>
                            <input type="text" name="vehicle_number" id="vehicle_number" value="<?php echo set_value('vehicle_number', isset($new_user_data[0]['vehicle_number']) ? $new_user_data[0]['vehicle_number'] : ''); ?>" placeholder="Enter Vehicle Number" class="form-control" required>
                            <small class="text-danger"><?php echo form_error('vehicle_number'); ?></small>
                        </div>
                    </div>

                    <div class="align-self-center mt-3">
                        <input type="submit" value="Save" class="btn btn-primary">
                        <a href="<?php echo base_url("admin/user-vehicle-data"); ?>">
                            <button type="button" class="btn btn-primary ml-2">Back</button>
                        </a>
                    </div>
                </form>

                <!-- Form Ends -->
            </div>
        </div>
    </div>
</main>

<!-- container-fluid -->
  
<!-- jQuery CDN to check User ID in Add Vehicle Form -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- STARTS - VALIDATE USER IS EXIST OR NOT WITH THERE ID -->
<script>
    var base_url = '<?php echo base_url(); ?>';
        $("#new_user_id").focusout(function() {
            var new_user_id = $("#new_user_id").val();

            if (new_user_id) {
                checkNewUserId(new_user_id);
            }
        });

        function checkNewUserId(new_user_id) {
            $.ajax({
                type: "POST",
                url: base_url + "Backend/User_vehicle_data/check_user_id",
                data: { 'new_user_id': new_user_id },
                dataType: "json",
                success: function(response) {
                    if (response.exists) {
                        $("#check-username").text(response.user_name).addClass('text-success');
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    $("#check-username").text("An error occurred: " + xhr.responseText);
                }
            });
        }
</script>
<!-- ENDS - VALIDATE USER IS EXIST OR NOT WITH THERE ID -->

<!-- Starts - Handle form submission status message -->
<script>
    setTimeout(() => {
        let statusMessage = document.getElementById('status-message');
        if(statusMessage) {
            statusMessage.style.display = 'none';
        }
    }, 5000);
    </script>
<!-- Ends - Handle form submission status message -->

