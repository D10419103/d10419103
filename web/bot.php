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
                    $Q="請問你要查詢\nA:常見問題\nB:儲值問題";
                    $G="G1:世界公會\nG2:創立公會\nG3:搜尋公會\nG4:推薦公會\nG5:退出公會\nG6: 公會公告\nG7:添加成員\nG8:逐出成員\nG9:聊天互動\nG10:聊天設定\nG11:展覽室\nG12:更改公會代表\nG13:更改龍刻\nG14:公會捐獻\nG15:公會升級\nG16:公會加乘\nG17:公會個人任務\nG18:第六任務\nG19:布蘭克洞窟關卡";

$G1="1.所有尚未加入公會的玩家，都能透過「世界公會」預先體驗公會所帶來的幫助。點擊下方地圖的城堡位置，即可進入「世界公會」。
2.於世界公會中，玩家可以在每日 3 項任務中獲取布蘭克之匙，打開「布蘭克洞窟」裡的關卡，取得育成召喚獸的助力。"; 
$G2="1.開啟《神魔之塔》，點擊主界面右下角的「社群」功能鍵，然後於社群頁面點選「公會」。或點擊下方地圖的城堡位置，進入「公會」。
滿足一定條件下，於「公會」頁面點選「創立公會」，再選擇「創立」即可按序開始創建。
2.「創立公會」所需條件：
創立公會之召喚師等級需達到 100 級；
繳納創立公會費用 100 萬金幣 及 魔法石 20 粒。
3.設定「公會名稱」。由於公會名稱確定後將無法更改，點選「確定」前請務必檢查清楚。如名稱有誤，請點選「取消」。
4.按序設定「公會徽章」的樣式，包括：背景顏色、徽章圖紋、徽章標誌及徽章顏色。 
5.成功設定後，可「預覽」徽章樣式再點選「確定」提交。如設定有誤，請點選「取消」再重新設定。
完成上述設定步驟，點選「確定」提交並出現「公會創立成功」的訊息，即可開通公會系統的相關功能。";
$G3="1.開啟《神魔之塔》，點擊主界面右下角的「社群」功能鍵，然後於社群頁面點選「公會」。或點擊下方地圖的城堡位置，進入「公會」。
2.點選「搜尋公會」，於「搜尋公會」頁面輸入「公會編號」申請加入目標公會。
「公會編號」可點選「公會大廳」的「公會徽章」查閱。
3.成功搜尋時，頁面會彈出所屬編號的公會資訊，點選「確定」即可申請加入該公會。";
$G4="1.點選「推薦公會」，於「推薦公會」頁面的公會清單查找尚有空缺的公會。 2.查找心儀的公會後，點選「確定」即可申請加入該公會。 
";
$G5="1.進入公會大廳，點擊界面中央的公會會徽，點選「退出公會」。  
2.點選「確定」進入「退出公會」確認程序，或點選「取消」退出確認頁面。 
3.確定退出公會後，將會出現「你已經退出公會」的訊息，代表你已經退出了公會。";
$G6="1.進入公會大廳，點擊公告板上的「編輯」圖示。
2.進入編輯頁面後，點擊公告板輸入公告內容。
3.完成「公會公告」的編輯後，可「預覽」公告內容再點擊「確定」提交。提交後公告將即時發佈供成員查閱。";
$G7="1.進入公會大廳，點擊界面中央的公會會徽，打開公會選單。
2.點選「入會申請」，查閱申請加入公會的召喚師名單。
3.點擊召喚師頭像可查看詳細資料，點選「接受」即可新增該召喚師為公會成員。
";
$G8="1.進入公會大廳，點擊公告板下的「成員」按鈕，打開「公會成員名單」。
2.查閱「公會成員名單」時，公會會長可點擊召喚師頭像，並點選「逐出公會」。
3.系統會確認是否將該成員逐出公會，於倒數完畢後「確認逐出」。
4.若該成員於 7 天內曾有登入記錄，逐出時需繳交 300,000 金幣作為懲罰費用。
如確認要逐出成員，點選「確認逐出」繳交費用後即可逐出該成員。
5.完成上述步驟，並出現「成功逐出成員」的訊息，即代表已逐出該成員。";
$G9="1.進入公會大廳，點擊公告板下的「聊天」功能鍵，或遊戲界面兩側的浮動聊天捷徑，打開公會聊天室。 
2.於聊天室下方的「留言」欄輸入訊息，再點擊「輸入」發佈。";
$G10="點擊聊天室界面右上角的「設定」圖示,可設定聊天室的功能選項。";
$G11="展覽室展示著召喚師於各個公會任務中，努力所換來的奇珍。
1.進入公會大廳，點擊左下角的展覽室，進入展覽室界面。
2.點擊想查看的展覽奇珍。 
";
$G12="1.進入公會大廳，點擊右下角的公會代表，再點選「更改公會代表」。
2.選擇你的召喚獸代表，再點選「選擇」。
";
$G13="1.選好代表後，點擊公會大廳右下角的公會代表，再點選「更改龍刻」。
2.點選適用的龍刻，然後可見公會代表的右上角出現了龍刻圖示。 ";
$G14="1.進入公會大廳，點擊公告板下的「捐獻」功能鍵。
2.於「捐獻」頁面點選「兌換及捐獻」的黃金數量。
3.系統會確認是否進行「捐獻」，點選「確定」完成捐獻，或點選「取消」退出確認頁面。
4.完成上述步驟，並出現「捐款成功」的訊息，即代表已成功捐獻黃金。
";
$G15="1.滿足一定條件下，進入公會大廳，點擊公告板左上角的「升級」功能鍵。
「公會升級」所需條件：
公會經驗值達至 100%；
黃金儲備達至升級所需；
公會成員數量達至升級所需。
2.進入升級確認頁面確認升級所需，點選「升級」後即可成功提升公會等級。
";
$G16="公會等級愈高，召喚師獲得的戰鬥經驗、金錢及強化經驗的加乘愈多。";
$G17="1.進入公會大廳，點擊公告板下的「任務」功能鍵，可查閱公會每天隨機分配的個人任務。
2.根據各種任務的指示，完成任務
3.完成任務後，系統會彈出提示訊息，通知玩家所得的任務獎賞。
4.完成每日所有的公會個人任務後，將可隨機獲得額外獎勵。";
$G18="完成了當有五個個人任務後，召喚師將有機率遇見額外的第六任務；完成後將可獲得額外的獎勵。";
$G19="在布蘭克洞窟中，召喚師可以消耗布蘭克之匙以挑戰不同的素材關卡，以獲得珍貴素材。
1.進入公會大廳，點擊公告板下的「布蘭克洞窟」功能鍵。
2.選擇要挑戰的關卡，按正常流程選擇戰友並進入戰鬥。";

                    $N="N1:移動符石\nN2:連撃加成 \nN3:攻擊充能 \nN4: 全體攻擊 \nN5:強化符石\nN6:技能發動\nN7:屬性相剋 \nN8:相生相剋\nN9:強化合成\nN10:技能強化\nN11:進化合成";
                    $N1="神魔之塔》的戰鬥建立於釋放符石上，每移動一粒符石都會同時影響四周符石的位置，當同屬性的符石連接三粒或以上，即可釋放該符石力量，發動召喚獸攻擊。";
$N2="每次在攻擊階段時，召喚師都可以在限時內任意移動一粒符石。當召喚師鬆開符石或到達時限時，將會結算所有因該次移動而釋放的符石力量。";
$N3="每當符石結算完畢後，該屬性能量將注入相同屬性的召喚獸，並令該召喚獸進行單體攻擊，不屬於該屬性的符石能量仍會小量增加總傷害，但並不會令不屬於該屬性的召喚獸發動攻擊。";
$N4="釋放一組五粒或以上的符石，就能令該屬性的召喚獸對所有敵人進行全體攻擊，唯心符石除外。";
$N5="當召喚師釋放了一組五粒或以上的符石，強大的能量除了可發動全體攻擊外，多餘的能量還會把符石充能，形成一顆「強化符石」(充能符石)。釋放強化符石可帶來更強大的能量，提高該屬性符石的輸出能量。";
$N6="「主動技」，所有召喚獸都具有主動技，所有技能都要經過特定的回合數冷卻才能使用，假如在攻擊階段沒有成功釋放任何符石，該回合將不會計算在內，因此召喚師必需確保符石的釋放。

「隊長技」，當召喚獸設定成隊長時才會發動的技能，只需合乎條件就能自動發動，召喚師可靈活地按照關卡所需來挑選不同的召喚獸，選擇合適的隊長是成為強大召喚師的必修課題。";
$N7="所有屬性都帶有相生相剋的關係，不論屬於自然的水、火、木屬性，還是屬於神魔的光、暗屬性也不例外。";
$N8="火剋木，木剋水，水剋火，相剋屬性可帶來加倍傷害，反之則會造成減半傷害；光和暗兩種屬性均可令加倍對對方造成的傷害。";
$N9="召喚獸只有吸收其他召喚獸的靈魂才能夠成長，只要不停獻祭召喚獸的靈魂進行合成，怪物才能不停地成長。相同屬性的靈魂會造成更大的共嗚，令召喚獸可得到更大的提升，所以召喚師該善用相同屬性的召喚獸合成來達到最大的效果。";
$N10="主動技的等級會影響技能所需要的冷卻回合數，為了可更快、更頻密的使用技能，技能升級也是召喚師的必修課題。除了依靠累積戰鬥數來提升技能等級外，合成時獻祭擁有相同技能的召喚獸亦有機會得到大量的技能經驗值，來讓技能升級事半功倍。";
$N11="當召喚獸成長至界限時，召喚師可透過獻祭特定元素來進行進化合成，當進化儀式完畢後，召喚獸將會以新型態重生。雖然等級會回歸至最初的水平，但大部份的能力值將會被保留，令召喚獸的能力可以成長至更高的層次，變得更加強大。";
$I="I1:特別任務\nI2:通關獎賞\nI3:潛能解放\nI4:異空轉生\nI5:廣播通知\nI6:昇華系統\nI7:信箱系統\nI8:龍刻脈動\nI9:龍刻熔合\nI10:稱號系統";

$I1="特別任務將顯示於世界地圖的左上角，不同時段有不同的戰鬥任務，召喚師可挑戰更強的對手來訓練召喚獸，也可搜集強化及進化元素。

　　在特別任務區域內，設有不同類型的戰鬥任務，其中的緊急任務每天只開放 2 次，每次 1 小時，召喚師可透過戰鬥獲得珍貴的強化素材，千萬別錯失大幅提升召喚獸等級的良機。";
$I2="召喚師成功挑戰每一個新關卡(Stage)，都可獲得一次魔法石獎賞。從遊戲開始起計算，所有的關卡 (包括緊急任務關卡) 只會獲得一次通關魔法石獎賞。如果關卡顯示為「Clear」，即代表召喚師經已完成任務並已領取魔法石獎賞。";
$I3="解放召喚獸的潛能可以提升召喚獸的稀有度 (星等)，同時提升其生命力、攻擊力及回復力的上限，潛能解放 (以下簡稱為 「潛解」) 後召喚獸會得到新的技能。此系統只適用於已開放潛解的召喚獸。";
$I4="召喚獸可以透過異空轉生的方式，蛻變成煉化及幻化兩種形態，提升其生命力、攻擊力及回復力的上限，同時獲得新的技能。此系統只適用於已開放異空轉生的召喚獸。";
$I5="每天的早上 12時 至 12時半 期間，系統會分批向玩家廣播新的遊戲公告，遊戲公告通知包括最新的活動消息、屬性抽卡活動、召喚獸特別提升，以及限定關卡等資料。";
$I6="昇華系統乃使用指定數量的靈魂及體力，分 (Ⅰ、Ⅱ、Ⅲ、Ⅳ) 四階段提昇召喚獸的能力。此系統只適用於已開放昇華的召喚獸。";
$I7="於「社群」>「信箱」中，召喚師可以在此查看其他召喚師發出的聊天，並可在信箱內點選朋友展開對話。若收到好友訊息，召喚師可以在信箱介面裡，找到「信封」標誌及顯示傳送訊息的時間。";
$I8="發動時機：當龍脈儀存滿等量後，召喚師可以在消除符石後，及傷害計算前，點擊龍脈儀發動龍刻脈動。";
$I9="召喚師可以透過龍刻熔爐熔合龍刻或精粹，從而鍛造出最合心意的龍刻
龍刻分為簡樸、精湛及極致三種稀有度，稀有度愈高，可配備的龍刻技能愈多，最多三種\n鍛造龍刻：透過龍刻熔爐熔合而成的龍刻，並可由召喚師鑲嵌對應星數的龍刻精焠\n龍刻精粹：內含龍刻技能，並可分為一至三星稀有度。";
$I10="召喚師可以透過完成特定的條件，獲得不同的稱號。";

                   $Q1="A1:「魔法石」的用途？\nA2:「魔法石」可轉移至其他帳戶嗎？\nA3:如何進行綁定？\nA4:可否更換用作綁定的社交平台帳戶？\nA5:如何註冊新遊戲帳戶開始遊戲？\nA6:為什麼找不到「綁定帳戶」的選項？\nA7:如果我的帳戶不見了，而又沒有進行綁定怎麼辦？\nA8:為什麼會收到違規警告？\nA9:為什麼無法使用錄影功能？\nA10: 遇到斷線、閃退、顯示問題等異常情況時該怎麼辦？\nA11: 為什麼遊戲顯示正 「使用其他裝置登入」？\nA12:可否轉移不同語言版本的遊戲進度？\nA13:如在抽卡過程中途離開遊戲，仍可獲得封印卡嗎？\nA14:為什麼完成了任務，但沒有獲得魔法石獎賞？\nA15:為什麼收不到緊急任務的通知？\nA16:為何無法領取活動獎賞？\nA17:為什麼完成關卡後未能登上排行榜？\nA18:可否使用模擬器進行遊戲？\nA19:為什麼無法安裝/下載《神魔之塔》APK 版本？\nA20:如在合成卡片時錯誤把重要卡片用掉，可以把封印卡恢復嗎？";
$Q2="B1:如何購買「魔法石」？\nB2:「魔法石」可經由什麼付費平台購買呢？\nB3:如果沒有信用卡可怎麼購買「魔法石」？\nB4:為什麼已成功完成交易，但尚未收到「魔法石」？";

$A1="魔法石可用作回復體力、回復戰靈、抽取魔法石封印卡、擴充背包空間與好友上限，以及在戰鬥死亡時進行復活。";
$A2="魔法石是不可以轉移的。";
$A3="在遊戲主界面右上角的「設定」(齒輪)點選「綁定帳戶」，將現有的帳戶與社交平台帳戶綁定，保存遊戲進度。
＊請使用未曾用作綁定的社交平台帳戶。";
$A4="社交平台帳戶的綁定及遊戲進度是不能被取消的。
如希望重新開始遊戲，可選擇重新安裝，選擇「直接開始」遊戲，或以其他未曾用作綁定的社交帳戶登入遊戲。";
$A5="由於遊戲內暫時沒有登出功能，如希望重新開始遊戲，可選擇重新安裝，註冊新帳戶開始遊戲。
＊如選擇「直接開始」登記帳戶，刪除應用程式後，所有遊戲進度將被刪除。";
$A6="如在遊戲「設定」內未能找到「綁定帳戶」的選項，有可能是因為帳戶已曾進行綁定。
請點選個人代表 (主界面上方的頭像)，查看 ID 旁有否顯示社交網絡的標誌 (Facebook, Twitter, 微博)。如顯示有社交網絡的標誌，代表此帳戶已進行綁定。";
$A7="《神魔之塔》 3.2 版本將新增追溯帳號功能，此功能可讓玩家追溯未曾綁定的帳號。只要在同一個手機裝置重新下載遊戲，開啟遊戲後將自動追溯原有的帳號。
＊此功能只適用於開通超過十天的遊戲帳號。為免帳戶數據流失，建議玩家使用社交帳戶來綁定遊戲帳號。";
$A8="為了保證遊戲的公平性，官方已制定系保安系統以監控違規活動，使用任何第三方程式/共存程式/自動轉珠程式/更改程序封包/代理伺服器等外掛程式進行遊戲，均屬違規行為。違規者會收到「違規警告」以示警惕，嚴重違規的遊戲帳號會被停權。如因涉及進行違規行為而導致帳戶永久停權， 《神魔之塔》將不會對服務使用者作出任何賠償，包括所有遊戲內付費內容 (魔法石)。";
$A9="1.【檢查您的手機是否有足夠的裝置記憶體】由於錄影功能需要的儲存空間較高，建議您騰出更多手機本體空間以確保錄影能夠順利進行。
2.【有否開啟「藍色光濾波器」之類的應用程式】如果您裝置上有安裝及使用這類應用程式，您可以暫時將該應用程式停用然後再嘗試錄影。
3.【檢查裝置軟體是否為最新版本】步驟：進入手機的【設置】功能 > 選擇【關於裝置】>【軟件更新】
＊於更新軟體前，我們強烈建議【備份】重要資料以確保不可預期的情況。
＊由於系統所限，錄影功能目前未能支援所有裝置。";
$A10="建議保持連線穩定 / 重新開啟遊戲程式或流動裝置，亦可以嘗試更新遊戲至最新版本。此外，玩家可以在登入遊戲後，到「設定」，將「畫面效果」一項調整為「OFF」然後再試。";
$A11="如玩家進行遊戲時，同時使用另一裝置 (包括手機、平板電腦等) 登入同一個遊戲帳戶，系統將會出現警告訊息來提醒玩家。
如果在戰鬥途中使用其他裝置成功登入，戰鬥完成後將不會得到該場戰鬥的所有戰利品 (包括魔法石、金幣、經驗值等)。";
$A12="由於不同語言版本擁有獨立的伺服器，因此玩家無法在不同語言版本之間轉移遊戲進度。";
$A13="在正常情況下，即使在抽卡時中途退出遊戲，封印卡仍會自動儲存至背包內，玩家可查看背包空間是否已增添了封印卡。如仍未能找到新的封印卡，請將個人遊戲UID，抽取封印卡的日期及時間電郵聯絡我們。
＊在背包右上方選擇「入手時間」作排序條件，最新入手的封印卡會出現在最前，並顯示為NEW。";
$A14="根據遊戲設定，成功挑戰每一個新關卡(Stage)，都可獲得 1 粒魔法石獎賞。
獎賞限定為一次，再次完成任務也不會再獲得魔法石獎賞。
如果關卡顯示為「Clear」，即代表已曾完成任務並已領取魔法石獎賞。
＊設有等級分類的任務，召喚師需完成初級、中級及高級的任務方可獲得獎賞 – 魔法石 1 粒。";
$A15="如未能收到緊急任務的通知，請依以下步驟開啟「廣播通知」(Notification)：
1. 在遊戲主界右上角的「設定」(齒輪)，選擇開啟「任務通知」。
2. 在裝置選擇「設定」並開啟應用程式「神魔之塔」的「廣播通知」(Notification)。
＊如已進行上述設定仍無法收到緊急任務的通知，有可能是個別裝置的設定所引致。建議可至遊戲主界面右上角的「設定」(齒輪)選擇「遊戲公告」，查看緊急任務的時間。";
$A16="召喚師可以嘗試於領取獎賞期間內重新登入遊戲程式 (Kill app) 再次查閱。";
$A17="1. 若召喚師於該關卡中曾經離開遊戲及重新登入 (Kill App)
2. 被列為「違規帳戶」之帳號
3. 系統偵測戰鬥期間曾使用或手機已安裝任何外掛程式或第三方軟件
4. 使用模擬器執行遊戲";
$A18="使用模擬器進行遊戲時，將不能支援以下幾項功能 ︰
1. 排行榜排名
2. 公會活動積分計算 (無法獲取積分)
3.「召喚師聯賽」";
$A19="如有開啟「藍色光濾波器」之類的應用程式，請先暫時將該應用程式停用然後再嘗試安裝。同時，我們建議召喚師盡快更新遊戲到最新版本以確保遊戲能正常運作。";
$A20="已分解或已用作合成的封印卡將不可恢復，建議召喚師可以將封印卡加到最愛，避免錯誤分解 / 合成。";

$B1="玩家可在遊戲內選擇「商店」，然後選擇「魔法石商店」，使用 App Store 或 Google Play 帳戶登入後選購魔法石。成功購買魔法石，遊戲系統收到購買的訊息後，系統會顯示「你已成功購買 x 粒魔法石，現在共持有 x 粒魔法石」 的信息。";
$B2="iOS 及 Android 的用戶可使用 App Store 及 Google Play 的付費平台，付費平台支援信用卡付款。";
$B3="iOS 用戶可考慮使用「iTunes 禮品卡」進行交易。Android 用戶可考慮使用「Google 禮品卡」進行交易；或下載官方提供的 APK 版本，使用 MyCard、Gash+ 點數卡 或 PayPal 進行儲值。";
$B4="交易中途如網絡中斷 或 離開遊戲，有可能會影響魔法石派發，導致成功完成交易但魔法石數量並沒有在遊戲中增加。
如果使用 MyCard 儲值，魔法石可能於 20 分鐘後才會增加至遊戲帳戶中，請玩家耐心等待。為免重複購買，請點擊「查看記錄」前往 iTunes 核對交易紀錄或點擊【iTunes 支援】取得技術支援。交易中途如網絡中斷 或 離開遊戲，有可能影響魔法石派發，玩家可依以下步驟恢復交易：
1. 先退出遊戲程式再重新登入。
2. 點選「商店」。
3. 選擇「魔法石商店」。
4. 如果出現一個對話窗要求確認交易，玩家可按 「確認」 恢復交易。
5. 成功恢復交易後，將顯示已恢復交易單據的數量，及已恢復魔法石的總數量。";

                   $a="請輸入以下的代號來查詢相關服務!!\n1:客服服務\n2:系統介紹\n3:新手教學\n4:公會教學";
                	$m_message = $message['text'];

                    switch ($m_message) {
                            case ($m_message=="Hi" || $m_message== "安安"|| $m_message== "你好"|| $m_message== "你好啊"):                          
                            $client->replyMessage(array(
                           'replyToken' => $event['replyToken'],
                           'messages' => array(
                             array(
                                   'type' => 'text',
                                   'text' => $m_message . "（～￣▽￣～）（～￣▽￣～）\n" . $a    
                               )
                            )                    
                     	));
                             break; 
                            case ($m_message=="公會"):
                                   $client->replyMessage(array(
                           'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                   'type' => 'text',
                                   'text' => "G1:世界公會\nG2:創立公會\nG3:搜尋公會\nG4:推薦公會\nG5:退出公會\nG6:公會公告\nG12:更改公會代表\nG14:公會捐獻\nG15:公會升級\nG16:公會加乘\nG17:公會個人任務"
                               )
                            )
                        	));
                          break;
                          case ($m_message=="任務"):
                                   $client->replyMessage(array(
                           'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                   'type' => 'text',
                                   'text' => "A14:為什麼完成了任務，但沒有獲得魔法石獎賞？\nA15:為什麼收不到緊急任務的通知？\nI1:特別任務\nG17:公會個人任務\nG18:第六任務"
                               )
                            )
                        	));
                          break;

                          case ($m_message=="聊天"):
                                   $client->replyMessage(array(
                           'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                   'type' => 'text',
                                   'text' => "G9:聊天互動\nG10:聊天設定"
                               )
                            )
                        	));
                          break;

                          case ($m_message=="更改"):
                                   $client->replyMessage(array(
                           'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                   'type' => 'text',
                                   'text' => "G12:更改公會代表\nG13:更改龍刻"
                               )
                            )
                        	));
                          break;

                          case ($m_message=="龍刻"):
                                   $client->replyMessage(array(
                           'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                   'type' => 'text',
                                   'text' => "I8:龍刻脈動\nI9:龍刻熔合\nG13:更改龍刻"
                               )
                            )
                        	));
                          break;
                          case ($m_message=="關卡"):
                                   $client->replyMessage(array(
                           'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                   'type' => 'text',
                                   'text' => " A17:為什麼完成關卡後未能登上排行榜？\nG19:布蘭克洞窟關卡"
                               )
                            )
                        	));
                          break;
                          case ($m_message=="符石"):
                                   $client->replyMessage(array(
                           'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                   'type' => 'text',
                                   'text' => "N1:移動符石\nN5:強化符石"
                               )
                            )
                        	));
                          break;
                          case ($m_message=="攻擊"):
                                   $client->replyMessage(array(
                           'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                   'type' => 'text',
                                   'text' => "N2:連撃加成\nN3:攻擊充能"
                               )
                            )
                        	));
                          break;
                          case ($m_message=="強化"):
                                   $client->replyMessage(array(
                           'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                   'type' => 'text',
                                   'text' => "N5:強化符石\nN9:強化合成\nN10:技能強化"
                               )
                            )
                        	));
                          break;
                          case ($m_message=="合成"):
                                   $client->replyMessage(array(
                           'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                   'type' => 'text',
                                   'text' => " A20:如在合成卡片時錯誤把重要卡片用掉，可以把封印卡恢復嗎？\nN9:強化合成\nN11:進化合成"
                               )
                            )
                        	));
                          break;
                          case ($m_message=="系統"):
                                   $client->replyMessage(array(
                           'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                   'type' => 'text',
                                   'text' => "I6:昇華系統\nI7:信箱系統\nI10:稱號系統"
                               )
                            )
                        	));
                          break;
                          case ($m_message=="魔法石"):
                                   $client->replyMessage(array(
                           'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                   'type' => 'text',
                                   'text' => "A1:「魔法石」的用途？\nA2:「魔法石」可轉移至其他帳戶嗎？\nA14:為什麼完成了任務，但沒有獲得魔法石獎賞？\n B1:如何購買「魔法石」？\nB2:「魔法石」可經由什麼付費平台購買呢？\nB3:如果沒有信用卡可怎麼購買「魔法石」？\nB4:為什麼已成功完成交易，但尚未收到「魔法石」？"
                               )
                            )
                        	));
                          break;
                          case ($m_message=="帳戶"):
                                   $client->replyMessage(array(
                           'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                   'type' => 'text',
                                   'text' => "A2:「魔法石」可轉移至其他帳戶嗎？\n A4:可否更換用作綁定的社交平台帳戶？\nA5:如何註冊新遊戲帳戶開始遊戲？\nA6:為什麼找不到「綁定帳戶」的選項？\nA7:如果我的帳戶不見了，而又沒有進行綁定怎麼辦？"
                               )
                            )
                        	));
                          break;
                          case ($m_message=="綁定"):
                                   $client->replyMessage(array(
                           'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                   'type' => 'text',
                                   'text' => "A3:如何進行綁定？\nA4:可否更換用作綁定的社交平台帳戶？\n A6:為什麼找不到「綁定帳戶」的選項？\nA7:如果我的帳戶不見了，而又沒有進行綁定怎麼辦？"
                               )
                            )
                        	));
                          break;

                        case 1:                          
                            $client->replyMessage(array(
                           'replyToken' => $event['replyToken'],
                           'messages' => array(
                             array(
                                   'type' => 'text',
                                   'text' => $Q     
                               )
                            )                    
                          	));
                             break; 
                            case ($m_message==A || $m_message== a): 
                            $client->replyMessage(array(
                           'replyToken' => $event['replyToken'],
                           'messages' => array(
                             array(
                                   'type' => 'text',
                                   'text' => $Q1
                               )
                            )
                        	));              
                             break; 
                           case ($m_message==A1 || $m_message== a1 || $m_message=="魔法石 用途" || $m_message=="用途 魔法石" || $m_message=="魔法石用途" || $m_message=="用途魔法石" || $m_message=="怎用魔法石"   || $m_message=="魔法石怎用"):
                                   $client->replyMessage(array(
                           'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                   'type' => 'text',
                                   'text' => $A1
                               )
                            )
                        	));
                          break; 
                          case ($m_message==A2 || $m_message== a2|| $m_message=="魔法石可給別人嗎" || $m_message=="魔法石可以送人嗎" || $m_message=="送人魔法石" || $m_message=="魔法石送人" || $m_message=="魔法石轉移" || $m_message=="轉移魔法石"):
                                   $client->replyMessage(array(
                           'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                   'type' => 'text',
                                   'text' => $A2
                               )
                            )
                        	));
                          break; 
                          case ($m_message==A3 || $m_message== a3|| $m_message=="怎麼綁定" || $m_message=="如何綁定" || $m_message=="怎麼綁定帳號" || $m_message=="如何綁定帳號" || $m_message=="帳號綁定"   || $m_message=="綁定帳號"  || $m_message=="如何進行綁定"  || $m_message=="帳號怎麼綁定"):
                                   $client->replyMessage(array(
                           'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                   'type' => 'text',
                                   'text' => $A3
                               )
                            )
                        	));
                          break; 
                          case ($m_message==A4 || $m_message== a4|| $m_message=="可否更換用作綁定的社交平台帳戶" || $m_message=="社交平台" || $m_message=="fb"|| $m_message=="FB" || $m_message=="google " || $m_message=="Google" || $m_message=="GOOGLE" || $m_message=="綁平台" || $m_message=="綁FB" || $m_message=="綁fb"):
                                   $client->replyMessage(array(
                           'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                   'type' => 'text',
                                   'text' => $A4
                               )
                            )
                        	));
                          break; 
                          case ($m_message==A5 || $m_message== a5||$m_message=="如何註冊新遊戲帳戶開始遊戲" || $m_message=="如何註冊" || $m_message=="怎麼註冊" || $m_message=="如何開始遊戲" || $m_message=="遊戲怎麼註冊" || $m_message=="遊戲如何註冊" || $m_message=="註冊新遊戲"):
                                   $client->replyMessage(array(
                           'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                   'type' => 'text',
                                   'text' => $A5
                               )
                            )
                        	));
                          break; 
                          case ($m_message==A6 || $m_message== a6|| $m_message=="為什麼找不到綁定帳戶的選項" || $m_message=="綁定帳戶的選項" || $m_message=="找不到綁定帳戶的選項" || $m_message=="找不到綁定帳戶" ):
                                   $client->replyMessage(array(
                           'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                   'type' => 'text',
                                   'text' => $A6
                               )
                            )
                        	));
                          break; 
                          case ($m_message==A7 || $m_message== a7|| $m_message=="如果我的帳戶不見了，而又沒有進行綁定怎麼辦" || $m_message=="如果我的帳戶不見了" || $m_message=="進行綁定怎麼辦" || $m_message=="帳戶不見了" || $m_message=="沒有進行綁定怎麼辦" || $m_message=="沒有綁定"):
                                   $client->replyMessage(array(
                           'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                   'type' => 'text',
                                   'text' => $A7
                               )
                            )
                        	));
                          break; 
                            case ($m_message==A8 || $m_message== a8||$m_message=="為什麼會收到違規警告" || $m_message=="違規警告" || $m_message=="收到違規"  || $m_message=="收到警告"):
                                   $client->replyMessage(array(
                           'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                   'type' => 'text',
                                   'text' => $A8
                               )
                            )
                        	));
                          break; 
                            
                          case ($m_message==A9 || $m_message== a9 || $m_message=="為什麼無法使用錄影功能"  || $m_message=="無法使用錄影"  || $m_message=="無法使用錄影功能"  || $m_message=="錄影功能壞掉"):
                                   $client->replyMessage(array(
                           'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                   'type' => 'text',
                                   'text' => $A9
                               )
                            )
                        	));
                          break; 
                          case ($m_message==A10 || $m_message== a10|| $m_message=="遇到斷線、閃退、顯示問題等異常情況時該怎麼辦"  || $m_message=="斷線"  || $m_message=="閃退" || $m_message=="顯示問題"   || $m_message=="異常情況"):
                                   $client->replyMessage(array(
                           'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                   'type' => 'text',
                                   'text' => $A10
                               )
                            )
                        	));
                          break; 
                          case ($m_message==A11 || $m_message== a11|| $m_message=="為什麼遊戲顯示正使用其他裝置登入"   || $m_message=="其他裝置登入"  || $m_message=="使用其他裝置"):
                                   $client->replyMessage(array(
                           'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                   'type' => 'text',
                                   'text' => $A11
                               )
                            )
                        	));
                          break; 
                          case ($m_message==A12 || $m_message== a12|| $m_message=="可否轉移不同語言版本的遊戲進度"   || $m_message=="轉移不同"  || $m_message=="語言版本"  || $m_message=="遊戲進度"):
                                   $client->replyMessage(array(
                           'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                   'type' => 'text',
                                   'text' => $A12
                               )
                            )
                        	));
                          break; 
                          case ($m_message==A13 || $m_message== a13|| $m_message=="在抽卡過程中途離開遊戲，仍可獲得封印卡嗎"   || $m_message=="在抽卡過程中途離開遊戲"  || $m_message=="中途離開遊戲"  || $m_message=="離開遊戲"):
                                   $client->replyMessage(array(
                           'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                   'type' => 'text',
                                   'text' => $A13
                               )
                            )
                        	));
                          break; 
                          case ($m_message==A14 || $m_message== a14|| $m_message=="為什麼完成了任務，但沒有獲得魔法石獎賞"   || $m_message=="完成了任務"  || $m_message=="沒有獲得魔法石獎賞"  || $m_message=="魔法石獎賞" || $m_message=="獲得魔法石獎賞"):
                                   $client->replyMessage(array(
                           'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                   'type' => 'text',
                                   'text' => $A14
                               )
                            )
                        	));
                          break; 
                          case ($m_message==A15 || $m_message== a15|| $m_message=="為什麼收不到緊急任務的通知"   || $m_message=="收不到緊急任務"  || $m_message=="收不到任務通知"  || $m_message=="緊急任務的通知"  || $m_message=="緊急任務"):
                                   $client->replyMessage(array(
                           'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                   'type' => 'text',
                                   'text' => $A15
                               )
                            )
                        	));
                          break; 
                            case ($m_message==A16 || $m_message== a16|| $m_message=="為何無法領取活動獎賞"   || $m_message=="無法領取活動"  || $m_message=="領取活動獎賞"  || $m_message=="無法領取活動獎賞" || $m_message=="領不到獎賞"):
                                   $client->replyMessage(array(
                           'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                   'type' => 'text',
                                   'text' => $A16
                               )
                            )
                        	));
                          break; 
                          case ($m_message==A17 || $m_message== a17|| $m_message=="為什麼完成關卡後未能登上排行榜"   || $m_message=="未能登上排行榜"  || $m_message=="完成關卡後未能登上排行榜"  || $m_message=="登上排行榜"  || $m_message=="排行榜"):
                                   $client->replyMessage(array(
                           'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                   'type' => 'text',
                                   'text' => $A17
                               )
                            )
                        	));
                          break; 
                          case ($m_message==A18 || $m_message== a18|| $m_message=="可否使用模擬器進行遊戲"   || $m_message=="模擬器進行遊戲"  || $m_message=="進行遊戲"  || $m_message=="使用模擬器"  || $m_message=="模擬器"):
                                   $client->replyMessage(array(
                           'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                   'type' => 'text',
                                   'text' => $A18
                               )
                            )
                        	));
                          break; 
                          case ($m_message==A19 || $m_message== a19|| $m_message=="為什麼無法安裝/下載《神魔之塔》APK 版本"   || $m_message=="無法安裝/下載" || $m_message=="APK 版本"  || $m_message=="無法安裝" || $m_message=="無法下載"|| $m_message=="無法下載神魔之塔"|| $m_message=="無法下載神魔"|| $m_message=="無法安裝神魔之塔"|| $m_message=="無法安裝神魔"):
                                   $client->replyMessage(array(
                           'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                   'type' => 'text',
                                   'text' => $A19
                               )
                            )
                        	));
                          break; 
                          case ($m_message==A20 || $m_message== a20|| $m_message=="如在合成卡片時錯誤把重要卡片用掉，可以把封印卡恢復嗎"|| $m_message=="合成卡片時" || $m_message=="可以把封印卡恢復" || $m_message=="如在合成卡片時錯誤把重要卡片"):
                                   $client->replyMessage(array(
                           'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                   'type' => 'text',
                                   'text' => $A20
                               )
                            )
                        	));
                          break; 
                          case ($m_message==B || $m_message== b):
                                   $client->replyMessage(array(
                           'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                   'type' => 'text',
                                   'text' => $Q2
                               )
                            )
                        	));
                          break; 
                          case ($m_message==B1 || $m_message== b1||$m_message=="如何購買魔法石" || $m_message=="購買魔法石" || $m_message=="魔法石購買" || $m_message=="魔法石 購買"|| $m_message=="購買 魔法石"|| $m_message=="如何買魔法石"|| $m_message=="如何 買魔法石"|| $m_message=="買魔法石"|| $m_message=="魔法石怎買" ):
                                   $client->replyMessage(array(
                           'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                   'type' => 'text',
                                   'text' => $B1
                               )
                            )
                        	));
                          break; 
                          case ($m_message==B2 || $m_message== b2||$m_message=="魔法石可經由什麼付費平台購買呢？" || $m_message=="魔法石可經由什麼付費平台購買呢" || $m_message=="魔法石經由什麼付費平台購買呢" || $m_message=="魔法石可由什麼付費平台購買呢"|| $m_message=="魔法石付費"|| $m_message=="魔法石可經由什麼付費平台購買"|| $m_message=="魔法石經由什麼付費平台購買"|| $m_message=="魔法石可由什麼付費平台購買"|| $m_message=="魔法石由什麼付費平台購買" || $m_message=="魔法石的付費平台"|| $m_message=="魔法石付費平台"|| $m_message=="魔法石 付費平台"|| $m_message=="付費平台 魔法石"):
                                   $client->replyMessage(array(
                           'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                   'type' => 'text',
                                   'text' => $B2
                               )
                            )
                        	));
                          break; 
                          case ($m_message==B3 || $m_message== b3||$m_message=="如果沒有信用卡可怎麼購買魔法石？" || $m_message=="如果沒有信用卡可怎麼購買魔法石" || $m_message=="沒有信用卡可怎麼購買魔法石" || $m_message=="如果沒信用卡可怎麼購買魔法石"|| $m_message=="沒信用卡可怎麼購買魔法石"|| $m_message=="如果沒有信用卡怎麼購買魔法石"|| $m_message=="沒有信用卡購買魔法石"|| $m_message=="沒信用卡購買魔法石"):
                                   $client->replyMessage(array(
                           'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                   'type' => 'text',
                                   'text' => $B3
                               )
                            )
                        	));
                          break;
                          case ($m_message==B4 || $m_message== b4||$m_message=="為什麼已成功完成交易，但尚未收到魔法石？" || $m_message=="為什麼已成功完成交易，但尚未收到魔法石" || $m_message=="已成功完成交易，但尚未收到魔法石" || $m_message=="為什麼已成功完成交易但尚未收到魔法石"|| $m_message=="已成功完成交易但尚未收到魔法石"|| $m_message=="完成交易但尚未收到魔法石"|| $m_message=="交易成功但尚未收到魔法石"|| $m_message=="完成交易但沒收到魔法石"|| $m_message=="完成交易但沒有收到魔法石"|| $m_message=="交易成功但沒收到魔法石"|| $m_message=="交易成功易但沒有收到魔法石"|| $m_message=="交易成功了但沒收到魔法石"|| $m_message=="交易成功沒有收到魔法石" || $m_message=="交易成功沒收到魔法石"|| $m_message=="完成交易了但沒有收到魔法石"|| $m_message=="完成交易了但沒收到魔法石" || $m_message=="完成交易沒有收到魔法石" || $m_message=="完成交易沒收到魔法石"|| $m_message=="交易完成沒收到魔法石"|| $m_message=="交易完成沒有收到魔法石"|| $m_message=="交易完成了但沒收到魔法石"):
                                   $client->replyMessage(array(
                           'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                   'type' => 'text',
                                   'text' => $B4
                               )
                            )
                        	));
                          break;
                        case 2:
                            $client->replyMessage(array(
                             'replyToken' => $event['replyToken'],
                             'messages' => array(
                             array(
                                   'type' => 'text',
                                   'text' => $I
                               )
                            )
                        	));
                        break; 
                       

                        case ($m_message==I1 || $m_message== i1 || $m_message=="特別任務" || $m_message=="特別 任務" || $m_message=="任務 特別" || $m_message=="任務特別"):
                            $client->replyMessage(array(
                             'replyToken' => $event['replyToken'],
                             'messages' => array(
                             array(
                                   'type' => 'text',
                                   'text' => $I1                            
                             )
                            )
                        	));
                        break; 
                        case ($m_message==I2 || $m_message== i2 || $m_message=="通關獎賞" || $m_message=="通關 獎賞" || $m_message=="獎賞 通關" || $m_message=="獎賞通關"):
                            $client->replyMessage(array(
                             'replyToken' => $event['replyToken'],
                             'messages' => array(
                             array(
                                   'type' => 'text',
                                   'text' => $I2
                               )
                            )
                        	));
                        break; 
                        case ($m_message==I3 || $m_message== i3 || $m_message=="潛能解放" || $m_message=="潛能 解放" || $m_message=="解放潛能" || $m_message=="解放 潛能"):
                            $client->replyMessage(array(
                             'replyToken' => $event['replyToken'],
                             'messages' => array(
                             array(
                                   'type' => 'text',
                                   'text' => $I3
                               )
                            )
                        	));
                        break; 
                        case ($m_message==I4 || $m_message== i4 || $m_message=="異空轉生" || $m_message=="異空 轉生" || $m_message=="轉生異空" || $m_message=="轉生 異空"):
                            $client->replyMessage(array(
                             'replyToken' => $event['replyToken'],
                             'messages' => array(
                             array(
                                   'type' => 'text',
                                   'text' => $I4
                               )
                            )
                        	));
                        break; 
                            case ($m_message==I5 || $m_message== i5 || $m_message=="廣播通知" || $m_message=="廣播 通知" || $m_message=="通知廣播" || $m_message=="通知 廣播"):
                            $client->replyMessage(array(
                             'replyToken' => $event['replyToken'],
                             'messages' => array(
                             array(
                                   'type' => 'text',
                                   'text' => $I5
                               )
                            )
                        	));
                        break; 
                            case ($m_message==I6 || $m_message== i6 || $m_message=="昇華系統" || $m_message=="昇華 系統" || $m_message=="系統昇華" || $m_message=="系統昇華"):
                            $client->replyMessage(array(
                             'replyToken' => $event['replyToken'],
                             'messages' => array(
                             array(
                                   'type' => 'text',
                                   'text' => $I6
                               )
                            )
                        	));
                        break; 
                            case ($m_message==I7 || $m_message== i7 || $m_message=="信箱系統" || $m_message=="信箱 系統" || $m_message=="系統信箱" || $m_message=="系統 信箱"):
                            $client->replyMessage(array(
                             'replyToken' => $event['replyToken'],
                             'messages' => array(
                             array(
                                   'type' => 'text',
                                   'text' => $I7
                               )
                            )
                        	));
                        break; 
                            case ($m_message==I8 || $m_message== i8 || $m_message=="龍刻脈動" || $m_message=="龍刻 脈動" || $m_message=="脈動龍刻" || $m_message=="脈動 龍刻"):
                            $client->replyMessage(array(
                             'replyToken' => $event['replyToken'],
                             'messages' => array(
                             array(
                                   'type' => 'text',
                                   'text' => $I8
                               )
                            )
                        	));
                        break; 
                            case ($m_message==I9 || $m_message== i9 || $m_message=="龍刻熔合" || $m_message=="龍刻 熔合" || $m_message=="熔合龍刻" || $m_message=="熔合 龍刻"):
                            $client->replyMessage(array(
                             'replyToken' => $event['replyToken'],
                             'messages' => array(
                             array(
                                   'type' => 'text',
                                   'text' => $I9
                               )
                            )
                        	));
                        break; 
                            case ($m_message==I10 || $m_message== i10 || $m_message=="稱號系統" || $m_message=="稱號 系統" || $m_message=="系統稱號" || $m_message=="系統 稱號"):
                            $client->replyMessage(array(
                             'replyToken' => $event['replyToken'],
                             'messages' => array(
                             array(
                                   'type' => 'text',
                                   'text' => $I10
                               )
                            )
                        	));
                        break; 
                        case 3:                          
                            $client->replyMessage(array(
                           'replyToken' => $event['replyToken'],
                           'messages' => array(
                             array(
                                   'type' => 'text',
                                   'text' => $N     
                               )
                             )  
          	));
                             break; 
                            case ($m_message==N1 || $m_message== n1 || $m_message=="移動符石" || $m_message=="移動 符石" || $m_message=="符石 移動" || $m_message=="符石移動"):
                                   $client->replyMessage(array(
                           'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                   'type' => 'text',
                                   'text' => $N1
                               )
                            )
                        	));
                          break; 
                          case ($m_message==N2 || $m_message== n2 || $m_message=="連擊加成" || $m_message=="連擊 加成" || $m_message=="加成 連擊" || $m_message=="加成連擊"):
                                   $client->replyMessage(array(
                           'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                   'type' => 'text',
                                   'text' => $N2
                               )
                            )
                        	));
                          break; 
                          case ($m_message==N3 || $m_message== n3 || $m_message=="攻擊充能" || $m_message=="攻擊 充能" || $m_message=="充能攻擊" || $m_message=="充能 攻擊"):
                                   $client->replyMessage(array(
                           'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                   'type' => 'text',
                                   'text' => $N3
                               )
                            )
                        	));
                          break;
                        case ($m_message==N4 || $m_message== n4 || $m_message=="全體攻擊" || $m_message=="全體 攻擊" || $m_message=="攻擊全體" || $m_message=="攻擊 全體"):
                                   $client->replyMessage(array(
                           'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                   'type' => 'text',
                                   'text' => $N4
                               )
                            )
                        	));
                          break; 
                           case ($m_message==N5 || $m_message== n5 || $m_message=="強化符石" || $m_message=="強化 符石" || $m_message=="符石強化" || $m_message=="符石 強化"):
                                   $client->replyMessage(array(
                           'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                   'type' => 'text',
                                   'text' => $N5
                               )
                            )
                        	));
                          break;
                                                  case ($m_message==N6 || $m_message== n6 || $m_message=="技能發動" || $m_message=="技能 發動" || $m_message=="發動技能" || $m_message=="發動技能"):
                                   $client->replyMessage(array(
                           'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                   'type' => 'text',
                                   'text' => $N6
                               )
                            )
                        	));
                          break; 
                                                  case ($m_message==N7 || $m_message== n7 || $m_message=="屬性相剋" || $m_message=="屬性 相剋" || $m_message=="相剋屬性" || $m_message=="相剋 屬性"):
                                   $client->replyMessage(array(
                           'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                   'type' => 'text',
                                   'text' => $N7
                               )
                            )
                        	));
                          break; 
                          case ($m_message==N8 || $m_message== n8 || $m_message=="相生相剋" || $m_message=="相生 相剋" || $m_message=="相剋相生" || $m_message=="相剋 相生"):
                                   $client->replyMessage(array(
                           'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                   'type' => 'text',
                                   'text' => $N8
                               )
                            )
                        	));
                        break; 
                        case ($m_message==N9 || $m_message== n9 || $m_message=="強化合成" || $m_message=="強化 合成" || $m_message=="合成強化" || $m_message=="合成 強化"):
                                   $client->replyMessage(array(
                           'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                   'type' => 'text',
                                   'text' => $N9
                               )
                            )
                        	));
                        break; 
                        case ($m_message==N10 || $m_message== n10 || $m_message=="技能強化" || $m_message=="技能 強化" || $m_message=="強化技能" || $m_message=="強化 技能"):
                                   $client->replyMessage(array(
                           'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                   'type' => 'text',
                                   'text' => $N10
                               )
                            )
                        	));
                        break; 
                        case ($m_message==N11 || $m_message== n11 || $m_message=="進化合成" || $m_message=="進化 合成" || $m_message=="合成進化" || $m_message=="合成 進化"):
                                   $client->replyMessage(array(
                           'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                   'type' => 'text',
                                   'text' => $N11
                               )
                            )
                        	));
                        break;  

                           case 4:                          
                            $client->replyMessage(array(
                           'replyToken' => $event['replyToken'],
                           'messages' => array(
                             array(
                                   'type' => 'text',
                                   'text' => $G
                               )
                             )  
          	));
                             break; 
                            case ($m_message==G1 || $m_message== g1 ||$m_message=="世界公會"||$m_message=="世界 公會"|| $m_message=="公會世界"|| $m_message=="公會 世界"):
                                   $client->replyMessage(array(
                           'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                   'type' => 'text',
                                   'text' => $G1
                               )
                            )
                        	));
                          break; 
                            
                          case ($m_message==G2 || $m_message==g2 ||$m_message=="創立公會"||$m_message=="創立 公會"|| $m_message=="公會創立"|| $m_message=="公會 創立"):
                                   $client->replyMessage(array(
                           'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                   'type' => 'text',
                                   'text' => $G2
                               )
                            )
                        	));
                          break; 
                          case ($m_message==G3 || $m_message== g3||$m_message=="搜尋公會"||$m_message=="搜尋 公會"|| $m_message=="搜尋世界"|| $m_message=="搜尋 世界"):
                                   $client->replyMessage(array(
                           'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                   'type' => 'text',
                                   'text' => $G3
                               )
                            )
                        	));
                          break; 
                          case ($m_message==G4 || $m_message== g4||$m_message=="推薦公會"||$m_message=="推薦 公會"|| $m_message=="公會推薦"|| $m_message=="公會 推薦"):
                                   $client->replyMessage(array(
                           'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                   'type' => 'text',
                                   'text' => $G4
                               )
                            )
                        	));
                          break; 
                          case ($m_message==G5 || $m_message== g5||$m_message=="退出公會"||$m_message=="退出 公會"|| $m_message=="公會退出"|| $m_message=="公會 退出"):
                                   $client->replyMessage(array(
                           'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                   'type' => 'text',
                                   'text' => $G5
                               )
                            )
                        	));
                          break; 
                          case ($m_message==G6 || $m_message== g6||$m_message=="公告給公會成員"||$m_message=="公告到公會"|| $m_message=="公會公告"|| $m_message=="公會 公告"):
                                   $client->replyMessage(array(
                           'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                   'type' => 'text',
                                   'text' => $G6
                               )
                            )
                        	));
                          break; 
                          case ($m_message==G7 || $m_message== g7||$m_message=="添加成員"||$m_message=="添加 成員"|| $m_message=="成員添加"|| $m_message=="成員 添加"):
                                   $client->replyMessage(array(
                           'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                   'type' => 'text',
                                   'text' => $G7
                               )
                            )
                        	));
                          break; 
                          case ($m_message==G8 || $m_message== g8||$m_message=="逐出成員"||$m_message=="逐出 成員"|| $m_message=="成員逐出"|| $m_message=="成員 逐出"):
                                   $client->replyMessage(array(
                           'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                   'type' => 'text',
                                   'text' => $G8
                               )
                            )
                        	));
                          break; 
                            case ($m_message==G9 || $m_message== g9||$m_message=="聊天互動"||$m_message=="聊天 互動"|| $m_message=="互動聊天"|| $m_message=="互動 聊天"):
                                   $client->replyMessage(array(
                           'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                   'type' => 'text',
                                   'text' => $G9
                               )
                            )
                        	));
                          break; 
                            
                          case ($m_message==G10 || $m_message== g10||$m_message=="聊天設定"||$m_message=="聊天 設定"|| $m_message=="設定聊天"|| $m_message=="設定 聊天"):
                                   $client->replyMessage(array(
                           'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                   'type' => 'text',
                                   'text' => $G10
                               )
                            )
                        	));
                          break; 
                          case ($m_message==G11 || $m_message== g11||$m_message=="展覽室"||$m_message=="展 覽室"|| $m_message=="展覽      室"|| $m_message=="展 覽 室"):
                                   $client->replyMessage(array(
                           'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                   'type' => 'text',
                                   'text' => $G11
                               )
                            )
                        	));
                          break; 
                          case ($m_message==G12 || $m_message== g12||$m_message=="更改公會代表"||$m_message=="更改 公會代表"|| $m_message=="更改公會 代表"|| $m_message=="更改 公會 代表"|| $m_message=="公會代表"|| $m_message=="公會 代表"|| $m_message=="更改代表"|| $m_message=="更改 代表"):
                                   $client->replyMessage(array(
                           'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                   'type' => 'text',
                                   'text' => $G12
                               )
                            )
                        	));
                          break; 
                          case ($m_message==G13 || $m_message== g13||$m_message=="更改龍刻"||$m_message=="更改 龍刻"|| $m_message=="龍刻更改"|| $m_message=="龍刻 更改"):
                                   $client->replyMessage(array(
                           'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                   'type' => 'text',
                                   'text' => $G13
                               )
                            )
                        	));
                          break; 
                          case ($m_message==G14 || $m_message== g14||$m_message=="公會捐獻"||$m_message=="公會 捐獻"|| $m_message=="捐獻 公會"|| $m_message=="捐獻給公會"):
                                   $client->replyMessage(array(
                           'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                   'type' => 'text',
                                   'text' => $G14
                               )
                            )
                        	));
                          break; 
                          case ($m_message==G15 || $m_message== g15||$m_message=="公會升級"||$m_message=="公會 升級"|| $m_message=="升級公會"|| $m_message=="升級 公會"):
                                   $client->replyMessage(array(
                           'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                   'type' => 'text',
                                   'text' => $G15
                               )
                            )
                        	));
                          break; 
                          case ($m_message==G16 || $m_message== g16||$m_message=="公會加乘"||$m_message=="公會 加乘"|| $m_message=="公會的加乘"|| $m_message=="加乘 公會"||$m_message=="公會加乘效果"||$m_message=="公會效果加乘"):
                                   $client->replyMessage(array(
                           'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                   'type' => 'text',
                                   'text' => $G16
                               )
                            )
                        	));
                          break; 
                            case ($m_message==G17 || $m_message== g17||$m_message=="公會個人任務"||$m_message=="公會 個人任務"|| $m_message=="公會個人 任務"|| $m_message=="公會 個人 任務"|| $m_message=="個人公會任務"|| $m_message=="個人 公會任務"|| $m_message=="個人公會 任務"|| $m_message=="個人 公會 任務"|| $m_message=="公會任務個人"|| $m_message=="公會任務 個人"|| $m_message=="公會 任務個人"|| $m_message=="公會 任務 個人"|| $m_message=="公會個人的任務"):
                                   $client->replyMessage(array(
                           'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                   'type' => 'text',
                                   'text' => $G17
                               )
                            )
                        	));
                          break; 
                          case ($m_message==G18 || $m_message== g18||$m_message=="第六任務"||$m_message=="第六 任務"|| $m_message=="第六個任務"|| $m_message=="任務 第六"|| $m_message=="額外的第六任務"):
                                   $client->replyMessage(array(
                           'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                   'type' => 'text',
                                   'text' => $G18
                               )
                            )
                        	));
                          break;
                             case ($m_message==G19 || $m_message== g19||$m_message=="布蘭克洞窟關卡"||$m_message=="布蘭克 洞窟關卡"|| $m_message=="布蘭克洞窟 關卡"|| $m_message=="布蘭克洞窟"|| $m_message=="布蘭克 洞窟"|| $m_message=="洞窟布蘭克"|| $m_message=="洞窟布 蘭克"||$m_message=="洞窟關卡"||$m_message=="洞窟 關卡 "||$m_message=="布蘭克關卡"||$m_message=="布蘭克 關卡"||$m_message=="布蘭克洞窟的關卡"||$m_message=="布蘭克洞窟的關卡"):
                                   $client->replyMessage(array(
                           'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                   'type' => 'text',
                                   'text' => $G19
                               )
                            )
                        	));
                          break;
                        default:
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
