<?php
//var_dump($this->board->lists[$this->currId]->cards);

foreach($this->board->lists[$this->currId]->cards as $card) {
    echo "<article>";
    echo "<h2>".$card->name."<h2>";
    echo "<p>".$card->desc."</p>";
    echo "</article>";
}
?>