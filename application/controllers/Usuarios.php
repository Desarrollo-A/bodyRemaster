<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->model(array('modelUsuarios'));
		$this->load->helper('url');
        $this->load->library(array('getmenu'));
        date_default_timezone_set("America/Mexico_City");
	}

	public function index()
	{
		$this->load->view('template/header');
		$datos = $this->getmenu->get_menu_data();
		$this->load->view('template/sidebar', $datos);
		$this->load->view('Usuarios/viewUsuarios');
	}
}
