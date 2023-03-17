<?php declare(strict_types=1);

    class Index extends Controller {

        public function __construct() {
            $this->model  = '';
        }

        public function index() {
            $data = [];
            $this->view('index', $data);
        }
    }