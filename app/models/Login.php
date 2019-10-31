<?php
    class Login {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        //Find user by email in users table. Return true if found, else false.
        public function findUserByEmail($email) {

            //Making the query
            $this->db->query('SELECT * FROM users WHERE user_email = :email');

            //Bind query
            $this->db->bind(':email', $email);

            //Execute the query and return a single row
            $row = $this->db->single();
            
            //Check to see if something is returned by counting the rows returned
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

         //Login User. Returns the row of user in users table for further processing
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