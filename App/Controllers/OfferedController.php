<?php
//gestione richieste per la table services_offered

namespace App\Controllers;


use PDO;
use App\Models\ServiceOffered;
use App\View\Response;



class OfferedController
{

    protected ServiceOffered $service;
    protected Response $response;
    public $data;

    public function __construct(protected PDO $conn)
    {
        $this->service = new ServiceOffered($conn);
        $this->response = new Response();
    }

    public function getServices()
    {
        $result = $this->service->all();
        $this->response->read($result);
    }
    public function getServicesById($id)
    {
        $result = $this->service->serviceById($id[0]);
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

    public function update($id)
    {
            parse_str(file_get_contents("php://input"), $put_vars);
            $post = $put_vars;
            $result = $this->service->update($post, $id[0]);
            $this->response->update($result);
    
    }

    public function delete($id)
    {
        $result = $this->service->delete($id[0]);
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

    public function filter($filter)
{       
        //filtro per tipologia
        if(array_key_exists("type", $filter)){
        $filter = str_replace('-', ' ', $filter);
        $times = $this->service->filterByType($filter);
        $this->response->filteredByType($times);

        //filtro per data
        }else{
            $times = $this->service->filterByDate($filter);
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
    }
}
