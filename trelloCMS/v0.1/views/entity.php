<!--<div class="hidden-xs page-scroll">
        <a href="#thumbnails">
        <button type="button" class="btn btn-default btn-lg">
            <span class="glyphicon glyphicon-chevron-up"></span>
        </button>
        </a>
</div>-->

<?php
require_once($_SERVER['DOCUMENT_ROOT']."/trello/init.php");
$entity = $entList->entities[$_GET['id']]?$entList->entities[$_GET['id']]:reset($entList->entities);
echo "<h2>".
        (($entity->title!=NULL)?$entity->title:$entity->name)
    ."</h2>";
?>
<div class="col-md-1 hidden-xs hidden-sm" style="margin-top: 20%;">
<?php if($entity->prev_id) { ?>
        <a class="ent_nav" href="./trello/views/entity.php?id=<?php echo $entity->prev_id; ?> ">
        <button type="button" class="btn btn-default btn-lg">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </button>
        </a>
 <?php } ?>
</div>
 
<?php

echo "<div class=\"col-md-4\">";
if ($entity->picture) echo "<img class=\"img-rounded img-responsive center-block\" src=\"".$entity->picture."\">";
echo "<p style=\"  text-align: left; \" class=\"information\">".$entity->information."</p>";
echo "<p>";

echo "</p></div>";
?>

<div class="col-md-6 embed-container"><iframe src="//www.youtube.com/embed/<?php echo $entity->youtube;   ?>" frameborder="0" allowfullscreen></iframe></div>

<div class="col-md-1 hidden-xs hidden-sm" style="margin-top: 20%;">
<?php if($entity->next_id) { ?>
        <a class="ent_nav" href="./trello/views/entity.php?id=<?php echo $entity->next_id; ?>">
        <button type="button" class="btn btn-default btn-lg">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </button>
        </a>
 <?php } ?>
</div>
<style>

</style>
<script>
$(document).ready(function() {
    console.log("ready.");
    $('a.ent_nav').bind('click',function(event){
        console.log("click.");
        event.preventDefault();
        $.get(this.href,{},function(response){
            $('#response').html(response);
        });
    });
    console.log("binded.");
});
</script>