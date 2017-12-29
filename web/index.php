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
            if ($m_message == 1) {
                                                
                            $client->replyMessage(array(
                           'replyToken' => $event['replyToken'],
                           'messages' => array(
                             array(
                                 $bot->sendText($replyToken, "文字訊息");
                                 $msg = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder("文字訊係");
$bot->replyMessage($replyToken,$msg);
                                
                               )
                            )
                        	));                          
            }
        default:
            error_log("Unsupporeted event type: " . $event['type']);
            break;
    }
};
