<?php
class Admin extends CI_Controller
{
    public function __construct() // Load neccesary library and helper
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Admin_model');
        $this->load->helper(['form', 'url']);
    }

    public function index() // Default method direct to Login page
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

    private function login() // Method for Login with active user, here
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

    public function register() // Method for Register new user here
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

    public function edit() // Method for edit profile [not include Change Password]
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

            $upload_img = $_FILES['gambar'];
            //checking there is or not to be uploaded
            $config['upload_path'] = './assets/img/profile/';
            $config['allowed_types'] = 'png|jpg|gif|jpeg';
            $config['max_size'] = '2048';
            $this->load->library('upload', $config);

            if ($upload_img) {

                if ($this->upload->do_upload('gambar')) {
                    $old_img = $data['user']['image'];
                    if ($old_img != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_img);
                    }

                    $new_img = $this->upload->data('file_name');
                    $this->db->set('image', $new_img);
                } else {
                    echo $this->upload->display_errors();
                    die;
                }
            }
            $this->db->set('name', $name);
            $this->db->where('email', $email);
            $this->db->update('users');

            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable fade show mt-2" role="alert">Your profile information has been updated!<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/dashboard');
        }
    }

    public function all_posts() // Method for show all posts on table
    {
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['page_title'] = "All Posts";
        $data['posts'] = $this->Admin_model->get_all_posts();
        $this->load->view('templates/dash_header', $data);
        $this->load->view('admin/all_posts', $data);
        $this->load->view('templates/dash_footer');
    }

    public function new_post() // Method for creating new post
    {
        $data['page_title'] = "Create New Post";
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('post_title', 'Post Title', 'required|trim');
        $this->form_validation->set_rules('post_category', 'Category', 'trim');
        $this->form_validation->set_rules('post_main', 'Story', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/dash_header', $data);
            $this->load->view('admin/new_story', $data);
            $this->load->view('templates/dash_footer');
        } else {
            $this->Admin_model->add_story();
            $this->session->set_flashdata('message', '<div class="alert alert-success mt-2"><b>NEW</b> Story Added!</div>');
            redirect('admin/all_posts/');
        }
    }

    public function edit_post($_id_post) // Method for edit current post
    {
        $data['page_title'] = "Edit Post";
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['story'] = $this->Admin_model->get_post_byid($_id_post);

        $this->form_validation->set_rules('post_title', 'Post Title', 'required|trim');
        $this->form_validation->set_rules('post_category', 'Category', 'trim');
        $this->form_validation->set_rules('post_main', 'Story', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/dash_header', $data);
            $this->load->view('admin/edit_story', $data);
            $this->load->view('templates/dash_footer');
        } else {
            $this->Admin_model->update_story();
            $this->session->set_flashdata('message', '<div class="alert alert-success mt-2">Story <b>Updated!</b></div>');
            redirect('admin/all_posts/');
        }
    }

    public function delete_post($id_post) // Method for delete selected post
    {
        $row = $this->db->get_where('posts', ['id_posts' => $id_post])->num_rows();
        if ($row < 1) {
            show_404();
            die;
        } else {
            $this->db->delete('posts', ['id_posts' => $id_post]);
            $this->session->set_flashdata('message', '<div class="alert alert-success mt-2">Story <b>Deleted!</b></div>');
            redirect('admin/all_posts/');
        }
    }

    public function change_pass()
    {
        $data['page_title'] = "Change Password";
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('current_pass', 'Current Password', ['required', [
            'check_current_pass',
            function ($pass) {
                // $curr_pass = $this->input->post('current_pass');
                $cek = $this->db->get_where('users', ['email' => $this->session->userdata('email'), 'password' => md5($pass)])->num_rows();
                if ($cek > 0) {
                    return true;
                } else {
                    $this->form_validation->set_message('check_current_pass', 'Your {field} does\'nt match with your current account');
                    return false;
                }
            }
        ]]);
        $this->form_validation->set_rules('new_pass', 'New Password', 'min_length[8]|required|matches[conf_new_pass]');
        $this->form_validation->set_rules('conf_new_pass', 'Confrim Password', 'matches[new_pass]|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/dash_header', $data);
            $this->load->view('admin/edit_pass', $data);
            $this->load->view('templates/dash_footer');
        } else {
            // $curr_pass = md5($this->input->post('current_pass'));
            $new_pass = $this->input->post('new_pass');
            $pass = [
                'password' => md5($new_pass)
            ];
            $this->db->update('users', $pass, ['email' => $this->session->userdata('email')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success mt-2">Password <b>Updated!</b></div>');
            redirect('admin/dashboard/');
        }
    }
}
