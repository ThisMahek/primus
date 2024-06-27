<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserDashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('UserModel', 'UM');
		//$this->load->library('input');
		// if (!$this->session->userdata('user_id')) {
		// 	redirect(base_url());
		// }
	}



	public function test()
	{
		$file_path = APPPATH . 'views/index.php';
		$html = file_get_contents($file_path);
		$dom = new DOMDocument();
		libxml_use_internal_errors(true);
		$dom->loadHTML($html);
		libxml_use_internal_errors(false);
		$images = $dom->getElementsByTagName('img');
		foreach ($images as $image) {
			$src = $image->getAttribute('src');
			echo $src . '<br>';
		}
	}

	public function save_skills()
	{

		$ids = $this->input->post('delete_id');
		$skills = $this->input->post('skill');
		$percentages = $this->input->post('percantage');
		// Define validation rules for each field
		for ($i = 0; $i < count($skills); $i++) {
			$this->form_validation->set_rules('skill[' . $i . ']', 'Skill', 'required');
			$this->form_validation->set_rules('percantage[' . $i . ']', 'Percentage', 'required');
		}
		// Run validation
		if ($this->form_validation->run() == FALSE) {
			echo 2;
		} else {
			$user_id = $this->session->userdata('user_id');
			// if (!empty($ids)) {
			// 	$response = $this->db->where_not_in('id', $ids)->delete('tbl_skills');
			// }
			for ($i = 0; $i < count($skills); $i++) {
				$data = array(
					'skill' => $skills[$i],
					'percantage' => $percentages[$i],
					'user_id' => $this->session->userdata('user_id'),
				);
				if (isset($ids[$i]) && !empty($ids[$i])) {
					$response = $this->db->where('id', $ids[$i])->update('tbl_skills', $data);
				} else {
					$response = $this->db->insert('tbl_skills', $data);
				}
			}
			if ($response) {
				echo 1;
			} else {
				// Error message
				echo 0;
			}
		}
	}
	public function save_experience()
	{

		$ids = $this->input->post('delete_id');
		$work_type = $this->input->post('work_type');
		$organisation_name = $this->input->post('organisation_name');
		$website_url = $this->input->post('website_url');
		$work_from = $this->input->post('work_from');
		$work_to = $this->input->post('work_to');
		$total = $this->input->post('total');
		// Define validation rules for each field
		for ($i = 0; $i < count($work_type); $i++) {
			$this->form_validation->set_rules('work_type[' . $i . ']', 'Work Type', 'required');
			$this->form_validation->set_rules('organisation_name[' . $i . ']', 'Organisation Name', 'required');
			$this->form_validation->set_rules('website_url[' . $i . ']', 'Website URL', 'required|valid_url');
			$this->form_validation->set_rules('work_from[' . $i . ']', 'Work From', 'required');
			$this->form_validation->set_rules('work_to[' . $i . ']', 'Work To', 'required');
		}

		// Run validation
		if ($this->form_validation->run() == FALSE) {
			echo 2;
		} else {
			// Validation passed, proceed with saving data
			$user_id = $this->session->userdata('user_id');
			// if (!empty($ids)) {
			// 	$this->db->where_not_in('id', $ids)->delete('tbl_experience');
			// }
			for ($i = 0; $i < count($work_type); $i++) {
				$data = array(
					'work_type' => trim($work_type[$i]),
					'organisation_name' => trim($organisation_name[$i]),
					'website_url' => trim($website_url[$i]),
					'work_from' => trim($work_from[$i]),
					'work_to' => trim($work_to[$i]),
					'total' => $total[$i],
					'user_id' => $user_id,
				);
				if (isset($ids[$i]) && !empty($ids[$i])) {
					$response = $this->db->where('id', $ids[$i])->update('tbl_experience', $data);
				} else {
					$response = $this->db->insert('tbl_experience', $data);
				}
			}
			// Check if any database operation failed
			if ($response) {
				echo 1;
			} else {

				echo 0;
			}
		}
	}
	public function save_education()
	{
		// Set validation rules for each input field

		$ids = $this->input->post('delete_id');
		$education_type = $this->input->post('education_type');
		$institute = $this->input->post('institute');
		$year = $this->input->post('year');
		$description = $this->input->post('description');
		for ($i = 0; $i < count($education_type); $i++) {
			$this->form_validation->set_rules('education_type[' . $i . ']', 'Education_type', 'required');
			$this->form_validation->set_rules('institute[' . $i . ']', 'Institute', 'required');
			$this->form_validation->set_rules('year[' . $i . ']', 'Year', 'required');
			$this->form_validation->set_rules('description[' . $i . ']', 'Description', 'required');
		}
		if ($this->form_validation->run() == FALSE) {
			echo 2;
		} else {
			$user_id = $this->session->userdata('user_id');
			// if (!empty($ids)) {
			// 	$response = $this->db->where_not_in('id', $ids)->delete('tbl_qualification');
			// }
			for ($i = 0; $i < count($education_type); $i++) {
				$data = array(
					'education_type' => trim($education_type[$i]),
					'institute' => trim($institute[$i]),
					'year' => trim($year[$i]),
					'description' => trim($description[$i]),
					'user_id' => $this->session->userdata('user_id'),
				);
				if (isset($ids[$i]) && !empty($ids[$i])) {
					$response = $this->db->where('id', $ids[$i])->update('tbl_qualification', $data);
				} else {
					$response = $this->db->insert('tbl_qualification', $data);
				}
			}
			if ($response) {
				echo 1;
			} else {
				echo 0;
			}
		}
	}
	public function about_us()
	{
		$this->load->library('form_validation');
		$user_id = $this->session->userdata('user_id');
		$userdata = $this->UM->get_data('tbl_about', '1', $user_id);
		// Set validation rules
		$this->form_validation->set_rules('introduction', 'Introduction', 'required');
		$this->form_validation->set_rules('designation', 'Designation', 'required');
		$this->form_validation->set_rules('carrier_objective', 'Carrier Objective', 'required');

		if (empty($_FILES['user_cv']['name']) && $this->input->post('key') == 2) {
			$this->form_validation->set_rules('user_cv', 'User_cv', 'required');
		}
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('validation_errors', validation_errors());
			echo 2;
		} else {
			$file = $_FILES["user_cv"];
			$MyFileName = "";
			if (!empty($userdata) && isset($userdata->cv)) {
				$previous_cv_path = $userdata->cv;
				if (file_exists($previous_cv_path)) {
					unlink($previous_cv_path);
				}
			}
			if (strlen($file['name']) > 0) {
				$image = $file["name"];
				$config['upload_path'] = './assets/upload/CV';
				$config['allowed_types'] = 'pdf';
				$config['file_name'] = $image;
				$this->load->library("upload", $config);
				$filestatus = $this->upload->do_upload('user_cv');
				if ($filestatus == true) {
					$MyFileName = $this->upload->data('file_name');
					$array['cv'] = "assets/upload/CV/" . $MyFileName;

				} else {
					$error = array('error' => $this->upload->display_errors());
					$result = $error;
				}
			}
			//End: File upload code
			$array['introduction'] = $this->input->post('introduction');
			$array['designation'] = $this->input->post('designation');
			$array['carrier_objective'] = $this->input->post('carrier_objective');
			$array['user_id'] = $user_id;
			$userdata = $this->UM->get_data('tbl_about', '1', $user_id);
			if (!empty($userdata)) {
				$response = $this->db->where('user_id', $user_id)->update('tbl_about', $array);
			} else {
				$response = $this->db->insert('tbl_about', $array);
			}
			if ($response) {
				if ($this->db->affected_rows()) {
					echo 1;
				} else {
					echo 3;
				}
			} else {
				echo 0;
			}
		}
	}
	public function delete_project($id)
	{
		$response = $this->db->where('id', $id)->delete('tbl_project');
		if ($response) {
			echo 1;
		} else {
			echo 0;
		}
	}
	public function add_project()
	{
		$this->load->library('form_validation');

		// Set validation rules
		$this->form_validation->set_rules('project_name', 'Project Name', 'required');
		$this->form_validation->set_rules('project_url', 'Project URL', 'required');
		$this->form_validation->set_rules('working_role', 'Working Role', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');

		// Check if the form validation passes
		if ($this->form_validation->run() == FALSE) {
			// Validation failed, return errors
			$errors = validation_errors();
			echo 2;
		}else{
			//print_r($_FILES);exit;
		$user_id = $this->session->userdata('user_id');
		$file = $_FILES["faeture_image"];
		$MyFileName = "";
		if (strlen($file['name']) > 0) {
			$image = $file["name"];
			$config['upload_path'] = './assets/upload/Project_Image';
			$config['allowed_types'] = '*';
			$config['file_name'] = $image;
			$this->load->library("upload", $config);
			$filestatus = $this->upload->do_upload('faeture_image');
			if ($filestatus == true) {
				$MyFileName = $this->upload->data('file_name');
				$array['faeture_image'] = $MyFileName;
			} else {
				$error = array('error' => $this->upload->display_errors());
				print_r($error);exit;
				$result = $error;
			}
		
		}
		//End: File upload code
		$array['project_name'] = $this->input->post('project_name');
		$array['working_role'] = $this->input->post('working_role');
		$array['description'] = $this->input->post('description');
		$array['project_url'] = $this->input->post('project_url');
		$array['user_id'] = $user_id;
		$response = $this->db->insert('tbl_project', $array);
		if ($response) {
			echo 1;
		} else {
			echo 0;
		}
	}
}
	public function edit_project()
	{
		// Load form validation library
		$this->load->library('form_validation');

		// Set validation rules
		$this->form_validation->set_rules('project_name', 'Project Name', 'required');
		$this->form_validation->set_rules('project_url', 'Project URL', 'required');
		$this->form_validation->set_rules('working_role', 'Working Role', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');

		// Check if the form validation passes
		if ($this->form_validation->run() == FALSE) {
			// Validation failed, return errors
			$errors = validation_errors();
			echo 2;
		} else {
			// Validation passed, proceed with file upload and database update

			$id = $this->input->post('add_project_id');
			$user_id = $this->session->userdata('user_id');
			$file = $_FILES["feature_image"]; // Corrected to match form input name
			$MyFileName = "";
			if (strlen($file['name']) > 0) {
				$image = $file["name"];
				$config['upload_path'] = './assets/upload/Project_Image';
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['file_name'] = $image;
				$this->load->library("upload", $config);
				$filestatus = $this->upload->do_upload('feature_image'); // Corrected to match form input name
				if ($filestatus == true) {
					$MyFileName = $this->upload->data('file_name');
					$array['faeture_image'] = $MyFileName; // Corrected to match form input name
				} else {
					$error = array('error' => $this->upload->display_errors());
					echo json_encode(['status' => 0, 'errors' => $error]);
					return;
				}
			}
			//End: File upload code
			$array['project_name'] = $this->input->post('project_name');
			$array['working_role'] = $this->input->post('working_role');
			$array['description'] = $this->input->post('description');
			$array['project_url'] = $this->input->post('project_url');
			$array['user_id'] = $user_id;

			$response = $this->db->where('id', $id)->update('tbl_project', $array);
		//	echo $this->db->last_query();die();
			if ($response) {
				echo 1;
			} else {
				echo 0;
			}
		}
	}

	public function update_dashboard_status()
	{
		$user_id = $this->session->userdata('user_id');
		if ($this->input->post('experience') == 'experience') {
			$value = $this->input->post('total_experience') == 0 ? 0 : $this->input->post('total_experience');
			$key = 'total_experience';
		} elseif ($this->input->post('project') == 'project') {
			$value = $this->input->post('total_project') == 0 ? 0 : $this->input->post('total_project');
			$key = 'total_project';
		} elseif ($this->input->post('client') == 'client') {
			$value = $this->input->post('total_client') == 0 ? 0 : $this->input->post('total_client');
			$key = 'total_client';
		}
		$array = array(
			$key => $value,
			'user_id' => $user_id
		);
		$user_data = $this->db->where('user_id', $user_id)->get('tbl_dashboard')->row();
		if (!empty($user_data)) {
			$response = $this->db->where('user_id', $user_id)->update('tbl_dashboard', $array);
		} else {
			$response = $this->db->insert('tbl_dashboard', $array);
		}

		if ($response) {
			$this->session->set_flashdata('success', '<script>
				$(document).ready(function(){
				Swal.fire({
					icon: "success",
					title: "Success",
					text: "You data save successfully!",
				});
			});
			</script>');
		} else {
			$this->session->set_flashdata('success', '<script>
				$(document).ready(function(){
				Swal.fire({
					icon: "error",
					title: "Oops...",
					text: "Something went wrong!",
				});
			});
			</script>');
		}
		redirect(base_url() . "UserDashboard/dashboard");
	}
	public function change_dashboard_status()
	{
		$status = $this->input->post('status');
		$key = $this->input->post('key');

		$user_id = $this->session->userdata('user_id');
		$response = $this->db->where(['user_id' => $user_id])->update('tbl_dashboard', array($key => $status));
		if ($response) {
			echo 1;
		} else {
			echo 0;
		}
	}



	public function save_client()
	{
		$user_id = $this->session->userdata('user_id');
		$collect_keeping_id = [0];

		if (isset($_FILES['logo']['name'])) {

			$config = array(
				'upload_path' => './assets/upload/logo',
				'allowed_types' => 'jpg|gif|png|jpeg|PNG',
				//'max_size' => 102400000,
				'overwrite' => 1
			);
			$this->load->library('upload', $config);
			$url = $this->input->post('url');
			$id = $this->input->post('id');
			$previous_file_names = $this->input->post('previous_file_name');
			foreach ($_FILES['logo']['name'] as $key => $fileName) {
				//$newFileName = 'new_file_name_' . $key . '.' . pathinfo($fileName, PATHINFO_EXTENSION); // Modify the new file name as per your requirements
				$_FILES['userfile'] = array(
					'name' => $fileName,
					'type' => $_FILES['logo']['type'][$key],
					'tmp_name' => $_FILES['logo']['tmp_name'][$key],
					'error' => $_FILES['logo']['error'][$key],
					'size' => $_FILES['logo']['size'][$key],
				);
				$this->upload->initialize($config);
				$this->upload->do_upload('userfile');
				$uploadData = $this->upload->data();
				$imageFileName = $uploadData['file_name'];

				$data = array(
					'url' => $url[$key],
					'logo' => (!empty($imageFileName) ? $imageFileName : $previous_file_names[$key]),
					'user_id' => $user_id
				);
				if (!empty($id[$key])) {

					$this->db->where('id', $id[$key])->update('tbl_client', $data);
					$collect_keeping_id[] = $id[$key];
				} else {
					$this->db->insert('tbl_client', $data);
					$collect_keeping_id[] = $this->db->insert_id();
				}
				//	echo $this->db->last_query();die();
			}
			//$this->db->where_not_in('id', $collect_keeping_id)->where('user_id', $user_id)->delete('tbl_client');
		}

		$data = $this->db->get('tbl_client')->result_array();
		redirect(base_url() . "UserDashboard/clients");
	}
	public function get_single_project(){
		$user_id=$this->session->userdata('user_id');
		$result=$this->UM->get_single_data('tbl_project',$user_id,'1');
       echo json_encode($result);
	}
	public function delete_data(){
		$id=$this->input->post('id');
		$tbl_name=$this->input->post('tbl');
		$x=$this->db->where('id',$id)->delete($tbl_name);
		if($x){
           echo 1;
		}else{
			echo 0;
		}
	}
	public function update_change_password(){
		
		// Set validation rules
		$this->form_validation->set_rules('current_password', 'Current Password', 'required');
		$this->form_validation->set_rules('new_password', 'New Password', 'required');
		// Check if the form validation passes
		if ($this->form_validation->run() == FALSE) {
			$errors = validation_errors();
			echo 4;
		} else {
		$old_password=$this->input->post('current_password');
		$new_password=$this->input->post('new_password');
		$user_data=$this->UM->get_user_data();
		$user_id=$this->session->userdata('user_id');
		
		if($user_data->password == md5($old_password)){
			if($user_data->password!=md5($new_password)){
              $update_array=array('password'=>md5($new_password));
			$result=  $this->db->where('id',$user_id)->update('tbl_users',$update_array);
               if($result){
                     echo 1;
			   }else{
				echo 0;
			   }
			}else{
				echo 3;
			}
		}else{
			echo 2;
		}
	}
}
public function update_profile()
{

	$this->form_validation->set_rules('first_name', 'First Name', 'required');
	$this->form_validation->set_rules('last_name', 'Last Name', 'required');
	$this->form_validation->set_rules('mobile_no', 'Mobile Number', 'required');
	$this->form_validation->set_rules('country', 'Country', 'required');
	$this->form_validation->set_rules('state', 'State', 'required');
	$this->form_validation->set_rules('city', 'City', 'required');
	$this->form_validation->set_rules('designation', 'Designation', 'required');
	// Run the form validation
	if ($this->form_validation->run() == FALSE) {
		//  echo validation_errors();
		echo 2;
	} else {
		$mobile=$this->input->post('mobile_no');
		$user_id=$this->input->post('user_id');
		$check_phone_data = $this->db->where('id!=',$user_id)->where('mobile_no', $mobile)->get('tbl_users')->num_rows();
		if ($check_phone_data > 0) {
			echo 4;
		} else{
			$update_array = array(
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'mobile_no' => $mobile,
				'country' => $this->input->post('country'),
				'state' => $this->input->post('state'),
				'city' => $this->input->post('city'),
				'designation' => $this->input->post('designation'),
			);
			
			$result = $this->db->where('id',$user_id)->update('tbl_users', $update_array);
			if ($result) {
				echo 1;
			} else {
				echo 0;
			}
		}
	}
}

}




