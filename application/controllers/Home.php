<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$page_data['page_title'] = "Home Page";
		$this->load->view('header', $page_data);
		$this->load->view('home');
		$this->load->view('footer');
	}

	public function aboutUs()
	{
		$page_data['page_title'] = "About Us";
		$this->load->view('header', $page_data);
		$this->load->view('about');
		$this->load->view('footer');
	}
	
	public function contactUs()
	{
		$page_data['page_title'] = "Contact Us";
		$this->load->view('header', $page_data);
		$this->load->view('contact');
		$this->load->view('footer');
	}

	public function changePassword() {
		$page_data['page_title'] = 'Reset Password - Mentor';
		$this->load->view('change_password', $page_data);
	}
	public function profile() {
		$page_data['page_title'] = 'Profile - Mentor';
		$this->load->view('header', $page_data);
		$this->load->view('profile_form');
		$this->load->view('footer');
	}

	public function courses() {
		$page_data['page_title'] = 'Our Courses - Mentor';
		$this->load->view('header', $page_data);
		$this->load->view('courses');
		$this->load->view('footer');
	}
	public function courseDetails() {
		$page_data['page_title'] = 'Our Courses - Mentor';
		$this->load->view('header', $page_data);
		$this->load->view('course_details');
		$this->load->view('footer');
	}
	public function trainers() {
		$page_data['page_title'] = 'Trainers - Mentor';
		$this->load->view('header', $page_data);
		$this->load->view('trainers');
		$this->load->view('footer');
	}
	public function events() {
		$page_data['page_title'] = 'Events - Mentor';
		$this->load->view('header', $page_data);
		$this->load->view('events');
		$this->load->view('footer');
	}
	public function pricing() {
		$page_data['page_title'] = 'Pricing - Mentor';
		$this->load->view('header', $page_data);
		$this->load->view('pricing');
		$this->load->view('footer');
	}

	public function welcome() {
		$this->load->view('welcome_message');
	}
}
