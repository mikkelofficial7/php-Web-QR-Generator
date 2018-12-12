<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* @property user_model $user */

class Intro extends CI_Controller
{
	/**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model', 'user');
        $this->load->library('ci_qr_code');
        $this->config->load('qr_code');
        $this->load->library('session');
        $this->load->library('email');
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
	public function body_pesan_email($email, $code)
	{
		return '<html xmlns="http://www.w3.org/1999/xhtml">
			<head>
				<meta http-equiv="content-type" content="text/html; charset=utf-8">
			  	<meta name="viewport" content="width=device-width, initial-scale=1.0;">
			 	<meta name="format-detection" content="telephone=no"/>
			 	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
			    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
				<!-- Responsive Mobile-First Email Template by Konstantin Savchenko, 2015.
				https://github.com/konsav/email-templates/  -->

				<style>
			/* Reset styles */
			body { margin: 0; padding: 0; min-width: 100%; width: 100% !important; height: 100% !important;}
			body, table, td, div, p, a { -webkit-font-smoothing: antialiased; text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; line-height: 100%; }
			table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse !important; border-spacing: 0; }
			img { border: 0; line-height: 100%; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; }
			#outlook a { padding: 0; }
			.ReadMsgBody { width: 100%; } .ExternalClass { width: 100%; }
			.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div { line-height: 100%; }

			/* Rounded corners for advanced mail clients only */
			@media all and (min-width: 560px) {
				.container { border-radius: 8px; -webkit-border-radius: 8px; -moz-border-radius: 8px; -khtml-border-radius: 8px; }
			}

			/* Set color for auto links (addresses, dates, etc.) */
			a, a:hover {
				color: #FFFFFF;
			}
			.footer a, .footer a:hover {
				color: #828999;
			}

			 	</style>

				<!-- MESSAGE SUBJECT -->
				<title>Image Attachment</title>

			</head>

			<!-- BODY -->
			<!-- Set message background color (twice) and text color (twice) -->
			<body topmargin="0" rightmargin="0" bottommargin="0" leftmargin="0" marginwidth="0" marginheight="0" width="100%" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; width: 100%; height: 100%; -webkit-font-smoothing: antialiased; text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; line-height: 100%;
				background-color: #3a4351;
				color: #FFFFFF;"
				bgcolor="#2D3445"
				text="#FFFFFF">

			<!-- SECTION / BACKGROUND -->
			<!-- Set message background color one again -->
			<table width="100%" align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; width: 100%;" class="background"><tr><td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;"
				bgcolor="#3a4351">

			<!-- WRAPPER -->
			<!-- Set wrapper width (twice) -->
			<table border="0" cellpadding="0" cellspacing="0" align="center"
				width="500" style="border-collapse: collapse; border-spacing: 0; padding: 0; width: inherit;
				max-width: 500px;" class="wrapper">

				<tr>
					<td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
						padding-top: 20px;
						padding-bottom: 20px;">

						<!-- PREHEADER -->
						<!-- Set text color to background color -->
						<div style="display: none; visibility: hidden; overflow: hidden; opacity: 0; font-size: 1px; line-height: 1px; height: 0; max-height: 0; max-width: 0;
							color: #2D3445;" class="preheader">
							Thank you for trusting us to make you event better</div>

						<!-- LOGO -->
						<!-- Image text color should be opposite to background color. Set your url, image src, alt and title. Alt text should fit the image size. Real image size should be x2. URL format: http://domain.com/?utm_source={{Campaign-Source}}&utm_medium=email&utm_content=logo&utm_campaign={{Campaign-Name}} -->
						<i class="fa fa-qrcode" id="qr-black" style="font-size: 100px;"></i>

					</td>
				</tr>

				<!-- HERO IMAGE -->
				<!-- Image text color should be opposite to background color. Set your url, image src, alt and title. Alt text should fit the image size. Real image size should be x2 (wrapper x2). Do not set height for flexible images (including "auto"). URL format: http://domain.com/?utm_source={{Campaign-Source}}&utm_medium=email&utm_content={{Ìmage-Name}}&utm_campaign={{Campaign-Name}} -->
				<tr>
					<td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;
						padding-top: 0px;" class="hero"></td>
				</tr>

				<!-- SUPHEADER -->
				<!-- Set text color and font family ("sans-serif" or "Georgia, serif") -->
				<tr>
					<td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 14px; font-weight: 400; line-height: 150%; letter-spacing: 2px;
						padding-top: 27px;
						padding-bottom: 0;
						color: #FFFFFF;
						font-family: sans-serif;" class="supheader">
							Hi '.$email.', We Are From Event QR Generator
					</td>
				</tr>

				<!-- HEADER -->
				<!-- Set text color and font family ("sans-serif" or "Georgia, serif") -->
				<tr>
					<td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;  padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 24px; font-weight: bold; line-height: 130%;
						padding-top: 5px;
						color: #FFFFFF;
						font-family: sans-serif;" class="header">
							Thank You For Trusting Us For Making Your Event Better With Technology
					</td>
				</tr>

				<!-- PARAGRAPH -->
				<!-- Set text color and font family ("sans-serif" or "Georgia, serif"). Duplicate all text styles in links, including line-height -->
				<tr>
					<td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 17px; font-weight: 400; line-height: 160%;
						padding-top: 15px;
						color: #FFFFFF;
						font-family: sans-serif;" class="paragraph">
							Below is your <b>verification code</b>
					</td>
				</tr>

				<!-- BUTTON -->
				<!-- Set button background color at TD, link/text color at A and TD, font family ("sans-serif" or "Georgia, serif") at TD. For verification codes add "letter-spacing: 5px;". Link format: http://domain.com/?utm_source={{Campaign-Source}}&utm_medium=email&utm_content={{Button-Name}}&utm_campaign={{Campaign-Name}} -->
				<tr>
					<td align="center" valign="top" style="text-decoration: none; border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
						padding-top: 25px;
						padding-bottom: 5px;" class="button"><a style="text-decoration: none;">
							<table border="0" cellpadding="0" cellspacing="0" align="center" style="max-width: 240px; min-width: 120px; border-collapse: collapse; border-spacing: 0; padding: 0;"><tr><td align="center" valign="middle" style="padding: 12px 24px; margin: 0; text-decoration: none; border-collapse: collapse; border-spacing: 0; border-radius: 4px; -webkit-border-radius: 4px; -moz-border-radius: 4px; -khtml-border-radius: 4px;"
								bgcolor="#1a2428"><a style="text-decoration: none;
								color: #FFFFFF; font-family: sans-serif; font-size: 17px; font-weight: 400; line-height: 120%;">
									'.$code.'
								</a>
						</td></tr></table></a>
					</td>
				</tr>

				<!-- LINE -->
				<!-- Set line color -->
				<tr>
					<td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
						padding-top: 30px;" class="line"><hr
						color="#565F73" align="center" width="100%" size="1" noshade style="margin: 0; padding: 0;" />
					</td>
				</tr>
			<!-- End of WRAPPER -->
			</table>

			<!-- End of SECTION / BACKGROUND -->
			</td></tr></table>

			</body>
			</html>
			';
	}
	public function smtp_mail($email_asal, $password, $email_tujuan, $judul, $code)
	{
		require_once(APPPATH.'third_party/phpmailer/PHPMailerAutoload.php');
        $mail = new PHPMailer();
        $mail->IsSMTP(); // we are going to use SMTP
        $mail->SMTPAuth   = true; // enabled SMTP authentication
        $mail->SMTPSecure = "ssl";  // prefix for secure protocol to connect to the server
        $mail->Host       = "smtp.gmail.com";      // setting GMail as our SMTP server
        $mail->Port       = 465;                   // SMTP port to connect to GMail
        $mail->Username   = $email_asal;  // user email address
        $mail->Password   = $password;            // password in GMail
        $mail->SetFrom('Admin-EvenGen@gmail.com', $judul);  //Who is sending 
        $mail->isHTML(true);
        $mail->Subject    = $judul;
        $mail->Body      = $this->body_pesan_email($email_tujuan, $code);
        $destino = $email_tujuan; // Who is addressed the email to
        $mail->AddAddress($destino, "Receiver");
        if($mail->Send()) 
        {
            return "Success";
        } 
        else 
        {
            return "";
        }
	}

	function LoginForm(){
		$this->session->sess_destroy();
        $data['alert'] = '';
		$this->load->view('content/login_form',$data);
    }
    function ProcessLoginForm()
    {
    	$user = $this->input->post('username');
        $password = $this->input->post('password');
        $where = array(
			'username_user' => $user,
			'password_user' => sha1($this->String2Hex($password))
			);
		$cek = $this->user->cek_user("ci_user",$where)->num_rows();
		if($cek > 0)
		{
 			$data['user']= $this->user->cek_user("ci_user",$where)->result();
 			foreach($data['user'] as $item)
 			{
 				if($item->account_verif == $item->user_verif)
 				{
					$data_session = array(
						'iduser' => $item->id_user,
						'statususer' => "login"
					);

					$this->session->set_userdata($data_session);
					
		 			if ($this->session->userdata('statususer') != "login") 
		 			{
			            echo "tidak ada session";
			        } 
			        else 
			        {
			            redirect(base_url()."Qr_code_generate");
			        } 
		        } 
		        else
		        {
		        	$data['alert'] = 'Username and Password is wrong';
					$this->load->view('content/login_form',$data);
		        }
			}
		}
		else
		{
			//redirect('/Intro/LoginForm');
			$data['alert'] = 'Username and Password is wrong';
			$this->load->view('content/login_form',$data);
		}
    }
    function RegisterForm(){
    	$this->session->sess_destroy();
    	$data['alert'] = '';
        $this->load->view('content/register_form',$data);
    }
    function ProcessRegisterForm()
    {
    	$id = "USR-".uniqid();
    	$name = $this->input->post('name');
    	$user = $this->input->post('username');
    	$email = $this->input->post('email');
    	$gender = $this->input->post('radio');
        $password = $this->input->post('password');
        $where = array(
			'username_user' => $user
		);
		$cek = $this->user->cek_user("ci_user",$where)->num_rows();
        if($cek < 1)
        {
        	if(filter_var($email, FILTER_VALIDATE_EMAIL))
        	{
	        	$where = array(
					'email_user' => $email
				);
				$cek2 = $this->user->cek_user("ci_user",$where)->num_rows();
				if($cek2 < 1)
	        	{
	        		$code = mt_rand(100000, 999999);
			        $status = $this->smtp_mail("54140411@student.kwikkiangie.ac.id", "james261296", $email, "Event QR Generator Account Verification", $code);
			        if($status == "Success")
			        {
		        		$url_id = time();
				        $data = array(
				        	'id_user' => $id,
				            'nama_user' => $name,
				            'gender' => $gender,
				            'username_user' => $user,
				            'email_user' => $email,
				            'account_verif' => $code,
				            'password_user' => sha1($this->String2Hex($password))
				        );
				        $this->user->add_event($data,'ci_user');
				        $data_session = array(
							'url_id' => $url_id,
							'id_user' => $id
						);

						$this->session->set_userdata($data_session);
			        	redirect('Intro/EmailVerifForm/'.$url_id);
			        }
			        else
			        {
			        	$data['alert'] = 'Email cannot be verified';
						$this->load->view('content/register_form',$data);
			        }
			    }
			    else
			    {
			    	$data['alert'] = 'Email name is already used';
					$this->load->view('content/register_form',$data);
			    }
			}
			else
			{
				$data['alert'] = 'Email input is not valid';
				$this->load->view('content/register_form',$data);
			}
	    }
	    else
	    {
	    	$data['alert'] = 'Username is already used';
			$this->load->view('content/register_form',$data);
	    }
    }
    function EmailVerifForm($id){
    	if($this->session->userdata('url_id') != $id)
    	{
    		redirect('Intro/RegisterForm');
    	}
    	$data['alert'] = '';
        $this->load->view('content/email_verif_form',$data);
    }
    function ProcessEmailVerifyForm(){
    	$verif = $this->input->post('verif');
    	$where = array(
			'account_verif' => $verif,
			'id_user' => $this->session->userdata('id_user')
		);
		$data = $this->user->cek_user("ci_user",$where)->num_rows();
		if($data > 0)
		{
			$data = array(
	        	'user_verif' => $verif
	        );
			$where = array(
                'id_user' => $this->session->userdata('id_user')
            );
            $this->user->change_detail_user($where,$data,'ci_user');
			$this->session->sess_destroy();
			redirect('Intro/LoginForm');
		}
		else
		{
			redirect('Intro/EmailVerifForm/'.$this->session->userdata('url_id'));
		}
    }
    function CheckEmail(){
    	$this->session->sess_destroy();
    	$data['alert'] = '';
        $this->load->view('content/check_email',$data);
    }
    function ProcessCheckEmail()
    {
    	$user = $this->input->post('username');
        $email = $this->input->post('email');
        $where = array(
			'username_user' => $user,
			'email_user' => $email
			);
		$cek = $this->user->cek_user("ci_user",$where)->num_rows();
		if($cek > 0)
		{
			$cek = array();
			$cek['isi'] = $this->user->cek_user("ci_user",$where)->result();
			foreach($cek['isi'] as $isi)
			{
				$url_id = time();
	 			$data_session = array(
					'url_id' => $url_id,
					'id_user' => $isi->id_user
				);
				$this->session->set_userdata($data_session);
	        	redirect('Intro/ChangePassword/'.$url_id);
	        }
		}
		else
		{
			$data['alert'] = 'Username and Email is not found';
			$this->load->view('content/check_email',$data);
		}
    }
    function ChangePassword($id){
    	if($this->session->userdata('url_id') != $id)
    	{
    		redirect('Intro/CheckEmail');
    	}
    	$data['alert'] = '';
        $this->load->view('content/change_password',$data);
    }
    function ProcessChangePassword(){
    	$password = $this->input->post('password');
		$data = array(
        	'password_user' => sha1($this->String2Hex($password))
        );
		$where = array(
            'id_user' => $this->session->userdata('id_user')
        );
        $this->user->change_detail_user($where,$data,'ci_user');
    	$this->session->sess_destroy();
		redirect('Intro/LoginForm');
    }
}