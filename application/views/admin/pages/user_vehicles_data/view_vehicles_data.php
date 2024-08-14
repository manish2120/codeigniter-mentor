<main id="main" class="main">
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-flex flex-col justify-content-between align-items-center">
<h1 class="h3 mb-2 text-gray-800 fw-bold"><?php echo $page; ?></h1>
    <a href="<?php echo base_url('admin/user-vehicle-data/add');?>" class="btn btn-primary btn-sm rounded-pill">Add Vehicle</a>
</div>

<!-- DataTables -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary fw-bold">List of all Users Vehicle Data</h6>
    </div>
    <div class="card-body">
        <table class="table datatable">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Vehicle</th>
                    <th>Vehicle Number</th>
                    <th>Action</th>
                </tr>
            </thead>
            <!-- starts retrieving data from database -->
            <?php foreach ($user_vehicle_data as $userdata) { ?>
                <tr>
                    <td><?php echo $userdata['user_name']; ?></td>
                    <td><?php echo $userdata['vehicle_name'] == 'Select Vehicle' ? 'N/A' : $userdata['vehicle_name']; ?></td>
                    <td><?php echo $userdata['vehicle_number']; ?></td>
                    <!-- starts sending id parameter for edit and delete -->
                    <td class="d-flex justify-content-around">
                        <a href="<?php echo base_url('admin/user-vehicle-data/edit/' . $userdata['id']);?>">
                            <i class='fas fa-pencil-alt'></i>
                        </a>
                        <a href="<?php echo base_url('admin/user-vehicle-data/delete/' . $userdata['id']); ?>">
                            <i class='fas fa-trash'></i>
                        </a>
                    </td>
                </tr>
            <?php } ?>
            <!-- ends retrieving data from database -->
        </table>
    </div>
</div>
</div>
<!-- /.container-fluid -->
</div>
</main>

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

<!-- Template Main JS File -->
<script src="<?php echo base_url(); ?>assets/admin/assets/js/main.js"></script>

<!-- SweetAlert2 for alerts -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Initialization Script -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Initialize DataTable
        const dataTable = new simpleDatatables.DataTable(".datatable");

        // Select all delete member links
        const deleteLinks = document.querySelectorAll('.delete-member');

        // Attach click event handler to each delete link
        deleteLinks.forEach(function(link) {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                let memberId = this.getAttribute('data-id');

                // Handle Sweet Alert Library
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
                        // If confirmed, redirect to delete URL
                        Swal.fire({
                            title: 'Deleted!',
                            text: 'The team member has been deleted.',
                            icon: 'success'
                        }).then(() => {
                            window.location.href = "<?php echo base_url('admin/team/delete/'); ?>" + memberId;
                        })
                    }
                })
            });
        });
    });
</script>
</body>
</html>