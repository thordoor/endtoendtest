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
            $this->assertEquals('Telmore', $result['company']);
            $this->assertEquals('Home', $result['plan']);
            $this->assertEquals(20, $result['hours']);
            $this->assertEquals(20, $result['data']);
            $this->assertEquals(129, $result['price']);
            
        }

        public function testGetClosestData()
        {
            $plans = $this->phoneplan->getJson();
            $result = $this->phoneplan->getClosestData(20, 21, $plans);
            $this->assertEquals(['company' => 'Telmore', 'plan' => 'Home', 'data' => 20, 'hours' => 20, 'price' => 129], $result);
        }

        public function testGetClosestHours()
        {
            $plans = $this->phoneplan->getJson();
            $result = $this->phoneplan->getClosestHours(21, 20, $plans);
            $this->assertEquals(['company' => 'Telmore', 'plan' => 'Home', 'data' => 20, 'hours' => 20, 'price' => 129], $result);
        }

        public function testInputToOutputHappyPath()
        {
            include 'controller.php';
            $controller = findPhonePlan(20, 20);
            $this->assertInternalType('array', $controller);
            $this->assertEquals(5, count($controller));
            $plans = $this->phoneplan->getJson();
            $this->assertInternalType('array', $plans);
            $this->assertEquals(9, count($plans));
            $plan = $this->phoneplan->findPlan(20, 20);
            $this->assertEquals(['company' => 'Telmore', 'plan' => 'Home', 'data' => 20, 'hours' => 20, 'price' => 129], $plan);
        }

        public function testInputToOutputFuckedPath()
        {
            include 'controller.php';
            $controller = findPhonePlan('gris', -12);
            $this->assertInternalType('array', $controller);
            $this->assertEquals(5, count($controller));
        }
}
?>