<?php 

class AdminUser{
    public $db;
    public function __construct(){
        $this->db = new Database;
    }
    
    public function register($data){
        //query
        $this->db->query('INSERT INTO admin(adminid, ad_lname, ad_fname, ad_username, ad_password) VALUES(:adminid, :ad_lname, :ad_fname, :ad_username, :ad_password)');
        
        //bind
        $this->db->bind(':adminid', $data['adminid']);
        $this->db->bind(':ad_lname', $data['ad_lname']);
        $this->db->bind(':ad_fname', $data['ad_fname']);
        $this->db->bind(':ad_username', $data['ad_username']);
        $this->db->bind(':ad_password', $data['ad_password']);
        
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
        
    }

    public function login($username, $password){
      $this->db->query('SELECT * FROM admin WHERE ad_username = :ad_username');
      $this->db->bind(':ad_username', $username);
      $row = $this->db->single();
      $hashed_password = $row->ad_password;
      // var_dump($row);
      // echo "<br>";
      // var_dump(is_null($row));
      // var_dump(is_object($row));
      // echo $password;
      // echo "<br>";   
      // echo $hashed_password;             
      // echo "<br>";   
      // var_dump($hashed_password);
      $var = password_verify($password, $hashed_password);
      var_dump($var);
      if(password_verify($password, $hashed_password)){
        echo "ps verify";
        return $row;
      } else {
        // echo "false";
        return false;
      }
    }

    public function findUserByUsername($ad_username){
        
        $this->db->query('SELECT * FROM admin WHERE ad_username = :ad_username');
        
        //bind values
        $this->db->bind(':ad_username', $ad_username);
  
        $row = $this->db->single();
  
        // Check row
        if($this->db->rowCount() > 0){
          return true;
        } else {
          return false;
        }
      }

    //Login admin user
    public function adminLogin($ad_username, $password){
      try{
        // var_dump($password);
        $this->db->query('SELECT * FROM users WHERE name =  :ad_username');
        $this->db->bind(':ad_username', $ad_username);
        $row = $this->db->single();
        var_dump($row);
        $hashed_password = $row->password;
        $var = password_verify($password, $hashed_password);
        // var_dump($var);
        // var_dump($hashed_password);
        if(password_verify($password, $hashed_password)){
          return $row;
        } else {
          return false;
        }
      }catch(Exception $e){
        echo $e->getMessage();
      }
    }

}