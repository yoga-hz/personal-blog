<?php
class About extends CI_Controller
{

  public function index()
  {
    $data['title'] = "About";
    $this->load->view("templates/header", $data);
    $this->load->view("about/index");
    $this->load->view("templates/footer");
  }
}

