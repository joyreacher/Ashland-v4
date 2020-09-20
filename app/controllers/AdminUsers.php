<?php 

class AdminUsers extends Controller{
    public function __construct(){
        $this->adminModel = $this->model('AdminUser');
    }

    public function register(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // echo "testing start";
            //?SANITIZE POST DATA
        $POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        //?INIT DATA/SET ERROR VARS
        $data =[
            'ad_fname' => trim($_POST['ad_fname']),
            'ad_lname' => trim($_POST['ad_lname']),
            'ad_username' => trim($_POST['ad_username']),
            'ad_password' => trim($_POST['ad_password']),
            'ad_confirm_password' => trim($_POST['ad_confirm_password']),

            'ad_fname_err' => '',
            'ad_lname_err' => '',
            'ad_username_err' => '',
            'ad_username_err' =>'',
            'ad_password_err' => '',
            'ad_confirm_password_err' => ''
          ];
          
        //?VALIDATE FIRST NAME
        if(empty($data['ad_fname'])){
            $data['ad_fname_err'] = 'Pleae enter name';
          }
          
          //?VALIDATE LAST NAME
        if(empty($data['ad_lname'])){
            $data['ad_lname_err'] = 'Pleae enter name';
          }
          
        if(empty($data['ad_username'])){
            $data['ad_username_err'] = 'Please enter a username';
          }else{
              //?CHECK DATABASE FOR MATCHING USERNAME       
              if($this->adminModel->findUserByUsername($data['ad_username'])){
                  $data['ad_username_err'] ='Username is already taken';
              }
          }
  
          //? Validate Password
          
          if(empty($data['ad_password'])){
            $data['ad_password_err'] = 'Pleae enter password';
          } elseif(strlen($data['ad_password']) < 6){
            $data['ad_password_err'] = 'Password must be at least 6 characters';
          }
  
          // Validate Confirm Password
          if(empty($data['ad_confirm_password'])){
            $data['ad_confirm_password_err'] = 'Pleae confirm password';
            
          } else {
            if($data['ad_password'] != $data['ad_confirm_password']){
              $data['ad_confirm_password_err'] = 'Passwords do not match';
            }
          }        
          
 
        
          // Make sure errors are empty
        if(empty($data['ad_username_err']) && empty($data['ad_fname_err']) && empty($data['ad_lname_err']) && empty($data['ad_password_err']) && empty($data['ad_confirm_password_err'])){
        
        
        // Validated
        //1 way hash algo password
        $data['ad_password'] = password_hash($data['ad_password'], PASSWORD_DEFAULT);
        
        
        //register user
        if($this->adminModel->register($data)){
            flash('register_success', "You are registered and can log in");
            echo "testing AFTER THE ADMINMODEL CALL";
            //REDIRECT TAKES YOU TO BLANK PAGE
            $this->view("adminusers/login");
            redirect( 'adminusers/login');
        }else{
          die("something went wrong in the AdminUsers file ");
        }
      }
      else{
          $this->view('adminusers/register', $data);
        
        }
      }
        else{
          $data =[
            'ad_fname' => '',
            'ad_lname' => '',
            'ad_username' => '',
            'ad_password' => '',
            'ad_confirm_password' =>'',

            'ad_fname_err' => '',
            'ad_lname_err' => '',
            'ad_username_err' => '',
            'ad_username_err' =>'',
            'ad_password_err' => '',
            'ad_confirm_password_err' => ''
          ];
          $this->view('adminusers/register', $data);    
        }
        }
        public function login(){
          echo "entering login function line 118";
          // Check for POST
          if($_SERVER['REQUEST_METHOD'] == 'POST'){
            echo "enter request methd";
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            // Init data
            $data =[
              'ad_username' => trim($_POST['ad_username']),
              'ad_password' => trim($_POST['ad_password']),
              'ad_username_err' => '',
              'ad_password_err' => '',
            ];
    
            // Validate Email
            if(empty($data['ad_username'])){
              $data['ad_username_err'] = 'Pleae enter email';
            }
    
            // Validate Password
            if(empty($data['ad_password'])){
              $data['ad_password_err'] = 'Please enter password';
            }
            echo " line 142 after validation";
    // Check for user/email
          if($this->userModel->findUserByUsername($data['ad_username'])){
            //user found
            echo 'user found';
          }else{
            $data['ad_username_err'] = "No user found";
          }
          echo "before err check line 151";
            // Make sure errors are empty
          if(empty($data['ad_username_err']) && empty($data['ad_password_err'])){
            // Validated
            // Check and set logged in user
            $loggedInUser = $this->userModel->login($data['ad_username'], $data['ad_password']);
            echo "before loggedInUser var is checked line 156";
            if($loggedInUser){
              //create session vars
              $this->createUserSession($loggedInUser);
            }else{
              echo "else block line 160";
              $data['ad_password_err'] = 'Password incorrect';
              $this->view('adminusers/login', $data);
            }
          } else {
  
            echo "else block line 166";
            // Load view with errors
            $this->view('adminusers/login', $data);
          }
            //! THIS NEEDS TO BE BELOW LOGIN FUNCTION 
            //! THIS NEEDS TO BE BELOW LOGIN FUNCTION 
          } else {
            echo "else block line 174";
            // Init data
            $data =[    
              'ad_username' => '',
              'ad_password' => '',
              'ad_username_err' => '',
              'ad_password_err' => '',
            ];
    
            // Load view
            $this->view('adminusers/login', $data);
          }
        }
        
        public function createUserSession($user){
          //setting user id to session variable
          $_SESSION['adminid'] =$user->id;
          $_SESSION['ad_usernamel'] =$user->username;
          $_SESSION['ad_fname'] =$user->name;
          redirect('posts');
        }
        public function logout(){
          unset($_SESSION['adminid']);
          unset($_SESSION['ad_username']);
          unset($_SESSION['ad_fname']);
          session_destroy();
          redirect('adminusers/login');
        }

  }

    