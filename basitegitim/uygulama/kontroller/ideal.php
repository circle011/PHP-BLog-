<?php

class İdeal extends Kontroller
{
    public $model = [];

    public function __construct()
    {
        $this->model = $this->model("Misafirmodel");
    }

    public function index($id = "")
    {
        $this->model->idal_getir();
        $deger = $this->model->veri["ideal"];
        $this->model->tek_yorum_getir();
        $yorum = $this->model->veri['yorum'];
        $this->goruntu('misafir/index', ["ideal_yazi" => $deger,"yorum"=>$yorum], "giris");
    }
    public function ideal($id = "")
    {
        $this->model->tek_ideal_getir($id);
        $deger = $this->model->veri["ideal"];
        $this->model->tek_yorum_getir();
        $yorum = $this->model->veri['yorum'];
        $this->goruntu('misafir/ideal_goster', ["ideal_yazi" => $deger,"yorum"=>$yorum], "giris");
    }


    public function isim($id = "")
    {
        $model = $this->model("Uyeler");
        $model->tum_uyeler();
        $uyeler = $model->veri["uyeler"];
        $this->goruntu('uyeler/listele', ["ad" => $uyeler], "giris");
    }
}
