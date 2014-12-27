<?php

require_once "TrelloList.php";

class TrelloBoard {

    public $name;
    public $lists = array();

    public function __construct($json) {
        $json_object = json_decode($json);
        $this->name = $json_object->name;
        foreach ($json_object->lists as $list) {
            $this->lists[$list->id] = new TrelloList($list->id, $list->name);
        }
        foreach ($json_object->cards as $card) {
            if (array_key_exists($card->idList, $this->lists))
                $this->lists[$card->idList]->addCard($card);
        }
    }

}
