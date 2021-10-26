<?php
require_once ('../kernel.php');

class Channel {
    protected $name;
    protected $features;

    /**
     * channel constructor.
     * @param $name
     */
    public function __construct($name)
    {
        $this->name = $name;
        $this->features = [];
    }

    public function __toString(){
        return $this->name;
    }

    public function __set($feature,$value){
        $this->features[$feature] = $value;
    }

    public function __get($feature){
        return $this->features[$feature]??"$feature not defided";
    }
}


$canal = new Channel('TV3');
$canal->medio = 'aereo';
echo $canal->medio;
dd($canal);
echo $canal;
