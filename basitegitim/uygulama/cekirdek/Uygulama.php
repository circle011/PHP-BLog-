<?php

class Uygulamalar {

    protected $kontroller = 'misafir';
    protected $metod = 'index';
    protected $parametre = [];

    public function __construct() {
        $url = $this->parseUrl();

        if (isset($url[0])) {
            if (file_exists('uygulama/kontroller/' . $url[0] . '.php')) {
                $this->kontroller = $url[0];
                unset($url[0]);
            }
        }
        require_once 'uygulama/kontroller/' . $this->kontroller . '.php';
        $this->kontroller = new $this->kontroller;
        if (isset($url[1])) {
            if (method_exists($this->kontroller, $url[1])) {
                $this->metod = $url[1];
                unset($url[1]);
            }
        }
        $this->parametre = $url ? array_values($url) : [];
        call_user_func_array([$this->kontroller, $this->metod], $this->parametre);
    }

    public function parseUrl() {
        // isset böyle bir nesne varmı ? diye kontrol eder
        if (isset($_GET["url"])) {
            return $url = explode('/', filter_var(rtrim($_GET["url"], '/'), FILTER_SANITIZE_URL));
        }
        
    }

}

