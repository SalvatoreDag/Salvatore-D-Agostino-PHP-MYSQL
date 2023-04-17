<?php 
//gestione richieste per la table services_provided

namespace App\Controllers;

use PDO;
use App\Models\Response;
use App\Models\Provided;

class ProvidedController {
    
    protected Response $response;
    protected Provided $provided;

    public function __construct(protected PDO $conn){
       $this->provided = new Provided($conn);
       $this->response = new Response();
    }

    public function getProvided()
    {
        $result = $this->provided->all();
        $this->response->read($result);
    }

    public function getProvidedById(int $id)
    {
        $result = $this->provided->providedById($id);
         $this->response->read($result);
    }

    public function save(?int $id = null)
    {

        if (!$id) {
            $post = [
                'title' => $_POST['title'],
                'quantity' => $_POST['quantity']
            ];
            $result = $this->provided->create($post);
            $this->response->create($result);
        } else {
            parse_str(file_get_contents("php://input"), $put_vars);
            $post = $put_vars;
            $result = $this->provided->update($post, $id);
            $this->response->update($result);
        }
    }
    public function delete(int $id)
    {
        $result = $this->provided->delete($id);
        $this->response->delete($result);
    }



}
