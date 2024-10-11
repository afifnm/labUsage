<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public function index() {
        // Menggunakan query builder untuk mengambil data
        $this->db->select('pl.*, l.lab_name, g.name AS guru_name, mp.nama_pelajaran');
        $this->db->from('penggunaan_lab pl');
        $this->db->join('labs l', 'pl.lab_id = l.lab_id');
        $this->db->join('guru g', 'pl.guru_id = g.guru_id');
        $this->db->join('mata_pelajaran mp', 'pl.pelajaran_id = mp.pelajaran_id');
        $this->db->order_by('pl.start_time', 'DESC');
        $query = $this->db->get()->result_array();
        $data = array(
            'guru' => $this->db->from('guru')->get()->result_array(),
            'labs' => $this->db->from('labs')->get()->result_array(),
            'mata_pelajaran' => $this->db->from('mata_pelajaran')->get()->result_array(),
            'penggunaan_lab' => $query
        );
        $this->load->view('index', $data);
    }
	public function detail($id) {
        // Menggunakan query builder untuk mengambil data
        $this->db->select('pl.*, l.lab_name, g.name AS guru_name, mp.nama_pelajaran');
        $this->db->from('penggunaan_lab pl');
        $this->db->where('pl.penggunaan_id',$id);
        $this->db->join('labs l', 'pl.lab_id = l.lab_id');
        $this->db->join('guru g', 'pl.guru_id = g.guru_id');
        $this->db->join('mata_pelajaran mp', 'pl.pelajaran_id = mp.pelajaran_id');
        $this->db->order_by('pl.start_time', 'DESC');
        $query = $this->db->get()->row_array();
        $data = array(
            'penggunaan_lab' => $query
        );
        $this->load->view('detail', $data);
    }

    public function simpan() {
        $data = [
            'lab_id' => $this->input->post('lab_id'),
            'guru_id' => $this->input->post('guru_id'),
            'pelajaran_id' => $this->input->post('pelajaran_id'),
            'start_time' => $this->input->post('start_time'),
            'end_time' => $this->input->post('end_time'),
            'activity' => $this->input->post('activity')
        ];
        $insert = $this->db->insert('penggunaan_lab', $data);
        if ($insert) {
            $this->session->set_flashdata('success', 'Data penggunaan lab berhasil disimpan.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menyimpan data penggunaan lab.');
        }
        redirect('home');
    }

    public function delete($id) {
        // Menghapus data berdasarkan penggunaan_id
        $this->db->where('penggunaan_id', $id);
        $delete = $this->db->delete('penggunaan_lab');

        // Mengatur flashdata untuk memberikan umpan balik
        if ($delete) {
            $this->session->set_flashdata('success', 'Data penggunaan lab berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus data penggunaan lab.');
        }

        // Mengarahkan kembali ke halaman utama
        redirect('home');
    }
}
