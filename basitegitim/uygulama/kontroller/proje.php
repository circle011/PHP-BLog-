<?php

class Proje extends Kontroller
{
    public $model = [];

    public function __construct()
    {
        $this->model = $this->model("Misafirmodel");
    }

    public function index($id = "")
    {
        $this->model->proje_getir();
        $deger = $this->model->veri["proj"];
        $this->goruntu('misafir/index', ["proje_yazi" => $deger], "giris");
    }
    public function proje($id = "")
    {
        $this->model->tek_proje_getir($id);
        $deger = $this->model->veri["proj"];
        $this->goruntu('misafir/proje_goster', ["proje_yazi" => $deger], "giris");
    }


    public function isim($id = "")
    {
        $model = $this->model("Uyeler");
        $model->tum_uyeler();
        $uyeler = $model->veri["uyeler"];
        $this->goruntu('uyeler/listele', ["ad" => $uyeler], "giris");
    }
}
