<?php
    class User {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        //Find User by Email
        public function findUserByEmail($email) {
            $this->db->query('SELECT * FROM users WHERE user_email = :email');
            $this->db->bind(':email', $email);

            $row = $this->db->single();

            //Check Row
            if($this->db->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        }

        //Get User by Email and return the row
        public function getUserByEmail($email) {
            $this->db->query('SELECT * FROM users WHERE user_email = :email');
            $this->db->bind(':email', $email);

            $row = $this->db->single();
            
            return $row;
            
        }

        //Login User
        public function login($email, $password) {
            $this->db->query('SELECT * FROM users where user_email = :email AND user_password = :password');

            $this->db->bind(':email', $email);
            $this->db->bind(':password', $password);

            $row = $this->db->single();

            if($this->db->rowCount() > 0) {
                return $row;  
        
        }

        



    }

}