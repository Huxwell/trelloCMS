<?php

require_once "models/TrelloBoard.php";

class Controller {

    private $boardId;
    public $board;
    public $text = "afdsdfds";
    function __construct($boardId) {
        $this->boardId = $boardId;
        require_once("data/trelloJSON.php");
        $this->board = new TrelloBoard($json);
    }
    
}
