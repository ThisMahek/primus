<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UsersView extends CI_Controller
{
    public function __construct()
	{
		parent::__construct();
		$this->load->model('UserModel', 'UM');
		$this->load->helper('user');
		if (!$this->session->userdata('user_id')) {
			redirect(base_url());
		}
		
	}

	public function aboutUs()
	{
		
		
		$user_id = $this->session->userdata('user_id');
		$data['aboutus_data'] = $this->UM->get_single_data('tbl_about',1,$user_id);
		$data['user_data'] = $this->UM->get_user_data();
		$data['about_count'] = $this->db->where(['user_id' => $user_id])->get('tbl_about')->num_rows();
		$user_image = $this->UM->get_single_data('tbl_user_image',1,$user_id);
		$path = FCPATH . 'assets\upload\user_Images\\' . ($user_image->image ?? 'test');
		if (file_exists($path)) {
			$type = pathinfo($path, PATHINFO_EXTENSION);
			$data_img = file_get_contents($path);
			$data['base64'] = 'data:image/' . $type . ';base64,' . base64_encode($data_img);
		} else {
			$data['base64'] = base_url() . 'admin-assets/images/pro-pic.jpg';
		}
		$this->load->view('user/dashboard/aboutUs', $data);
	}
	public function education()
	{
		$user_id = $this->session->userdata('user_id');
		$data['user_data'] = $this->UM->get_user_data();
		$data['education_data'] = $this->UM->get_data('tbl_qualification','1',$user_id);
		$data['education_count'] = $this->db->where(['user_id' => $user_id])->get('tbl_qualification')->num_rows();
		$this->load->view('user/dashboard/education', $data);
	}
	
	public function skills()
	{
		$user_id = $this->session->userdata('user_id');
		$data['user_data'] = $this->UM->get_user_data();
		$data['skills_data'] = $this->UM->get_data('tbl_skills','1',$user_id);
		$data['skills_count'] = $this->db->where(['user_id' => $user_id])->get('tbl_skills')->num_rows();
		$this->load->view('user/dashboard/skills', $data);
	}
	public function experience()
	{
		$user_id = $this->session->userdata('user_id');
		$data['user_data'] = $this->UM->get_user_data();
		$data['experience_data'] = $this->UM->get_data('tbl_experience','1',$user_id);
		$data['experience_count'] = $this->db->where(['user_id' => $user_id])->get('tbl_experience')->num_rows();
		$this->load->view('user/dashboard/experience', $data);
	}
	
	public function projects()
	{
		$user_id = $this->session->userdata('user_id');
		$data['user_data'] = $this->UM->get_user_data();
		$data['project_data'] = $this->UM->get_data('tbl_project','1',$user_id);
		$this->load->view('user/dashboard/projects', $data);
	}
	public function clients()
	{
		$user_id = $this->session->userdata('user_id');
		$data['user_data'] = $this->UM->get_user_data();
		$data['client_data'] = $this->UM->get_data('tbl_client','1',$user_id);
		$data['client_count'] = $this->db->where(['user_id' => $user_id])->get('tbl_client')->num_rows();
		$this->load->view('user/dashboard/clients', $data);
	}
	
	public function dashboard()
	{
		$data = [];
		$user_id = $this->session->userdata('user_id');
		$data['user_img'] = $this->UM->get_data('tbl_user_image','1',$user_id);
		$data['total_project'] = $this->UM->get_count('tbl_project',$user_id);
		$data['total_client'] = $this->UM->get_count('tbl_client',$user_id);
	    //$data['total_experience']=$this->calculateTotalMonthsAndConvert();
		$data['dashboard_data'] = $this->UM->get_data('tbl_dashboard','1',$user_id);
		$user_image = $this->db->where('user_id', $user_id)->get('tbl_user_image')->row();
		$path = FCPATH . 'assets\upload\user_Images\\' . ($user_image->image ?? 'kjdfdkfdk');
		if (file_exists($path)) {
			$type = pathinfo($path, PATHINFO_EXTENSION);
			$data_img = file_get_contents($path);
			$data['base64'] = 'data:image/' . $type . ';base64,' . base64_encode($data_img);
		} else {
			$data['base64'] = base_url() . 'admin-assets/images/pro-pic.jpg';
		}

		$user_data = $this->UM->get_user_data();
		$data['name_id'] = $user_data->first_name . $user_data->last_name . $user_data->id;
		$this->load->view('user/dashboard/dashboard', $data);
	}

	public function myProfile()
	{
		$data['user_data']=$this->UM->get_user_data();
        $data['countries']=$this->UM->get_country();
		$this->load->view('user/dashboard/myProfile',$data);
	}
	public function changePassword()
	{
		$this->load->view('user/dashboard/changePassword');
	}
	public function demo()
	{
		$this->load->view('user/dashboard/test');
	}
	public function social_media()
	{
		$user_id=$this->session->userdata('user_id');
		$data['social_media'] = $this->UM->get_single_data('social_media','1',$user_id);
		$this->load->view('user/dashboard/social_media',$data);
	}
	public function award_archiments()
	{
		$this->load->view('user/dashboard/award_archiments');
	}
	


}
?>