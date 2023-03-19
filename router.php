<?php declare(strict_types=1);

    #[AllowDynamicProperties]
    class Route {

        public function __construct() {
            session_start();
            $url = $this->getUrl();

            $controller = 'index';
            $method = 'index';
            $this->params[] = $url[0] ?? '';

            $this->controller = $controller;
            $this->controller = new $this->controller;
            $this->method = $method;
            call_user_func_array([$this->controller, $this->method], $this->params);
        }

        private function getUrl(): array {
            if(isset($_GET['url'])) {
                $url = rtrim($_GET['url'], '/');
                $url = filter_var($url, FILTER_SANITIZE_URL);
                return explode('/', $url);
            } else {
                return [];
            }
        }
    }
