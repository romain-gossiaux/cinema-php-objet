<?php

class Vue_seances_films {
    private $_array = array();
    private $_id_seance;
    private $_date_heure;
    private $_id_film;
    private $_titre;
    private $_duree;
    private $_affiche;

    public function __construct(array $data){
        $this->_id_seance = $data['id_seance'];
        $this->_date_heure = $data['date_heure'];
        $this->_id_film = $data['id_film'];
        $this->_titre = $data['titre'];
        $this->_duree = $data['duree'];
        $this->_affiche = $data['affiche'];
    }

    public function getArray() {
        return $this->_array;
    }

    public function setArray($array) {
        $this->_array = $array;
    }

    public function getIdSeance() {
        return $this->_id_seance;
    }
    public function setIdSeance($id_seance) {
        $this->_id_seance = $id_seance;
    }

    public function getDateHeure() {
        return $this->_date_heure;
    }
    public function setDateHeure($date_heure) {
        $this->_date_heure = $date_heure;
    }

    public function getIdFilm() {
        return $this->_id_film;
    }
    public function setIdFilm($id_film) {
        $this->_id_film = $id_film;
    }

    public function getTitre() {
        return $this->_titre;
    }
    public function setTitre($titre) {
        $this->_titre = $titre;
    }

    public function getDuree() {
        return $this->_duree;
    }
    public function setDuree($duree) {
        $this->_duree = $duree;
    }

    public function getAffiche() {
        return $this->_affiche;
    }
    public function setAffiche($affiche) {
        $this->_affiche = $affiche;
    }
}