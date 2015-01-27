<?php defined('BASEPATH') or exit('No direct script access allowed');

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


    /**
     * Constructor function
     * @todo Document more please.
     */
    public function __construct($config = 'rest')
    {
        parent::__construct();
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
        
        if(!$current_user 
        		&& strtolower( $current_url) != 'user/login'  
        		&& strtolower( $current_url) != 'user/register'){
        	//redirect('../user/login', 'refresh');
        }
        else
        {
        	//$this->data['user'] = $current_user;
        }
        

    }



}
