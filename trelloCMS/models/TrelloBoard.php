<?php

require_once "TrelloList.php";

class TrelloBoard {

    public $name;
    public $entities = array();

    public function __construct($json) {
        $json_object = json_decode($json);
        $this->name = $json_object->name;
        foreach ($json_object->lists as $list) {
            $entity = new TrelloList($list->id, $list->name, $json_object->cards);

            if ($prev) {
                $prev->next_id = $entity->id;
                $entity->prev_id = $prev->id;
            }

            $this->entities[$list->id] = $entity;

            $prev = $entity;
        }
        foreach ($json_object->cards as $card) {
            if (array_key_exists($card->idList, $this->entities)) //assert would be better?
                $this->entities[$card->idList]->addCard($card);
        }
        foreach ($this->entities as $entity) {
            $entity->process();
        }
    }

}
