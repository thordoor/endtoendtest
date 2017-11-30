<?php
use PHPUnit\Framework\TestCase;
require "phoneplan.php";

class TestClass extends TestCase
{
    private $phoneplan;
    
        protected function setup()
        {
            $this->phoneplan = new PhonePlan();
        }
    
        protected function tearDown()
        {
            $this->phoneplan = NULL;
        }
    
        public function testFindPLan()
        {
            $result = $this->phoneplan->findPLan('inf', 20);
            $this->assertInternalType('array', $result);
            $this->assertEquals(45, count($result));
            $this->assertEquals('Telmore', $result[0]);
            $this->assertEquals('Home', $result[1]);
            $this->assertEquals('inf', $result[2]);
            $this->assertEquals(20, $result[3]);
            $this->assertEquals(129, $result[4]);
            
        }

        public function testGetClosest()
        {
            $result = $this->phoneplan->getClosest(2, 30);
            $this->assertEquals([15, 30], $result);
        }
}