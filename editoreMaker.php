<?php
class editoer{
    private $Date;
    private $Bookname;
    private $Price;
    private $quantaty;
    public function __construct($Date,$Bookname,$Price,$quantaty){
        $this->Date = $Date;
        $this->Bookname = $Bookname;
        $this->Price = $Price;
        $this->quantaty = $quantaty;
    }
    public function get_Date(){return $this->Date;}
    public function get_Bookname(){return $this->Bookname;}
    public function get_Price(){return $this->Price;}
    public function get_quantaty(){return $this->quantaty;}
    public function specrateHtml(){
        echo "    
        <tr>
        <td>----------</td>
        <td>----------</td>
        <td>----------</td>
        <td>----------</td>
      </tr>
  ";
    }
    public function giveHtml(){echo "    
        <tr>
        <td>".$this->get_Bookname()."</td>
        <td>".$this->get_Date()."</td>
        <td>".$this->get_Price()."</td>
        <td>".$this->get_quantaty()."</td>
      </tr>
  ";}
}