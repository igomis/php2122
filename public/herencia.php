<?php
require_once ('../kernel.php');

abstract class comunicator{
    protected $channels;


    public function channels(){
        var_dump($this->channels);
    }

    abstract public function medio();

}


class television extends comunicator
{
    public function __construct(){
        $this->channels = ["TV1","TV3"];
    }
    public function medio(){
        var_dump('aereo');
    }
}

class smartTV extends comunicator
{
    public function smartChannels(){
        var_dump(["netflix","hbo"]);
    }
    public function medio(){
        var_dump('fibra');
    }
}

class radio extends comunicator {
    public function __construct(){
        $this->channels = ["La ser"];
    }
    public function medio(){
        var_dump('fibra');
    }
}

$tv = new radio();
$tv->channels();
