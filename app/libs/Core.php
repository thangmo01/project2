<?php
    class Core {
        private $current_controller = 'Pages';
        private $current_method = 'index';
        private $params = [];

        public function __construct()
        {
            $url = $this->getURL();

            if(file_exists('../app/controllers/' . ucwords($url[0]) . '.php' )) {
                $this->current_controller = ucwords($url[0]);
                unset($url[0]);
            }

            require_once '../app/controllers/' . $this->current_controller . '.php';
            $this->current_controller = new $this->current_controller;

            if(isset($url[1])) {
                if(method_exists($this->current_controller, $url[1])) {
                    $this->current_method = $url[1];
                    unset($url[1]);
                }
            }

            $this->params = $url ? array_values($url) : [];
            // print_r($this->params);
            // die('__');
            //https://www.php.net/manual/en/function.array-values.php
            call_user_func_array([$this->current_controller, $this->current_method], $this->params);
            //https://www.php.net/manual/en/function.call-user-func-array.php
        }

        public function getURL() {
            if(isset($_GET['url'])) {
                $url = rtrim($_GET['url'], '/');
                $url = filter_var($url, FILTER_SANITIZE_URL);
                $url = explode('/', $url);
                return $url;
            }
        }
    }