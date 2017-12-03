<?php
namespace OpenDungeon\AttributeDice;

class AttributeDice
{
    private $pips;
    
    public function __construct($totalPips)
    {
        $this->pips = $totalPips;
    }
    
    public function getDiceCode()
    {
        return floor(abs($this->pips)/3);
    }
    
    public function hasPips()
    {
        return ($this->getPips() !== 0);
    }
    
    public function getPips()
    {
        return abs($this->pips)%3;
    }
    
    public function isNegitiveDice()
    {
        return ($this->pips < 0);
    }
    
    public function isNegitiveAttributeDice()
    {
        return ($this->pips < -2);
    }
    
    public function getTotoalPips()
    {
        return $this->pips;
    }
    
    public function addPips($pips)
    {
        $newPips = $this->pips + $pips;
        return new AttributeDice($newPips);
    }
    
    public function addAttributeDice(AttributeDice $attributeDice)
    {
        return $this->addPips($attributeDice->getTotoalPips());
    }
    
    public function __toString()
    {
        $string = $this->isNegitiveAttributeDice() ? "-" : "";
        $string .= $this->getDiceCode() . "D";
        if($this->hasPips()) {
            $string .= $this->isNegitiveDice() ? "-" : "+";
            $string .= $this->getPips();
        }
        return $string;
    }
}