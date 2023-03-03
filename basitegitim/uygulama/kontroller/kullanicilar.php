<?php

class Kullanicilar extends Kontroller {

    public function __construct() {
        
    }

    public function isim($id = "") {
        $model = $this->model("Uyeler");
        $model->tum_uyeler();
        $uyeler = $model->veri["uyeler"];
        $this->goruntu('uyeler/listele', ["ad" => $uyeler], "giris");
    }

}
