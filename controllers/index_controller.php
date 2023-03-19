<?php declare(strict_types=1);

//    include /helpers\i18n::class;
//    use helpers\i18n;

    class Index extends Controller {

        public function __construct() {
            $this->model  = '';
        }

        public function index(string $language) {
            if(!$language) {
                $language = 'de';
            }
            $copy = i18n::get_by_language($language);
            $data['copy'] = $copy;
            $this->view('index', $data);
        }
    }