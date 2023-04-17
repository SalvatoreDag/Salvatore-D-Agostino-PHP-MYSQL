<?php

//Grazie a PDO posso configurare il mio programma per essere compatibile con diversi database.
//qui sto configurando la compatibilità a database diversi rendendo dinamica la string dsn

namespace App\DB;
use App\DB\DbPdo;

class DbFactory
{
    public static function create(array $options)
    {
        if(!array_key_exists('charset', $options)){
           $options['charset'] = 'utf8';
        } 
        if(!array_key_exists('dsn', $options)){ //lo costruiamo solo se non è gia stato impostato
        if(!array_key_exists('driver', $options)){
            throw new \InvalidArgumentException('nessun driver predefinitpo');
        } 
        $dsn = '';
        switch($options['driver']){
            case 'mysql':
            case 'oracle':
            case 'mssql' :    //questo dsn è valido per mysql, oracle e mssql
                $dsn = $options['driver'] . ':host=' . $options['host'];
                $dsn .= ';dbname=' . $options['database'] . ';charset=' . $options['charset']; 
                break;
            case 'sqlite':
                $dsn = 'sqlite:'.$options['database'];
                break;
            default:
            throw new \InvalidArgumentException('driver non impostato');
        }
        $options['dsn'] = $dsn; //il dsn è uguale a quello che abbiamo costruito 
    }
        return DbPdo::getInstance($options); //instanzio la classe DbPdo
    }
}
