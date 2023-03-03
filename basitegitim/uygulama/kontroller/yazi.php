<?php

class Yazi extends Kontroller
{
    public $model = [];

    public function __construct()
    {
        $this->model = $this->model("Misafirmodel");
    }

    public function index($id = "")
    {
        $this->model->blog_yazi_getir();
        $deger = $this->model->veri["yazi"];
        $this->goruntu('misafir/index', ["blog_yazi" => $deger], "giris");
    }
    public function yazi($id = "")
    {
        $this->model->tek_blog_yazi_getir($id);
        $deger = $this->model->veri["yazi"];
        $this->goruntu('misafir/yazi_goster', ["blog_yazi" => $deger], "giris");
    }


    public function isim($id = "")
    {
        $model = $this->model("Uyeler");
        $model->tum_uyeler();
        $uyeler = $model->veri["uyeler"];
        $this->goruntu('uyeler/listele', ["ad" => $uyeler], "giris");
    }
}
