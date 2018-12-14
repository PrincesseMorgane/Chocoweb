<?php
 require_once('controllers/Team.php');
 $team = new Team();
?>


<section id="team" data-stellar-background-ratio="0.5">
    <div class="container">
         <div class="row">

              <div class="col-md-12 col-sm-12">
                   <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
                        <h2>Meet our chefs</h2>
                        <h4>They are nice &amp; friendly</h4>
                   </div>
              </div>

              <?php foreach ($team->chefs as $chef) : ?>

              <div class="col-md-4 col-sm-4">
                   <div class="team-thumb wow fadeInUp" data-wow-delay="0.2s">
                        <img src="<?= $chef->src; ?>" class="img-responsive" alt="<?= $chef->name; ?>">
                             <div class="team-hover">
                                  <div class="team-item">
                                       <h4><?= $chef->description; ?></h4>
                                       <ul class="social-icon">
                                      
                                       <?php foreach ($chef->network as $network) : ?>
                                            <li><a href="<?= $network->url; ?>" class="fa fa-linkedin-square"></a></li>
                                          <?php endforeach; ?>
                                       </ul>
                                  </div>
                             </div>
                   </div>
                   <div class="team-info">
                        <h3><?= $chef->name; ?></h3>
                        <p><?= $chef->job; ?></p>
                   </div>
              </div>

                <?php endforeach; ?>

         </div>
    </div>
</section>