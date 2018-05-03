<?php
 
class User extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->helper('form');
    } 

    /*
     * Adding a new user
     */
    function register()
    {
        $this->load->library(array('form_validation', 'session'));
        $this->load->helper('url');

		$this->form_validation->set_rules('password','Password','required|max_length[255]');
		$this->form_validation->set_rules('username','Username','required|max_length[20]|is_unique[users.username]');
		$this->form_validation->set_rules('first_name','First Name','required|max_length[20]');
		$this->form_validation->set_rules('last_name','Last Name','required|max_length[20]');
		$this->form_validation->set_rules('email','Email','required|max_length[100]|valid_email');
        $this->form_validation->set_rules('phone','Phone','max_length[20]');
        
		if ($this->input->server('REQUEST_METHOD') == 'POST') {
            if($this->form_validation->run())     
            {
                $this->load->library('encrypt');
				$token = urlencode(base64_encode($this->input->post('username').'|'.$this->input->post('email')));
                $params = array(
                    'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                    'username' => $this->input->post('username'),
                    'first_name' => $this->input->post('first_name'),
                    'last_name' => $this->input->post('last_name'),
                    'email' => $this->input->post('email'),
                    'phone' => $this->input->post('phone'),
                    'created' => time(),
                    'remember_token' => $token
                );
                
                $user_id = $this->User_model->add_user($params);
                if ($user_id) {
                    $sendgrid = new SendGrid("SENDGRID_APIKEY");
                    $email    = new SendGrid\Email();

                    $url = base_url('/user/email_confirmation/'.$token);
                    $html = sprintf('Hi %s, <br> Thankyou for registration! <br><br> Please click link below for confirmation.<br><br>%s', $this->input->post('username'), $url);
                    $email->addTo($this->input->post('email'))
                        ->setFrom("admin@site.com")
                        ->setSubject("Site Registration")
                        ->setHtml($html);

                    $sendgrid->send($email);
                }
                $this->session->set_flashdata('success', 'Registration success!');
                
                redirect('user/register');
            }
            else
            {          
                $this->session->set_flashdata('error', 'Registration fail!');
            }
        }

        $data['_view'] = 'users/register';
        $this->load->view('layouts/main',$data);
    }

    public function email_confirmation($token = '')
    {
        $user = $this->User_model->find_by_field(array('token' => $token));
    }

}
