<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$data['kelas'] = $this->db->get('tb_ruang_kelas');
		$this->load->view('admin/header');
		$this->load->view('admin/data-kelas', $data);
		$this->load->view('admin/modal');
		$this->load->view('admin/footer');
	}

	public function simpan()
	{
		$nama = $this->input->post('nama', TRUE);
		$lokasi = $this->input->post('lokasi', TRUE);
		$status = $this->input->post('status', TRUE);

		$data = [
			'nama_kelas' => htmlspecialchars($nama),
			'lokasi_kelas' => htmlspecialchars($lokasi),
			'status_kelas' => $status
		];
		$this->db->insert('tb_ruang_kelas', $data);

		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message role="alert">
			Data berhasil ditambahkan!!.</div>');
		redirect(base_url('Kelas'));
	}


}
