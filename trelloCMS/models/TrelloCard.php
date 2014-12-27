<?php

class TrelloCard {
    public $name, $desc, $images, $created_date, $modified_date;
    public function __construct($json_card) {
        $this->name = $json_card->name;
        $this->desc = $json_card->desc;
        //echo "<pre>"; var_dump($json_card); echo "</pre>";
    }
}

