<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		$this->load->view('admin/pages/admin_index');
	}
    public function dashboard()
	{
		$this->load->view('admin/pages/dashboard');
	}
	public function users()
	{
		$this->load->view('admin/pages/users');
	}
    public function changePassword()
	{
		$this->load->view('admin/changePassword');
	}
}