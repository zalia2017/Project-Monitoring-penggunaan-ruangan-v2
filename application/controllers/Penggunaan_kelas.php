<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penggunaan_kelas extends CI_Controller {

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
		$data['penggunaan_kelas'] = $this->db->get('tb_penggunaan_kelas');

		$this->db->select('*');
		$this->db->from('tb_penggunaan_kelas');
		$this->db->join('tb_ruang_kelas', 'tb_ruang_kelas.id_kelas = tb_penggunaan_kelas.id_kelas');
		$data['penggunaan_kelas'] = $this->db->get();
		$data['data_kelas'] = $this->db->get('tb_ruang_kelas');
		$this->load->view('header');
		$this->load->view('penggunaan-kelas', $data);
		$this->load->view('modal');
		$this->load->view('footer');
	}

	public function simpan()
	{
		$nama = $this->input->post('nama', TRUE);
		$deskripsi = $this->input->post('deskripsi', TRUE);
		$tanggalMulai = $this->input->post('tglMulai', TRUE);
		$tanggalSelesai = $this->input->post('tglSelesai', TRUE);
		$idKelas = $this->input->post('idKelas', TRUE);

		$data = [
			'nama_kegiatan' => $nama,
			'deskripsi_kegiatan' => $deskripsi,
			'tanggal_mulai' => $tanggalMulai,
			'tanggal_selesai' => $tanggalSelesai,
			'id_kelas' => $idKelas,
		];
		$this->db->insert('tb_penggunaan_kelas', $data);

		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message role="alert">
			Data berhasil ditambahkan!!.</div>');
		redirect(base_url('Penggunaan_kelas'));
	}
	public function show()
	{
		$id = $this->uri->segment(3);
		$kelas = $this->db->get('tb_ruang_kelas')->result_array();
		// $penggunaan = $this->db->get_where('tb_penggunaan_kelas', array('id_penggunaan', $id));
		$this->db->where('id_penggunaan', $id);
		$penggunaan = $this->db->get('tb_penggunaan_kelas')->row_array();
		$data['kelas'] = $kelas;
		$data['penggunaan'] = $penggunaan;
		// var_dump($id);
		header('Content-Type: pplication/json');
		echo json_encode($data);
	}

	public function update()
	{
		$id = $this->input->post('id', TRUE);
		$nama = $this->input->post('nama', TRUE);
		$deskripsi = trim($this->input->post('deskripsi', TRUE));
		$tanggalMulai = $this->input->post('tglMulai', TRUE);
		$tanggalSelesai = $this->input->post('tglSelesai', TRUE);
		$idKelas = $this->input->post('idKelas', TRUE);

		$myData = [
			'nama_kegiatan' => $nama,
			'deskripsi_kegiatan' => $deskripsi,
			'tanggal_mulai' => $tanggalMulai,
			'tanggal_selesai' => $tanggalSelesai,
			'id_kelas' => $idKelas,
		];
		$this->db->where('id_penggunaan', $id);
		$this->db->update('tb_penggunaan_kelas', $myData);

		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message role="alert">
			Data berhasil diupdate.</div>');
		redirect(base_url('Penggunaan_kelas'));
	}

	public function hapus()
	{
		$id = $this->uri->segment(3);
		$this->db->where('id_penggunaan', $id);
		$this->db->delete('tb_penggunaan_kelas');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message role="alert">
				Data berhasil dihapus!!.</div>');
		redirect(base_url('Penggunaan_kelas'));
	}


}