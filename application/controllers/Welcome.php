<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('UserModel');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->view('register');
    }
    public function all_users(){
        $this->load->view('index');
    }

    public function register()
{
    $this->form_validation->set_rules('name', 'Name', 'required');
    $this->form_validation->set_rules('contact_no', 'Mobile No.', 'required|min_length[10]');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[register_user.email]',
        array(
            'required' => 'You have not provided %s',
            'is_unique' => 'This %s already exists.'
        )
    );
    $this->form_validation->set_rules('password', 'Password', 'required');

    if ($this->form_validation->run() == FALSE) {
        // If validation fails, return validation errors
        $errors = validation_errors();
        echo json_encode(['status'=>0, 'message'=>$errors]);
        exit;
    } else {
        // If validation passes, proceed with registration
        $data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'contact' => $this->input->post('contact_no'),
            'password' => $this->input->post('password')    
        );
        $this->UserModel->register_user($data);
        echo json_encode(['status'=>1]);
        exit;
    }
}

public function delete_user() {
    $userId = $this->input->post('user_id');
    $this->UserModel->delete_user($userId);
    redirect(base_url('Welcome/all_users'));
}



}
?>
