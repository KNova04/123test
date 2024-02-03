<?php
class ContactCard{
    private $Name;
    private $Email;
    private $Text;
    public function __construct($Name,$Email,$Text){
        $this->Name=$Name;
        $this->Email=$Email;
        $this->Text=$Text;
    }
    public function getname(){
        return $this->Name;
    }
    public function getEmail(){
        return $this->Email;
    }
    public function getText(){
        return $this->Text;
    }
    
    
    
    public function giveHtml(){echo "    
        <div style='width ='100px height=100px '>
        <p>--------------------</p>
        <p>NAME:".$this->getname()."</p>
        <p>EMAIL:".$this->getEmail()."</p>
        <p>TEXT:".$this->getText()."</p>
        <p>--------------------</p>
        </div>
  ";}
}