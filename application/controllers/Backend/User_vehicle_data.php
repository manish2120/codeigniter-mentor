<?php
defined("BASEPATH") or exit("No direct script access allowed");

class User_vehicle_data extends CI_Controller {
    public function vehicles($action, $id = false) {
        switch ($action) {
            // Starts - View Vehicle Datatable
            case "view":
                $user_data = $this->db->get('vehicle_data')->result_array(); // get the stored vehicle data from database
                $page_data['page_title'] = 'User Vehicle Data';
                $page_data['user_vehicle_data'] = $user_data;
                $page_data['page'] = 'Vehicles Data';
                $this->load->view('admin/section/boilerplate_start', $page_data);
                $this->load->view('admin/section/header');
                $this->load->view('admin/section/sidebar');
                $this->load->view('admin/pages/user_vehicles_data/view_vehicles_data', $page_data);
                $this->load->view('admin/section/footer');
                // $this->load->view('admin/section/boilerplate_end');
                break;
            // Ends - View Vehicle Datatable

            // Starts - Handle add vehicle form
            case "add":
                $page_data = []; // Initialize page data array
            
                if ($this->input->post()) {
                    $new_user_id = $this->input->post('new_user_id'); // gets the new user id from input.
                    $query = $this->db->get_where('register_form', array('id' => $new_user_id)); // gets the matching user id
            
                    $exists = $query->num_rows() > 0;
                    $user = $exists ? $query->row_array() : ['user_name' => 'N/A'];
            
                    // Set validation rules for vehicle number
                    $this->form_validation->set_rules('new_user_id', 'User ID', 'required', array('required' => 'User ID is required'));
                    $this->form_validation->set_rules('vehicle_name', 'Vehicle Type', 'required', array('required' => 'Please select vehicle'));
                    $this->form_validation->set_rules('vehicle_number', 'Vehicle Number', 'required|regex_match[/^[A-Z]{2}\d{2}[A-Z]{2}\d{4}$/]',
                        array(
                            'regex_match' => 'Please enter a valid number in the format XX00XX0000.'
                        )
                    );
            
                    // Check if the validation passes
                    if ($this->form_validation->run() == FALSE) {
                        // Validation failed, show errors
                        $page_data['validation_errors'] = validation_errors();
                    } else {
                        if ($user['user_name'] === 'N/A') {
                            // Show failed message if user_name is 'N/A'
                            $page_data['status_message'] = 'Failed to add - User doesn"t exist!';
                        } else {
                            // Validation passed, proceed with insertion
                            $data = array(
                                'user_name' => $user['user_name'],
                                'user_id' => $this->input->post('new_user_id'),
                                'vehicle_name' => $this->input->post('vehicle_name'),
                                'vehicle_number' => $this->input->post('vehicle_number'),
                                'created_at' => time(),
                                'updated_at' => time()
                            );
            
                            $this->db->insert('vehicle_data', $data); // Insert new vehicle data in database
                            $page_data['status_message'] = 'Added Successfully!'; // set success message
                        }
                    }
                }
            
                $page_data['vehicles_name'] = $this->db->get('vehicles_name')->result_array();
                $page_data['page_title'] = 'Add Vehicle';
                $page_data['page'] = 'Vehicles Data';
                $page_data['action'] = 'Add';
            
                $this->load->view('admin/section/boilerplate_start', $page_data);
                $this->load->view('admin/section/header');
                $this->load->view('admin/section/sidebar');
                $this->load->view('admin/pages/user_vehicles_data/add_vehicles_data', $page_data);
                $this->load->view('admin/section/footer');
                $this->load->view('admin/section/boilerplate_end');
                break;
            // Ends - Handle add vehicle form

            // Starts - Handle edit page
            case "edit":
                if ($this->input->post()) {
                    $data = array(
                        // 'user_name' => $this->input->post('user_name'),
                        'user_id' => $this->input->post('user_id'),
                        'vehicle_name' => $this->input->post('vehicle_name'),
                        'vehicle_number' => $this->input->post('vehicle_number'),
                        'updated_at' => time()
                    );

                    // Update edited data in database
                    $this->db->where('id', $id);
                    $this->db->update('vehicle_data', $data);
                }

                $user_data = $this->db->get_where('vehicle_data', array('id' => $id))->row_array();

                $page_data['page_title'] = 'Edit Vehicle Data';
                $page_data['edit_user_data'] = $user_data;
                $page_data['page'] = 'Edit Data';
                $this->load->view('admin/section/boilerplate_start', $page_data);
                $this->load->view('admin/section/header');
                $this->load->view('admin/section/sidebar');
                $this->load->view('admin/pages/user_vehicles_data/edit_vehicles_data', $page_data);
                $this->load->view('admin/section/footer');
                $this->load->view('admin/section/boilerplate_end');
                break;
            // Ends - Handle edit page

            // Starts - Handle user data deletion
            case "delete":
                if ($id) {
                    $this->db->where('id', $id);
                    $this->db->delete('vehicle_data');
                    redirect('admin/user-vehicle-data');
                }
                break;
            // Ends - Handle user data deletion
        }
    }

    // CHECK USER ID EXISTENCE
    public function check_user_id() {
        $new_user_id = $this->input->post('new_user_id');
        // Get the matching data from the registered users database
        $query = $this->db->get_where('register_form', array('id' => $new_user_id));
        $exists = $query->num_rows() > 0;

        if ($exists) {
            $user = $query->row_array();
            $response = [
                'exists' => $exists,
                'user_name' => $user['user_name']
            ];

        } else {
            $response = [
                'exists' => false,
            ];
        }

        header('Content-Type: application/json');
        echo json_encode($response);
    }
}
