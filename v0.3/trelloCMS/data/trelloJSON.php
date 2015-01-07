<?php
if(!isset($board_id)) $board_id = "NThkZ2R1";
/*$address = 'http://trello.com/1/boards/'.$board_id.'?'
        . 'fields=cards,lists,name&'
        . 'cards=open&card_fields=desc,idList,name,pos&'
        . 'card_attachments=true&'
        . 'card_attachment_fields=name,url,previews&'
        . 'lists=open&list_fields=name,id&'
        . 'organization=false&'
        . 'key= ';*/
$address = "http://trello.com/b/NThkZ2R1.json";
$json = file_get_contents($address);
file_put_contents("trello.json", $json);
if($_GET['debug']==1) { echo "<pre>" + $json + "</pre>"; }
?>
