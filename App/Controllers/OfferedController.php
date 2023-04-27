<?php
//gestione richieste per la table services_offered

namespace App\Controllers;


use PDO;
use App\Models\Offered;
use App\View\Response;



class OfferedController
{

    protected Offered $service;
    protected Response $response;
    public $data;

    public function __construct(protected PDO $conn)
    {
        $this->service = new Offered($conn);
        $this->response = new Response();
    }

    public function getServices()
    {
        $result = $this->service->all();
        $this->response->read($result);
    }
    public function getServicesById(int $id)
    {
        $result = $this->service->serviceById($id);
        $this->response->read($result);
    }

    public function create(){
        $post = [
            'name' => $_POST['name'],
            'time' => $_POST['time']
        ];
        $result = $this->service->create($post);
        $this->response->create($result);
    }

    public function update(int $id)
    {
            parse_str(file_get_contents("php://input"), $put_vars);
            $post = $put_vars;
            $result = $this->service->update($post, $id);
            $this->response->update($result);
    
    }

    public function delete(int $id)
    {
        $result = $this->service->delete($id);
        $this->response->delete($result);
    }


    //richieste riguardo il tempo risparmiato
    public function timeSaved()
    {
        $times = $this->service->joinTables();
        $total = 0;

        if ($times) {
            foreach ($times as $time) {
                $total += $time['Saved'];
            }
            $this->response->timeSaved($total);
        }
    }

    public function filterByDate($initialDate, $finalDate)
    {

        $times = $this->service->filterByDate($initialDate, $finalDate);
        $total = 0;
        if ($times) {
            foreach ($times as $time) {
                $total += $time['Saved'];
            }
        }else {
            $total = null;
        }
        $this->response->filteredByDate($total);
    }

    public function filterByType($type)
    {
        $type = str_replace('-', ' ', $type);
        $times = $this->service->filterByType($type);
        $this->response->filteredByType($times);
    }
}
