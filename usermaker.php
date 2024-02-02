<?php

class Users{
    private $id;
    private $name;
    private $email;
    
    private $isadmin;
    private $age;
    private $contact;
    public function __construct($id,$name,$emai,$isadmin,$age,$TF){
        $this->id = $id;
        $this->name = $name;
        $this->email = $emai;
        $this->isadmin = $isadmin;
        $this->age = $age;
        $this->contact=$TF;
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
        
        <a href='changestatus.php?id=".$this->getId()."&state=".$this->isadmin."'><button class='editter_button'>".$this->adminNT()."</button> </a>
        <a href='deletuser.php?id=".$this->getId()."'><button class='editter_button'>Delete</button></a>
        <a href='checkhistory.php?name=".$this->getName()."'><button class='editter_button'>Check history</button></a>
        <a href='CheckComplanyste.php?name=".$this->getName()."'><button class='editter_button'>Check history</button></a>
        </div>";
    }

}