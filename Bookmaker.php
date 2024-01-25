<?php
class Bookmaker {
    private $title;	
    private $length;	
    private $rating;	
    private $quantity_in_stock;
    private $Text;
    public function __construct($title,$ratinge,$quantity_in_stock,$Text) {
        $this->title=$title;
        $this->ratinge=$ratinge;
        $this->quantity_in_stock=$quantity_in_stock;
        $this->Text=$Text;
        $this->length=strlen($Text);
    }
    public function give_html(){
        echo "<div class='mainbooks' style='width: 160px; margin-right: 10%;' >";
        echo "<img class='s'id='1'src='imgs/English_Harry_Potter_7_Epub_9781781100264.jpg' alt='decentbook'>";
        echo "<h5> Title</h5>";
        echo "<p> DESCRIPTION </p>";
        echo "</div>";
    }
    public function ec(){
        echo $this->title;
    }
}