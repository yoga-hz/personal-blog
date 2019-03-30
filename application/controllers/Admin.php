<?php
class Admin extends CI_Controller
{
    public function __construct() //Load neccesary library and helper
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Admin_model');
        $this->load->helper('form');
    }

    public function index() //Default method direct to Login page
    {
        $this->form_validation->set_rules('emailaddress', 'Email', 'required|valid_email|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $data['page_title'] = "Login Page";

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/auth_header', $data);
            $this->load->view('admin/login');
            $this->load->view('templates/auth_footer');
        } else {
            $this->login();
        }
    }

    public function write() //Method for creating new post/story
    {
        $data['title'] = "Write new Story";

        $this->form_validation->set_rules('post_title', 'Title', 'required');
        $this->form_validation->set_rules('main_post', 'Post', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('story/write');
            $this->load->view('templates/footer');
        } else {
            $this->Admin_model->add_story();
            redirect('story');
        }
    }

    private function login() //Method for Login with active user, here
    {
        $email = $this->input->post('emailaddress');
        $pass = md5($this->input->post('password'));

        $row = $this->db->get_where('users', ['email' => $email])->row_array();
        if ($row) {
            if ($row['is_active'] == 1) {
                if ($row['password'] == $pass) {
                    $data = [
                        'email' => $row['email'],
                        'role_id' => $row['role_id']
                    ];
                    $this->session->set_userdata($data);
                    redirect('admin/dashboard');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger mt-2">Wrong password!</div>');
                    redirect('admin');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger mt-2">Email is not activated yet!</div>');
                redirect('admin');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger mt-2">Email is not registered!</div>');
            redirect('admin');
        }
    }

    public function register() //Method for Register new user here
    {
        $this->form_validation->set_rules('full_name', 'Full Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]|matches[repassword]', [
            'matches' => 'Password doesn\'t match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('repassword', 'Password', 'required|trim|matches[password]');


        if ($this->form_validation->run() == false) {
            $data['page_title'] = "Register Page";
            $this->load->view('templates/auth_header', $data);
            $this->load->view('admin/register');
            $this->load->view('templates/auth_footer');
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('full_name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => 'default.jpg',
                'password' => md5($this->input->post('password')),
                'role_id' => 1,
                'is_active' => 1,
                'date_created' => time()
            ];
            $this->db->insert('users', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable fade show mt-2" role="alert">Congratulation you have new account!, Please login<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button></div>');
            redirect('admin');
        }
    }

    public function logout() // Method for remove any user session and redirect to Login page
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable fade show mt-2" role="alert">You\'ve been logged out!<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button></div>');
        redirect('admin');
    }

    public function dashboard() // This Method show dashboard page after user admin sign in
    {
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['page_title'] = 'Dashboard';
        $data['post'] = $this->Admin_model->total_posts();

        if (is_null($this->session->userdata('email'))) {
            $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissable fade show mt-2" role="alert">Logged out! No active session detected!<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button></div>');
            redirect('admin');
        } else {
            $this->load->view('templates/dash_header', $data);
            $this->load->view('admin/dashboard', $data);
            $this->load->view('templates/dash_footer');
        }
    }

    public function edit()
    {
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['page_title'] = 'Edit Profile';

        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/dash_header', $data);
            $this->load->view('admin/edit', $data);
            $this->load->view('templates/dash_footer');
        } else {
            // $this->Admin_model->update_profile();
            $name = $this->input->post('name', true);
            $email = $this->input->post('email');

            $upload_img = $_FILES['image']['name'];
            //checking there is picture or not to be uploaded
            if ($upload_img) {
                $config['upload_path'] = './assets/img/profile/';
                $config['allowed_types'] = 'png|jpg|gif';
                $config['max_size'] = '1024';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_img = $data['user']['image'];
                    if ($old_img != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_img);
                    }

                    $new_img = $this->upload->data('file_name');
                    var_dump($new_img);
                    die;
                    $this->db->set('image', $new_img);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('name', $name);
            $this->db->where('email', $email);
            $this->db->update('users');

            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable fade show mt-2" role="alert">Your profile information has been updated!<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/dashboard');
        }
    }
}
