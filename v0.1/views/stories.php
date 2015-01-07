    <!-- Portfolio Grid Section -->
    <section id="portfolio" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Kolekcja przygód</h2>
                    <h3 class="section-subheading text-muted">Tutaj drogi czytelniku znajdziesz pomysły i porady podrożnicze, które zgromadziliśmy i pieczołowicie przechowaliśmy dla Ciebie w trakcie naszych podróży.</h3>
                </div>
            </div>

<?php
require_once("./trello/init.php");
$i=0;
foreach($entList->entities as $entity) {
    $i++;
    if($i%3==1) echo '<div class="row">';
    ?>
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <div class="portfolio-caption">
                        <h4><?php echo $entity->name; ?></h4>
                    </div>
                    <a href="#<?php echo $entity->id ?>" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <?php echo '<img class="img-responsive" src="'.$entity->picture.'">'; ?>
                    </a>

                </div>
    <?php
    if($i%3==0) echo '</div>';
    
}
if($i%3!=0) echo '</div>';
echo "</div>";
?>
        </div>
    </section>
<?php
require_once("./trello/init.php");
echo "<div class=\"row\">";
foreach($entList->entities as $entity) {
    ?>
    <div class="portfolio-modal modal fade" id="<?php echo $entity->id ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <!-- Project Details Go Here -->
                            <h2><?php echo $entity->name; ?></h2>
                            <p class="item-intro text-muted"><?php echo $entity->title; ?></p>
                            <!--<img class="img-responsive" src="<?php echo $entity->picture; ?>" alt="">-->
                            
                            <?php
                                foreach($entity->pictures as $picture)
                                    echo "<img class=\"img-responsive\" src=\"".$picture->url."\">";
                            ?>  
                            
                            <p><?php echo $entity->information ?></p>
                            <p><?php echo $entity->function ?></p>
                            <ul class="list-inline">
                                <li><?php echo $entity->date; ?></li>
                            </ul>
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Zamknij <i class="fa fa-times"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}
echo "</div>";
?>    
    
    


