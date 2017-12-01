<?php
class PhonePlan
{
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
        if($h > 50){
            $h = 'inf';
        }
        foreach($plans as $plan){
            if($plan["hours"] == $h && $plan["data"] == $d){
                $correctPlan = $plan;
                return $correctPlan;
            }
            else if($plan["hours"] == $h && $plan["data"] != $d){
                $correctPlan = $this->getClosestData($h, $d, $plans);
                return $correctPlan;
            }
            else if($plan["data"] == $d && $plan["hours"] != $h){
                $correctPlan = $this->getClosestHours($h, $d, $plans);
                return $correctPlan;
            }
        }
        return $correctPlan;
    }


    public function getClosestData($h, $d, $plans)
    {
        $closestData = NULL;
        foreach($plans as $plan){
            if($closestData === NULL || abs($d - $closestData) > abs($plan['data'] - $d)){
                $closestData = $plan['data'];
            }
            if($h == $plan['hours'] && $closestData == $plan['data']){
                return $plan;
            }
        }
        foreach($plans as $plan){
            if($h == $plan['hours']){
                return $plan;
            }
        }
        return $plan;
    }

    public function getClosestHours($h, $d, $plans)
    {
        $closestHours = NULL;
        foreach($plans as $plan){
            if($closestHours === NULL || abs($h - $closestHours) > abs($plan['hours'] - $h)){
                $closestHours = $plan['hours'];
            }
            if($d == $plan['data'] && $closestHours == $plan['hours']){
                return $plan;
            }
        }
        foreach($plans as $plan){
            if($d == $plan['data']){
                return $plan;
            }
        }
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
        
        foreach ($planArr as $plan) {
            if($plan['hours'] == $closestHours && $plan['data'] == $closestData){
                      
            }
        }
        return [$company, $planName, $closestHours, $closestData, $price];
    }
}
?>