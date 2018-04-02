<?php
    date_default_timezone_get('Asia/Tokyo');
    $now_hour=(int)date("H");
    
    function greeting($hour){
        $result="";
        if(6<=$hour && $hour<12){
            $result="おはよう";
        }
        elseif(12<=$hour && $hour<18){
            $result="こんにちは";
        }
        else{
            $result="こんばんは";
        }
        
        return $result;
    }
?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>タイトル</title>
    </head>
    <body>
        <form action="index.php" method="POST">
            <label>名前:<input type="text" name="target_name"></label>　<br>
            <!--見た目の改行には、<br>を使いましたが、これが正解でしょうか？  -->
            <label>年齢:<input type="number" name="age"></label>
            <input type="submit" value="送信"/>
        </form>
        <P>今は<?php print $now_hour; ?>　時です。</P>
        <p><?php print greeting($now_hour);?>、
            <?php print $_POST['target_name']; ?>さん(
            <?php print $_POST['age']; ?>
            )</p>
    </body>
    
</html>