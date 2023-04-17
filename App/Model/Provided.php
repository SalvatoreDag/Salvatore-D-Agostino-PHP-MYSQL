<?php

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
        $query = 'INSERT INTO services_provided (Date, Title, Quantity) VALUES (:date, :title, :quantity)';
        $stm = $this->conn->prepare($query);

        if ($stm) {
            $res = $stm->execute([
                'date' => date('Y-m-d H-i-s'),
                'title' => $post['title'],
                'quantity' => $post['quantity'],
            ]);
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
