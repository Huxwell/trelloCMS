<?php
class EntityList {
    public $entities = array();
    public function __construct($json_object) {
        
        foreach($json_object->lists as $list) {
            $entity = new Entity($list->id,$list->name, $json_object->cards);
            
            if($prev) {
                $prev->next_id = $entity->id;
                $entity->prev_id = $prev->id;
            }
            
            $this->entities[$list->id] = $entity;
            
            $prev = $entity;
        }
        foreach($json_object->cards as $card) {
            if(array_key_exists($card->idList,$this->entities)) //assert would be better?
            $this->entities[$card->idList]->addCard($card);
        }
        foreach($this->entities as $entity) {
            $entity->process();
        }
        /*foreach($this->entities as $entity) {
            foreach($entity->cards as $card) {
                if(property_exists($entity, $card->name)) {
                    //if($card->name == "picture") $entity->picture = $card->attachments[0]->url;
                    if($card->name == "picture") $entity->picture = $card->attachments[0]->previews[5]->url;
                    else if($card->name == "thumbnail") $entity->thumbnail = $card->attachments[0]->previews[4]->url; 
                    else $entity->{$card->name} = $card->desc;
                }
            }
            unset($entity->cards);
        } */       
    }
}
