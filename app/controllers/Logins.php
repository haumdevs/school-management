<?php 
    class Logins extends Controller {
        public function __construct() {
            $this->userModel = $this->model('Login');
        }

        //This is the default Login method

        public function index() {
            echo 'DOnt duck with our links';
        }
        public function login() {

            //Check to see if post is set
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                //Process form
                // die('Processing Form');

                //Sanitize Post Data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING); 

                //Initialise Data and save it in case the user enter the wrong data
                $data = [
                    'user_email' => trim($_POST['user_email']),
                    'user_password' => '',
                    'user_email_err' => '',
                    'user_password_err' => ''
                ];

                //Validate Email
                if(empty($_POST['user_email'])) {
                    $data['user_email_err'] = 'Enter Email';
                } elseif(!$this->userModel->findUserByEmail($data['user_email'])) {
                    $data['user_email_err'] = 'Invalid Email';
                } else {
                    //Email valid
                }

                //Validate Password(Only when email has been validated)
                if(empty($data['user_email_err'])) {
                    $user = $this->userModel->getUserByEmail($data['user_email']);
                    if($user->user_password != $_POST['user_password']) {
                        $data['user_password_err'] = 'Password Incorrect';
                    } else {
                        //validated
                    }
                }

                //Check to see if form is correctly filled. if yes, then login. Otherwise, relaod the form
                if(empty($data['user_email_err']) && empty($data['user_password_err'])) {   
                    $user = $this->userModel->getUserByEmail($data['user_email']);
                    if($user->user_position = 'Admin') {
                        
                        // echo URLROOT;
                        redirect('admins/index');
                    } elseif($user->user_position = 'Teacher') {
                        // echo URLROOT;
                        redirect('teachers/index');
                    } else {
                        // echo URLROOT;
                        redirect('student/index');
                    } 
                    echo 'Verified';                
                } else {
                    // Reload the form with incorrect data
                    // echo 'You is a dumb bitch';
                    $this->view('logins/login', $data);
                }

            } else {
                //Load Form (Default)
                // die('Loading Form');
                $data = [
                    'user_email' => '',
                    'user_password' => '',
                    'user_email_err' => '',
                    'user_password_err' => ''
                ];

                $this->view('logins/login', $data);
            }
        }
    }
