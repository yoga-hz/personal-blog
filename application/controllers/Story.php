<?php
class Story extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('Story_model');
    $this->load->database();
  }

  public function index()
  {
    $data['title'] = "Story";
    $data['posts'] = $this->Story_model->get_all_posts();
    $data['category'] = $this->Story_model->get_post_category();

    $this->load->view('templates/header', $data);
    $this->load->view('story/index', $data);
    $this->load->view('templates/footer');
  }

  public function write()
  {
    $this->load->helper('form');
    $this->load->library('form_validation');

    $data['title'] = "Write new Story";

    $this->form_validation->set_rules('post_title', 'Title', 'required');
    $this->form_validation->set_rules('main_post', 'Post', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('story/write');
      $this->load->view('templates/footer');
    } else {
      $this->Story_model->add_story();
      redirect('story');
    }
  }

  public function stories($slug)
  {
    $data['title'] = $this->Story_model->get_post_title($slug);
    $data['stories'] = $this->Story_model->get_post_detail($slug);
    $data['category'] = $this->Story_model->get_post_category();

    $this->load->view('templates/header', $data);
    $this->load->view('story/stories', $data);
    $this->load->view('templates/footer');
  }

  public function category($_category)
  {
    $data['title'] = "Post with category " . $_category;
    $data['post_category'] = $this->Story_model->get_post_with_category($_category);
    $data['category'] = $this->Story_model->get_post_category();

    $this->load->view('templates/header', $data);
    $this->load->view('story/category', $data);
    $this->load->view('templates/footer');
  }
}
