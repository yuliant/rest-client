<?php

use GuzzleHttp\Client;

class Mahasiswa_model extends CI_model
{

  private $_client;

  public function __construct()
  {
    $this->_client = new Client([
      'base_uri' => 'http://localhost/project_ci/rest-server/api/',
      'auth' => ['admin', '1234']
    ]);
  }

  public function getAllMahasiswa()
  {
    $response = $this->_client->request('GET', 'mahasiswa', [
      'query' => [
        'YULIANT-KEY' => 'masrizal'
      ]
    ]);

    $result = json_decode($response->getBody()->getContents(), true);

    return $result['data']; //masuk kedalam object 'data'
  }


  public function getMahasiswaById($id)
  {
    $response = $this->_client->request('GET', 'mahasiswa', [
      'query' => [
        'YULIANT-KEY' => 'masrizal',
        'id' => $id
      ]
    ]);

    $result = json_decode($response->getBody()->getContents(), true);

    return $result['data'][0]; //masuk kedalam object 'data' ambil data ke 1
  }


  public function tambahDataMahasiswa()
  {
    $data = [
      'nama' => $this->input->post('nama', true),
      'nim' => $this->input->post('nim', true),
      'email' => $this->input->post('email', true),
      'jurusan' => $this->input->post('jurusan'),
      'YULIANT-KEY' => 'masrizal'
    ];
    $response = $this->_client->request('POST', 'mahasiswa', [
      'form_params' => $data
    ]);

    $result = json_decode($response->getBody()->getContents(), true);

    return $result;
  }

  public function hapusDataMahasiswa($id)
  {
    $response = $this->_client->request('DELETE', 'mahasiswa', [
      'form_params' => [
        'YULIANT-KEY' => 'masrizal',
        'id' => $id
      ]
    ]);

    $result = json_decode($response->getBody()->getContents(), true);

    return $result;
  }

  public function ubahDataMahasiswa($id)
  {
    $data = [
      'nama' => $this->input->post('nama', true),
      'nim' => $this->input->post('nim', true),
      'email' => $this->input->post('email', true),
      'jurusan' => $this->input->post('jurusan'),
      'id' => $this->input->post('id'),
      'YULIANT-KEY' => 'masrizal'
    ];
    $response = $this->_client->request('PUT', 'mahasiswa', [
      'form_params' => $data
    ]);

    $result = json_decode($response->getBody()->getContents(), true);

    return $result;
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
