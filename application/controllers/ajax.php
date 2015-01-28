<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/My_Controller.php';
class ajax extends My_Controller {

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
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	public function index()
	{
		//$request_url = 'store/detail/id/1/format/json';
		$url = $_POST ['url'];
		$request = isset($_POST ['request']) ? $_POST ['request'] : array();
		$method = $_POST ['method'];
		$data = my_api_request($url , $method, $request);
		//$data = array();
		//$data = my_api_request
		
		header('Content-Type: application/json');
    	echo $data;
		//return $data;
		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */