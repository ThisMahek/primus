<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserDashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('UserModel', 'UM');
		$this->load->library('form_validation');
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
		// Get the input data
		$ids = $this->input->post('delete_id');
		$education_type = $this->input->post('education_type');
		$institute = $this->input->post('institute');
		$year = $this->input->post('year');
		$description = $this->input->post('description');
		// Check if all fields are blank
		$all_blank = true;
		for ($i = 0; $i < count($education_type); $i++) {
			if (!empty(trim($education_type[$i])) || !empty(trim($institute[$i])) || !empty(trim($year[$i])) || !empty(trim($description[$i]))) {
				$all_blank = false;
				break;
			}
		}
		if ($all_blank) {
			echo 2; // Specific error code for all fields being blank
			return;
		}
		$this->set_word_limit(40);
		// Set validation rules for each input field
		for ($i = 0; $i < count($education_type); $i++) {
			$this->form_validation->set_rules('education_type[' . $i . ']', 'Education Type', 'required');
			$this->form_validation->set_rules('institute[' . $i . ']', 'Institute', 'required');
			$this->form_validation->set_rules('year[' . $i . ']', 'Year', 'required');
			$this->form_validation->set_rules('description[' . $i . ']', 'Description', 'callback_validate_words');
		}

		if ($this->form_validation->run() == FALSE) {
			// Capture validation errors
			$validation_errors = validation_errors();

			// Check if the error is specifically for the description field
			if (strpos($validation_errors, 'Description') !== false) {
				echo 4; // Specific error code for description validation issues
			} else {
				echo 2; // General validation error
			}
			return;
		}

		// Process each education record
		$user_id = $this->session->userdata('user_id');
		for ($i = 0; $i < count($education_type); $i++) {
			$data = array(
				'education_type' => trim($education_type[$i]),
				'institute' => trim($institute[$i]),
				'year' => trim($year[$i]),
				'description' => trim($description[$i]),
				'user_id' => $user_id,
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

	public function about_us()
	{
		$this->load->library('form_validation');
		$user_id = $this->session->userdata('user_id');
		$userdata = $this->UM->get_data('tbl_about', '1', $user_id);
		// Set validation rules
		$this->set_word_limit(100);
		$this->form_validation->set_rules('introduction', 'Introduction', 'required|callback_validate_words');
		$this->form_validation->set_rules('designation', 'Designation', 'required');
		$this->form_validation->set_rules('carrier_objective', 'Carrier Objective', 'required');

		if (empty($_FILES['user_cv']['name']) && $this->input->post('key') == 2) {
			$this->form_validation->set_rules('user_cv', 'User_cv', 'required');
		}
		if ($this->form_validation->run() == FALSE) {
			if (strpos(validation_errors(), 'introduction') == false) {
				echo 4; // Specific error code for introduction word limit exceeded
			} else {
				//$this->session->set_flashdata('validation_errors', validation_errors());
				echo 2;
			}
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
			;
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

	public function set_word_limit($limit)
	{
		$this->word_limit = $limit;
	}

	public function validate_words($field_name)
	{
		// Remove any HTML tags and trim extra spaces

		$words = trim($field_name);
		// Count words
		$word_count = str_word_count($words);
		// Check if the word count is within the limit
		if ($word_count > $this->word_limit) {
			$this->form_validation->set_message('validate_words', 'The {field} must not exceed ' . $this->word_limit . ' words.');
			return FALSE;
		} else {
			return TRUE;
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
		$this->set_word_limit(40);
		// Set validation rules
		$this->form_validation->set_rules('project_name', 'Project Name', 'required');
		$this->form_validation->set_rules('project_url', 'Project URL', 'required');
		$this->form_validation->set_rules('working_role', 'Working Role', 'required');
		$this->form_validation->set_rules('description', 'Description', 'callback_validate_words');

		// Check if the form validation passes
		if ($this->form_validation->run() == FALSE) {
			if (strpos(validation_errors(), 'description') == false) {
				echo 4; // Specific error code for introduction word limit exceeded
			} else {
				//$this->session->set_flashdata('validation_errors', validation_errors());
				echo 2;
			}
		} else {
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
					print_r($error);
					exit;
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
		$this->set_word_limit(40);
		// Set validation rules
		$this->form_validation->set_rules('project_name', 'Project Name', 'required');
		$this->form_validation->set_rules('project_url', 'Project URL', 'required');
		$this->form_validation->set_rules('working_role', 'Working Role', 'required');
		$this->form_validation->set_rules('description', 'Description', 'callback_validate_words');

		// Check if the form validation passes
		if ($this->form_validation->run() == FALSE) {
			if (strpos(validation_errors(), 'description') == false) {
				echo 4; // Specific error code for introduction word limit exceeded
			} else {
				//$this->session->set_flashdata('validation_errors', validation_errors());
				echo 2;
			}
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
		$this->load->library('form_validation');
		$user_id = $this->session->userdata('user_id');
		$collect_keeping_id = [0];

		// Validate URLs
		foreach ($this->input->post('url') as $key => $url) {
			$this->form_validation->set_rules("url[{$key}]", "Client's Website URL #{$key}", 'required|valid_url');
		}

		// Custom validation for the logo field
		$logos = $_FILES['logo']['name'];
		$previous_file_names = $this->input->post('previous_file_name');

		$logo_is_valid = true;
		foreach ($logos as $key => $logo) {
			if (empty($logo) && empty($previous_file_names[$key])) {
				$logo_is_valid = false;
				break;
			}
		}

		if ($this->form_validation->run() == FALSE || !$logo_is_valid) {
			$errors = validation_errors();
			if (!$logo_is_valid) {
				$errors .= "<p>The Client Logo field is required for each entry.</p>";
			}
			echo json_encode(['status' => 'error', 'message' => $errors, 'response' => 0]);
			return;
		}

		if (isset($logos)) {
			$config = array(
				'upload_path' => './assets/upload/logo',
				'allowed_types' => 'jpg|gif|png|jpeg|PNG',
				'overwrite' => 1
			);
			$this->load->library('upload', $config);
			$url = $this->input->post('url');
			$id = $this->input->post('id');

			foreach ($logos as $key => $fileName) {
				$_FILES['userfile'] = array(
					'name' => $fileName,
					'type' => $_FILES['logo']['type'][$key],
					'tmp_name' => $_FILES['logo']['tmp_name'][$key],
					'error' => $_FILES['logo']['error'][$key],
					'size' => $_FILES['logo']['size'][$key],
				);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('userfile')) {
					$uploadData = $this->upload->data();
					$imageFileName = $uploadData['file_name'];
				} else {
					$imageFileName = $previous_file_names[$key];
				}

				$data = array(
					'url' => $url[$key],
					'logo' => $imageFileName,
					'user_id' => $user_id
				);
				if (!empty($id[$key])) {
					$this->db->where('id', $id[$key])->update('tbl_client', $data);
					$collect_keeping_id[] = $id[$key];
				} else {
					$this->db->insert('tbl_client', $data);
					$collect_keeping_id[] = $this->db->insert_id();
				}
			}
		}

		$data = $this->db->get('tbl_client')->result_array();
		echo json_encode(['status' => 'success', 'message' => 'Clients saved successfully!', 'data' => $data, 'response' => 1]);
	}

	// Callback function to validate file
	public function file_check($str)
	{
		if (isset($_FILES['userfile']['name']) && $_FILES['userfile']['name'] != "") {
			$allowed_mime_type_arr = array('image/jpeg', 'image/png', 'image/jpg');
			$mime = get_mime_by_extension($_FILES['userfile']['name']);
			if (isset($mime) && in_array($mime, $allowed_mime_type_arr)) {
				if ($_FILES['userfile']['size'] < 1048576) { // 1MB
					return TRUE;
				} else {
					$this->form_validation->set_message('file_check', 'The file size should be less than 1MB');
					return FALSE;
				}
			} else {
				$this->form_validation->set_message('file_check', 'Please select only jpg/png file.');
				return FALSE;
			}
		} else {
			$this->form_validation->set_message('file_check', 'Please choose a file to upload.');
			return FALSE;
		}
	}

	public function get_single_project()
	{
		$user_id = $this->session->userdata('user_id');
		$result = $this->UM->get_single_data('tbl_project', 1, $user_id);
		echo json_encode($result);
	}
	public function delete_data()
	{
		$id = $this->input->post('id');
		$tbl_name = $this->input->post('tbl');
		$x = $this->db->where('id', $id)->delete($tbl_name);
		if ($x) {
			echo 1;
		} else {
			echo 0;
		}
	}
	public function update_change_password()
	{

		// Set validation rules
		$this->form_validation->set_rules('current_password', 'Current Password', 'required');
		$this->form_validation->set_rules('new_password', 'New Password', 'required');
		// Check if the form validation passes
		if ($this->form_validation->run() == FALSE) {
			$errors = validation_errors();
			echo 4;
		} else {
			$old_password = $this->input->post('current_password');
			$new_password = $this->input->post('new_password');
			$user_data = $this->UM->get_user_data();
			$user_id = $this->session->userdata('user_id');

			if ($user_data->password == md5($old_password)) {
				if ($user_data->password != md5($new_password)) {
					$update_array = array('password' => md5($new_password));
					$result = $this->db->where('id', $user_id)->update('tbl_users', $update_array);
					if ($result) {
						echo 1;
					} else {
						echo 0;
					}
				} else {
					echo 3;
				}
			} else {
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
			$mobile = $this->input->post('mobile_no');
			$user_id = $this->input->post('user_id');
			$check_phone_data = $this->db->where('id!=', $user_id)->where('mobile_no', $mobile)->get('tbl_users')->num_rows();
			if ($check_phone_data > 0) {
				echo 4;
			} else {
				$first_name=$this->input->post('first_name');
				$last_name=$this->input->post('last_name');
				$update_array = array(
					'first_name' => $first_name,//$this->input->post('first_name'),
					'last_name' => $last_name,//$this->input->post('last_name'),
					'mobile_no' => $mobile,
					'country' => $this->input->post('country'),
					'state' => $this->input->post('state'),
					'city' => $this->input->post('city'),
					'designation' => $this->input->post('designation'),
				);

             if($this->session->userdata('first_name')!= $first_name || $this->session->userdata('last_name')!= $last_name)
			 {
				$slug=generate_slug($first_name, $last_name, $user_id);
				$update_array['slug'] = $slug;
				$this->session->set_userdata('slug',$slug);
				$this->session->set_userdata('user_name',$first_name.' '.$last_name);
				
			 }




				$result = $this->db->where('id', $user_id)->update('tbl_users', $update_array);
				//echo $this->db->last_query();die();
				if ($result) {
					echo 1;
				} else {
					echo 0;
				}
			}
		}
	}
	public function check_email_forgot_password()
	{

		$this->load->library('form_validation');
		$this->form_validation->set_rules('forgot_email', 'forgot_email', 'required');
		// Run the form validation
		if ($this->form_validation->run() == FALSE) {
			//  echo validation_errors();
			echo 2;
		} else {
			$email = $this->input->post('forgot_email');
			$result = $this->db->where('email_id', $email)->get('tbl_users')->row();
			if (!empty($result)) {
				$forgot_otp = rand(0, 9999);
				$forgot_otp = str_pad($forgot_otp, 4, '0', STR_PAD_LEFT);
				// 	$note = 'Your one time password is '. $otp .' please don\'t  share it.';
				$get_forgot_otp = $this->db->where('email', $email)->get('get_otp')->row();
				$data = array(
					'email' => $email,
					'otp' => $forgot_otp,
					'status' => 0
				);
				if (!empty($get_forgot_otp)) {
					$res = $this->db->where('email', $email)->update('get_otp', $data);
				} else {
					$res = $this->db->insert('get_otp', $data);
				}
				$this->session->set_userdata('user_forgot_password_email',$email);
				echo 1;
				// $this->load->library('email'); 
				// $config['protocol'] = 'smtp';
				// $config['smtp_host'] = 'smtp.hostinger.com';
				// $config['smtp_port'] = '465';
				// $config['smtp_user'] = 'verification@planktox.in';
				// $config['smtp_pass'] = 'Thisisnot0k@123';
				// $this->email->initialize($config);
				// $from_email = "verification@planktox.in"; 
				// $to_email = "vermamahak44@gmail.com";
				// $this->email->from($from_email, 'Your Name'); 
				// $this->email->to($to_email);
				// $this->email->subject('Email Test'); 
				// $this->email->message('Testing the email class.');  
				// if($this->email->send()) 
				// {
				// echo 4;
				// } 
				// else 
				// {
				// echo show_error($this->email->print_debugger());;
				// }
			} else {
				echo 0;
			}
		}
	}
	public function verify_otp_forgot_password(){
		$otp = $this->input->post('forgot_otp');
		$email = $this->session->userdata('user_forgot_password_email');
		$otp_entry = $this->db->where(['email' => $email, 'otp' => $otp,'status'=>0])->get('get_otp')->row();
		if($otp_entry) {
			$current_time = time();
			$otp_creation_time = strtotime($otp_entry->created_at);
			//echo $otp_creation_time;die();
			$time_difference = $current_time - $otp_creation_time;
			//echo $time_difference;die();
			if($time_difference <= 86400) {
				echo 1; // OTP is valid
				$update_otp_array=$this->db->where('email',$email)->update('get_otp',array('status'=>1));
				
			} else {
				echo 0; // OTP has expired
			}
		} else {
			echo 2; // OTP is invalid
		}
	}
	public function change_otp_password(){
		$password=$this->input->post('forgot_password');
		$email = $this->session->userdata('user_forgot_password_email');
		$user_data=$this->db->where('email_id',$email)->get('tbl_users')->row();
		$update_response=$this->db->where('email_id',$user_data->email_id)->update('tbl_users',array('password'=>md5($password)));
        if($update_response){
          echo 1;
		  $this->session->unset_userdata('user_forgot_password_email');
		}else{
             echo 0;
		}
	}
	public function add_social_media_old() {
		$linkdin_id = trim($this->input->post('linkdin_id'));
		$facebook_id = trim($this->input->post('facebook_id'));
		$twitter_id = trim($this->input->post('twitter_id'));
		$pinterest_id = trim($this->input->post('pinterest_id'));
		$instragram_id = trim($this->input->post('instragram_id'));
		$user_id = $this->session->userdata('user_id');
		$social_media_data = $this->UM->get_single_data('social_media', '1', $user_id);
		
		$array = array(
			'facebook_id' => !empty($facebook_id) ? $facebook_id : null,
			'linkdin_id' => !empty($linkdin_id) ? $linkdin_id : null,
			'twitter_id' => !empty($twitter_id) ? $twitter_id : null,
			'pinterest_id' => !empty($pinterest_id) ? $pinterest_id : null,
			'instragram_id' => !empty($instragram_id) ? $instragram_id : null,
			'user_id' => $user_id,
			'status' => 1
		);
		
		if (!empty($social_media_data)) {
			$result = $this->db->where('user_id', $user_id)->update('social_media', $array);
			//echo $this->db->last_query(); die();
			//echo 'update';
			redirect($_SERVER["HTTP_REFERER"]);
		} else {
			$result = $this->db->insert('social_media', $array);
			redirect($_SERVER["HTTP_REFERER"]);
		}
	}
	public function add_social_media() {
		$linkdin_id = trim($this->input->post('linkdin_id'));
		$facebook_id = trim($this->input->post('facebook_id'));
		$twitter_id = trim($this->input->post('twitter_id'));
		$pinterest_id = trim($this->input->post('pinterest_id'));
		$instragram_id = trim($this->input->post('instragram_id'));
		$user_id = $this->session->userdata('user_id');
		$social_media_data = $this->UM->get_single_data('social_media', '1', $user_id);
	
		// Validation patterns
		$validators = [
			'linkedin' => '/^https:\/\/www\.linkedin\.com\/in\/[a-zA-Z0-9-]+\/?$/',
			'facebook' => '/^https:\/\/www\.facebook\.com\/profile\.php\?id=\d+(&mibextid=\w+)?$/',
			'twitter' => '/^https:\/\/twitter\.com\/[a-zA-Z0-9_]+\/?$/',
			'pinterest' => '/^https:\/\/in\.pinterest\.com\/[a-zA-Z0-9-_]+\/?$/',
			'instagram' => '/^https:\/\/www\.instagram\.com\/[a-zA-Z0-9_.]+\/?$/'
		];
	
		$errors = [];
	
		// Validate LinkedIn
		if (!empty($linkdin_id) && !preg_match($validators['linkedin'], $linkdin_id)) {
			$errors[] = 'Invalid LinkedIn URL';
		}
	
		// Validate Facebook
		if (!empty($facebook_id) && !preg_match($validators['facebook'], $facebook_id)) {
			$errors[] = 'Invalid Facebook URL';
		}
	
		// Validate Twitter
		if (!empty($twitter_id) && !preg_match($validators['twitter'], $twitter_id)) {
			$errors[] = 'Invalid Twitter URL';
		}
	
		// Validate Pinterest
		if (!empty($pinterest_id) && !preg_match($validators['pinterest'], $pinterest_id)) {
			$errors[] = 'Invalid Pinterest URL';
		}
	
		// Validate Instagram
		if (!empty($instragram_id) && !preg_match($validators['instagram'], $instragram_id)) {
			$errors[] = 'Invalid Instagram URL';
		}
	
		// If there are validation errors, redirect back with errors
		if (!empty($errors)) {
			$this->session->set_flashdata('errors', $errors);
			redirect($_SERVER["HTTP_REFERER"]);
			return;
		}
	
		$array = [
			'facebook_id' => !empty($facebook_id) ? $facebook_id : null,
			'linkdin_id' => !empty($linkdin_id) ? $linkdin_id : null,
			'twitter_id' => !empty($twitter_id) ? $twitter_id : null,
			'pinterest_id' => !empty($pinterest_id) ? $pinterest_id : null,
			'instragram_id' => !empty($instragram_id) ? $instragram_id : null,
			'user_id' => $user_id,
			'status' => 1
		];
	
		if (!empty($social_media_data)) {
			$result = $this->db->where('user_id', $user_id)->update('social_media', $array);
		} else {
			$result = $this->db->insert('social_media', $array);
		}
	
		redirect($_SERVER["HTTP_REFERER"]);
	}
	
}




