<?php
$access_token = 'AeHQ4AuyiH+6MVdzywK6pbhTXXkmKrtgMIyH2JMY9tkPADyK1rMO5yU6cyBiCUrcscmzMDK62XQT30ewCMugjf9BKA9MowqbZltG026Jpk4KbG6Gy5pa/xQlYkuZNVF+nPRhkXZaUC8ON2ghPZk8OgdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
