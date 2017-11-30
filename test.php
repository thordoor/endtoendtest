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
            $result = $this->phoneplan->findPLan(20, 20);
            $this->assertInternalType('array', $result);
            $this->assertEquals(5, count($result));
            $this->assertEquals('Telmore', $result[0]);
            $this->assertEquals('Home', $result[1]);
        }
}