<?php
require('phoneplan.php');
$phonePlan = new PhonePlan();
$hours = $_POST['hours'];
$data = $_POST['data'];
$plan = $phonePlan->findPlan($hours, $data);
print_r('You should pick the company: ' . $plan[0] . '. Their plan: ' . $plan[1] . ' offers ' . $plan[2] . ' Hours talk and ' . $plan[3] . 'GB data. It costs: ' . $plan[4] . ',-');

?>
