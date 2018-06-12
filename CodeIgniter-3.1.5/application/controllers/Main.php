<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

  function __Construct(){
	parent::__Construct();
	$this->load->helper(array('form', 'url'));
	$this->load->library(array('session', 'form_validation', 'email','upload')); 
	$this->load->database();
	$this->load->model('Admin_model');
	}  
	
	
	public function index()
	{

		$data['title'] = 'Web Developer. World Traveler. Nerd. | Anthony Stenberg-Di Geronimo | Seattle, WA';
		$this->load->view('main/home',$data);
	}// end of function index()

	public function about()
	{

		$data['title'] = 'About | Web Developer. World Traveler. Nerd. | Anthony Stenberg-Di Geronimo | Seattle, WA';
		$this->load->view('main/home',$data);
	}// end of function about()

	public function contact()
	{

		$data['title'] = 'Contact | Web Developer. World Traveler. Nerd. | Anthony Stenberg-Di Geronimo | Seattle, WA';
		$this->load->view('main/home',$data);
	}// end of function contact()

	public function resources()
	{

		$data['title'] = 'Resources | Web Developer. World Traveler. Nerd. | Anthony Stenberg-Di Geronimo | Seattle, WA';
		$this->load->view('main/resources',$data);
	}// end of function resources()

	public function portfolio()
	{
		$data['title'] = 'Portfolio | Web Developer. World Traveler. Nerd. | Anthony Stenberg-Di Geronimo | Seattle, WA';
		$this->load->view('main/home',$data);
	} // end of function portfolio()

	public function blog()
	{
		$data['title'] = 'Blog | Web Developer. World Traveler. Nerd. | Anthony Stenberg-Di Geronimo | Seattle, WA';
		$this->load->view('main/home',$data);
	} // end of function blog()

}