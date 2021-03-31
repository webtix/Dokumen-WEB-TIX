<?php 
 
class M_Login extends CI_Model{	
    private $_table = "user";

    public function doLogin(){
		$post = $this->input->post();

        // cari user berdasarkan email dan username
        $this->db->where('email', $post["username"])
                ->or_where('username', $post["username"]);
        $user = $this->db->get($this->_table)->row();

       	if($user){

            $isPasswordTrue = password_verify($post["password"], $user->password);

            $isAdmin = $user->TipeUser == "admin";

            if($isPasswordTrue && $isAdmin){ 
                $this->session->set_userdata(['user_logged' => $user]);
                $this->_updateLastLogin($user->user_id);
                return true;
            }
        }
    	return false;
    }
	

    //
    function log_user($username,$password){
        $query=$this->db->query("SELECT * FROM user WHERE username='$username' AND password=('$password') LIMIT 1");
        return $query;
    }

	public function isNotLogin(){
        return $this->session->userdata('user_logged') === null;
    }

	function regist($table){
		
	}
}