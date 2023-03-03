<?php

class Yoneticimodel
{

    protected $db = [];
    public $veri = [];

    public function __construct()
    {
        $this->db = new DB();
    }

    public function tek_blog_yazi_getir($id)
    {
        $veri_al = $this->db->row("SELECT * from blog_yazi where id=:id ", ["id" => $id]);
        $this->veri["yazi"] = $veri_al;
    }
    public function blog_yazi_getir()
    {
        $veri_al = $this->db->query("SELECT * from blog_yazi ");
        $this->veri["yazi"] = $veri_al;
    }
    public function tek_proje_getir($id)
    {
        $veri_al = $this->db->row("SELECT * from projeler where id=:id ", ["id" => $id]);
        $this->veri["proje"] = $veri_al;
    }
    public function proje_getir()
    {
        $veri_al = $this->db->query("SELECT * from projeler ");
        $this->veri["proje"] = $veri_al;
    }
    public function tek_hayal_getir($id)
    {
        $veri_al = $this->db->row("SELECT * from hayaller where id=:id ", ["id" => $id]);
        $this->veri["hayal"] = $veri_al;
    }
    public function hayal_getir()
    {
        $veri_al = $this->db->query("SELECT * from hayaller ");
        $this->veri["hayal"] = $veri_al;
    }

    public function tek_amac_getir($id)
    {
        $veri_al = $this->db->row("SELECT * from amaclar where id=:id ", ["id" => $id]);
        $this->veri["amac"] = $veri_al;
    }
    public function amac_getir()
    {
        $veri_al = $this->db->query("SELECT * from amaclar ");
        $this->veri["amac"] = $veri_al;
    }

    public function tek_ideal_getir($id)
    {
        $veri_al = $this->db->row("SELECT * from ideallerim where id=:id ", ["id" => $id]);
        $this->veri["ideal"] = $veri_al;
    }
    public function ideal_getir()
    {
        $veri_al = $this->db->query("SELECT * from ideallerim ");
        $this->veri["ideal"] = $veri_al;
    }

    public function tum_uyeler()
    {

        $veri_al = $this->db->query("select * from uyeler");
        $this->veri["uyeler"] = $veri_al;
    }

    public function giris_kontrol_et($kuladi, $sifre)
    {


        $veri_al = $this->db->query("SELECT * from kontrol where kul_adi =:deger1", ["deger1" => $kuladi]);
        if (empty($veri_al)) {
            $geri_donut = "kul_yok";
        } else {
            $al_sifre = $veri_al[0]["sifre"];
            if ($sifre == $al_sifre) {
                $geri_donut = "giris";
                $this->veri["oturum"] = ["yetki" => $veri_al[0]["yetki"], "kontrol_id" => $veri_al[0]["id"]];
            } else {
                $geri_donut = "sifre";
            }
        }
        $this->veri["giris"] = $geri_donut;
    }
    public function blog_yazi_kaydet($bilgiler, $resimler)
    {
        $ekleyen = FUNC::id_getir();
        $tarih = FUNC::tarih("int");
        $veri_al = $this->db->query("insert into blog_yazi(baslik,k_baslik,kategori,durum,icerik,resimler,ekleyen_kisi,eklenme_tarih) values(:1,:2,:3,:4,:5,:6,:7,:8)", ["1" => $bilgiler["baslik"], "2" => $bilgiler["k_baslik"], "3" => $bilgiler["kategori"], "4" => $bilgiler["durum"], "5" => $bilgiler["icerik"], "6" => $resimler, "7" => $ekleyen, "8" => $tarih]);
        $this->veri["blog_kayit_id"] = $this->db->lastInsertId();
    }
    public function proje_yazi_kaydet($bilgiler, $resimler)
    {
        $ekleyen = FUNC::id_getir();
        $tarih = FUNC::tarih("int");
        $veri_al = $this->db->query("insert into blog_yazi(baslik,k_baslik,kategori,durum,icerik,resimler,ekleyen_kisi,eklenme_tarih) values(:1,:2,:3,:4,:5,:6,:7,:8)", ["1" => $bilgiler["baslik"], "2" => $bilgiler["k_baslik"], "3" => $bilgiler["kategori"], "4" => $bilgiler["durum"], "5" => $bilgiler["icerik"], "6" => $resimler, "7" => $ekleyen, "8" => $tarih]);
        $this->veri["proje_yazi_kaydet"] = $this->db->lastInsertId();
    }
    public function hayal_yazi_kaydet($bilgiler, $resimler)
    {
        $ekleyen = FUNC::id_getir();
        $tarih = FUNC::tarih("int");
        $veri_al = $this->db->query("insert into blog_yazi(baslik,k_baslik,kategori,durum,icerik,resimler,ekleyen_kisi,eklenme_tarih) values(:1,:2,:3,:4,:5,:6,:7,:8)", ["1" => $bilgiler["baslik"], "2" => $bilgiler["k_baslik"], "3" => $bilgiler["kategori"], "4" => $bilgiler["durum"], "5" => $bilgiler["icerik"], "6" => $resimler, "7" => $ekleyen, "8" => $tarih]);
        $this->veri["hayal_yazi_kaydet"] = $this->db->lastInsertId();
    }

    public function amac_yazi_kaydet($bilgiler, $resimler)
    {
        $ekleyen = FUNC::id_getir();
        $tarih = FUNC::tarih("int");
        $veri_al = $this->db->query("insert into blog_yazi(baslik,k_baslik,kategori,durum,icerik,resimler,ekleyen_kisi,eklenme_tarih) values(:1,:2,:3,:4,:5,:6,:7,:8)", ["1" => $bilgiler["baslik"], "2" => $bilgiler["k_baslik"], "3" => $bilgiler["kategori"], "4" => $bilgiler["durum"], "5" => $bilgiler["icerik"], "6" => $resimler, "7" => $ekleyen, "8" => $tarih]);
        $this->veri["amac_yazi_kaydet"] = $this->db->lastInsertId();
    }

    public function ideal_yazi_kaydet($bilgiler, $resimler)
    {
        $ekleyen = FUNC::id_getir();
        $tarih = FUNC::tarih("int");
        $veri_al = $this->db->query("insert into blog_yazi(baslik,k_baslik,kategori,durum,icerik,resimler,ekleyen_kisi,eklenme_tarih) values(:1,:2,:3,:4,:5,:6,:7,:8)", ["1" => $bilgiler["baslik"], "2" => $bilgiler["k_baslik"], "3" => $bilgiler["kategori"], "4" => $bilgiler["durum"], "5" => $bilgiler["icerik"], "6" => $resimler, "7" => $ekleyen, "8" => $tarih]);
        $this->veri["ideal_yazi_kaydet"] = $this->db->lastInsertId();
    }
}
