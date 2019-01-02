<?php

/**
 *
 */
class Mahasiswa_model extends CI_model
{

  public function getAllMahasiswa()
  {
    // $this->db->from($this->table_name);
    // $this->db->order_by("name", "asc");
    // $query = $this->db->get(); 
    // return $query->result();
    return $this->db->get('mahasiswa')->result_array(); // seperti select * from mahasiswa
  }

  public function tambahDataMahasiswa()
  {
    $data = [
        'nama' => $this->input->post('nama', true),
        'nim' => $this->input->post('nim', true),
        'email' => $this->input->post('email', true),
        'jurusan' => $this->input->post('jurusan')
      ];
      $this->db->insert('mahasiswa', $data);
  // Produces: INSERT INTO mytable (title, name, date) VALUES ('My title', 'My name', 'My date')
  }

  public function hapusDataMahasiswa($id)
  {
    // $this->db->where('id', $id);
    // $this->db->delete('mahasiswa');
    $this->db->delete('mahasiswa', ['id'=>$id]);
  }

  public function getMahasiswaById($id)
  {
    return $this->db->get_where('mahasiswa', ['id'=>$id])->row_array();
  }

  public function ubahDataMahasiswa($id)
  {
    $data = [
        'nama' => $this->input->post('nama', true),
        'nim' => $this->input->post('nim', true),
        'email' => $this->input->post('email', true),
        'jurusan' => $this->input->post('jurusan')
      ];
      $this->db->where('id', $this->input->post('id'));
      $this->db->update('mahasiswa', $data);
  }

  public function cariDataMahasiswa()
  {
      $keyword = $this->input->post('keyword', true);
      $this->db->like('nama', $keyword);
      $this->db->or_like('nim', $keyword);
      $this->db->or_like('email', $keyword);
      $this->db->or_like('jurusan', $keyword);
      return $this->db->get('mahasiswa')->result_array();
  }
}
