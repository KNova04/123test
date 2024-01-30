<?php

class Users{
    private $id;
    private $name;
    private $email;
    
    private $isadmin;
    private $age;
    public function __construct($id,$name,$emai,$isadmin,$age){
        $this->id = $id;
        $this->name = $name;
        $this->email = $emai;
        $this->isadmin = $isadmin;
        $this->age = $age;
    }
    public function getId(){return $this->id;}
    public function getName(){return $this->name;}
    public function getEmail(){return $this->email;}
    public function getadmin(){return $this->isadmin;}
    public function getAge(){return $this->age;}
    public function adminNT(){
        if($this->isadmin==1){return "remove admin";
        }else{
            return "make admin";
        }
    }
    public function GiveCard(){
        echo "<div class='card'>
        <p>Name :".$this->getName()."    .</p>
        <p>Email :".$this->getEmail()."    .</p>
        <p>Age :".$this->getAge()."    .</p>
        <button class='editter_button'>".$this->adminNT()."</button>
        <button class='editter_button'>Delet</button>
        <a href='checkhistory.php'><button class='editter_button'>checkhistroy</button></a>
        </div>";
    }

}