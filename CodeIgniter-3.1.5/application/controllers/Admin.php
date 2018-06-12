<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
  function __Construct(){
	parent::__Construct();
	$this->load->helper(array('form', 'url'));
	$this->load->library(array('session', 'form_validation', 'email','upload')); 
	$this->load->database();
	$this->load->model('Admin_model');
	}   
  public function index()
  {
	
	$this->load->view('admin/new-admin');
  }

  public function registration()
  {
	//validate input value with form validation class of codeigniter
	$this->form_validation->set_rules('AdminName', 'Name', 'required');
	$this->form_validation->set_rules('AdminEmail', 'Email', 'required|valid_email|is_unique[Administration.AdminEmail]');
	$this->form_validation->set_rules('AdminPassword', 'Password', 'required|min_length[6]|max_length[15]');
	$this->form_validation->set_rules('confirmpswd', 'Password Confirmation', 'required|matches[AdminPassword]');

		//$this->form_validation->set_message('is_unique', 'This %s is already exits');
		if ($this->form_validation->run() == FALSE)
		{
			
			$this->load->view('admin/new-admin');
		}
		else
		{
			$AdminName = $_POST['AdminName'];
			$AdminEmail = $_POST['AdminEmail'];
			$AdminPassword = $_POST['AdminPassword'];
			$passhash = hash('md5', $AdminPassword);
			
			//md5 hashing algorithm to decode and encode input password
			//$salt       = uniqid(rand(10,10000000),true);
	  $saltid = md5($AdminEmail);
	  $status = 1;
	  $data = array('AdminName' => $AdminName,
			  'AdminEmail' => $AdminEmail,
			  'AdminPassword' => $passhash,
			  'AdminStatus' => $status);
		if($this->Admin_model->insertuser($data))
		{
			if(!$this->sendemail($AdminEmail, $saltid))
			{
			  // successfully sent mail to user email
						$this->session->set_flashdata('msg','<div class="alert alert-success text-center">Please confirm the mail sent to your email id to complete the registration.</div>');
						redirect(base_url());
			}
			else
			{
			  $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Please try again ...</div>');
						redirect(base_url());
					}
			}
			else
			{
			$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Something Wrong. Please try again ...</div>');
						redirect(base_url());
			}
		}
	}

  function sendemail($AdminEmail,$saltid){
	// configure the email setting
	$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'ssl://smtp.gmail.com'; //smtp host name
		$config['smtp_port'] = '465'; //smtp port number
		$config['smtp_user'] = 'stenbergdigeronimo@gmail.com';
		$config['smtp_pass'] = 'Screwyougoogle1!'; //$from_email password
		$config['mailtype'] = 'html';
		$config['charset'] = 'iso-8859-1';
		$config['wordwrap'] = TRUE;
		$config['newline'] = "\r\n"; //use double quotes
		$this->email->initialize($config);
		$url = base_url()."admin/confirmation/".$saltid;
		$this->email->from('stenbergdigeronimo@gmail.com', 'Capstone Project');
	$this->email->to($AdminEmail); 
	$this->email->subject('Please Verify Your Email Address');
	$message = "<html><head><head></head><body><p>Hi,</p><p>Thanks for registration with Giraffe Heroes.</p><p>Please click below link to verify your email.</p>".$url."<br/><p>Sincerely,</p><p>CodesQuery Team</p></body></html>";
	$this->email->message($message);
	return $this->email->send();
	}

	public function confirmation($key)
	{
		if($this->Admin_model->verifyemail($key))
		{
			$this->session->set_flashdata('msg','<div class="alert alert-success text-center">Your Email Address is successfully verified!</div>');
			redirect(base_url());
		}
		else
		{
			$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Your Email Address Verification Failed. Please try again later...</div>');
			redirect(base_url());
		}
	}

	public function login()
	{
		$data['title'] = 'Admin Login | Web Developer. World Traveler. Nerd. | Anthony Stenberg-Di Geronimo | Seattle, WA';
		$this->load->view('admin/login', $data);
	
	}


	public function check_login()
	{
		if($this->session->userdata('loggedIn') != '1')
		{
			$AdminEmail = $_POST['email'];
			$pass = hash('md5', $_POST['password']);
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[15]');

			if($this->form_validation->run() == FALSE)
			{
				$data['title'] = 'Admin Login | Web Developer. World Traveler. Nerd. | Anthony Stenberg-Di Geronimo | Seattle, WA';
				$this->load->view('admin/login',$data);
			
			}
			else
			{
				$res = $this->Admin_model->check_user($AdminEmail , $pass);
				if(!empty($res))
				{
					if($res[0]['AdminStatus'] == '1')
					{
						$posts = $this->Admin_model->getPosts();

						$data['yourPosts'] = $posts;
						//$giraffes = $this->Admin_model->GetGNForDash();
						$data['title'] = 'Dashboard | Web Developer. World Traveler. Nerd. | Anthony Stenberg-Di Geronimo | Seattle, WA';
						$data['AdminName'] = $res[0]['AdminName'];
						//$data['names'] = $giraffes;
						$this->setSession($res[0]['idAdmin'],$res[0]['AdminName']);
						$this->load->view('admin/dashboard', $data);
					
					}
					else
					{
						$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Verify your email address first to login...</div>');
					redirect(base_url().'admin/login');
					}
				}
				else
				{
					$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">email/password not found</div>');
				redirect(base_url().'admin/login');
				}
			}
		} // end of if($this->session->userdata('loggedIn') != '1')
		else
		{
			$data['AdminName'] = $this->session->userdata('AdminName');
			$data['title'] = 'Dashboard | Web Developer. World Traveler. Nerd. | Anthony Stenberg-Di Geronimo | Seattle, WA';
			$this->load->view('admin/dashboard', $data);
		} // end of else
	} // end of public function check_login()

	function setSession($userId,$userName) {
	
	$userSession = array('idAdmin'=>$userId,
						 'AdminName'=>$userName,
						 'loggedIn'=> True,
						 'Authorized' => True);
	$this->session->set_userdata($userSession);
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url().'admin/login', 'refresh');
	}

	public function profile(){
		if($this->session->userdata('loggedIn') == '1')
		{
			if($this->session->userdata('idAdmin') == '1'){
				
				$posts = $this->Admin_model->getPosts(); // Get My Posts? What about as a super user	
			}
			else
			{
				$posts = $this->Admin_model->getMyPosts($this->session->userdata('idAdmin'));
			}

			$data['yourPosts'] = $posts;
			$data['title'] = 'Dashboard | Web Developer. World Traveler. Nerd. | Anthony Stenberg-Di Geronimo | Seattle, WA';
			$data['AdminName'] = $this->session->userdata('AdminName');
			$this->load->view('admin/dashboard',$data);
		} // end if
		else
		{
			redirect(base_url() . 'login');

		} // end else


	}

	public function tags()
	{
		//Check if user is logged in
		if($this->session->userdata('loggedIn') == '1')
		{//then load page with list of Current Categories and Tags

			$tags = $this->Admin_model->getTags();

			$data['tags'] = $tags;
			$data['title'] = 'Blog Tags | Web Developer. World Traveler. Nerd. | Anthony Stenberg-Di Geronimo | Seattle, WA';
			$this->load->view('admin/tags', $data);

		}
		else
		{// else user is not logged in

			redirect(base_url() . 'login');

		} // end of the if/else statement to check if user is logged in 
			

	} // end of tags()

	public function cats()
	{
		//Check if user is logged in
		if($this->session->userdata('loggedIn') == '1')
		{//then load page with list of Current Categories and Tags

			$categories = $this->Admin_model->getCats();

			$data['categories'] = $categories;
			$data['title'] = 'Blog Categories | Web Developer. World Traveler. Nerd. | Anthony Stenberg-Di Geronimo | Seattle, WA';
			$this->load->view('admin/cats', $data);

		}
		else
		{// else user is not logged in

			redirect(base_url() . 'login');

		} // end of the if/else statement to check if user is logged in 
			

	} // end of cats()

	public function posts()
	{
		//Check if user is logged in
		if($this->session->userdata('loggedIn') == '1')
		{//then load page with list of Current Categories and Tags

			if($this->session->userdata('idAdmin') == '1'){
				$posts = $this->Admin_model->getPosts(); // Get My Posts? What about as a super user	
				
			}
			else
			{
				$posts = $this->Admin_model->getMyPosts($this->session->userdata('idAdmin'));
			}
			

			$data['posts'] = $posts;
			$data['title'] = 'Blog Categories | Web Developer. World Traveler. Nerd. | Anthony Stenberg-Di Geronimo | Seattle, WA';
			$this->load->view('admin/cats', $data);

		}
		else
		{// else user is not logged in

			redirect(base_url() . 'login');

		} // end of the if/else statement to check if user is logged in 
			

	} // end of posts()
	
	public function dashboard()
	{
		//Check if user is logged in
		if($this->session->userdata('loggedIn') == '1')
		{//then load page with list of Current Categories and Tags

			if($this->session->userdata('idAdmin') == '1'){
				$posts = $this->Admin_model->getPosts(); // Get My Posts? What about as a super user	
				
			}
			else
			{
				$posts = $this->Admin_model->getMyPosts($this->session->userdata('idAdmin'));
			}
			
			$data['yourPosts'] = $posts;
			$data['title'] = 'Dashboard | Web Developer. World Traveler. Nerd. | Anthony Stenberg-Di Geronimo | Seattle, WA';
			$data['AdminName'] = $this->session->userdata('AdminName');
			$this->load->view('admin/dashboard',$data);

		}
		else
		{// else user is not logged in

			redirect(base_url() . 'login');

		} // end of the if/else statement to check if user is logged in 
	} // end of public function dashboard()
	
	public function newPost()
	{
		//Check if user is logged in
		if($this->session->userdata('loggedIn') == '1')
		{//then load page with list of Current Categories and Tags

			$data['title'] = 'New Post | Web Developer. World Traveler. Nerd. | Anthony Stenberg-Di Geronimo | Seattle, WA';
			$this->load->view('admin/new-post.php',$data);

		}
		else
		{// else user is not logged in

			redirect(base_url() . 'login');

		} // end of the if/else statement to check if user is logged in 
		
	} // end of public function newPost()

} // the end
?>