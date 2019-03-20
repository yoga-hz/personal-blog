<?php 
  class Admin extends CI_Controller
  {
    public function index()
    {
      $data['page_title'] = "Login Page";
      $this->load->view('templates/auth_header', $data);
      $this->load->view('admin/login');
      $this->load->view('templates/auth_footer');
    }
  }
  
?>