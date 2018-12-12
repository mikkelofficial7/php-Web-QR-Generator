<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class NewMember extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    //Menampilkan data kontak
    function index_get() {
        $id = $this->get('id_member');
        if ($id == '') {
            $kontak = $this->db->get('ci_member_master')->result();
        } else {
            $this->db->where('id_member', $id);
            $kontak = $this->db->get('ci_member_master')->result();
        }
        $this->response(array("result"=>$kontak, 200));
    }

    function index_post() 
    {
        $data = array(
                    'id_member'     => $this->post('id_member'),
                    'nama'          => $this->post('nama'),
                    'pekerjaan'    => $this->post('pekerjaan'),
                    'tempat_kerja'    => $this->post('tempat_kerja'),
                    'email'    => $this->post('email'),
                	'phone'    => $this->post('phone'));
        $insert = $this->db->insert('ci_member_master', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    //Masukan function selanjutnya disini
}
?>