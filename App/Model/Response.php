<?php
//file per la gestione degli status code di risposta
namespace App\Models;

class Response
{
    public function read($result)
    {
        if ($result) {
            http_response_code(200);
            echo json_encode($result);
        } else {
            http_response_code(404);
            echo json_encode(
                array("error" => "No service founded")
            );
        }
    }
    public function create($result)
    {
        if ($result) {
            http_response_code(201);
            $json = strip_tags(json_encode(array("message" => "Service added successfully")));
            echo $json;
        } else {
            http_response_code(503);
            echo json_encode(array("error" => "Failed to create the service"));
        }
    }
    public function delete($result)
    {
        if ($result) {
            http_response_code(200);
            echo json_encode(array("message" => "Service deleted"));
        } else {
            http_response_code(503);
            echo json_encode(
                array("error" => "unable to delete the service")
            );
        }
    }
    public function update($result)
    {
        if ($result) {
            http_response_code(200);
            echo json_encode(array("message" => "Service updated"));
        } else {
            http_response_code(503);
            echo json_encode(
                array("error" => "Unable to update the service")
            );
        }
    }
    public function timeSaved($result)
    {
        if ($result) {
            http_response_code(200);
            echo json_encode(array("Time Saved" => $result));
        } else {
            http_response_code(204);
        }
    }

     public function filteredByDate($result)
     {
        
          if ($result) {
              http_response_code(200);
              echo json_encode(array("Time Saved" => $result));
          } else {
              http_response_code(204);
          }
     }

    public function filteredByType($result){
        if ($result) {
            http_response_code(200);
            echo json_encode(array("Typology" => $result[0]['Name'], "Time Saved" => $result[0]['Saved']));
        } else {
            http_response_code(204);
        }
    }
}
