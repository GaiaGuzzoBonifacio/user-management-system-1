<?php
namespace sarassoroberto\usm\model;
use \PDO;
use sarassoroberto\usm\entity\User;

class UserModel
{

    private $conn;

    public function __construct()
    {
        try {
            $this->conn = new PDO('mysql:dbname=corso_formarete;host=localhost', 'root', '');
            $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            // TODO: togliere echo
            echo $e->getMessage();
        }
    }

    // CRUD
    public function create(User $user)
    {

        try {
            $pdostm = $this->conn->prepare('INSERT INTO User (firstName,lastName,email,birthday)
            VALUES (:firstName,:lastName,:email,:birthday);');

            $pdostm->bindValue(':firstName', $user->getFirstName(), PDO::PARAM_STR);
            $pdostm->bindValue(':lastName', $user->getLastName(), PDO::PARAM_STR);
            $pdostm->bindValue(':email', $user->getEmail(), PDO::PARAM_STR);
            $pdostm->bindValue(':birthday', $user->getBirthday(), PDO::PARAM_STR);

            $pdostm->execute();
        } catch (\PDOException $e) {
            // TODO: Evitare echo
            echo $e->getMessage();
            
        
        }
    }


    public function readAll()
    {
        $pdostm = $this->conn->prepare('SELECT * FROM User;');
        $pdostm->execute();
        return $pdostm->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,User::class,['','','','']);
    }
    public function update()
    {
    }
    public function delete($id)
    {

        try {
            $pdostm = $this->conn->prepare('DELETE FROM User where userId=:id;');
            $pdostm->bindValue(':id',$id, PDO::PARAM_INT);
            $pdostm->execute();
            $count = $pdostm->rowCount();

            
            /** @see https://www.php.net/manual/en/pdostatement.rowcount.php */
            var_dump($count);
            if($count === 1){
                return true;
            }else{
                return false;
            }
    
        } catch (\Throwable $th) {
            //throw $th;
            echo $th->getMessage();
        }
  
    }
}
