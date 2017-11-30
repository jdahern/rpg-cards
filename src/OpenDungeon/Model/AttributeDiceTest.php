<?php
namespace OpenDungeon\Model;
use PHPUnit\Framework\TestCase;

class AttributeDiceTest extends TestCase
{
    public function testCanDisplayTheDiceString($pips = 5, $expectedDiceString = "2D+2")
    {
        $dice = new \AttributeDice($pips);
        $this-assertEquals($expectedDiceString, $dice->__toString());
    }
}