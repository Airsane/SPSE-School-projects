<?php

class Overeni{

    private $udaje = ['admin' => 'admin','root' => 'root'];
    public function over(string $jmeno,string $heslo) : bool{
        if(array_key_exists($jmeno,$this->udaje))
        {
           
            if($this->udaje[$jmeno] == $heslo)
                return true;
        }
        return false;
    }
}

?>