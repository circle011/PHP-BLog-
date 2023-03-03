<?php

class Misafirmodel{
    protected $db = [];
    public $veri = [];

    public function __construct() {
        $this->db = new DB();
    }

    public function tek_blog_yazi_getir($id) {
        $veri_al = $this->db->row("select * from blog_yazi where id=:id", ["id" => $id]);
        $this->veri["yazi"] = $veri_al;
    }

    public function blog_yazi_getir() {
        $veri_al = $this->db->query("select * from blog_yazi ");
        $this->veri["yazi"] = $veri_al;
    }
    public function proje_getir() {
        $veri_al = $this->db->query("select * from projeler ");
        $this->veri["proj"] = $veri_al;
    }
    public function goruntu_artir($id) {
        $insert = $this->db->query("UPDATE blog_yazi  SET gosterim = gosterim + 1 WHERE id = :6", array("6" => $id));
    }
    public function tek_proje_getir($id) {
        $veri_al = $this->db->row("select * from projeler where id=:id", ["id" => $id]);
        $this->veri["proj"] = $veri_al;
    }
    public function tek_yorum_getir() {
        $veri_al = $this->db->row("SELECT * from yorumlar");
        $this->veri["yorum"] = $veri_al;
    }
    public function proje_artir($id) {
        $insert = $this->db->query("UPDATE projeler  SET gosterim = gosterim + 1 WHERE id = :6", array("6" => $id));
    }
    public function hayal_getir() {
        $veri_al = $this->db->query("select * from hayaller ");
        $this->veri["hayal"] = $veri_al;
    }
    public function tek_hayal_getir($id) {
        $veri_al = $this->db->row("select * from hayaller where id=:id", ["id" => $id]);
        $this->veri["hayal"] = $veri_al;
    }
    public function hayal_artir($id) {
        $insert = $this->db->query("UPDATE hayaller  SET gosterim = gosterim + 1 WHERE id = :6", array("6" => $id));
    }

    public function amac_getir() {
        $veri_al = $this->db->query("select * from amaclar ");
        $this->veri["amac"] = $veri_al;
    }
    public function tek_amac_getir($id) {
        $veri_al = $this->db->row("select * from amaclar where id=:id", ["id" => $id]);
        $this->veri["amac"] = $veri_al;
    }
    public function amac_artir($id) {
        $insert = $this->db->query("UPDATE amaclar  SET gosterim = gosterim + 1 WHERE id = :6", array("6" => $id));
    }
    public function ideal_getir() {
        $veri_al = $this->db->query("select * from ideallerim ");
        $this->veri["ideal"] = $veri_al;
    }
    public function tek_ideal_getir($id) {
        $veri_al = $this->db->row("select * from ideallerim where id=:id", ["id" => $id]);
        $this->veri["ideal"] = $veri_al;
    }
    public function ideal_artir($id) {
        $insert = $this->db->query("UPDATE ideallerim  SET gosterim = gosterim + 1 WHERE id = :6", array("6" => $id));
    }
}