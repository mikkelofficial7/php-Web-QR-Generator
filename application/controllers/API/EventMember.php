<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class EventMember extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    function index_get() {
        $id = $this->get('id_member');
        $id_event = $this->get('id_event');
        if ($id == '' && $id_event == "") {
            $kontak = $this->db->get('ci_member')->result();
        } else {
            $where = array('id_member' => $id, 'id_event'=> $id_event);
            $this->db->where($where);
            $kontak = $this->db->get('ci_member')->result();
        }
        $this->response(array("result"=>$kontak, 200));
    }
    
    function index_post() 
    {
        $data = array(
                    'id_member'     => $this->post('id_member'),
                    'id_event'          => $this->post('id_event'),
                    'tgl_daftar'    => $this->post('tgl_daftar'),
                    'alamat'    => $this->post('alamat'),
                    'status_hadir'    => $this->post('status_hadir'));
        $insert = $this->db->insert('ci_member', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    function index_put() {
        $id = $this->get('id_member');
        $id_event = $this->get('id_event');
        $data = array('status_hadir'  => $this->put('status_hadir'));
        $where = array('id_member' => $id, 'id_event'=> $id_event);
        $update = $this->db->update('ci_member', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }


    //Masukan function selanjutnya disini
}
?>