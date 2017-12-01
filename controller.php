<?php
include_once 'phoneplan.php';
function findPhonePlan($h, $d){
    $phonePlan = new PhonePlan();
    $plan = $phonePlan->findPlan($h, $d);
    return $plan;
}
if(isset($_POST['submit'])){
    $hours = $_POST['hours'];
    $data = $_POST['data'];
    $plan = findPhonePlan($hours, $data);
    print_r('You should pick the company: ' . $plan['company'] . '. Their plan: ' . $plan['plan'] . ' offers ' . $plan['hours'] . ' Hours talk and ' . $plan['data'] . 'GB data. It costs: ' . $plan['price'] . ',-');
    
}

?>
