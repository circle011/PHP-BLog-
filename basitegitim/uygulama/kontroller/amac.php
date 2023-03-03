<?php

class Amac extends Kontroller
{
    public $model = [];

    public function __construct()
    {
        $this->model = $this->model("Misafirmodel");
    }

    public function index($id = "")
    {
        $this->model->amac_getir();
        $deger = $this->model->veri["amac"];
        $this->goruntu('misafir/index', ["amac_yazi" => $deger], "giris");
    }
    public function amac($id = "")
    {
        $this->model->tek_amac_getir($id);
        $deger = $this->model->veri["amac"];
        $this->goruntu('misafir/amac_goster', ["amac_yazi" => $deger], "giris");
    }


    public function isim($id = "")
    {
        $model = $this->model("Uyeler");
        $model->tum_uyeler();
        $uyeler = $model->veri["uyeler"];
        $this->goruntu('uyeler/listele', ["ad" => $uyeler], "giris");
    }
}
