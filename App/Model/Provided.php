<?php
//file che contiene le query per la table services_provided

namespace App\Models;

use PDO;

class Provided
{


    public function __construct(protected PDO $conn)
    {
    }
    public function all()
    {
        $result = [];
        $query = 'SELECT * from services_provided';
        $stm = $this->conn->prepare($query);
        $stm->execute();

        if ($stm && $stm->rowCount()) {
            $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        }
        return $result;
        // return $stm;
    }
    public function providedById(int $id)
    {
        $ret = [];
        $query = 'SELECT * FROM services_provided where id = :id';
        $stm = $this->conn->prepare($query);
        if ($stm) {
            $res = $stm->execute(['id' => $id]); //Esegue un'istruzione preparata
            if ($res) {
                $ret = $stm->fetch();
            }
        }
        return $ret;
    }

    public function create(array $post)
    {

        $sql = "SELECT id FROM services_offered WHERE Name = :title";
        $query = 'INSERT INTO services_provided (service_id, Date, Title, Quantity) VALUES (:id, :date, :title, :quantity)';
        $stmt = $this->conn->prepare($sql);
        $stm = $this->conn->prepare($query);

        if ($stm && $stmt) {

            $stmt->execute([
                'title' => $post['title'],
            ]);
            $id = $stmt->fetchColumn();


            //se non esiste il relativo servizio in service_offered non esegue la query
            if ($id) {
                $res = $stm->execute([
                    'id' => $id,
                    'date' => date('Y-m-d H-i-s'),
                    'title' => $post['title'],
                    'quantity' => $post['quantity'],
                ]);
            }



            return $stm->rowCount();
        }
    }
    public function update(array $post, int $id)
    {
        $query = 'UPDATE services_provided SET Date =:date, Title =:title, Quantity =:quantity WHERE id =:id';
        $stm = $this->conn->prepare($query);

        if ($stm) {
            $res = $stm->execute([
                'date' => date('Y-m-d H-i-s'),
                'title' => $post['title'],
                'quantity' => $post['quantity'],
                'id' => $id
            ]);
            return $stm->rowCount();
        }
    }

    public function delete(int $id)
    {
        $query = 'DELETE FROM services_provided WHERE id =:id';
        $stm = $this->conn->prepare($query);

        if ($stm) {
            $stm->bindParam('id', $id, PDO::PARAM_INT);
            $res = $stm->execute();
            return $stm->rowCount();
        }
    }
}
