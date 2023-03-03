<?php

class Hayal extends Kontroller
{
    public $model = [];

    public function __construct()
    {
        $this->model = $this->model("Misafirmodel");
    }

    public function index($id = "")
    {
        $this->model->hayal_getir();
        $deger = $this->model->veri["hayal"];
        $this->goruntu('misafir/index', ["hayal_yazi" => $deger], "giris");
    }
    public function hayal($id = "")
    {
        $this->model->tek_hayal_getir($id);
        $deger = $this->model->veri["hayal"];
        $this->goruntu('misafir/hayal_goster', ["hayal_yazi" => $deger], "giris");
    }


    public function isim($id = "")
    {
        $model = $this->model("Uyeler");
        $model->tum_uyeler();
        $uyeler = $model->veri["uyeler"];
        $this->goruntu('uyeler/listele', ["ad" => $uyeler], "giris");
    }
}
