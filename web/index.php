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
                    $Q="請問你要查詢\na:常見問題\nb:儲值問題";
                    $Q1="1:「魔法石」的用途？\n2:如何購買「魔法石」？\n3:「魔法石」可轉移至其他帳戶嗎？\n4:如何進行綁定？\n5:可否更換用作綁定的社交平台帳戶？\n
                    6:如何註冊新遊戲帳戶開始遊戲？\n7:為什麼找不到「綁定帳戶」的選項？\n8:如果我的帳戶不見了，而又沒有進行綁定怎麼辦？\n";$Q2="";
                    $A1="魔法石可用作回復體力、回復戰靈、抽取魔法石封印卡、擴充背包空間與好友上限，以及在戰鬥死亡時進行復活。";$A2="玩家可在遊戲內選擇「商店」，然後選擇「魔法石商店」，使用 App Store 或 Google Play 帳戶登入後選購魔法石。";
                    $A3="魔法石是不可以轉移的。";$A4="在遊戲主界面右上角的「設定」(齒輪)點選「綁定帳戶」，將現有的帳戶與社交平台帳戶綁定，保存遊戲進度。
＊請使用未曾用作綁定的社交平台帳戶。";$A5="社交平台帳戶的綁定及遊戲進度是不能被取消的。
如希望重新開始遊戲，可選擇重新安裝，選擇「直接開始」遊戲，或以其他未曾用作綁定的社交帳戶登入遊戲。";$A6="由於遊戲內暫時沒有登出功能，如希望重新開始遊戲，可選擇重新安裝，註冊新帳戶開始遊戲。
＊如選擇「直接開始」登記帳戶，刪除應用程式後，所有遊戲進度將被刪除。";$A7="如在遊戲「設定」內未能找到「綁定帳戶」的選項，有可能是因為帳戶已曾進行綁定。
請點選個人代表 (主界面上方的頭像)，查看 ID 旁有否顯示社交網絡的標誌 (Facebook, Twitter, 微博)。如顯示有社交網絡的標誌，代表此帳戶已進行綁定。";$A8="《神魔之塔》 3.2 版本將新增追溯帳號功能，此功能可讓玩家追溯未曾綁定的帳號。只要在同一個手機裝置重新下載遊戲，開啟遊戲後將自動追溯原有的帳號。
＊此功能只適用於開通超過十天的遊戲帳號。為免帳戶數據流失，建議玩家使用社交帳戶來綁定遊戲帳號。";
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
                       if($m_message == "a"){
                        $client->replyMessage(array(
                           'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                   'type' => 'text',
                                   'text' => $Q1
                               )
                            )
                        	));
                        }
                        
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
