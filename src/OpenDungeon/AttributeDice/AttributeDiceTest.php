<?php
namespace OpenDungeon\AttributeDice;

use PHPUnit\Framework\TestCase;

class AttributeDiceTest extends TestCase
{
    /**
     * @dataProvider canDisplayTheDiceStringProvider
     */
    public function testCanDisplayTheDiceString($pips, $expectedDiceString)
    {
        $dice = new AttributeDice($pips);
        $this->assertEquals($expectedDiceString, $dice->__toString());
    }
    
    public function canDisplayTheDiceStringProvider()
    {
        return array(
            array(-6, "-2D"),
            array(-5, "-1D-2"),
            array(-4, "-1D-1"),
            array(-3, "-1D"),
            array(-2, "0D-2"),
            array(-1, "0D-1"),
            array(0, "0D"),
            array(1, "0D+1"),
            array(2, "0D+2"),
            array(3, "1D"),
            array(4, "1D+1"),
            array(5, "1D+2"),
            array(6, "2D"),
        );
    }
    
    /**
     * @dataProvider canAddPipsProvider
     */
    public function testCanAddAttributeDice($pips, $addedPips, $expectedDiceString)
    {
        $dice = new AttributeDice($pips);
        $newDice = $dice->addAttributeDice(new AttributeDice($addedPips));
        $this->assertEquals($pips, $dice->getTotoalPips());
        $this->assertEquals($expectedDiceString, $newDice->__toString());
    }
    
    /**
     * @dataProvider canAddPipsProvider
     */
    public function testCanAddPips($pips, $addedPips, $expectedDiceString)
    {
        $dice = new AttributeDice($pips);
        $newDice = $dice->addPips($addedPips);
        $this->assertEquals($pips, $dice->getTotoalPips());
        $this->assertEquals($expectedDiceString, $newDice->__toString());
    }
    
    public function canAddPipsProvider()
    {
        return array(
            array(-1, -1, "0D-2"),
            array(-3, -3, "-2D"),
            array(-5, -5, "-3D-1"),
            array(-1, 0, "0D-1"),
            array(-5, 0, "-1D-2"),
            array(-5, 1, "-1D-1"),
            array(0, 0, "0D"),
            array(0, -1, "0D-1"),
            array(5, -1, "1D+1"),
            array(10, 0, "3D+1"),
            array(0, 10, "3D+1"),
            array(9, 10, "6D+1"),
            array(10, 10, "6D+2"),
            array(10, 11, "7D"),
            array(50, 150, "66D+2"),
        );
    }
}