<?php
class Story_model extends CI_Model
{

	public function get_all_posts()
	{
		return $this->db->select('*')->from('posts')
			->order_by('date', 'DESC')
			->get()
			->result_array();
	}
	public function get_post_with_category($__category)
	{
		return $this->db->select('*')->from('posts')
			->where('category', $__category)
			->order_by('date', 'DESC')
			->get()
			->result_array();
	}

	public function get_post_category()
	{
		return $this->db->select('category')->from('posts')
			->group_by('category')
			->get()
			->result_array();
	}

	public function get_post_title($_slug)
	{
		return $this->db->select('title')->get_where('posts', ['slug' => $_slug])->row();
	}

	public function get_post_detail($__slug)
	{
		return $this->db->select('*')->from('posts')
			->where('slug', $__slug)
			->get()
			->row_array();
	}

	public function add_story()
	{
		$category_post = $this->input->post('post_category', true);
		if (empty($category_post)) {
			$data = array(
				'title' => $this->input->post('post_title', true),
				'post' => $this->input->post('main_post', false),
				'category' => 'uncategorized',
				'slug' => url_title($this->input->post('post_title', true), '-', true)
			);
		} else {
			$data = array(
				'title' => $this->input->post('post_title', true),
				'post' => $this->input->post('main_post', false),
				'category' => $category_post,
				'slug' => url_title($this->input->post('post_title', true), '-', true)
			);
		}
		$this->db->insert('posts', $data);
	}
}
