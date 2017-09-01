<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Outro extends CI_Controller {
	public function index() {
		//phpinfo();
		//exit();
		$this->load->view("hello_world");
	}
	public function yey() {
		$this->load->view("outro");
	}
}
?>