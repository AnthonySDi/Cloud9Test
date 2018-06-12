<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MainForms extends CI_Controller {

  function __Construct(){
	parent::__Construct();
	$this->load->helper(array('form', 'url'));
	$this->load->library(array('session', 'form_validation', 'email','upload')); 
	$this->load->database();
	$this->load->model('Admin_model');
	}  


}// end of MainForm controller
?>