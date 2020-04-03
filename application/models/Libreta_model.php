<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Libreta_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
		$this->load->database();
    }

    public function get_date_libreta($fecha, $codigo)
    {
        // $this->db->select('transferencias.fecha, cp.nombre_club as nombre_club_proviene, cd.nombre_club as nombre_club_destino');
        $this->db->from('libreta');
        $this->db->where('fecha_nacimiento', $fecha);
        $this->db->where('codigo', $codigo);
        // $this->db->order_by('fecha', 'desc');
        $query = $this->db->get();

        if ($query->row()) {
            return true;
        } else {
            return false;
        }

        // return $query->row();
    }
    
}