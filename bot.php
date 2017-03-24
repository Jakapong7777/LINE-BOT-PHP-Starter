<?php
$access_token = 'AeHQ4AuyiH+6MVdzywK6pbhTXXkmKrtgMIyH2JMY9tkPADyK1rMO5yU6cyBiCUrcscmzMDK62XQT30ewCMugjf9BKA9MowqbZltG026Jpk4KbG6Gy5pa/xQlYkuZNVF+nPRhkXZaUC8ON2ghPZk8OgdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
			if($text == 1 ){
				
			// Get replyToken
			$replyToken = $event['replyToken'];

			// Build message to reply back
			$messages = [
				'type' => 'text',
				'text' => 'ATOM  ได้รับคำสั่ง 1 และได้เริ่มทำการสดสอบ'
			];	
			}else if ($text == 2){
				// Get replyToken
			$replyToken = $event['replyToken'];

			// Build message to reply back
			$messages = [
				'type' => 'text',
				'text' => 'ATOM ได้รับคำสั่ง 2 ระบบกำลังดังเนินการในขณนี้'
			];	
			} else if ($text == 3){
				// Get replyToken
			$replyToken = $event['replyToken'];

			// Build message to reply back
			$messages = [
				'type' => 'text',
				'text' => 'ATOM ได้รับคำสั่ง 3 อีก 10 นาทีจะเสร็จสิ้น'
			];	
			} else if($text == 4){
				// Get replyToken
			$replyToken = $event['replyToken'];

			// Build message to reply back
			$messages = [
				'type' => 'text',
				'text' => 'ATOM ได้รับคำสั่ง 4 ได้กำเนินการเรียบร้อยแล้ว' 
			];	
			} else {
				// Get replyToken
			$replyToken = $event['replyToken'];

			// Build message to reply back
			$messages = [
				'type' => 'text',
				'text' => 'ATOM  ได้รับคำสั่งอื่นจะไม่ดำเนินการใดๆทั้งสิ้น'
			];	
			}
	
			
			
			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);

			echo $result . "\r\n";
		}
	}
}
echo "OK";
