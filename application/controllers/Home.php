<?php
  class Home extends CI_Controller {
    function __construct()
    {
      parent::__construct();
      $this->load->model('Story_model');
    }
    
    public function index() 
    {
      $this->load->database();

      $data['title'] = "Home";
      $data['posts'] = $this->Story_model->get_all_posts();
      $data['category'] = $this->Story_model->get_post_category();
      
      $this->load->view('templates/header', $data);
      $this->load->view('home/index', $data);
      $this->load->view('templates/footer');
    }
  }
