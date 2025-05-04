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
        $query = "select * from vue_seances_films order by date_heure asc";
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

    public function getSeanceById($id)
    {
        $query = "select * from vue_seances_films where id_seance = :id";
        try {
            $this->_bd->beginTransaction();
            $stmt = $this->_bd->prepare($query);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            $retour = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->_bd->commit();
            if ($retour == -1) {
                return -1;
            }
            return new Vue_seances_films($retour);
        } catch (PDOException $e) {
            $this->_bd->rollBack();
            print "Echec : " . $e->getMessage();
        }
    }

    public function getAfficheBySeanceId($id)
    {
        $query = "select affiche from vue_seances_films where id_seance = :id";
        try {
            $this->_bd->beginTransaction();
            $stmt = $this->_bd->prepare($query);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            $retour = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->_bd->commit();
            if ($retour == -1) {
                return -1;
            }
            return $retour['affiche'];
        } catch (PDOException $e) {
            $this->_bd->rollBack();
            print "Echec : " . $e->getMessage();
        }
    }

    public function getNextSeance()
    {
        $query = "SELECT * FROM get_next_seance()";
        try {
            $this->_bd->beginTransaction();
            $stmt = $this->_bd->prepare($query);
            $stmt->execute();
            $retour = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->_bd->commit();
            return new Vue_seances_films($retour);
        } catch (PDOException $e) {
            $this->_bd->rollBack();
            print "Echec : " . $e->getMessage();
        }
    }

    public function getFilmsALAffiche($nb)
    {
        $query = "SELECT * FROM get_films_a_l_affiche(:nb)";
        try {
            $this->_bd->beginTransaction();
            $stmt = $this->_bd->prepare($query);
            $stmt->bindValue(':nb', $nb);
            $stmt->execute();
            $retour = $stmt->fetchAll(PDO::FETCH_ASSOC);
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

    public function updateSeance($id, $date_heure)
    {
        $query = "select update_seance(:id,:date_heure) as retour";
        try {
            $this->_bd->beginTransaction();
            $stmt = $this->_bd->prepare($query);
            $stmt->bindValue(':id', $id);
            $stmt->bindValue(':date_heure', $date_heure);
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