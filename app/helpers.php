<?php

function sendAppointmentSMS($appointment){
    $sender_id = ENV('SMSSENDERID');
    $api_key = ENV('SMSAPIKEY');
    $entity_id = ENV('SMSENTITYID');
    $route_id = ENV('SMSROUTEID');
    $template_id = ENV('SMSAPPOINTMENTTEMPLATEID');
    $mobile = $appointment['client_mobile'];
    $date = date('D M', strtotime($appointment['appointment_date'])).' '.$appointment['start_time'];
    $sms_text = urlencode($appointment['client_name'].', you have an appointment at '.ENV('CLINICNAME').' clinic on '.$date.' MMSIMT');
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL, "http://210.16.103.252/app/smsapi/index.php");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, "key=".$api_key."&entity=".$entity_id."&tempid=".$template_id."&routeid=".$route_id."&type=text&contacts=".$mobile."&senderid=".$sender_id."&msg=".$sms_text);
    $response = curl_exec($ch);
    curl_close($ch);
    return $response;
}