<main id="main" class="main">
    <div class="container-fluid">
        <!-- PAGE HEADING -->
        <div class="d-flex flex-col justify-content-between align-items-center">
            <h1 class="h3 mb-2 text-gray-800 fw-bold">Registered Users</h1>
            <!-- Redirect to the add user form -->
            <a href="<?php echo base_url('add-user');?>" class="btn btn-primary btn-sm rounded-pill">Add User</a>
        </div>

        <!-- DATATABLES -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 fw-bold text-primary">List of Registered Users</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table datatable" id="dataTable" width="100%" cellspacing="0">
                        <!-- Starts - Table head -->
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <!-- Ends - Table head -->
                        <tbody>
                            <!-- Starts - retrieving data from database -->
                            <?php if (!empty($users)) : ?>
                                <?php foreach ($users as $user) : ?>
                                    <tr>
                                        <td><?php echo $user["user_name"]; ?></td>
                                        <td><?php echo $user["email_id"]; ?></td>
                                        <td>
                                            <?php echo date("d-m-Y", strtotime($user["created_at"])); ?>
                                        </td>
                                        <!-- Starts - Redirect to view profile of user on button click -->
                                        <td class="d-flex justify-content-around">
                                            <a href="<?php echo base_url('user/view_profile/' . $user['id']); ?>" class="btn btn-primary">
                                                View Profile
                                            </a>
                                        </td>
                                        <!-- Ends - Redirect to view profile of user on button click -->
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <!-- If user profile doesn't exist -->
                                <tr>
                                    <td colspan="4" class="text-center">No users found.</td>
                                </tr>
                            <?php endif; ?>
                            <!-- Ends - retrieving data from database -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- container-fluid -->

<a href="<?php echo base_url(); ?>#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="<?php echo base_url(); ?>assets/admin/assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/assets/vendor/chart.js/chart.umd.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/assets/vendor/echarts/echarts.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/assets/vendor/quill/quill.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/assets/vendor/simple-datatables/simple-datatables.js"></script>
<!-- <script src="<?php echo base_url(); ?>assets/admin/assets/vendor/tinymce/tinymce.min.js"></script> -->
<script src="<?php echo base_url(); ?>assets/admin/assets/vendor/php-email-form/validate.js"></script>

<!-- Sweetalert CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Template Main JS File -->
<script src="<?php echo base_url(); ?>assets/admin/assets/js/main.js"></script>


<script>
// JavaScript to handle User profile data
document.addEventListener("DOMContentLoaded", function() {
    // Initialize DataTable
    const dataTable = new simpleDatatables.DataTable(".datatable");
    const editProfileLinks = document.querySelectorAll('.edit-profile');

    editProfileLinks.forEach(link => {
        link.addEventListener('click', function() {
            const email = this.getAttribute('data-email');
            const modalId = `#profileModal${email}`;

            const profileData = <?php echo json_encode($profiles); ?>;

            if (profileData[email]) {
                const profile = profileData[email];

                // Populating the form fields with profile data
                document.querySelector(`#fullName`).value = profile.first_name + ' ' + profile.last_name;
                document.querySelector(`#email`).value = profile.email_id;
                document.querySelector(`#phone`).value = profile.phone_number;
                document.querySelector(`#country`).value = profile.country_id;
                document.querySelector(`#state`).value = profile.state_id;
                document.querySelector(`#district`).value = profile.district_id;
                document.querySelector(`#pinCode`).value = profile.pin_code;
                const imgPreview = document.querySelector(`#imagePreview`);
                imgPreview.src = profile.profile_image ? `<?php echo base_url('uploads/'); ?>${profile.profile_image}` : '';
                imgPreview.style.display = profile.profile_image ? 'block' : 'none';
            }
        });
    });

   
});
</script>

<!-- HANDLE DELETE OPERATION WITH SWEETALERT -->
<script>
 const deleteLinks = document.querySelectorAll('.delete-member');

deleteLinks.forEach(link => {
    link.addEventListener('click', function(e) {
        e.preventDefault();
        const memberId = this.getAttribute('data-id');

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#4E73DF',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: 'Deleted!',
                    text: 'The team member has been deleted.',
                    icon: 'success'
                }).then(() => {
                    window.location.href = "<?php echo base_url('admin/team/delete/'); ?>" + memberId;
                });
            }
        });
    });
});
</script>
</body>
</html>
