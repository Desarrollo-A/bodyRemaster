<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('modelLogin');
		$this->load->database('default');
	}

	public function index(){
        switch ($this->session->userdata('id_rol')) {
            case '':
                $data['token'] = $this->token();
                $data['titulo'] = 'Login con roles de usuario en codeigniter';
                $this->load->view('template/login',$data);
            break;
            case '1': // ADMINISTRADOR
            case '2': // VENDEDOR
            case '3': // ENFERMERA
            case '4': // RECEPCIONISTA
            case '5': // SUPER ADMINISTRADOR
            case '6': // CONTROL INTERNO
            case '7': // MARKETING DIGITAL
                redirect(base_url().'Dashboard');
            break;
            default:
                $data['titulo'] = 'Login con roles de usuario en codeigniter';
                $this->load->view('template/login',$data);
            break;
        }
    }

	public function token(){
		$token = md5(uniqid(rand(),true));
		$this->session->set_userdata('token',$token);
		return $token;
	}

	public function validateUser(){
		if($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')){
			$this->form_validation->set_rules('username', 'nombre de usuario', 'required|trim|min_length[2]|max_length[150]|xss_clean');
			$this->form_validation->set_rules('password', 'password', 'required|trim|min_length[5]|max_length[150]|xss_clean');
			$this->form_validation->set_message('required', 'El %s es requerido');
			$this->form_validation->set_message('max_length', 'El %s debe tener al menos %s carácteres');

            $usuario = $this->input->post('usuario');
            $contrasena = $this->input->post('contrasena');
            $check_user = $this->modelLogin->login_user($usuario,$contrasena);

            if(empty($check_user)){
                $this->session->set_userdata('errorLogin', 33);
                redirect(base_url());
            }
            else if ($check_user == TRUE){
                $data = array(
                    'id_usuario'    =>  $check_user[0]->id_usuario,
                    'nombre'        =>  $check_user[0]->nombre,
                    'id_rol'        => 	$check_user[0]->id_rol,
                );

                $this->session->set_userdata($data);
                $this->index();
            }
		}
		else{
			redirect(base_url().'login');
		}
	}

	public function logout_ci(){
		$this->session->sess_destroy();
		echo '<script>localStorage.clear()</script>';
		redirect(base_url().'login');
	}
}
