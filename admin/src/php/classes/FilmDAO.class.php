<?php

class FilmDAO
{
    private $_bd;
    private $_array = array();

    public function __construct($cnx)
    {
        $this->_bd = $cnx;
    }

    public function getFilm()
    {
        $query = "select * from film";
        try {
            $this->_bd->beginTransaction();
            $resultset = $this->_bd->prepare($query);
            $resultset->execute();
            $data = $resultset->fetchAll();
            foreach ($data as $d) {
                $_array[] = new Film($d);
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
    public function countAll()
    {
        $query = "select COUNT(*) from film";
        try {
            $this->_bd->beginTransaction();
            $stmt = $this->_bd->prepare($query);
            $stmt->execute();
            $retour = $stmt->fetchColumn(0);
            $this->_bd->commit();
            if ($retour == -1) {
                return -1;
            }
            return $retour;
        } catch (PDOException $e) {
            $this->_bd->rollBack();
            print "Echec : " . $e->getMessage();
        }
    }

}