<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct() {

        parent::__construct();
        $this->load->Model('Libreta_model','libreta_model');
    }


	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function libreta()
	{
		$f_nacimiento = $this->input->post('fecha_nacimiento');
		$code = $this->input->post('codigo_libreta');

		$bandera = $this->libreta_model->get_date_libreta($f_nacimiento, $code);
		// print_r($bandera);
		// exit();
		$direccion = '';

		if ($bandera) {
			$path = FCPATH.'doc/';

			// Arreglo con todos los nombres de los archivos
			$files = array_diff(scandir($path), array('..', '.'));

			foreach($files as $file){
			    // Divides en dos el nombre de tu archivo utilizando el . 
			    $data          = explode(".", $file);
			    // Nombre del archivo
			    $fileName      = $data[0];
			    // Extensión del archivo 
			    $fileExtension = $data[1];

			    if($code == $fileName){
			    	// echo json_encode(array("status" => TRUE, "dir" => $path.$fileName.'.'.$fileExtension));

			    	header('Content-type: application/pdf');
					header('Content-Disposition: attachment; filename="'.$fileName.'.'.$fileExtension.'"');
					header('Content-Transfer-Encoding: binary');
					header('Content-Length: ' . filesize($path.$fileName.'.'.$fileExtension));
					readfile($path.$fileName.'.'.$fileExtension);

			    	echo json_encode(array("status" => TRUE, "dir" => $path.$fileName.'.'.$fileExtension));
			    	break;
			    }
			}
		} else {
			$div = '<div class="callout callout-warning ">
                  <h4>Archivo no encontrado</h4>
                  <h4>Revise los datos ingresados.</h4>
                </div>';
			echo json_encode(array("status" => FALSE, "error" => 'error no hay', 'div' => $div));
		}
		
	}
}
