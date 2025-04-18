<?php

class Vue_seances_filmsDAO
{
    private $_bd;
    private $_array = array();

    public function __construct($cnx)
    {
        $this->_bd = $cnx;
    }

    public function getAllSeance()
    {
        $query = "select * from vue_seances_films";
        try {
            $this->_bd->beginTransaction();
            $result = $this->_bd->prepare($query);
            $result->execute();

            foreach ($result as $d) {
                $_array[] = new Vue_seances_films($d);
            }
            $this->_bd->commit();
            if (!empty($_array)) {
                return $_array;
            } else {
                return null;
            }
        } catch (PDOException $e) {
            $this->_bd->rollback();
            print "Echec de la requête " . $e->getMessage();
        }
    }
}