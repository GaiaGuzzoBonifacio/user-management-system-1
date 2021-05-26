<?php
namespace sarasso\usm\model;

use \PDO;
use sarassoroberto\usm\config\local\AppConfig;
use sarassoroberto\usm\entity\Interesse;

class InteresseModel
{
    private $conn;

    public function __construct()
    {
        try {
            $this->conn = new PDO('mysql:dbname='.AppConfig::DB_NAME.';host='.AppConfig::DB_HOST, AppConfig::DB_USER, AppConfig::DB_PASSWORD);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {

            echo $e->getMessage();
        }
    }

    public function create(Interesse $interesse)
    {
        try {
            $pdostm = $this->conn->prepare('INSERT INTO Interesse (nome)
            VALUES (:nome);');

            $pdostm->bindValue(':nome', $interesse->getNome(), PDO::PARAM_STR);

            $pdostm->execute();
        } catch (\PDOException $e) {
            throw $e;
        }
    }

    public function readAll()
    {
        $pdostm = $this->conn->prepare('SELECT * FROM Interesse;');
        $pdostm->execute();
        return $pdostm->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, Interesse::class, ['']);
    }

    public function readOne($interesse_id)
    {
        try {
            $sql = "Select * from Interesse where interesseId=:interesse_id";
            $pdostm = $this->conn->prepare($sql);
            $pdostm->bindValue('interesse_id', $interesse_id, PDO::PARAM_INT);
            $pdostm->execute();
            $result = $pdostm->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, Interesse::class, ['']);

            return count($result) === 0 ? null : $result[0];
        } catch (\Throwable $th) {
            echo "qualcosa è andato storto";
            echo " ". $th->getMessage();
        }
    }

    public function update($interesse)
    {
        $sql = "UPDATE Interesse set nome=:nome
                                     where interesseId=:interesse_id;";
        $pdostm = $this->conn->prepare($sql);
        $pdostm->bindValue(':nome', $interesse->getNome(), PDO::PARAM_STR);
        $pdostm->bindValue('interesse_id', $interesse->getInteresseId());

        try {
            $pdostm->execute();

            if($pdostm->rowCount() === 0) {
                return false;
            } elseif ($pdostm->rowCount() === 1) {
                return true;
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function delete(int $interesse_id):bool
    {
        $sql = "delete from Interesse where interesseId=:interesse_id";

        $pdostm = $this->conn->prepare($sql);
        $pdostm->bindValue(':interesse_id', $interesse_id, PDO::PARAM_INT);
        $pdostm->execute();

        if ($pdostm->rowCount() === 0) {
            return false;
        } elseif ($pdostm->rowCount() === 1) {
            return true;
        }
    }

    
}