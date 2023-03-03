<?php

class Postlarmodel
{

    protected $db = [];
    public $veri = [];

    public function __construct()
    {
        $this->db = new DB();
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
        $veri_al = $this->db->query("insert into blog_yazi(baslik,k_baslik,kategori,durum,icerik,resimler,ekleyen_kisi,eklenme_tarih,tur) values(:1,:2,:3,:4,:5,:6,:7,:8,:9)", ["1" => $bilgiler["baslik"], "2" => $bilgiler["k_baslik"], "3" => $bilgiler["kategori"], "4" => $bilgiler["durum"], "5" => $bilgiler["icerik"], "6" => $resimler, "7" => $ekleyen, "8" => $tarih, "9" => $bilgiler["tur"]]);
        $this->veri["blog_kayit_id"] = $this->db->lastInsertId();
    }
    public function blog_yazi_guncelle($bilgiler, $resimler)
    {
        $ekleyen = FUNC::id_getir();
        $tarih = FUNC::tarih("int");

        if (empty($resimler)) {
            $insert = $this->db->query("UPDATE blog_yazi  SET baslik = :1 , k_baslik =:2 , kategori = :3 , durum =:4 , icerik =:5, tur =:6  WHERE id = :7", array("1" => $bilgiler["baslik"], "2" => $bilgiler["k_baslik"], "3" => $bilgiler["kategori"], "4" => $bilgiler["durum"], "5" => $bilgiler["icerik"], "6" => $bilgiler["tur"], "7" => $bilgiler["id"]));
        } else {
            $insert = $this->db->query("UPDATE blog_yazi  SET baslik = :1 , k_baslik =:2 , kategori = :3 , durum =:4 , icerik =:5, tur =:6 , resimler =:8  WHERE id = :7", array("1" => $bilgiler["baslik"], "2" => $bilgiler["k_baslik"], "3" => $bilgiler["kategori"], "4" => $bilgiler["durum"], "5" => $bilgiler["icerik"], "6" => $bilgiler["tur"], "7" => $bilgiler["id"], "8" => $resimler));
        }
    }
    


    public function proje_yazi_kaydet($bilgiler, $resimler)
    {
        $ekleyen = FUNC::id_getir();
        $tarih = FUNC::tarih("int");
        $veri_al = $this->db->query("insert into projeler(baslik,k_baslik,kategori,durum,icerik,resimler,ekleyen_kisi,eklenme_tarih,tur) values(:1,:2,:3,:4,:5,:6,:7,:8,:9)", ["1" => $bilgiler["baslik"], "2" => $bilgiler["k_baslik"], "3" => $bilgiler["kategori"], "4" => $bilgiler["durum"], "5" => $bilgiler["icerik"], "6" => $resimler, "7" => $ekleyen, "8" => $tarih, "9" => $bilgiler["tur"]]);
        $this->veri["proje_yazi_kaydet"] = $this->db->lastInsertId();
    }
    public function yeni_proje_ekle($bilgiler, $resimler){
        $ekleyen = FUNC::id_getir();
        $tarih = FUNC::tarih("int");
        $veri_al = $this->db->query("insert into projeler(baslik,k_baslik,kategori,durum,icerik,resimler,ekleyen_kisi,eklenme_tarih,tur) values(:1,:2,:3,:4,:5,:6,:7,:8,:9)", 
        ["1" => $bilgiler["baslik"], "2" => $bilgiler["k_baslik"], "3" => $bilgiler["kategori"],
         "4" => $bilgiler["durum"], "5" => $bilgiler["icerik"], "6" => $resimler, "7" => $ekleyen, "8" => $tarih, "9" => $bilgiler["tur"]]);
        $this->veri["proje_yazi_ekle"] = $this->db->lastInsertId();
   
    }
    public function yeni_proje_guncelle($bilgiler, $resimler)
    {
        $ekleyen = FUNC::id_getir();
        $tarih = FUNC::tarih("int");

        if (empty($resimler)) {
            $insert = $this->db->query("UPDATE projeler  SET baslik = :1 , k_baslik =:2 , kategori = :3 , durum =:4 , icerik =:5, tur =:6  WHERE id = :7", array("1" => $bilgiler["baslik"], "2" => $bilgiler["k_baslik"], "3" => $bilgiler["kategori"], "4" => $bilgiler["durum"], "5" => $bilgiler["icerik"], "6" => $bilgiler["tur"], "7" => $bilgiler["id"]));
        } else {
            $insert = $this->db->query("UPDATE projeler  SET baslik = :1 , k_baslik =:2 , kategori = :3 , durum =:4 , icerik =:5, tur =:6 , resimler =:8  WHERE id = :7", array("1" => $bilgiler["baslik"], "2" => $bilgiler["k_baslik"], "3" => $bilgiler["kategori"], "4" => $bilgiler["durum"], "5" => $bilgiler["icerik"], "6" => $bilgiler["tur"], "7" => $bilgiler["id"], "8" => $resimler));
        }
    }


    
    public function hayal_yazi_kaydet($bilgiler, $resimler)
    {
        $ekleyen = FUNC::id_getir();
        $tarih = FUNC::tarih("int");
        $veri_al = $this->db->query("insert into hayaller(baslik,k_baslik,kategori,durum,icerik,resimler,ekleyen_kisi,eklenme_tarih,tur) values(:1,:2,:3,:4,:5,:6,:7,:8,:9)", ["1" => $bilgiler["baslik"], "2" => $bilgiler["k_baslik"], "3" => $bilgiler["kategori"], "4" => $bilgiler["durum"], "5" => $bilgiler["icerik"], "6" => $resimler, "7" => $ekleyen, "8" => $tarih, "9" => $bilgiler["tur"]]);
        $this->veri["hayal_yazi_kaydet"] = $this->db->lastInsertId();
    }
    public function yeni_hayal_ekle($bilgiler, $resimler){
        $ekleyen = FUNC::id_getir();
        $tarih = FUNC::tarih("int");
        $veri_al = $this->db->query("insert into hayaller(baslik,k_baslik,kategori,durum,icerik,resimler,ekleyen_kisi,eklenme_tarih,tur) values(:1,:2,:3,:4,:5,:6,:7,:8,:9)", 
        ["1" => $bilgiler["baslik"], "2" => $bilgiler["k_baslik"], "3" => $bilgiler["kategori"],
         "4" => $bilgiler["durum"], "5" => $bilgiler["icerik"], "6" => $resimler, "7" => $ekleyen, "8" => $tarih, "9" => $bilgiler["tur"]]);
        $this->veri["hayal_yazi_ekle"] = $this->db->lastInsertId();
   
    }

    public function yeni_hayal_guncelle($bilgiler, $resimler)
    {
        $ekleyen = FUNC::id_getir();
        $tarih = FUNC::tarih("int");

        if (empty($resimler)) {
            $insert = $this->db->query("UPDATE hayaller  SET baslik = :1 , k_baslik =:2 , kategori = :3 , durum =:4 , icerik =:5, tur =:6  WHERE id = :7", array("1" => $bilgiler["baslik"], "2" => $bilgiler["k_baslik"], "3" => $bilgiler["kategori"], "4" => $bilgiler["durum"], "5" => $bilgiler["icerik"], "6" => $bilgiler["tur"], "7" => $bilgiler["id"]));
        } else {
            $insert = $this->db->query("UPDATE hayaller  SET baslik = :1 , k_baslik =:2 , kategori = :3 , durum =:4 , icerik =:5, tur =:6 , resimler =:8  WHERE id = :7", array("1" => $bilgiler["baslik"], "2" => $bilgiler["k_baslik"], "3" => $bilgiler["kategori"], "4" => $bilgiler["durum"], "5" => $bilgiler["icerik"], "6" => $bilgiler["tur"], "7" => $bilgiler["id"], "8" => $resimler));
        }
    }

    public function amac_yazi_kaydet($bilgiler, $resimler)
    {
        $ekleyen = FUNC::id_getir();
        $tarih = FUNC::tarih("int");
        $veri_al = $this->db->query("insert into amaclar(baslik,k_baslik,kategori,durum,icerik,resimler,ekleyen_kisi,eklenme_tarih,tur) values(:1,:2,:3,:4,:5,:6,:7,:8,:9)", ["1" => $bilgiler["baslik"], "2" => $bilgiler["k_baslik"], "3" => $bilgiler["kategori"], "4" => $bilgiler["durum"], "5" => $bilgiler["icerik"], "6" => $resimler, "7" => $ekleyen, "8" => $tarih, "9" => $bilgiler["tur"]]);
        $this->veri["amac_yazi_kaydet"] = $this->db->lastInsertId();
    }
    public function yeni_amac_ekle($bilgiler, $resimler){
        $ekleyen = FUNC::id_getir();
        $tarih = FUNC::tarih("int");
        $veri_al = $this->db->query("insert into amaclar(baslik,k_baslik,kategori,durum,icerik,resimler,ekleyen_kisi,eklenme_tarih,tur) values(:1,:2,:3,:4,:5,:6,:7,:8,:9)", 
        ["1" => $bilgiler["baslik"], "2" => $bilgiler["k_baslik"], "3" => $bilgiler["kategori"],
         "4" => $bilgiler["durum"], "5" => $bilgiler["icerik"], "6" => $resimler, "7" => $ekleyen, "8" => $tarih, "9" => $bilgiler["tur"]]);
        $this->veri["amac_yazi_ekle"] = $this->db->lastInsertId();
   
    }
    public function yeni_amac_guncelle($bilgiler, $resimler)
    {
        $ekleyen = FUNC::id_getir();
        $tarih = FUNC::tarih("int");

        if (empty($resimler)) {
            $insert = $this->db->query("UPDATE amaclar  SET baslik = :1 , k_baslik =:2 , kategori = :3 , durum =:4 , icerik =:5, tur =:6  WHERE id = :7", array("1" => $bilgiler["baslik"], "2" => $bilgiler["k_baslik"], "3" => $bilgiler["kategori"], "4" => $bilgiler["durum"], "5" => $bilgiler["icerik"], "6" => $bilgiler["tur"], "7" => $bilgiler["id"]));
        } else {
            $insert = $this->db->query("UPDATE amaclar SET baslik = :1 , k_baslik =:2 , kategori = :3 , durum =:4 , icerik =:5, tur =:6 , resimler =:8  WHERE id = :7", array("1" => $bilgiler["baslik"], "2" => $bilgiler["k_baslik"], "3" => $bilgiler["kategori"], "4" => $bilgiler["durum"], "5" => $bilgiler["icerik"], "6" => $bilgiler["tur"], "7" => $bilgiler["id"], "8" => $resimler));
        }
    }

    public function ideal_yazi_kaydet($bilgiler, $resimler)
    {
        $ekleyen = FUNC::id_getir();
        $tarih = FUNC::tarih("int");
        $veri_al = $this->db->query("insert into ideallerim(baslik,k_baslik,kategori,durum,icerik,resimler,ekleyen_kisi,eklenme_tarih,tur) values(:1,:2,:3,:4,:5,:6,:7,:8,:9)", ["1" => $bilgiler["baslik"], "2" => $bilgiler["k_baslik"], "3" => $bilgiler["kategori"], "4" => $bilgiler["durum"], "5" => $bilgiler["icerik"], "6" => $resimler, "7" => $ekleyen, "8" => $tarih, "9" => $bilgiler["tur"]]);
        $this->veri["ideal_yazi_kaydet"] = $this->db->lastInsertId();
    }
    public function yeni_ideal_ekle($bilgiler, $resimler){
        $ekleyen = FUNC::id_getir();
        $tarih = FUNC::tarih("int");
        $veri_al = $this->db->query("insert into ideallerim(baslik,k_baslik,kategori,durum,icerik,resimler,ekleyen_kisi,eklenme_tarih,tur) values(:1,:2,:3,:4,:5,:6,:7,:8,:9)", 
        ["1" => $bilgiler["baslik"], "2" => $bilgiler["k_baslik"], "3" => $bilgiler["kategori"],
         "4" => $bilgiler["durum"], "5" => $bilgiler["icerik"], "6" => $resimler, "7" => $ekleyen, "8" => $tarih, "9" => $bilgiler["tur"]]);
        $this->veri["ideal_yazi_ekle"] = $this->db->lastInsertId();
   
    }
    public function yeni_ideal_guncelle($bilgiler, $resimler)
    {
        $ekleyen = FUNC::id_getir();
        $tarih = FUNC::tarih("int");

        if (empty($resimler)) {
            $insert = $this->db->query("UPDATE ideallerim  SET baslik = :1 , k_baslik =:2 , kategori = :3 , durum =:4 , icerik =:5, tur =:6  WHERE id = :7", array("1" => $bilgiler["baslik"], "2" => $bilgiler["k_baslik"], "3" => $bilgiler["kategori"], "4" => $bilgiler["durum"], "5" => $bilgiler["icerik"], "6" => $bilgiler["tur"], "7" => $bilgiler["id"]));
        } else {
            $insert = $this->db->query("UPDATE ideallerim SET baslik = :1 , k_baslik =:2 , kategori = :3 , durum =:4 , icerik =:5, tur =:6 , resimler =:8  WHERE id = :7", array("1" => $bilgiler["baslik"], "2" => $bilgiler["k_baslik"], "3" => $bilgiler["kategori"], "4" => $bilgiler["durum"], "5" => $bilgiler["icerik"], "6" => $bilgiler["tur"], "7" => $bilgiler["id"], "8" => $resimler));
        }
    }
}
