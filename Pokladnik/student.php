<?

class Student {
    private $firstName;
    private $lastName;
    private $group;
    private $service;

    function __construct($firstName ,$lastName ,$group ,$service)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->group = $group;
        $this->service = $service;
    }

    

    /**
     * Get the value of firstName
     */ 
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Get the value of lastName
     */ 
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Get the value of group
     */ 
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * Get the value of service
     */ 
    public function getService()
    {
        return $this->service;
    }
}

?>