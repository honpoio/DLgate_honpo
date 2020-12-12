<?php
namespace App\Animals;
use App\Animals\Food;
 
class Bird
{
    private $food = null;
    
    public function __construct(Food $food){
        $this->food = $food;
    }
 
    public function sound(){
        return "tweet tweet";
    }
 
    public function getFood(){
        return $this->food;
    }
}
