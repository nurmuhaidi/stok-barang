<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

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
        $data['title'] = 'Stok Barang';
        $data['barang'] = $this->m_model->get('tb_barang')->result();
        $data['riwayat'] = $this->m_model->get('tb_riwayat')->result();
        
        $this->load->view('user/templates/header', $data);
        $this->load->view('user/templates/sidebar');
        $this->load->view('user/barang', $data);
        $this->load->view('user/templates/footer');
    }

    public function delete($id)
    {
        $where = array('id' => $id );

        $this->m_model->delete($where, 'tb_barang');
        $this->session->set_flashdata('pesan', 'Data berhasil dihapus!');
        redirect('index.php/user/barang');
    }

    public function insert()
    {
        date_default_timezone_set('Asia/Jakarta');
        $kode       = $_POST['kode'];
        $stok       = $_POST['stok'];
        $createDate = date('Y-m-d H:i:s');

        $data = array(
            'kode'          => $kode,
            'stok'          => $stok,
            'createDate'    => $createDate
        );

        $this->m_model->insert($data, 'tb_barang');
        $this->session->set_flashdata('pesan', 'Data berhasil ditambahkan!');
        redirect('index.php/user/barang');
    }

    public function insert_kelola()
    {
        date_default_timezone_set('Asia/Jakarta');
        $id         = $_POST['id'];
        $kode       = $_POST['kode'];
        $stok       = $_POST['stok'];
        $jenis      = $_POST['jenis'];
        $jumlah     = $_POST['jumlah'];
        $createDate = date('Y-m-d H:i:s');

        $data = array(
            'kode'          => $kode,
            'jumlah'        => $jumlah,
            'jenis'         => $jenis,
            'createDate'    => $createDate
        );

        $whereBarang = array('id' => $id);

        if($jenis == 'Masuk') {
            $hasil = array(
                'stok' => $stok + $jumlah
            );
        } else {
            $hasil = array(
                'stok' => $stok - $jumlah
            );
        }

        $this->m_model->insert($data, 'tb_riwayat');
        $this->m_model->update($whereBarang, $hasil, 'tb_barang');
        $this->session->set_flashdata('pesan', 'Data berhasil ditambahkan!');
        redirect('index.php/user/barang');
    }

    public function update()
    {
        $id     = $_POST['id'];
        $kode   = $_POST['kode'];
        $stok   = $_POST['stok'];

        $data = array(
            'kode' => $kode,
            'stok' => $stok
        );

        $where = array('id' => $id);

        $this->m_model->update($where, $data, 'tb_barang');
        $this->session->set_flashdata('pesan', 'Data berhasil diubah!');
        redirect('index.php/user/barang');
    }

    public function riwayat($kode)
    {
        $where = array('kode' => $kode);

        $data['riwayat'] = $this->m_model->get_where($where, 'tb_riwayat')->result();

        $data['kode'] = $kode;
        $data['title'] = 'Riwayat Barang ' . $kode;
        $this->load->view('user/templates/header', $data);
        $this->load->view('user/templates/sidebar');
        $this->load->view('user/riwayatBarang', $data);
        $this->load->view('user/templates/footer');
    }
}