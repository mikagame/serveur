<?php

require_once "./models/Model.php";

class APIManager extends Model
{
    public function getDBAnimaux()
    {
        $req = "SELECT * 
        FROM animal a inner join famille f on f.famille_id = a.famille_id 
        inner join animal_continent ac on ac.animal_id = a.animal_id
        inner join continent c on c.continent_id = ac.continent_id";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->execute();
        $animaux = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $animaux;
    }

    public function getDBAnimal($idAnimal)
    {

        $req = "SELECT * 
        FROM animal a inner join famille f on f.famille_id = a.famille_id 
        inner join animal_continent ac on ac.animal_id = a.animal_id
        inner join continent c on c.continent_id = ac.continent_id WHERE a.animal_id = :idAnimal";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":idAnimal", $idAnimal, PDO::PARAM_INT);
        $stmt->execute();
        $lignesAnimal = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $lignesAnimal;
    }

    public function getDBFamilles()
    {
        $req = "SELECT * 
        FROM famille";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->execute();
        $familles = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $familles;
    }

    public function getDBContinents()
    {
        $req = "SELECT * 
        FROM continent";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->execute();
        $continents = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $continents;
    }
}