<?php

namespace App;

use App\Connection;
use App\QueryBuilder;



class Task
{


    protected $id;
    protected $title;
    protected $assigned_to;
    protected $completed;
    protected $due;
    protected $file;

    /**
     * Task constructor.
     * @param $title
     * @param $assigned_to
     * @param $completed
     * @param $due
     * @param $file
    */

    public function __construct($parametres)
    {
        foreach ($parametres as $key => $value){
            $this->$key = $value;
        }
    }


    public static function findById($id){
        $query = new QueryBuilder(Connection::make());
        return new Task($query->find('tasks',$id));
    }

    public static function findAll(){
        $query = new QueryBuilder(Connection::make());
        return $query->selectAll('tasks');
    }




}