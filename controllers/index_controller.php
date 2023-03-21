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
//            $copy = i18n::get_by_language($language);
//            $data['copy'] = $copy;
            $data['copyObject'] = $copyObject;
            $this->view('index', $data);
        }
    }