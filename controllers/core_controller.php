<?php declare(strict_types=1);

    #[AllowDynamicProperties]
    class Controller {

        public function model(string $model) {
            if(file_exists(ROOT_FILE . '/models/' . $model . '_model.php')){
                require_once ROOT_FILE . '/models/' . $model . '_model.php';
                return new $model();
            } else {
                exit('Model does not exist');
            }
        }

        public function view(string|null $view, $data = []) {
            if(file_exists(ROOT_FILE . '/views/' . $view . '.php')){
                require_once ROOT_FILE . '/views/' . $view . '.php';
            }
        }
    }
