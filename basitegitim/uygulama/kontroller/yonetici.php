<?php

class Yonetici extends Kontroller
{
    public $model = [];

    public function __construct()
    {
        $this->model = $this->model("Yoneticimodel");

        $durum = FUNC::kontrol();
        if ($durum) {
            $this->goruntu('yonetici/giris_yap', [], "yonetici");
            exit;
        }
    }

    public function index($id = "")
    {
        $this->goruntu('yonetici/index', [], "yoneticimenu");
    }
    public function yazilarim($parametre = "")
    {
        switch ($parametre) {
            case "yeni":
                $this->goruntu('yonetici/yazi_islem/yeni', [], "yoneticimenu");
                break;
            case !"":

                $this->model->tek_blog_yazi_getir($parametre);
                $deger = $this->model->veri["yazi"];
                $this->goruntu('yonetici/yazi_islem/guncelle', ["blog_yazi" => $deger], "yoneticimenu");
                break;

            default:
                $this->model->blog_yazi_getir();
                $deger = $this->model->veri["yazi"];
                $this->goruntu('yonetici/yazi_islem/tumu', ["blog_yazi" => $deger], "yoneticimenu");
                break;
        }
    }
    public function projelerim($parametre = "")
    {
        switch ($parametre) {
            case "proje":
                $this->goruntu('yonetici/yazi_islem/proje_yeni', [], "yoneticimenu");
                break;
            case !"":

                $this->model->tek_proje_getir($parametre);
                $deger = $this->model->veri["proje"];
                $this->goruntu('yonetici/yazi_islem/proje_guncelle', ["proj" => $deger], "yoneticimenu");
                break;

            default:
                $this->model->proje_getir();
                $deger = $this->model->veri["proje"];
                $this->goruntu('yonetici/yazi_islem/projelerim', ["proje" => $deger], "yoneticimenu");
                break;
        }
    }
    public function hayallerim($parametre = "")
    {

        switch ($parametre) {
            case "hayal":
                $this->model->hayal_getir();
               
                $deger = $this->model->veri["hayal"];
                

                $this->goruntu('yonetici/yazi_islem/yeni_hayal', ["hayal" => $deger], "yoneticimenu");
                break;
            case !"":

                $this->model->tek_hayal_getir($parametre);
                $deger = $this->model->veri["hayal"];
                $this->goruntu('yonetici/yazi_islem/hayal_guncelle', ["hayal" => $deger], "yoneticimenu");
                break;

            default:
                $this->model->hayal_getir();
              
                $deger = $this->model->veri["hayal"];
                $this->goruntu('yonetici/yazi_islem/hayallerim', ["hayal" => $deger], "yoneticimenu");
                break;
        }
    }

    public function amaclarim($parametre = "")
    {

        switch ($parametre) {
            case "amac":
                $this->model->amac_getir();
               
                $deger = $this->model->veri["amac"];
                

                $this->goruntu('yonetici/yazi_islem/amac_yeni', ["amac" => $deger], "yoneticimenu");
                break;
            case !"":

                $this->model->tek_amac_getir($parametre);
                $deger = $this->model->veri["amac"];
                $this->goruntu('yonetici/yazi_islem/amac_guncelle', ["amac" => $deger], "yoneticimenu");
                break;

            default:
                $this->model->amac_getir();
              
                $deger = $this->model->veri["amac"];
                $this->goruntu('yonetici/yazi_islem/amaclarim', ["amac" => $deger], "yoneticimenu");
                break;
        }
    }

    public function ideallerim($parametre = "")
    {

        switch ($parametre) {
            case "ideal":
                $this->model->ideal_getir();
               
                $deger = $this->model->veri["ideal"];
                

                $this->goruntu('yonetici/yazi_islem/ideal_yeni', ["ideal" => $deger], "yoneticimenu");
                break;
            case !"":

                $this->model->tek_ideal_getir($parametre);
                $deger = $this->model->veri["ideal"];
                $this->goruntu('yonetici/yazi_islem/ideal_guncelle', ["ideal" => $deger], "yoneticimenu");
                break;

            default:
                $this->model->ideal_getir();
              
                $deger = $this->model->veri["ideal"];
                $this->goruntu('yonetici/yazi_islem/ideallerim', ["ideal" => $deger], "yoneticimenu");
                break;
        }
    }
    public function cikis()
    {
        FUNC::cikis();
    }


    public function isim($id = "")
    {
        $model = $this->model("Uyeler");
        $model->tum_uyeler();
        $uyeler = $model->veri["uyeler"];
        $this->goruntu('uyeler/listele', ["ad" => $uyeler], "giris");
    }
}
