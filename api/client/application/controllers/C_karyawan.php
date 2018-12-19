<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_karyawan extends CI_Controller
{
    public $url ="";

    public function __construct()
    {
        parent::__construct();
        $this->url="http://localhost/api/server/index";
    }

    /**
     * [index description] proses yang akan di buka saat pertama masuk ke controller
     */
    public function index()
    {//codeigniter cURL
        $ch = curl_init($this->url);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response_json = curl_exec($ch);

        curl_close($ch);
        //$response = json_decode($response_json, true); //True = Hasil OTOMATIS Array
        $response = json_decode($response_json);	//Tanpa True = Hasil TIDAK OTOMATIS MENJADI ARRAY

        //$data['karyawan'] = json_decode($this->curl->simple_get($this->API.'/Karyawan'));
        $data['karyawan'] = $response;

        $this->load->view('V_karyawan', $data);
    }

    /**
     * [add description] proses untuk menambah data
     */
    public function add()
    {
        $data = array(
          'id'      =>  $this->input->post('id'),
          'name'    =>  $this->input->post('name'),
          'email'	  =>  $this->input->post('email'),
          'address' =>  $this->input->post('address'),
          'phone'	  =>  $this->input->post('phone')
        );

        $url = 'http://localhost/api/server/index';
        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response_json = curl_exec($ch);
        curl_close($ch);
        $response=json_decode($response_json, true);

        //$insert =  $this->curl->simple_post($this->API.'/Karyawan', $data, array(CURLOPT_BUFFERSIZE => 10));

				if ($response) {
            $this->session->set_flashdata('hasil', 'Insert Data Berhasil');
        } else {
            $this->session->set_flashdata('hasil', 'Insert Data Gagal');
        }
        redirect('C_karyawan');
    }


    // proses untuk menghapus data pada database
    public function delete()
    {
        if ($this->input->post('id') == false) {
            redirect('C_karyawan');
        } else {
            $url = 'http://localhost/api/server/index/' . $this->input->post('id');
            $ch = curl_init($url);

            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $response_json = curl_exec($ch);

            curl_close($ch);
            $response=json_decode($response_json, true);

            //$delete =  $this->curl->simple_delete($this->API.'/Karyawan', array('id'=>$this->input->post('id')), array(CURLOPT_BUFFERSIZE => 10));

            if ($response) {
                $this->session->set_flashdata('hasil', 'Delete Data Berhasil');
            } else {
                $this->session->set_flashdata('hasil', 'Delete Data Gagal');
            }
            redirect('C_karyawan');
        }
    }

    //TUGAS : bikin fungsi update di client menggunakan service
    //
    //

    // edit data kontak
    public function edit()
    {
        if ($this->input->post('id') == false) {
            redirect('C_karyawan');
        } else {
            if ($this->input->post('Simpan_Data') != false) {
                $data = array(
                                'id'      =>  $this->input->post('id'),
                                'name'    =>  $this->input->post('name'),
                                'email'	  =>  $this->input->post('email'),
                                'address' =>  $this->input->post('address'),
                                'phone'	  =>  $this->input->post('phone')
                              );

                $url = 'http://localhost/api/server/index/' . $this->input->post('id');
                $ch = curl_init($url);

                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
                curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                $response_json = curl_exec($ch);
                curl_close($ch);
                $response=json_decode($response_json, true);

                //$update =  $this->curl->simple_put($this->API.'/Karyawan', $data, array(CURLOPT_BUFFERSIZE => 10));

                if ($response) {
                    $this->session->set_flashdata('hasil', 'Update Data Berhasil');
                } else {
                    $this->session->set_flashdata('hasil', 'Update Data Gagal');
                }
                redirect('C_karyawan');
            } else {
                $params = array('id'=>  $this->input->post('id') );
                $data['datakontak'] = json_decode($this->curl->simple_get($this->API.'/Karyawan', $params));
                $this->load->view('C_karyawan', $data);
            }
        }
    }
}
