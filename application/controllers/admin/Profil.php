<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('id')){
            redirect('index.php/welcome');
        }
    }

    public function index()
    {
        $data['title'] = 'Profil';
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/Profil', $data);
        $this->load->view('admin/templates/footer');
    }

    public function update()
    {
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $data = array(
            'nama' => $nama, 
            'username' => $username, 
            'password' => md5($password), 
        );

        $where = array('id' => $this->session->userdata('id') );

        $this->m_model->update($where, $data, 'tb_user');
        $this->session->set_flashdata('pesan', 'Data berhasil diubah');
        redirect('index.php/admin/profil');
    }
}