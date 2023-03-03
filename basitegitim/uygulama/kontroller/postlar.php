<?php

class Postlar extends Kontroller
{
    public $model = [];

    public function __construct()
    {
        $this->model = $this->model("Postlarmodel");
    }

    public function index($id = "")
    {



        $this->goruntu('misafir/index', [], "giris");
    }


    public function giris_yap($id = "")
    {
        $veri = $_POST["form_veri"];
        $veri = FUNC::post_coz($veri);
        $kul_adi = $veri["kuladi"];
        $sifre = $veri["sifre"];

        $this->model->giris_kontrol_et($kul_adi, $sifre);
        $geri_donut =  $this->model->veri["giris"];
        if ($geri_donut == "kul_yok") {
            $json["islem"] = "kul_yok";
        } else if ($geri_donut == "sifre") {
            $json["islem"] = "sifre";
        } else if ($geri_donut == "giris") {
            $json["islem"] = "giris";
            $_SESSION["oturum"] = $this->model->veri["oturum"];
        }
        echo json_encode($json);
    }
    public function yeni_blog_ekle()
    {
        $veri = $_POST["formcu"];
        $veri = FUNC::post_coz($veri);



        $resim_toplu_tut = [];
        if (isset($_FILES['files']) && !empty($_FILES['files'])) {
            $no_files = count($_FILES["files"]['name']);
            for ($i = 0; $i < $no_files; $i++) {
                if ($_FILES["files"]["error"][$i] > 0) {
                    echo "Error: " . $_FILES["files"]["error"][$i] . "<br>";
                } else {
                    if (@file_exists('uploads/' . $_FILES["files"]["name"][$i])) {
                        echo 'File already exists : uploads/' . $_FILES["files"]["name"][$i];
                    } else {
                        $uzanti = explode(".", $_FILES["files"]["name"][$i]);
                        $uzanti = $uzanti[(count($uzanti) - 1)];
                        $resim_tek_tut = "blog_yazi/" . FUNC::id_getir() . "_" . uniqid() . "." . $uzanti;
                        $resim_yeni_ad = DOSYAYOL . "uygulama/kaynak/resimler/" . $resim_tek_tut;
                        $resim_toplu_tut[] = $resim_tek_tut;
                        move_uploaded_file($_FILES["files"]["tmp_name"][$i], $resim_yeni_ad);
                    }
                }
            }
        }
        $resim_toplu_tut = implode(",", $resim_toplu_tut);
        $this->model->blog_yazi_kaydet($veri, $resim_toplu_tut);
        $json["islem"] = "basarili";
        $json["id"] = $this->model->veri["blog_kayit_id"];
        echo json_encode($json);
    }
    public function yeni_blog_ekle_guncelle()
    {
        $veri = $_POST["formcu"];
        $veri = FUNC::post_coz($veri);



        $resim_toplu_tut = [];
        if (isset($_FILES['files']) && !empty($_FILES['files'])) {
            $no_files = count($_FILES["files"]['name']);
            for ($i = 0; $i < $no_files; $i++) {
                if ($_FILES["files"]["error"][$i] > 0) {
                    echo "Error: " . $_FILES["files"]["error"][$i] . "<br>";
                } else {
                    if (@file_exists('uploads/' . $_FILES["files"]["name"][$i])) {
                        echo 'File already exists : uploads/' . $_FILES["files"]["name"][$i];
                    } else {
                        $uzanti = explode(".", $_FILES["files"]["name"][$i]);
                        $uzanti = $uzanti[(count($uzanti) - 1)];
                        $resim_tek_tut = "blog_yazi/" . FUNC::id_getir() . "_" . uniqid() . "." . $uzanti;
                        $resim_yeni_ad = DOSYAYOL . "uygulama/kaynak/resimler/" . $resim_tek_tut;
                        $resim_toplu_tut[] = $resim_tek_tut;
                        move_uploaded_file($_FILES["files"]["tmp_name"][$i], $resim_yeni_ad);
                    }
                }
            }
        }
        $resim_toplu_tut = implode(",", $resim_toplu_tut);
        $this->model->blog_yazi_guncelle($veri, $resim_toplu_tut);
        $json["islem"] = "basarili";
        $json["id"] = $veri["id"];
        echo json_encode($json);
    }
    public function yeni_proje_ekle()
    {
        $veri = $_POST["formcu"];
        $veri = FUNC::post_coz($veri);



        $resim_toplu_tut = [];
        if (isset($_FILES['files']) && !empty($_FILES['files'])) {
            $no_files = count($_FILES["files"]['name']);
            for ($i = 0; $i < $no_files; $i++) {
                if ($_FILES["files"]["error"][$i] > 0) {
                    echo "Error: " . $_FILES["files"]["error"][$i] . "<br>";
                } else {
                    if (@file_exists('uploads/' . $_FILES["files"]["name"][$i])) {
                        echo 'File already exists : uploads/' . $_FILES["files"]["name"][$i];
                    } else {
                        $uzanti = explode(".", $_FILES["files"]["name"][$i]);
                        $uzanti = $uzanti[(count($uzanti) - 1)];
                        $resim_tek_tut = "proj/" . FUNC::id_getir() . "_" . uniqid() . "." . $uzanti;
                        $resim_yeni_ad = DOSYAYOL . "uygulama/kaynak/resimler/" . $resim_tek_tut;
                        $resim_toplu_tut[] = $resim_tek_tut;
                        move_uploaded_file($_FILES["files"]["tmp_name"][$i], $resim_yeni_ad);
                    }
                }
            }
        }
        $resim_toplu_tut = implode(",", $resim_toplu_tut);
        $this->model->yeni_proje_ekle($veri, $resim_toplu_tut);
        $json["islem"] = "basarili";
        $json["id"] = $this->model->veri["proje_yazi_ekle"];
        echo json_encode($json);
    }
    public function yeni_proje_yazi_guncelle()
    {
        $veri = $_POST["formcu"];
        $veri = FUNC::post_coz($veri);



        $resim_toplu_tut = [];
        if (isset($_FILES['files']) && !empty($_FILES['files'])) {
            $no_files = count($_FILES["files"]['name']);
            for ($i = 0; $i < $no_files; $i++) {
                if ($_FILES["files"]["error"][$i] > 0) {
                    echo "Error: " . $_FILES["files"]["error"][$i] . "<br>";
                } else {
                    if (@file_exists('uploads/' . $_FILES["files"]["name"][$i])) {
                        echo 'File already exists : uploads/' . $_FILES["files"]["name"][$i];
                    } else {
                        $uzanti = explode(".", $_FILES["files"]["name"][$i]);
                        $uzanti = $uzanti[(count($uzanti) - 1)];
                        $resim_tek_tut = "proje/" . FUNC::id_getir() . "_" . uniqid() . "." . $uzanti;
                        $resim_yeni_ad = DOSYAYOL . "uygulama/kaynak/resimler/" . $resim_tek_tut;
                        $resim_toplu_tut[] = $resim_tek_tut;
                        move_uploaded_file($_FILES["files"]["tmp_name"][$i], $resim_yeni_ad);
                    }
                }
            }
        }
        $resim_toplu_tut = implode(",", $resim_toplu_tut);
        $this->model->yeni_proje_guncelle($veri, $resim_toplu_tut);
        $json["islem"] = "basarili";
        $json["id"] = $veri["id"];
        echo json_encode($json);
    }
    public function yeni_hayal_ekle()
    {
        $veri = $_POST["formcu"];
        $veri = FUNC::post_coz($veri);



        $resim_toplu_tut = [];
        if (isset($_FILES['files']) && !empty($_FILES['files'])) {
            $no_files = count($_FILES["files"]['name']);
            for ($i = 0; $i < $no_files; $i++) {
                if ($_FILES["files"]["error"][$i] > 0) {
                    echo "Error: " . $_FILES["files"]["error"][$i] . "<br>";
                } else {
                    if (@file_exists('uploads/' . $_FILES["files"]["name"][$i])) {
                        echo 'File already exists : uploads/' . $_FILES["files"]["name"][$i];
                    } else {
                        $uzanti = explode(".", $_FILES["files"]["name"][$i]);
                        $uzanti = $uzanti[(count($uzanti) - 1)];
                        $resim_tek_tut = "hayal/" . FUNC::id_getir() . "_" . uniqid() . "." . $uzanti;
                        $resim_yeni_ad = DOSYAYOL . "uygulama/kaynak/resimler/" . $resim_tek_tut;
                        $resim_toplu_tut[] = $resim_tek_tut;
                        move_uploaded_file($_FILES["files"]["tmp_name"][$i], $resim_yeni_ad);
                    }
                }
            }
        }
        $resim_toplu_tut = implode(",", $resim_toplu_tut);
        $this->model->yeni_hayal_ekle($veri, $resim_toplu_tut);
        $json["islem"] = "basarili";
        $json["id"] = $this->model->veri["hayal_yazi_ekle"];
        echo json_encode($json);
    }
    public function hayal_guncelle()
    {
        $veri = $_POST["formcu"];
        $veri = FUNC::post_coz($veri);



        $resim_toplu_tut = [];
        if (isset($_FILES['files']) && !empty($_FILES['files'])) {
            $no_files = count($_FILES["files"]['name']);
            for ($i = 0; $i < $no_files; $i++) {
                if ($_FILES["files"]["error"][$i] > 0) {
                    echo "Error: " . $_FILES["files"]["error"][$i] . "<br>";
                } else {
                    if (@file_exists('uploads/' . $_FILES["files"]["name"][$i])) {
                        echo 'File already exists : uploads/' . $_FILES["files"]["name"][$i];
                    } else {
                        $uzanti = explode(".", $_FILES["files"]["name"][$i]);
                        $uzanti = $uzanti[(count($uzanti) - 1)];
                        $resim_tek_tut = "hayal/" . FUNC::id_getir() . "_" . uniqid() . "." . $uzanti;
                        $resim_yeni_ad = DOSYAYOL . "uygulama/kaynak/resimler/" . $resim_tek_tut;
                        $resim_toplu_tut[] = $resim_tek_tut;
                        move_uploaded_file($_FILES["files"]["tmp_name"][$i], $resim_yeni_ad);
                    }
                }
            }
        }
        $resim_toplu_tut = implode(",", $resim_toplu_tut);
        $this->model->yeni_hayal_guncelle($veri, $resim_toplu_tut);
        $json["islem"] = "basarili";
        $json["id"] = $veri["id"];
        echo json_encode($json);
    }

    public function yeni_amac_ekle()
    {
        $veri = $_POST["formcu"];
        $veri = FUNC::post_coz($veri);



        $resim_toplu_tut = [];
        if (isset($_FILES['files']) && !empty($_FILES['files'])) {
            $no_files = count($_FILES["files"]['name']);
            for ($i = 0; $i < $no_files; $i++) {
                if ($_FILES["files"]["error"][$i] > 0) {
                    echo "Error: " . $_FILES["files"]["error"][$i] . "<br>";
                } else {
                    if (@file_exists('uploads/' . $_FILES["files"]["name"][$i])) {
                        echo 'File already exists : uploads/' . $_FILES["files"]["name"][$i];
                    } else {
                        $uzanti = explode(".", $_FILES["files"]["name"][$i]);
                        $uzanti = $uzanti[(count($uzanti) - 1)];
                        $resim_tek_tut = "amac/" . FUNC::id_getir() . "_" . uniqid() . "." . $uzanti;
                        $resim_yeni_ad = DOSYAYOL . "uygulama/kaynak/resimler/" . $resim_tek_tut;
                        $resim_toplu_tut[] = $resim_tek_tut;
                        move_uploaded_file($_FILES["files"]["tmp_name"][$i], $resim_yeni_ad);
                    }
                }
            }
        }
        $resim_toplu_tut = implode(",", $resim_toplu_tut);
        $this->model->yeni_amac_ekle($veri, $resim_toplu_tut);
        $json["islem"] = "basarili";
        $json["id"] = $this->model->veri["amac_yazi_ekle"];
        echo json_encode($json);
    }
    public function amac_guncelle()
    {
        $veri = $_POST["formcu"];
        $veri = FUNC::post_coz($veri);



        $resim_toplu_tut = [];
        if (isset($_FILES['files']) && !empty($_FILES['files'])) {
            $no_files = count($_FILES["files"]['name']);
            for ($i = 0; $i < $no_files; $i++) {
                if ($_FILES["files"]["error"][$i] > 0) {
                    echo "Error: " . $_FILES["files"]["error"][$i] . "<br>";
                } else {
                    if (@file_exists('uploads/' . $_FILES["files"]["name"][$i])) {
                        echo 'File already exists : uploads/' . $_FILES["files"]["name"][$i];
                    } else {
                        $uzanti = explode(".", $_FILES["files"]["name"][$i]);
                        $uzanti = $uzanti[(count($uzanti) - 1)];
                        $resim_tek_tut = "amac/" . FUNC::id_getir() . "_" . uniqid() . "." . $uzanti;
                        $resim_yeni_ad = DOSYAYOL . "uygulama/kaynak/resimler/" . $resim_tek_tut;
                        $resim_toplu_tut[] = $resim_tek_tut;
                        move_uploaded_file($_FILES["files"]["tmp_name"][$i], $resim_yeni_ad);
                    }
                }
            }
        }
        $resim_toplu_tut = implode(",", $resim_toplu_tut);
        $this->model->yeni_amac_guncelle($veri, $resim_toplu_tut);
        $json["islem"] = "basarili";
        $json["id"] = $veri["id"];
        echo json_encode($json);
    }
    public function yeni_ideal_ekle()
    {
        $veri = $_POST["formcu"];
        $veri = FUNC::post_coz($veri);



        $resim_toplu_tut = [];
        if (isset($_FILES['files']) && !empty($_FILES['files'])) {
            $no_files = count($_FILES["files"]['name']);
            for ($i = 0; $i < $no_files; $i++) {
                if ($_FILES["files"]["error"][$i] > 0) {
                    echo "Error: " . $_FILES["files"]["error"][$i] . "<br>";
                } else {
                    if (@file_exists('uploads/' . $_FILES["files"]["name"][$i])) {
                        echo 'File already exists : uploads/' . $_FILES["files"]["name"][$i];
                    } else {
                        $uzanti = explode(".", $_FILES["files"]["name"][$i]);
                        $uzanti = $uzanti[(count($uzanti) - 1)];
                        $resim_tek_tut = "ideal/" . FUNC::id_getir() . "_" . uniqid() . "." . $uzanti;
                        $resim_yeni_ad = DOSYAYOL . "uygulama/kaynak/resimler/" . $resim_tek_tut;
                        $resim_toplu_tut[] = $resim_tek_tut;
                        move_uploaded_file($_FILES["files"]["tmp_name"][$i], $resim_yeni_ad);
                    }
                }
            }
        }
        $resim_toplu_tut = implode(",", $resim_toplu_tut);
        $this->model->yeni_ideal_ekle($veri, $resim_toplu_tut);
        $json["islem"] = "basarili";
        $json["id"] = $this->model->veri["ideal_yazi_ekle"];
        echo json_encode($json);
    }

    public function ideal_guncelle()
    {
        $veri = $_POST["formcu"];
        $veri = FUNC::post_coz($veri);



        $resim_toplu_tut = [];
        if (isset($_FILES['files']) && !empty($_FILES['files'])) {
            $no_files = count($_FILES["files"]['name']);
            for ($i = 0; $i < $no_files; $i++) {
                if ($_FILES["files"]["error"][$i] > 0) {
                    echo "Error: " . $_FILES["files"]["error"][$i] . "<br>";
                } else {
                    if (@file_exists('uploads/' . $_FILES["files"]["name"][$i])) {
                        echo 'File already exists : uploads/' . $_FILES["files"]["name"][$i];
                    } else {
                        $uzanti = explode(".", $_FILES["files"]["name"][$i]);
                        $uzanti = $uzanti[(count($uzanti) - 1)];
                        $resim_tek_tut = "ideal/" . FUNC::id_getir() . "_" . uniqid() . "." . $uzanti;
                        $resim_yeni_ad = DOSYAYOL . "uygulama/kaynak/resimler/" . $resim_tek_tut;
                        $resim_toplu_tut[] = $resim_tek_tut;
                        move_uploaded_file($_FILES["files"]["tmp_name"][$i], $resim_yeni_ad);
                    }
                }
            }
        }
        $resim_toplu_tut = implode(",", $resim_toplu_tut);
        $this->model->yeni_ideal_guncelle($veri, $resim_toplu_tut);
        $json["islem"] = "basarili";
        $json["id"] = $veri["id"];
        echo json_encode($json);
    }
    public function yeni_yorum_ekle()
    {
        echo 'merhaba';
    }
}

