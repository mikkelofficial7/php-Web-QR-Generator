<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* @property user_model $user */

class Qr_code_generate extends Front_end
{
    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('user_model', 'user');
        $this->load->library('ci_qr_code');
        $this->config->load('qr_code');
        
        if($this->session->userdata('statususer') != "login"){
            redirect('/Intro/LoginForm');
        }
    }
    public function String2Hex($string){
        $hex='';
        for ($i=0; $i < strlen($string); $i++){
            $hex .= dechex(ord($string[$i]));
        }
        return $hex;
    }
     
     
    public function Hex2String($hex){
        $string='';
        for ($i=0; $i < strlen($hex)-1; $i+=2){
            $string .= chr(hexdec($hex[$i].$hex[$i+1]));
        }
        return $string;
    }
    /**
     * success_link
     * to display user info and see print link
     * @access public
     * @param user_id
     * @return
     */
    function logout(){
        $this->session->sess_destroy();
        redirect('/Intro/LoginForm');
    }
    function index(){
        $this->view('content/Home');
    }

    function ListEvent()
    {
        $id = $this->session->userdata('iduser');
        $data['user'] = $this->user->get_member_byid($id);
        $this->view('content/listEvent',$data);
    }
    function ProcessDeleteEvent($id)
    {
        $where = array('id_event' => $id);
        $this->user->delete_event($where,'ci_event');
        redirect('/qr_code_generate/ListEvent');
    }
    function ProcessDeleteMember($id)
    {
        $where = array('id_member' => $id);
        $this->user->delete_event($where,'ci_member');
        $idmember = $this->session->flashdata('idmember');
        redirect('/qr_code_generate/ListPeserta/'.$idmember);
    }
    function DetailEvent($id)
    {
        $array = array('ci_event.id_event' => $id, 'ci_event.id_user' => $this->session->userdata('iduser'));
        $arrays = array('id_event' => $id);
        $data['item'] = $this->user->get_detailmember_byid($array);
        $data['kuota'] = $this->user->get_kuota_member($arrays);
        $data['kuotas'] = $this->user->get_kuotas_member($arrays);
        $this->view('content/qr_code',$data);
    }
    function ListPeserta($id)
    {
        $array = array('id_event' => $id);
        $data['user'] = $this->user->get_all_member_byid($array);
        $this->session->set_flashdata('idmember', $id);
        $this->view('content/listPeserta',$data);
    }
    function EditDetailEvent($id)
    {
        $array = array('id_event' => $id, 'id_user' => $this->session->userdata('iduser'));
        $val = $this->user->get_events_ones($array);
        if($val > 0)
        {
            $data['items'] = $this->user->get_events_one($array);
            foreach($data['items'] as $itemz)
            {
                $arr_start_time = explode(" ", $itemz->start_time);
                $arr_start_time2 = explode("-", $arr_start_time[0]);
                $arr_start_date_time2 = explode(":", $arr_start_time[1]);
                if($arr_start_date_time2[0] > 12)
                {
                    $startclock2 = "0".($arr_start_date_time2[0] - 12).":".$arr_start_date_time2[1]."&#32;PM";
                }
                else
                {
                    $startclock2 = $arr_start_date_time2[0].":".$arr_start_date_time2[1]."&#32;AM";
                }

                $arr_end_time = explode(" ", $itemz->end_time);
                $arr_end_time2 = explode("-", $arr_end_time[0]);
                $arr_end_date_time2 = explode(":", $arr_end_time[1]);
                if($arr_end_date_time2[0] > 12)
                {
                     $endclock2 = "0".($arr_end_date_time2[0] - 12).":".$arr_end_date_time2[1]."&#32;PM";
                }
                else
                {
                    $endclock2 = $arr_end_date_time2[0].":".$arr_end_date_time2[1]."&#32;AM";
                }

                $arr_start_reg = explode(" ", $itemz->start_registration);
                $arr_start_reg2 = explode("-", $arr_start_reg[0]);
                $arr_start_date_reg2 = explode(":", $arr_start_reg[1]);
                if($arr_start_date_reg2[0] > 12)
                {
                    $startclockreg2 = "0".($arr_start_date_reg2[0] - 12).":".$arr_start_date_reg2[1]."&#32;PM";
                }
                else
                {
                    $startclockreg2 = $arr_start_date_reg2[0].":".$arr_start_date_reg2[1]."&#32;AM";
                }

                $arr_end_reg = explode(" ", $itemz->end_registration);
                $arr_end_reg2 = explode("-", $arr_end_reg[0]);
                $arr_end_date_reg2 = explode(":", $arr_end_reg[1]);
                if($arr_end_date_reg2[0] > 12)
                {
                    $endclockreg2 = "0".($arr_end_date_reg2[0] - 12).":".$arr_end_date_reg2[1]."&#32;PM";
                }
                else
                {
                    $endclockreg2 = $arr_end_date_reg2[0].":".$arr_end_date_reg2[1]."&#32;AM";
                }

                $item = array(
                    'id_event' => $itemz->id_event,
                    'nama_event' => $itemz->nama_event,
                    'desc_event' => $itemz->desc_event,
                    'organizer' => $itemz->organizer,
                    'alamat_event' => $itemz->alamat_event,
                    'start_time' => $arr_start_time2[2]."/".$arr_start_time2[1]."/".$arr_start_time2[0]." ".$startclock2,
                    'end_time' => $arr_end_time2[2]."/".$arr_end_time2[1]."/".$arr_end_time2[0]." ".$endclock2,
                    'kuota' => $itemz->kuota,
                    'start_registration' => $arr_start_reg2[2]."/".$arr_start_reg2[1]."/".$arr_start_reg2[0]." ".$startclockreg2,
                    'end_registration' => $arr_end_reg2[2]."/".$arr_end_reg2[1]."/".$arr_end_reg2[0]." ".$endclockreg2,
                    'nama_PIC' => $itemz->nama_PIC,
                    'email_PIC' => $itemz->email_PIC,
                    'phone_PIC' => $itemz->phone_PIC
                );
                $this->view('content/edit_qr_code',$item);
            }
        }
    }
    function ProcessEditDetailEvent()
    {
        $id = $this->input->post('id_event');
        $nama = $this->input->post('nama_event');
        $desc = $this->input->post('desc_event');
        $organizer = $this->input->post('organizer');
        $alamat = $this->input->post('alamat_event');

        $start_time = $this->input->post('start_time');
        $start_time2 = $this->input->post('start_time2');
        $end_time = $this->input->post('end_time');
        $end_time2 = $this->input->post('end_time2');
        
        $kuota = $this->input->post('kuota');

        $start_reg = $this->input->post('start_registration');
        $start_reg2 = $this->input->post('start_registration2');
        $end_reg = $this->input->post('end_registration');
        $end_reg2 = $this->input->post('end_registration2');

        $nama_pic = $this->input->post('nama_PIC');
        $email_pic = $this->input->post('email_PIC');
        $phone_pic = $this->input->post('phone_PIC');

        if($nama != null && $desc != null && $organizer != null && $alamat!= null && $start_time != null && $start_time2 != null && $end_time != null && $end_time2 != null && $kuota != null && $start_reg != null && $start_reg2 != null && $end_reg != null && $end_reg2 != null && $nama_pic != null && $email_pic != null && $phone_pic != null)
        {
            $arr_start_time = explode("/", $start_time);
            $arr_start_time2 = explode(" ", $start_time2);
            $arr_start_date_time2 = explode(":", $arr_start_time2[0]);
            if($arr_start_time2[1] == "PM")
            {
                $startclock2 = $arr_start_date_time2[0] + 12;
            }
            else
            {
                $startclock2 = $arr_start_date_time2[0];
            }

            $arr_end_time = explode("/", $end_time);
            $arr_end_time2 = explode(" ", $end_time2);
            $arr_end_date_time2 = explode(":", $arr_end_time2[0]);
            if($arr_end_time2[1] == "PM")
            {
                $endclock2 = $arr_end_date_time2[0] + 12;
            }
            else
            {
                $endclock2 = $arr_end_date_time2[0];
            }

            $arr_start_reg = explode("/", $start_reg);
            $arr_start_reg2 = explode(" ", $start_reg2);
            $arr_start_date_reg2 = explode(":", $arr_start_reg2[0]);
            if($arr_start_reg2[1] == "PM")
            {
                $startclockreg2 = $arr_start_date_reg2[0] + 12;
            }
            else
            {
                $startclockreg2 = $arr_start_date_reg2[0];
            }

            $arr_end_reg = explode("/", $end_reg);
            $arr_end_reg2 = explode(" ", $end_reg2);
            $arr_end_date_reg2 = explode(":", $arr_end_reg2[0]);
            if($arr_end_reg2[1] == "PM")
            {
                $endclockreg2 = $arr_end_date_reg2[0] + 12;
            }
            else
            {
                $endclockreg2 = $arr_end_date_reg2[0];
            }
            $timestamp1 = strtotime($start_time);
            $timestamp2 = strtotime($end_time);
            $timestamp3 = strtotime($start_reg);
            $timestamp4 = strtotime($end_reg);

                if(is_numeric($kuota) == true && is_numeric($phone_pic) == true)
                {
                    if(filter_var($email_pic, FILTER_VALIDATE_EMAIL))
                    {
                        if($timestamp1 <= $timestamp2 && $timestamp3 <= $timestamp4 && $timestamp1 >= strtotime(date("Y-m-d")) && $timestamp2 >= strtotime(date("Y-m-d")) && $timestamp3 >= strtotime(date("Y-m-d")) && $timestamp4 >= strtotime(date("Y-m-d")))
                        {
                            if($timestamp3 <= $timestamp1 && $timestamp4 <= $timestamp1 && $timestamp3 <= $timestamp2 && $timestamp4 <= $timestamp2 )
                            {
                                $data = array(
                                    'nama_event' => $nama,
                                    'desc_event' => $desc,
                                    'organizer' => $organizer,
                                    'alamat_event' => $alamat,
                                    'start_time' => $arr_start_time[2]."-".$arr_start_time[1]."-".$arr_start_time[0]." ".$startclock2.":".$arr_start_date_time2[1].":00",
                                    'end_time' => $arr_end_time[2]."-".$arr_end_time[1]."-".$arr_end_time[0]." ".$endclock2.":".$arr_end_date_time2[1].":00",
                                    'kuota' => $kuota,
                                    'start_registration' => $arr_start_reg[2]."-".$arr_start_reg[1]."-".$arr_start_reg[0]." ".$startclockreg2.":".$arr_start_date_reg2[1].":00",
                                    'end_registration' => $arr_end_reg[2]."-".$arr_end_reg[1]."-".$arr_end_reg[0]." ".$endclockreg2.":".$arr_end_date_reg2[1].":00",
                                    'nama_PIC' => $nama_pic,
                                    'email_PIC' => $email_pic,
                                    'phone_PIC' => $phone_pic
                                );

                                $where = array(
                                    'id_event' => $id
                                );
                                $this->user->change_detail_user($where,$data,'ci_event');
                                redirect('/qr_code_generate/ListEvent');
                            }
                            else
                            {
                                redirect('/qr_code_generate/EditDetailEvent/'.$id);
                            }
                        }
                        else
                        {
                            redirect('/qr_code_generate/EditDetailEvent/'.$id);
                        }
                    }
                    else
                    {
                        redirect('/qr_code_generate/EditDetailEvent/'.$id);
                    }
                }
                else
                {
                    redirect('/qr_code_generate/EditDetailEvent/'.$id);
                }
        }
        else
        {
            redirect('/qr_code_generate/EditDetailEvent/'.$id);
        }
    }

    function CreateEvent()
    {
        $this->view('content/createEvent');
    }
    function ProcessCreateEvent()
    {
        $id = "EV-".uniqid();
        $nama = $this->input->post('nama_event');
        $desc = $this->input->post('desc_event');
        $organizer = $this->input->post('organizer');
        $alamat = $this->input->post('alamat_event');

        $start_time = $this->input->post('start_time');
        $start_time2 = $this->input->post('start_time2');
        $end_time = $this->input->post('end_time');
        $end_time2 = $this->input->post('end_time2');
        
        $kuota = $this->input->post('kuota');

        $start_reg = $this->input->post('start_registration');
        $start_reg2 = $this->input->post('start_registration2');
        $end_reg = $this->input->post('end_registration');
        $end_reg2 = $this->input->post('end_registration2');

        $nama_pic = $this->input->post('nama_PIC');
        $email_pic = $this->input->post('email_PIC');
        $phone_pic = $this->input->post('phone_PIC');

        if($nama != null && $organizer != null && $alamat!= null && $start_time != null && $start_time2 != null && $end_time != null && $end_time2 != null && $kuota != null && $start_reg != null && $start_reg2 != null && $end_reg != null && $end_reg2 != null && $nama_pic != null && $email_pic != null && $phone_pic != null)
        {
            $arr_start_time = explode("/", $start_time);
            $arr_start_time2 = explode(" ", $start_time2);
            $arr_start_date_time2 = explode(":", $arr_start_time2[0]);
            if($arr_start_time2[1] == "PM")
            {
                $startclock2 = $arr_start_date_time2[0] + 12;
            }
            else
            {
                $startclock2 = $arr_start_date_time2[0];
            }

            $arr_end_time = explode("/", $end_time);
            $arr_end_time2 = explode(" ", $end_time2);
            $arr_end_date_time2 = explode(":", $arr_end_time2[0]);
            if($arr_end_time2[1] == "PM")
            {
                $endclock2 = $arr_end_date_time2[0] + 12;
            }
            else
            {
                $endclock2 = $arr_end_date_time2[0];
            }

            $arr_start_reg = explode("/", $start_reg);
            $arr_start_reg2 = explode(" ", $start_reg2);
            $arr_start_date_reg2 = explode(":", $arr_start_reg2[0]);
            if($arr_start_reg2[1] == "PM")
            {
                $startclockreg2 = $arr_start_date_reg2[0] + 12;
            }
            else
            {
                $startclockreg2 = $arr_start_date_reg2[0];
            }

            $arr_end_reg = explode("/", $end_reg);
            $arr_end_reg2 = explode(" ", $end_reg2);
            $arr_end_date_reg2 = explode(":", $arr_end_reg2[0]);
            if($arr_end_reg2[1] == "PM")
            {
                $endclockreg2 = $arr_end_date_reg2[0] + 12;
            }
            else
            {
                $endclockreg2 = $arr_end_date_reg2[0];
            }
            $timestamp1 = strtotime($start_time);
            $timestamp2 = strtotime($end_time);
            $timestamp3 = strtotime($start_reg);
            $timestamp4 = strtotime($end_reg);

            if(is_numeric($kuota) == true && is_numeric($phone_pic) == true)
            {
                if(filter_var($email_pic, FILTER_VALIDATE_EMAIL))
                {
                    if($timestamp1 <= $timestamp2 && $timestamp3 <= $timestamp4 && $timestamp1 >= strtotime(date("Y-m-d")) && $timestamp2 >= strtotime(date("Y-m-d")) && $timestamp3 >= strtotime(date("Y-m-d")) && $timestamp4 >= strtotime(date("Y-m-d")))
                    {
                        if($timestamp3 <= $timestamp1 && $timestamp4 <= $timestamp1 && $timestamp3 <= $timestamp2 && $timestamp4 <= $timestamp2 )
                        {
                            $data = array(
                                'id_user' => $this->session->userdata('iduser'),
                                'id_event' => $id,
                                'nama_event' => $nama,
                                'desc_event' => $desc,
                                'organizer' => $organizer,
                                'alamat_event' => $alamat,
                                'start_time' => $arr_start_time[2]."-".$arr_start_time[1]."-".$arr_start_time[0]." ".$startclock2.":".$arr_start_date_time2[1].":00",
                                'end_time' => $arr_end_time[2]."-".$arr_end_time[1]."-".$arr_end_time[0]." ".$endclock2.":".$arr_end_date_time2[1].":00",
                                'kuota' => $kuota,
                                'start_registration' => $arr_start_reg[2]."-".$arr_start_reg[1]."-".$arr_start_reg[0]." ".$startclockreg2.":".$arr_start_date_reg2[1].":00",
                                'end_registration' => $arr_end_reg[2]."-".$arr_end_reg[1]."-".$arr_end_reg[0]." ".$endclockreg2.":".$arr_end_date_reg2[1].":00",
                                'nama_PIC' => $nama_pic,
                                'email_PIC' => $email_pic,
                                'phone_PIC' => $phone_pic,
                                'qr_filename' => $id.".png"
                            );
                            $this->user->add_event($data,'ci_event');
                            redirect('/qr_code_generate/ListEvent');
                        }
                        else
                        {
                            redirect('/qr_code_generate/CreateEvent');
                        }
                    }
                    else
                    {
                        redirect('/qr_code_generate/CreateEvent');
                    }
                }
                else
                {
                    redirect('/qr_code_generate/CreateEvent');
                }
            }
            else
            {
                redirect('/qr_code_generate/CreateEvent');
            }
        }
        else
        {
            redirect('/qr_code_generate/CreateEvent');
        }
    }

    function ContactUs()
    {
        $this->view('content/contact_us');
    }
    function Setting()
    {
        $where = array(
            'id_user' => $this->session->userdata('iduser')
        );
        $data['gender'] = $this->user->cek_user("ci_user",$where)->result();
        $this->view('content/setting',$data);
    }
    function EditSetting()
    {
        $where = array(
            'id_user' => $this->session->userdata('iduser')
        );
        $data['gender'] = $this->user->cek_user("ci_user",$where)->result();
        foreach($data['gender'] as $gender)
        {
            $item = array(
                'nama_user' => $gender->nama_user,
                'username_user' => $gender->username_user,
                'gender' => $gender->gender,
            );
        }
        $this->view('content/edit_setting',$item);
    }

    function ProcessEditSetting()
    {
        $name = $this->input->post('name');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        if($password != null)
        {
            $data = array(
                'nama_user' => $name,
                'username_user' => $username,
                'password_user' => sha1($this->String2Hex($password))
            );
        }
        else
        {
            $data = array(
                'nama_user' => $name,
                'username_user' => $username
            );
        }
        $where = array(
            'id_user' => $this->session->userdata('iduser')
        );
        $this->user->change_detail_user($where,$data,'ci_user');
        redirect('/qr_code_generate/Setting');
    }
    function ProcessDeleteAccount()
    {
        $where = array('id_user' => $this->session->userdata('iduser'));
        $this->user->delete_event($where,'ci_event');
        $this->user->delete_event($where,'ci_user');
        redirect('/Intro/LoginForm');
    }
    /**
     * print_qr
     *
     * @access public
     * @param id_event
     * @return
     */
    function print_qr($id_event)
    {
        $qr_code_config = array();
        $qr_code_config['cacheable'] = $this->config->item('cacheable');
        $qr_code_config['cachedir'] = $this->config->item('cachedir');
        $qr_code_config['imagedir'] = $this->config->item('imagedir');
        $qr_code_config['errorlog'] = $this->config->item('errorlog');
        $qr_code_config['ciqrcodelib'] = $this->config->item('ciqrcodelib');
        $qr_code_config['quality'] = $this->config->item('quality');
        $qr_code_config['size'] = $this->config->item('size');
        $qr_code_config['black'] = $this->config->item('black');
        $qr_code_config['white'] = $this->config->item('white');
        $this->ci_qr_code->initialize($qr_code_config);

        // get full name and user details
        $user_details = $this->user->get_users_one($id_event);
        $image_name = $id_event . ".png";

        // create user content
        $codeContents = "{";
        $codeContents .= "\"id_event\" :";
        $codeContents .= "\"$id_event\"";
        $codeContents .= ",\"nama_event\" :";
        $codeContents .= "\"$user_details->nama_event\"";
        $codeContents .= ",\"organizer\" :";
        $codeContents .= "\"$user_details->organizer\"";
        $codeContents .= ",\"alamat_event\" :";
        $codeContents .= "\"$user_details->alamat_event\"";
        $codeContents .= ",\"start_time\" :";
        $codeContents .= "\"$user_details->start_time\"";
        $codeContents .= ",\"end_time\" :";
        $codeContents .= "\"$user_details->end_time\"";
        $codeContents .= ",\"start_registration\" :";
        $codeContents .= "\"$user_details->start_registration\"";
        $codeContents .= ",\"end_registration\" :";
        $codeContents .= "\"$user_details->end_registration\"";
        $codeContents .= ",\"PIC_name\" :";
        $codeContents .= "\"$user_details->nama_PIC\"";
        $codeContents .= ",\"PIC_email\" :";
        $codeContents .= "\"$user_details->email_PIC\"";
        $codeContents .= ",\"PIC_phone\" :";
        $codeContents .= "\"$user_details->phone_PIC\"";
        $codeContents .= "}";

        $params['data'] = $codeContents;
        $params['level'] = 'H';
        $params['size'] = 2;

        $params['savename'] = FCPATH . $qr_code_config['imagedir'] . $image_name;
        $this->ci_qr_code->generate($params);

        $this->data['qr_code_image_url'] = base_url() . $qr_code_config['imagedir'] . $image_name;

        // save image path in tree table
        $this->user->change_userqr($id_event, $image_name);
        // then redirect to see image link
        $file = $params['savename'];
        if(file_exists($file)){
            header('Content-Description: File Transfer');
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment; filename='.basename($file));
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            ob_clean();
            flush();
            readfile($file);
            unlink($file); // deletes the temporary file

            exit;
        }
    }

    function print_qr2($id_event)
    {
        $qr_code_config = array();
        $qr_code_config['cacheable'] = $this->config->item('cacheable');
        $qr_code_config['cachedir'] = $this->config->item('cachedir');
        $qr_code_config['imagedir'] = $this->config->item('imagedir');
        $qr_code_config['errorlog'] = $this->config->item('errorlog');
        $qr_code_config['ciqrcodelib'] = $this->config->item('ciqrcodelib');
        $qr_code_config['quality'] = $this->config->item('quality');
        $qr_code_config['size'] = $this->config->item('size');
        $qr_code_config['black'] = $this->config->item('black');
        $qr_code_config['white'] = $this->config->item('white');
        $this->ci_qr_code->initialize($qr_code_config);

        // get full name and user details
        $user_details = $this->user->get_users_one($id_event);
        $image_name = $id_event . "_ABSENT.png";

        // create user content
        $codeContents = "{";
        $codeContents .= "\"id_event\" :";
        $codeContents .= "\"$id_event\"";
        $codeContents .= ",\"status_hadir\" :";
        $codeContents .= "\"YA\"";
        $codeContents .= "}";

        $params['data'] = $codeContents;
        $params['level'] = 'H';
        $params['size'] = 2;

        $params['savename'] = FCPATH . $qr_code_config['imagedir'] . $image_name;
        $this->ci_qr_code->generate($params);

        $this->data['qr_code_image_url'] = base_url() . $qr_code_config['imagedir'] . $image_name;

        // then redirect to see image link
        $file = $params['savename'];
        if(file_exists($file)){
            header('Content-Description: File Transfer');
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment; filename='.basename($file));
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            ob_clean();
            flush();
            readfile($file);
            unlink($file); // deletes the temporary file

            exit;
        }
    }

}
// END qr_code_generate Controller class
/* End of file qr_code_generate.php */
/* Location: ./application/controllers/qr_code_generate.php */