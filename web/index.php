<?php

/**
 * Copyright 2016 LINE Corporation
 *
 * LINE Corporation licenses this file to you under the Apache License,
 * version 2.0 (the "License"); you may not use this file except in compliance
 * with the License. You may obtain a copy of the License at:
 *
 *   https://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations
 * under the License.
 */

require_once('./LINEBotTiny.php');



$channelAccessToken = getenv('LINE_CHANNEL_ACCESSTOKEN');
$channelSecret = getenv('LINE_CHANNEL_SECRET');

$client = new LINEBotTiny($channelAccessToken, $channelSecret);
foreach ($client->parseEvents() as $event) {
    switch ($event['type']) {
        case 'message':
            $message = $event['message'];
            switch ($message['type']) {
                case 'text':
                    $Q="A:常見問題\nB:儲值問題";
                    
                    $a="歡迎來到我們的專題!\n請輸入以下的代號來查詢相關訊息!!\nA:客服\nB:介紹";
                	$m_message = $message['text'];
                    if($m_message == "A"){
                        $client->replyMessage(array(
                           'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                   'type' => 'text',
                                   'text' => $Q
                               )
                            )
                        	));
                        }else {
                            $client->replyMessage(array(
                            'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                    'type' => 'text',
                                    'text' => $a
                                    )
                            )
                    	    ));
                    }
                    break;
                
            }
            break;
        default:
            error_log("Unsupporeted event type: " . $event['type']);
            break;
    }
};
