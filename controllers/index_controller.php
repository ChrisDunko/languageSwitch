<?php declare(strict_types=1);
    use Helpers\i18n;

    class Index extends Controller {

        public function __construct() {
            $this->model  = '';
        }

        public function index(string $language) {
            if(!$language) {
                $language = 'de';
            }
            $copyObject = new i18n($language);
            $data['copyObject'] = $copyObject;
            $this->view('index', $data);
        }
    }