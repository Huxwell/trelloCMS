<?php

require_once "TrelloCard.php";

class TrelloList {

    public $id, $name, $cards = array();
    public $youtube = array();
    public $picture, $pictures, $information, $background, $thumbnail, $title, $date, $function;
    public $next_id, $prev_id;

    function __construct($id, $name) {
        $this->id = $id;
        $this->name = $name;
    }
    function addCard($card) {
        $this->cards[$card->id] = new TrelloCard($card);
    }
}
