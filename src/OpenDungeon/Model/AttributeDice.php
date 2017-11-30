<?
namespace OpenDungeon\Model;

class AttributeDice
{
    private $pips;
    
    public function __constructor($totalPips)
    {
        $this->pips = $pips;
    }
    
    public function getDiceCode()
    {
        return floor($this->pips/3)
    }
    
    public function hasPips()
    {
        return ($this->getPips() !== 0);
    }
    
    public function getPips()
    {
        return $this->pips%3;
    }
    
    public function getTotoalPips()
    {
        return $this->pips;
    }
    
    
    public function addPips()
    {
        $newAttributeDice
        return 
    }
    
    public function addAttributeDice(AttributeDice $attributeDice)
    {
        return $this-addPips($attributeDice->getTotoalPips());
    }
    
    public function __toString()
    {
        $string = $this->getDiceCode . "D";
        if($this->hasPips()) {
            $string .= "+" . $this->getPips();
        }
        return $string;
    }
}