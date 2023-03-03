<?php

class Misafir extends Kontroller {
    public $model = [];

    public function __construct() {
        $this->model = $this->model("Misafirmodel");
    }

    public function index($id = "") {
        $this->model->blog_yazi_getir();
        $deger = $this->model->veri["yazi"];
        $this->model->proje_getir();
        $proj = $this->model->veri["proj"];
        $this->model->hayal_getir();
        $hayal = $this->model->veri["hayal"];
        $this->model->amac_getir();
        $amac = $this->model->veri["amac"];
        $this->model->ideal_getir();
        $ideal = $this->model->veri["ideal"];
        $this->model->tek_yorum_getir();
        $yorum = $this->model->veri['yorum'];

        $this->goruntu('misafir/index', ["blog_yazi" => $deger, "proj"=>$proj, "hayal"=>$hayal, "amac"=>$amac, "ideal"=>$ideal,"yorum"=>$yorum] ,  "giris");
    }
    public function yazi($id = "") {
        $this->model->tek_blog_yazi_getir($id);
        $deger = $this->model->veri["yazi"];
        $this->goruntu('misafir/yazi_goster', ["blog_yazi" => $deger], "giris");
    }
    public function proje_yazi($id = "") {
        $this->model->tek_proje_getir($id);
        $deger = $this->model->veri["proj"];
        $this->goruntu('misafir/proje_goster', ["proje_yazi" => $deger], "giris");
    }
    public function hayal_yazi($id = "") {
        $this->model->tek_hayal_getir($id);
        $deger = $this->model->veri["hayal"];
        $this->goruntu('misafir/hayal_goster', ["hayal_yazi" => $deger], "giris");
    }

    public function amac_yazi($id = "") {
        $this->model->tek_amac_getir($id);
        $deger = $this->model->veri["amac"];
        $this->goruntu('misafir/amac_goster', ["amac_yazi" => $deger], "giris");
    }
    public function ideal_yazi($id = "") {
        $this->model->tek_ideal_getir($id);
        $deger = $this->model->veri["ideal"];
        $this->model->tek_yorum_getir();
        $yorum = $this->model->veri['yorum'];
        $this->goruntu('misafir/ideal_goster', ["ideal_yazi" => $deger,"yorum"=>$yorum], "giris");
    }


    public function isim($id = "") {
        $model = $this->model("Uyeler");
        $model->tum_uyeler();
        $uyeler = $model->veri["uyeler"];
        $this->goruntu('uyeler/listele', ["ad" => $uyeler], "giris");
    }
   
    

}
