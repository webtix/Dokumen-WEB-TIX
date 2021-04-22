<?php 
 
class M_Login extends CI_Model{	
    private $_table = "user";

    function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
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