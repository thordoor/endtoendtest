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
            }
            else{
                $this->getClosest($h, $d);
            }
        }
        return $correctPlan;
    }


    public function getClosest($h, $d)
    {
            
        //find closest plan.
    }

    //print_r($json[0]);
}