<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class modelGeneral extends CI_Model {
	function __construct(){
		parent::__construct();
	}

    function get_menu($id_rol, $id_usuario){
		return $this->db->query("SELECT * FROM Menu WHERE rol = $id_rol AND estatus = 1 ORDER BY orden ASC");
    }

	function get_active_buttons($var, $id_rol){
        return $this->db->query("SELECT padre FROM Menu WHERE pagina = '$var' AND rol = $id_rol ");
    }
}