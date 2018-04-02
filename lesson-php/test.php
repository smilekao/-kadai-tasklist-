<!DOCTYPE html>
<?php
    date_default_timezone_set('Asia/Tokyo');
    $now_hour=(int)date("H")
?>

<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>タイトル</title>
    </head>
    <body>
        <ul>
            <?php for($i=1; $i<10 ; $i++) { ?>
                <li><?php print '3 X ' .'-'.(3*$i); ?></li>
            <?php } ?>
            
        </ul>
    </body>
    
</html>