<?php
//BOARD_ID is aviable at board url
//board has to be public
//key may be ommitted
define(BOARD_ID,'');
require("models/Entity.php");
require("models/EntityList.php");
$address = 'http://trello.com/1/boards/'.BOARD_ID.'?'
        . 'fields=cards,lists,name&'
        . 'cards=open&card_fields=desc,idList,name,pos&'
        . 'card_attachments=true&'
        . 'card_attachment_fields=name,url,previews&'
        . 'lists=open&list_fields=name,id&'
        . 'organization=false&'
        . 'key= ';
$json_object = json_decode(file_get_contents($address));
$entList = new EntityList($json_object);



if($_GET['dump']==1) { echo "<pre>"; var_dump($entList); echo "</pre>"; }
?>
