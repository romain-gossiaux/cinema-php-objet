<?php

class ReservationDAO
{
    private $_bd;
    private $_array = array();

    public function __construct($cnx)
    {
        $this->_bd = $cnx;
    }

    public function getReservations()
    {
        $query = "select * from reservation";
        try {
            $this->_bd->beginTransaction();
            $resultset = $this->_bd->prepare($query);
            $resultset->execute();
            $data = $resultset->fetchAll();
            foreach ($data as $d) {
                $_array[] = new Reservation($d);
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

    public function addReservation($nom, $email, $id_seance)
    {
        $query = "select add_reservation(:nom, :email, :id_seance) as retour";
        try {
            $this->_bd->beginTransaction();
            $stmt = $this->_bd->prepare($query);
            $stmt->bindValue(':nom', $nom);
            $stmt->bindValue(':email', $email);
            $stmt->bindValue(':id_seance', $id_seance);
            $stmt->execute();
            $retour = $stmt->fetchColumn(0);
            $this->_bd->commit();
            return $retour;
        } catch (PDOException $e) {
            $this->_bd->rollBack();
            print $e->getMessage();
            return -1;
        }
    }
    public function deleteReservation($id)
    {
        $query = "select delete_reservation(:id_reservation)";
        try {
            $this->_bd->beginTransaction();
            $stmt = $this->_bd->prepare($query);
            $stmt->bindValue(':id_reservation', $id);
            $stmt->execute();
            $retour = $stmt->fetchColumn(0);
            $this->_bd->commit();
            return $retour;
        } catch (PDOException $e) {
            $this->_bd->rollBack();
            print $e->getMessage();
        }
    }

}