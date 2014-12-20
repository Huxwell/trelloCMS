
    <!-- About Section -->
    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">About</h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <ul class="timeline">
        <?php      
        
        $i=0;
        foreach($places->entities as $entity) {
        $i++;
        ?>
                        <li <?php if ($i%2 == 0) echo 'class="timeline-inverted"' ?>>
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" src="<?php echo $entity->thumbnail; ?>" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4><?php echo $entity->name; ?></h4>
                                    <h4 class="subheading"><?php echo $entity->title; ?></h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted"><?php echo $entity->information; ?></p>
                                </div>
                            </div>
                        </li>
        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>

