<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'D:\xampp\composer\vendor\autoload.php';
class M_Login extends CI_Model{	
    private $_table = "user";

    public function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
	}

	function get_email($table, $username){
		return $this->db->get_where($table);
	}

    public function doLogin(){
		$post = $this->input->post();

        // cari user berdasarkan email dan username
        $this->db->where('email', $post["username"])
                ->or_where('username', $post["username"]);
        $userdata = $this->db->get_where('user',array('username'=>$username));

       	if($userdata->num_rows() > 0){
       		$data = $userdata->row();
            $isPasswordTrue = password_verify($post["password"], $userdata->password);

            $isAdmin = $userdata->TipeUser == "admin";

            if($isPasswordTrue && $isAdmin){ 
                $this->session->set_userdata(['user_logged' => $userdata]);
                $this->_updateLastLogin($userdata->user_id);
                return true;
            }
        }
    	return false;
    }

    /**
     * @todo mengirimkan kode verifikasi
     * Code akan melakukan login pada server smtp google dan mengirimkan kode verifikasi 4 digit
     * Rujukan pada dokumen : Use-case verifikasi_login
     * @param String $email
     *  
     */
    function confirm_login($email)
    {
        $code = rand(1111 , 9999);

        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; #host untuk mengirimkan email
        $mail->Port = 587; #port yang digunakan
        $mail->SMTPAuth = true;

        $mail->Username = 'webtix.id@gmail.com'; #email webmaster / pengirim
        $mail->Password = 'hauzanjelek';

        $mail->setFrom('webtix.id@gmail.com'); #email sender / pengirim
        $mail->addAddress($email); #email test

        $mail->Subject = 'Email Confirmation'; #subject email yang dikirim
        #$mail->Body    = 'This is email confirmation for your login on our website Webtix.id, please do not share this code to anyone claiming from Webtix.id';
        $mail->Body = $code;
        $mail->Send();

        if(!$mail->Send()){
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            return $code;   
        }   
    }   


    // alternate Method of login
    function log_user($username,$password){
        $where = array(
        			'username' => $username,
        			'password' => $password
        				);
        $query=$this->db->query("SELECT * FROM user WHERE username='$username' AND password=('$password') LIMIT 1");
        return $query;
    }
    
    //EVEN MORE ALTERNATE METHOD OF LOGIN + USER TYPE CHECK
    function alt_login_user($username,$password){
    $result = mysql_query("SELECT TipeUser FROM user WHERE username = '$username' AND Password = '$password'");

	}

	public function isNotLogin(){
        return $this->session->userdata('user_logged') === null;
    }
}