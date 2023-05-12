<?php
//gestione richieste per la table services_provided

namespace App\Controllers;

use PDO;
use App\View\Response;
use App\Models\ServiceProvided;

class ProvidedController
{

    protected Response $response;
    protected ServiceProvided $provided;

    public function __construct(protected PDO $conn)
    {
        $this->provided = new ServiceProvided($conn);
        $this->response = new Response();
    }

    public function getProvided()
    {
        $result = $this->provided->all();
        $this->response->read($result);
    }

    public function getProvidedById($id)
    {

        $result = $this->provided->providedById($id[0]);
        $this->response->read($result);
    }

    public function create()
    {
        $post = [
            'title' => $_POST['title'],
            'quantity' => $_POST['quantity']
        ];
        $result = $this->provided->create($post);
        $this->response->create($result);
    }

    public function update($id)
    {
        parse_str(file_get_contents("php://input"), $put_vars);
        $post = $put_vars;
        $result = $this->provided->update($post, $id[0]);
        $this->response->update($result);
    }
    public function delete($id)
    {
        $result = $this->provided->delete($id[0]);
        $this->response->delete($result);
    }
}
