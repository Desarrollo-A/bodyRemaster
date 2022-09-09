<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class modelLogin extends CI_Model {
	function __construct(){
		parent::__construct();
	}

    public function login_user($usuario,$password){
		$new_pass = encriptar($password);

        $query = $this->db->query("SELECT us.id_usuario, CONCAT(us.nombre, ' ', us.apellido_paterno, ' ', us.apellido_materno) AS nombre, us.id_rol
        FROM usuarios us
        WHERE us.usuario = '$usuario' AND us.contrasena  = '$new_pass' AND us.estatus in (1)");
		return $query->result();
	}

}