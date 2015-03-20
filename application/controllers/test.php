<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/My_Controller.php';
class test extends CI_Controller {

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
		$this->load->library('unit_test');
		
		$str = '
			<table border="0" cellpadding="4" cellspacing="1">
			    {rows}
			        <tr>
			        <td>{item}</td>
			        <td>{result}</td>
			        </tr>
			    {/rows}
			</table>';
		
		//$this->unit->set_template($str);
		
		$test = 1 + 1;
		
		$expected_result = 2;
		
		$test_name = 'Adds one plus one';
		
		$this->unit->run($test, $expected_result, $test_name);
		
		echo $this->unit->report();
		//$this->load->view('pages/' . $this->data['router'] . '/list', $this->data);
		//$this->load->view('templates/footer', $this->data);
	
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */