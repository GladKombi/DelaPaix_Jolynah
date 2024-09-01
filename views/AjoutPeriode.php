<?php 
 $date=date('Y-m-d');
$datepaiement=date('Y-m-d',strtotime($date . '+30 days' )); 
echo $datepaiement;
?>