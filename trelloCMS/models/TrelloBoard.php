<?php

require_once "TrelloList.php";

class TrelloBoard {

    public $name;
    public $lists = array();

    public function __construct($json) {
        $json_object = json_decode($json);
        $this->name = $json_object->name;
        foreach ($json_object->lists as $list) {
            $list = new TrelloList($list->id, $list->name, $json_object->cards);

            if ($prev) {
                $prev->next_id = $list->id;
                $list->prev_id = $prev->id;
            }

            $this->lists[$list->id] = $list;

            $prev = $list;
        }
        foreach ($json_object->cards as $card) {
            if (array_key_exists($card->idList, $this->lists)) //assert would be better?
                $this->lists[$card->idList]->addCard($card);
        }
        foreach ($this->lists as $list) {
            $list->process();
        }
    }

}
