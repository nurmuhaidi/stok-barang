<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('id')){
            redirect('index.php/welcome');
        } else {
            if($this->session->userdata('level') != 'User'){
                redirect('index.php/admin/dashboard');
            }
        }
    }

    public function index()
    {
        $data['title'] = 'Riwayat';
        $data['riwayat'] = $this->m_model->get('tb_riwayat')->result();

        $this->load->view('user/templates/header', $data);
        $this->load->view('user/templates/sidebar');
        $this->load->view('user/riwayat', $data);
        $this->load->view('user/templates/footer');
    }
}