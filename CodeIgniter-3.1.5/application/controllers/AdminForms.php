<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminForms extends CI_Controller {
  function __Construct(){
	parent::__Construct();
	$this->load->helper(array('form', 'url'));
	$this->load->library(array('session', 'form_validation', 'email','upload')); 
	$this->load->database();
	$this->load->model('Admin_model');
	}   

	function addCats(){
		//Adds the categories from add-ct.php

		// Assign Post objects to variable
		// Check if one or both are empty
		// feed variables to Model for insert
		// set flash message and send user back to add-ct.php with flash message


	}

	function addTags(){
		$tags = $this->input->post('tags',true);
		
		//If successfully added
		if($this->Admin_model->insertTags($tags)){
		//Refresh the page
			redirect(base_url().'tags', 'refresh');
		
		}

	}



} // end of AdminForms
?>