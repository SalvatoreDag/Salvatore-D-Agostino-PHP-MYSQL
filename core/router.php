<?php

//file per la gestione delle rotte
namespace App\Core;

use Exception;

class Router
{
    public function __construct(protected array $routes = [
        'POST' => [],
        'PUT' => [],
        'DELETE' => [],
        'GET' => []
    ])
    {
    }

    //questo metodo restituirà classe e metodo in base all'url
    public function dispatch()
    {
        $url = $_SERVER['REQUEST_URI'] ?? $_SERVER['REDIRECT_URL'];
        $segment = trim(parse_url($url, PHP_URL_PATH), '/');

        $segment = $segment ?: '/';
        $method = $_SERVER['REQUEST_METHOD'];
        $urls = $this->routes[$method];
        if (array_key_exists($segment, $urls)) {
            return $urls[$segment];
        }

        $ret = $this->matchRoute($urls, $segment);
        if (!$ret) {
            throw new Exception('No routes matched'); //se l'array è vuoto non ha trovato una rotta
        }
        return $ret;
    }

    //questo metodo restituirà classe e metodo e altri parametri
    protected function matchRoute(array $urls, string $segment): array
    { //metodo per il controllo delle rotte 
        $ret = [];
        foreach ($urls as $seg => $classArray) {
            if (!str_contains($seg, ':')) { //continua solo se non ho i : nel url
                continue;
            }

            $seg = preg_quote($seg); //i caratteri speciali vengono considerati come caratteri normali
            //la \ serve a non dare un significato ai : e la doppia barra a non dare significato alla \
            $pattern = preg_replace('/\\\:[a-zA-Z0-9\-\_]+/', '([a-zA-Z0-9\-\_]+)', $seg); //sostiuira id con un numero nell'url (seg)
            $matches = []; //array che cattura le coincidenze
            if (preg_match('@^' . $pattern . '$@', $segment, $matches)) { //viene utilizzata per cercare una corrispondenza di una espressione regolare all'interno di una stringa.
                array_shift($matches); //estrae il primo elemento di un array
                $classArray[] = $matches;
                $ret = $classArray;
                break;
            }
        }

        return $ret;
    }
}
