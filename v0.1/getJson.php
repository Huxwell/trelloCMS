<?php


require("models/Entity.php");
require("models/EntityList.php");

$address = 'http://trello.com/1/boards/4QLlKtRE?'
        . 'fields=cards,lists,name&'
        . 'cards=open&card_fields=desc,idList,name,pos&'
        . 'card_attachments=true&'
        . 'card_attachment_fields=name,url,previews&'
        . 'lists=open&list_fields=name,id&'
        . 'organization=false&'
        . 'key=6a042c95e7f95dd31077afcb84c75fa1';
echo "<br>".$address."<br>";
$json_object = json_decode(file_get_contents($address));
echo "<pre>";
    var_dump($json_object);
echo "</pre>";
echo "<br><br><br>=================<br><br><br>";
$ent = new EntityList($json_object);
echo "<pre>";
    var_dump($ent);
echo "</pre>";
