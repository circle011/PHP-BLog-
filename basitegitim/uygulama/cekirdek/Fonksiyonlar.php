<?php

class FUNC
{

    public function __construct()
    {
    }

    public static function haftanin_kacinci_gunu()
    {
        $hafta = date('w');
        $hafta == 0 ? $hafta = 7 : null;
        return $hafta;
    }
    public static function isim_getir()
    {
        return "furkan";
    }
    public static function kontrol()
    {
        if (isset($_SESSION["oturum"])) {
            return false;
        } else {
            return true;
        }
    }
    public static function kategoriler()
    {
        return ["Günlük", "Akademi", "Bilim", "Sanat",];
    }
    public static function durum()
    {
        return ["Yayında", "İncelemede", "İptal",];
    }
    public static function tur()
    {
        return ["Standart", "Önemli",];
    }
    public static function tarih($deger, $value = "")
    {
        switch ($deger) {
            case "int":
                return strtotime(date("d.m.Y H:i:s"));
                break;
            case "yaz":
                return (date("d.m.Y H:i:s", $value));
                break;

            default:

                break;
        }
    }
    public static function id_getir()
    {
        return $_SESSION["oturum"]["kontrol_id"];
    }

    public static function cikis()
    {
        session_destroy();
        header('Location:' . ANA_DIZIN);
        return;
    }

    public static function post_coz($deger)
    {
        parse_str($deger, $output);
        return $output;
    }
};
