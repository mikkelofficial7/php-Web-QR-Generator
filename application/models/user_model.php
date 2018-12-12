<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class user_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }


    function change_userqr($user_id,$user_qr)
    {
        $this->db->where('id_event', $user_id);
        $this->db->set('qr_filename',$user_qr);
        $this->db->update('ci_event');
    }
    function get_users_one($id)
    {
        $this->db->where('id_event', $id);
        $result = $this->db->get('ci_event');
        return $result->row();
    }
    function get_detail_event($where)
    {
        $result = $this->db->where($where)->get('ci_event');
        return $result->row();
    }
    function get_event_byid($id)
    {
        $this->db->where('id_user', $id);
        $result = $this->db->get('ci_event');
        return $result->result();
    }
    function get_member_byid($id)
    {
        return $this->db->select('ci_event.id_event, ci_event.nama_event, ci_event.alamat_event, ci_event.kuota, ci_event.nama_PIC')->where('ci_event.id_user',$id)->get('ci_event')->result();
    }
    function get_detailmember_byid($id)
    {
        return $this->db->where($id)->get('ci_event')->row();
    }
    function get_kuota_member($id)
    {
        return $this->db->select('count(id_event) as count_kuota')->where($id)->group_by('id_event')->get('ci_member')->row();
    }
    function get_kuotas_member($id)
    {
        return $this->db->select('count(id_event) as count_kuota')->where($id)->get('ci_member')->row();
    }
    function cek_user($table, $where)
    {       
        return $this->db->get_where($table,$where);
    }   
    function get_events_one($where)
    {
        $this->db->where($where);
        $result = $this->db->select('id_event, nama_event, desc_event, organizer, alamat_event, start_time as start_time, end_time as end_time, kuota, start_registration as start_registration, end_registration as end_registration, nama_PIC, email_PIC, phone_PIC')->get('ci_event');
        return $result->result();
    }
    function get_events_ones($where)
    {
        $this->db->where($where);
        $result = $this->db->select('id_event, nama_event, desc_event, organizer, alamat_event, start_time as start_time, end_time as end_time, kuota, start_registration as start_registration, end_registration as end_registration, nama_PIC, email_PIC, phone_PIC')->get('ci_event');
        return $result->num_rows();
    }

    function get_random_user()
    {
        $this->db->order_by('user_id', 'RANDOM');
        $this->db->limit(1);
        $result = $this->db->get('ci_users');
        return $result->row();
    }
    function get_all_user()
    {
        $result = $this->db->get('ci_event')->result();
        return $result;
    }
    function get_all_member_byid($id)
    {
        $result = $this->db->join('ci_member_master', 'ci_member.id_member = ci_member_master.id_member')->where($id)->order_by('tgl_daftar','ASC')->get('ci_member')->result();
        return $result;
    }
    function change_detail_user($where,$data,$table)
    {
        $this->db->where($where);
        $this->db->update($table,$data);;
    }
    function add_event($data,$table)
    {
        $this->db->insert($table,$data);
    }
    function delete_event($where,$table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}
