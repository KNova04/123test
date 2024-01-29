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
    private $sales;
    private $id;
    public function __construct($id,$title, $rating, $quantity_in_stock, $Text,$Language,$price,$pushlisher,$pbdate,$DS, $img,$sales) {
        $this->id = $id;
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
        $this->sales = $sales;
    }
    function getid() { return $this->id;}
    public function getImg() {

        return $this->img.".jpg";
    }
    public function getSales() {

        return $this->sales;
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
        echo "<div class='mainbooks' >
         <a href='bookpage.php?data=".$this->title."'><img class='s'id='1'src='imgs/".$this->getImg()."'alt='decentbook'></a>
        <h5>".$this->getTitle()."</h5>
        <p>".$this->getText()."</p>
         </div>";
    }

    public function give_cart(){
        echo "<div class='cart-item'>
        <div class='item-image'>
          <img src='imgs/".$this->getImg()."' alt='ProCase Smart Case' />
        </div>
        <div class='item-details'>
          <h2>".$this->getTitle()."</h2>

          <p class='item-price'>Price:$".$this->getPrice().".00</p>
          <p class='item-priceDS'>Pricewith Discount:$".$this->getDsPrice()." (".$this->getDS().")</p>
          <p>Qty: ".$this->getQuantityInStock()."</p>
          <p>Author: ".$this->getPushlisher()."</p>
          <a href='deletcart.php?id=".$this->id."'><button>Delete</button></a>
          
          <a href='bookpage.php?data=".$this->title."'><button>Go to item</button></a>
          </div>
      </div>
      " ;
    }
    
}
