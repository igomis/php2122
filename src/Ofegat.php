<?php


namespace App;


class Ofegat
{
    protected $paraula;
    protected $vocal;
    protected $letters;

    /**
     * Ofegat constructor.
     * @param $paraula
     * @param $invalidsPermesos
     */
    public function __construct($paraula)
    {
        $this->paraula = strtoupper($paraula);
        $this->vocal = 0;
        $this->letters = [];
    }

    public function addLetter(String $letter)
    {
        $letter = strtoupper($letter);
        if (self::isVocal($letter)){
            if ($this->vocal == 0){
                $this->vocal = 1;
                $this->letters[] = $letter;
            }
            else {
                throw new \Exception('Ja has triat més vocals anteriorment');
            }
        } else {
            if (in_array($letter,$this->letters)) throw new \Exception('Ja la has ficada abans');
            $this->letters[] = $letter;
        }
        return (strpos($this->paraula,$letter)===false)?1:0;
    }

    public function render(){
        for($i=0;$i<strlen($this->paraula);$i++){
            if (in_array($this->paraula[$i],$this->letters)) {
                echo $this->paraula[$i];
            }
            else {
                echo "_";
            }
            echo " ";
        }
    }

    public static function isVocal($letter){
        return (in_array($letter,['A','E','I','O','U']));
    }

}