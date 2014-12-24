<?php

require_once "models/TrelloBoard.php";

class Controller {

    private $boardId;
    public $board;
    public $text = "afdsdfds";
    public $currId;
    function __construct($boardId) {
        $this->boardId = $boardId;
        require_once("data/trelloJSON.php");
        $this->board = new TrelloBoard($json);
        if(isset($_GET['page'])) $this->currId = $_GET['page'];
        else $this->currId = reset($this->board->lists)->id;
    }
    public function renderMenu() {
        require_once("views/menu.php");
    }
    public function renderList() {

    }
}
