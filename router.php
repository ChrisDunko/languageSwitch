<?php declare(strict_types=1);

    #[AllowDynamicProperties]
    class Route {

        public function __construct() {
            session_start();
            $url = $this->getUrl();

            $controller = DEFAULT_CONTROLLER;
            $method = DEFAULT_METHOD;
            $params = [];

            if(!empty($url[0])) {
                if(file_exists(ROOT_FILE . '/controllers/' . $url[0] . '_controller.php') || file_exists(ROOT_FILE . '/controllers/' . $url[0] . '_controller.php')) {
                    $controller = $url[0];
                    unset($url[0]);
                    if(!empty($url[1])) {
                        if(method_exists($controller, $url[1])) {
                            $method = $url[1];
                            unset($url[1]);
//                            $params[] = array_values($url);
                        } else {
                            $params[] = $url[1];
                            unset($url[1]);
                            if( !empty($url[2]) && method_exists($controller, $url[2]) ) {
                                $method = $url[2];
                                unset($url[2]);
                            }
                        }
                    }
                } elseif (method_exists( $controller, $url[0])) {
                    $method = $url[0];
                    unset( $url[0] );
                } else {
                    if(strlen($url[0]) === 6) {
                        // project
                        $controller = 'project';
                    } elseif(strlen($url[0]) === 8) {
                        // topic
                        $controller = 'topic';
                    } elseif(strlen($url[0]) === 10) {
                        // comment
                        $controller = 'comment';
                    } elseif(strlen($url[0]) === 16) {
                        // token
                        $controller = 'token';
                    } else {
                        redirect( '' );
                        exit();
                    }
                }
            }
            $this->controller = $controller;
            $this->controller = new $this->controller;
            $this->method = $method;
            if(isset($url)) {
                $this->params = array_merge($params, array_values($url)) ?? [];
            } else {
                $this->params = $params;
            }
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
