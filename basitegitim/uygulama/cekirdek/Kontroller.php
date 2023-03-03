<?php

class Kontroller {

    public function model($model) {
        require_once 'uygulama/modeller/' . $model . '.php';
        return new $model();
    }

    public function goruntu($goruntu, $veri = [], $sayfa = "ana") {
        if ($sayfa == "ana") {
            require_once 'uygulama/goruntuler/sabitler/ust.php';
            require_once 'uygulama/goruntuler/sabitler/ustmenu.php';
            require_once 'uygulama/goruntuler/' . $goruntu . '.php';
            require_once 'uygulama/goruntuler/sabitler/alt.php';
        } else if ($sayfa == "giris") {
            require_once 'uygulama/goruntuler/sabitler/ust.php';
            require_once 'uygulama/goruntuler/' . $goruntu . '.php';
            require_once 'uygulama/goruntuler/sabitler/alt.php';
        } else if ($sayfa == "yonetici") {
            require_once 'uygulama/goruntuler/sabitler/yonetici_ust.php';
            require_once 'uygulama/goruntuler/' . $goruntu . '.php';
            require_once 'uygulama/goruntuler/sabitler/yonetici_alt.php';
        } else if ($sayfa == "yoneticimenu") {
            require_once 'uygulama/goruntuler/sabitler/yonetici_ust.php';
            require_once 'uygulama/goruntuler/sabitler/menu_ust.php';
            require_once 'uygulama/goruntuler/' . $goruntu . '.php';
            require_once 'uygulama/goruntuler/sabitler/menu_alt.php';
            require_once 'uygulama/goruntuler/sabitler/yonetici_alt.php';
        } else if ($sayfa == "tek") {
            require_once 'uygulama/goruntuler/' . $goruntu . '.php';
        }
    }

}
