<?php
class Entity {
    public $id, $name, $cards=array();
    public $youtube = array();
    public $picture, $pictures, $information, $background, $thumbnail, $title, $date, $function;
    public $next_id, $prev_id;
    
    function __construct($id, $name) {
        $this->id = $id;
        $this->name = $name;
    }
    function process() {
            foreach($this->cards as $card) {
                if(property_exists($this, $card->name)) {
                    if($card->name == "picture") {
                        $this->picture = $card->attachments[0]->url;
                        $this->pictures = $card->attachments;
                    }
                    else if($card->name == "thumbnail") $this->thumbnail = $card->attachments[0]->url; 
                    else $this->{$card->name} = $card->desc;
                }
            }
    }
    function addCard($card) {
        $this->cards[$card->name] = $card;
    }
    function processCards() {
        foreach($this->cards as $card) {
            if(property_exists($this, $card->name)) {
                    $this->card->name
                    = $card->desc;
            }
        }
        unset($this->cards);
    }
}
