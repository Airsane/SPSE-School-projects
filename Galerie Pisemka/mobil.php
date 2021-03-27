<?

class Mobil {
    private $name;
    private $price;
    private $state;
    private $description;

    function __construct($name,$price,$state,$description)
    {
        $this->name = $name;
        $this->price = $price;
        $this->state = $state;
        $this->description = $description;
    }
    
    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Get the value of state
     */ 
    public function getState()
    {
        return $this->state;
    }

    /**
     * Get the value of price
     */ 
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }
}


?>