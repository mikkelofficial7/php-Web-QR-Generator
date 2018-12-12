<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Event extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    function index_get() {
        $id_event = $this->get('id_event');
        if ($id_event == '') {
            $kontak = $this->db->get('ci_event')->result();
        } else {
            $where = array('id_event'=> $id_event);
            $this->db->where($where);
            $kontak = $this->db->get('ci_event')->result();
        }
        $this->response(array("result"=>$kontak, 200));
    }
    //Masukan function selanjutnya disini
}
?>