<?php
class Admin_model extends CI_Model
{
    public function get_all_posts()
    {
        return $this->db->select('*')->from('posts')
            ->order_by('date', 'DESC')
            ->get()
            ->result_array();
    }

    public function total_posts()
    {
        return $this->db->count_all('posts');
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

    public function update_profile()
    {
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
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
                /*$old_img = $data['user']['image'];
                if ($old_img != 'default.jpg') {
                    unlink(FCPATH . 'assets/img/profile/' . $old_img);
                }*/

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
