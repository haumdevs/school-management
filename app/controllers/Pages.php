<?php
    class Pages extends Controller {
        public function __construct() {
        }

        public function index() {
            $data  = [
                'title' => 'Welcome',

                'description' => 'Simple school management based on TMVC framework'
            ];

            $this->view('pages/index', $data);

        }


        public function about() {
            $data = [
                'title' => 'About Us',

                'description' => 'App to manage school'
            ];

            $this->view('pages/about', $data);
        }
    }