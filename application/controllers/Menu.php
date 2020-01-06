<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        } else {
            if ($this->input->post('submit') == 'Add') {
                $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
                $this->session->set_flashdata('message', '
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        New Menu Added
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>');
            } else {
                $this->db->replace('user_menu', [
                    'id' => $this->input->post('id'),
                    'menu' => $this->input->post('menu')
                ]);
                $this->session->set_flashdata('message', '
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Menu Updated
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>');
            }
            redirect('menu');
        }
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_menu');
        $this->session->set_flashdata('message', '
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Menu Deleted
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>');
        redirect('menu');
    }

    public function submenu()
    {
        $data['title'] = 'Submenu Management';

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');


        if ($this->form_validation->run() == false) {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['menu'] = $this->db->get('user_menu')->result_array();
            $this->load->model('Menu_model', 'menu');
            $data['subMenu'] = $this->menu->getSubMenu();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer');
        } else {
            if ($this->input->post('submit') == 'Add') {
                $this->db->insert('user_sub_menu', [
                    'title' => $this->input->post('title'),
                    'menu_id' => $this->input->post('menu_id'),
                    'url' => $this->input->post('url'),
                    'icon' => $this->input->post('icon'),
                    'is_active' => '1'
                ]);
                $this->session->set_flashdata('message', '
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        New Submenu Added
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>');
            } else {
                $this->db->replace('user_sub_menu', [
                    'id' => $this->input->post('id'),
                    'menu_id' => $this->input->post('menu_id'),
                    'title' => $this->input->post('title'),
                    'url' => $this->input->post('url'),
                    'icon' => $this->input->post('icon'),
                    'is_active' => '1'
                ]);
                $this->session->set_flashdata('message', '
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Submenu Updated
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>');
            }
            redirect('menu/submenu');
        }
    }

    public function deleteSubMenu($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_sub_menu');
        $this->session->set_flashdata('message', '
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Submenu Deleted
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>');
        redirect('menu/submenu');
    }
}
