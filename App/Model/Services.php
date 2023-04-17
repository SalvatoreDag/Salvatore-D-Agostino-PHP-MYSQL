<?php
//file per la gestione dei servizi

namespace App\Models;

use PDO;

class Services
{

    public function __construct(protected PDO $conn)
    {
    }

    public function all()
    {
        $result = [];
        $query = 'SELECT * from services_offered';
        $stm = $this->conn->prepare($query);
        $stm->execute();

        if ($stm && $stm->rowCount()) {
            $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        }
        return $result;
        // return $stm;
    }

    public function serviceById(int $id)
    {
        $ret = [];
        $query = 'SELECT * FROM services_offered where id = :id';
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
        $query = 'INSERT INTO services_offered (Name, Time) VALUES (:name, :time)';
        $stm = $this->conn->prepare($query);

        if ($stm) {
            $res = $stm->execute([
                'name' => $post['name'],
                'time' => $post['time'],
            ]);
            return $stm->rowCount();
        }
    }
    public function update(array $post, int $id)
    {
        $query = 'UPDATE services_offered SET Name =:name, Time =:time WHERE id =:id';
        $stm = $this->conn->prepare($query);

        if ($stm) {
            $res = $stm->execute([
                'name' => $post['name'],
                'time' => $post['time'],
                'id' => $id
            ]);
            return $stm->rowCount();
        }
    }

    public function delete(int $id)
    {
        $query = 'DELETE FROM services_offered WHERE id =:id';
        $stm = $this->conn->prepare($query);

        if ($stm) {
            $stm->bindParam('id', $id, PDO::PARAM_INT);
            $res = $stm->execute();
            return $stm->rowCount();
        }
    }

    public function joinTables()
    {
        $query = 'SELECT *, Time * Quantity AS Saved FROM services_offered INNER JOIN services_provided ON services_offered.Name = services_provided.Title ORDER BY Date ASC';
        $stm = $this->conn->prepare($query);

        if ($stm) {
            $res = $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    public function filterByDate($initialDate, $finalDate)
    {
        $query = 'SELECT *, Time * Quantity AS Saved FROM services_offered INNER JOIN services_provided ON services_offered.Name = services_provided.Title WHERE Date BETWEEN :initialDate AND :finalDate ORDER BY Date ASC';
        $stm = $this->conn->prepare($query);

        $stm->bindParam(":initialDate", $initialDate);
        $stm->bindParam(":finalDate", $finalDate);

        if ($stm) {
            $res = $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    public function filterByType($type)
    {
        $query = 'SELECT *, Time * Quantity AS Saved FROM services_offered INNER JOIN services_provided ON services_offered.Name = services_provided.Title WHERE Title = :type ORDER BY Date ASC';
        $stm = $this->conn->prepare($query);
        
        $stm->bindParam(":type", $type);

        if ($stm) {
            $res = $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        }
    }
}
