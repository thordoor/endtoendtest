<?php
class PhonePlan
{
    private $company;
    private $planName;
    private $hours;
    private $data;
    private $price;

    public function getJson()
    {
        $jsonFile = file_get_contents('plans.json');
        $json = json_decode($jsonFile, true);

        return $json;
    }

    public function findPlan($h, $d)
    {
        $correctPlan = [];
        $plans = $this->getJson();
        foreach($plans as $plan){
            if($plan["hours"] == $h && $plan["data"] == $d){
                $company = $plan["company"];
                $planName = $plan["plan"];
                $hours = $plan["hours"];
                $data = $plan["data"];
                $price = $plan["price"];
                array_push($correctPlan, $company, $planName, $hours, $data, $price);
                return $correctPlan;
            }
            else{
                $correctPlan = $this->getClosest($h, $d);
            }
        }
        return $correctPlan;
    }


    public function getClosest($h, $d)
    {
        $planArr = $this->getJson();
        $closestHours = null;
        $closestData = null;
        foreach ($planArr as $plan) {
            if($closestHours === null || abs($h - $closestHours) > abs($plan['hours'] - $h)){
                $closestHours = $plan['hours'];
            }
            if($closestData === null || abs($d - $closestData) > abs($plan['data'] - $d)){
                $closestData = $plan['data'];
            }
        }
        print_r($plan['data']);
        
        foreach ($planArr as $plan) {
            if($plan['hours'] == $closestHours && $plan['data'] == $closestData){
                //print_r($plan['data']);
                $company = $plan['company'];
                $planName = $plan['plan'];
                $hours = $plan['hours'];
                $data = $plan['data'];
                $price = $plan['price'];        
            }
            else if($plan['hours'] == $closestHours){
                $company = $plan['company'];
                $planName = $plan['plan'];
                $hours = $closestHours;
                $data = $plan['data'];
                $price = $plan['price'];
            }
        }
        if($h > 50){
            $closestHours = 'inf';
        }
        return [$company, $planName, $closestHours, $closestData, $price];
        //find closest plan.
    }
}