<?php

namespace App;

class GildedRose
{
    public $name;

    public $quality;

    public $sellIn;

    public function __construct($name, $quality, $sellIn)
    {
        $this->name = $name;
        $this->quality = $quality;
        $this->sellIn = $sellIn;
        $this->conjuring =1;
        $this->count = 1;
        $this->legend=1;
    }

    public static function of($name, $quality, $sellIn) {
        return new static($name, $quality, $sellIn);
    }

    public function addParam(){
        switch ($this->name) {
             case 'normal':
                $this->conjuring=1;
                $this->count=-1;
                $this->legend=1;
                break;
            case 'Aged Brie':
                $this->conjuring=1;
                $this->count=1;
                $this->legend=1;
                break;
            case 'Sulfuras, Hand of Ragnaros':
                $this->conjuring=1;
                $this->count=0;
                $this->legend=0;
                break;
            case 'Backstage passes to a TAFKAL80ETC concert':
                $this->conjuring=1;
                $this->legend=1;
                if($this->sellIn <= 10 and $this->sellIn > 5){
                    $this->count=2;
                }elseif($this->sellIn <= 5 and $this->sellIn > 0 ){
                    $this->count=3;
                }elseif($this->sellIn <= 0){
                    $this->count=-1;
                    $this->quality = 0;
                }else{
                    $this->count=1;
                }
                break;
            case 'Conjured Mana Cake':
                $this->conjuring=2;
                $this->count=-1;
                $this->legend=1;
                break;
            default:
               $this->conjuring= 1;
               $this->count= -1;
               $this->legend=1;
        }
    }

    public function tick()
    {
        $this->addParam();
        if($this->quality < 50 and $this->quality > 0 ){
            if($this->sellIn <= 0){ 
                $this->quality = $this->quality + 2*($this->conjuring*$this->count);
                if($this->quality > 50){
                    $this->quality = 50;
                } 
            }else{
                $this->quality = $this->quality + ($this->conjuring*$this->count);
            }
        }
        $this->sellIn = $this->sellIn - $this->legend;
    }
}