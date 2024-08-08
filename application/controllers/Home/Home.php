<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
	{
        parent::__construct();
		$this->load->model('UserModel','UM');
		
    }

	public function index($slug)
	{ 
		//$user_data=$this->db->select('*')->where("CONCAT(first_name,last_name,id)",$name_id)->get('tbl_users')->row();
		$user_data=$this->db->select('*')->where('slug',$slug)->get('tbl_users')->row();
		$user_id=$user_data->id;
		$data['user_name'] = $user_data->first_name." ".$user_data->last_name; 
		$data['about_data']=$this->UM->show_user_data($user_id); 
		$data['aboutus_data']=$this->UM->get_data('tbl_about','1',$user_id);
		$data['education_data']=$this->UM->get_data('tbl_qualification','1',$user_id);
		$data['experience_data']=$this->UM->get_data('tbl_experience','1',$user_id);
		$data['skills_data']=$this->UM->get_data('tbl_skills','1',$user_id);
		$data['client_data']=$this->UM->get_data('tbl_client','1',$user_id);
		$data['project_data']=$this->UM->get_data('tbl_project','1',$user_id);
		$data['dashboard_data']=$this->UM->get_data('tbl_dashboard','1',$user_id);
		$data['contact_data']=$this->UM->get_contactus_data($user_id);
		$data['total_project'] = $this->UM->get_count('tbl_project',$user_id);
		$data['total_client'] = $this->UM->get_count('tbl_client',$user_id);
		$data['social_media'] = $this->UM->get_single_data('social_media','1',$user_id);
		$data['user_data'] = $user_data;
		$data['user_id'] = $user_id;
		//if(!empty($data['user_data'])){
		$this->load->view('user/index',$data);
		// }
		// else{
		// $this->load->view('user/nodata');
		// }
	}
}
