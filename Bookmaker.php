<?php
class Bookmaker {
    private $title;
    private $length;
    private $rating;
    private $quantity_in_stock;
    private $Text;
    private $Language;
    private $price;
    private $pushlisher;
    private $pbdate;
    private $DS;
    private $img;

    public function __construct($title, $rating, $quantity_in_stock, $Text,$Language,$price,$pushlisher,$pbdate,$DS, $img) {
        $this->title = $title;
        $this->rating = $rating;
        $this->quantity_in_stock = $quantity_in_stock;
        $this->Text = $Text;
        $this->length = strlen($Text);
        $this->Language=$Language;
        $this->price = $price;
        $this->pushlisher = $pushlisher;
        $this->pbdate = $pbdate;
        $this->DS = $DS;
        $this->img = $img;
    }
    public function getImg() {

        return $this->img.".jpg";
    }

    // Getters
    public function getTitle() {
        return $this->title;
    }
    public function getPbdate() {
        return $this->pbdate;
    }

    public function getLength() {
        return $this->length;
    }

    public function getRating() {
        return $this->rating;
    }

    public function getQuantityInStock() {
        return $this->quantity_in_stock;
    }

    public function getText() {
        return $this->Text;
    }
    public function getLanguage() {return $this->Language;}
    public function getPrice() {return $this->price;}
    public function getPushlisher() {return $this->pushlisher;}
    public function getDS() {return $this->DS;}
    
    public function getDsPrice(){return $this->price -($this->price*$this->DS)/100;}    
    public function getTots() {return $this->price-$this->getDsPrice();}
    public function give_html(){
        echo "<div class='mainbooks' style='width: 160px; margin-right: 10%;' >";
        echo "<a href='bookpage.php?data=".$this->title."'><img class='s'id='1'src='imgs/".$this->getImg()."'alt='decentbook'></a>";
        echo "<h5>".$this->getTitle()."</h5>";
        echo "<p>".$this->getText()."</p>";
        echo "</div>";
    }

    public function ec(){
        echo $this->title;
    }
}
