<?php

class Uyeler
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
}
