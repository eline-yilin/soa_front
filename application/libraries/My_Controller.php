<?php defined('BASEPATH') or exit('No direct script access allowed');
include('log4php/Logger.php');


/**
 * CodeIgniter Rest Controller
 *
 * A fully RESTful server implementation for CodeIgniter using one library, one config file and one controller.
 *
 * @package        	CodeIgniter
 * @subpackage    	Libraries
 * @category    	Libraries
 * @author        	Phil Sturgeon, Chris Kacerguis
 * @license         MIT
 * @link			https://github.com/chriskacerguis/codeigniter-restserver
 * @version         3.0.0-pre
 */
abstract class My_Controller extends CI_Controller
{
    /**
     * This defines the rest format.
     *
     * Must be overridden it in a controller so that it is set.
     *
     * @var string|null
     */
    protected $rest_format          = null;

    protected $data = array();

    protected function uploadImg($input_name, &$error){
    	if ( ! $this->upload->do_upload($input_name))
    	{
    		$error = $this->upload->display_errors();
    		return  false;
    	}
    	else
    	{
    		$this->data['upload_data'] = $this->upload->data();
    		$filepath = $this->data['upload_data']['file_name'];
    		return $filepath;
    
    		//$this->load->view('upload_success', $this->data);
    	}
    }

    /**
     * Constructor function
     * @todo Document more please.
     */
    public function __construct($config = 'rest')
    {
        parent::__construct();
        
//         Logger::configure('D:/e_work/soa_front/application/libraries/log4php/config.xml');
        
//         $logger = Logger::getLogger("main");
//         $logger->info("This is an informational message.");
//         $logger->warn("I'm not feeling so good...");
        
        $this->load->helper('api');
        $this->lang->load('general', 'chinese');
        $this->load->library('session');
        $this->load->helper('url');
        $router = $this->router->class;
        $action = $this->router->method;

        
        $this->data['router'] = $router;
        $this->data['action'] = $action;
        
        $current_url = $router . '/' . $action;
        //$this->session->unset_userdata('user');
        $current_user = $this->session->userdata('user');
        $exception_arr = array(
        		'user/login',
        		'user/register',
        		'welcome/index'
        		
        );
        if(!in_array($current_url , $exception_arr)){
        	$this->session->set_userdata('current_url', uri_string());
        }
        if(!$current_user 
        		&& !in_array($current_url , $exception_arr)){
        	redirect('../user/login', 'refresh');
        }
        else
        {
        	$this->data['user'] = $current_user;
        }
        
    }



}
