<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller {
    protected $success = true;
	protected $message = '';
	protected $entity  = 'users';
    protected $entityId  = 'user_id';
    
    public function __construct()
    {
        parent::__construct();
        
        $this->load->library('form_validation');
        $this->load->model('Auth_Model');

        $user_data = $this->session->userdata('user_data');

		if(!empty($user_data) && $this->uri->segment(1) != 'logout'){
            redirect('dashboard');
        }
    }
    
	public function index()
	{
		$data['title'] = "Login - " . SETTINGS['title'];
		return view('login', $data);
    }
    
    public function signup()
    {
        $data['title'] = "Registration - " . SETTINGS['title'];
		return view('signup', $data);
    }
        
    public function signin_post()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        
        if ($this->form_validation->run() == FALSE)
        {
            // Data
            $this->session->set_flashdata('data_username', set_value('username'));
            // Notif
            $this->session->set_flashdata('error_username', form_error('username'));
            $this->session->set_flashdata('error_password', form_error('password'));
            redirect('login');
        }
        else
        {
            $data = [
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => md5(htmlspecialchars($this->input->post('password', true)))
            ];

            $login = $this->Auth_Model->login($data);

            if($login){
                if($login['is_active'] == 0){
                    $this->session->set_flashdata(
                            'alert_login', 
                            '<div class="alert alert-warning" role="alert">
                                Account not active.
                            </div>');
                    redirect('login');
                }else{
                    $dataSession = array(
                        'user_data' => array(
                            'user_id'		=> $login['id'],
                            'username'		=> $login['username']
                        )
                    );
                    $this->session->set_userdata($dataSession);
                    $this->Auth_Model->updateLogin($login['id']);
                    redirect('dashboard');
                }
            }
            else{
                $this->session->set_flashdata(
                        'alert_login', 
                        '<div class="alert alert-danger" role="alert">
                            Username or Password is wrong.
                        </div>');
                redirect('login');
            }
        } 
    }
    
    public function signup_post()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[6]');
        $this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email|is_unique[users.email]', [
            'is_unique' => 'The E-mail already registered.'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[10]');
        $this->form_validation->set_rules('re_password', 'Repeat Password', 'trim|required|matches[password]');
        
        if ($this->form_validation->run() == FALSE)
        {
            // Data
            $this->session->set_flashdata('data_username', set_value('username'));
            $this->session->set_flashdata('data_email', set_value('email'));
            // Notif
            $this->session->set_flashdata('error_username', form_error('username'));
            $this->session->set_flashdata('error_email', form_error('email'));
            $this->session->set_flashdata('error_email', form_error('email'));
            $this->session->set_flashdata('error_password', form_error('password'));
            $this->session->set_flashdata('error_repassword', form_error('re_password'));
            redirect('signup');
        }
        else
        {
            $data = [
                'username' => htmlspecialchars($this->input->post('username', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'password' => md5(htmlspecialchars($this->input->post('password', true)))
            ];
            $this->db->insert('users', $data);
            // Notif
            $this->session->set_flashdata(
                    'registered', 
                    '<div class="alert alert-success" role="alert">
                        Account Registered, please wait for activation.
                    </div>');
            redirect('login');
        } 
    }

    public function logout()
	{
		$this->session->unset_userdata('user_data');
        $this->session->sess_destroy();
        // Notif
        $this->session->set_flashdata(
            'registered', 
            '<div class="alert alert-success" role="alert">
                You are is logout.
            </div>');
		redirect('login');
	}
}