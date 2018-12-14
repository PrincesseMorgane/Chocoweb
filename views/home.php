<?php 
     require('./controllers/Home.php');
     $home = new Home;
   
?>

<!-- HOME -->
     <section id="home" class="slider" data-stellar-background-ratio="0.5">
          <div class="row">

                    <div class="owl-carousel owl-theme">

                    <?php foreach ($home->slides as $slide):
                    ?>


                         <div class="item item-first">
                         	<figure class="item_bg">
                         		<img src="<?= $slide->src; ?>" alt="<?= $slide->alt; ?>" class="item_img">
                         	</figure>
                              <div class="caption">
                                   <div class="container">
                                        <div class="col-md-8 col-sm-12">
                                             <?php if(isset($slide->pre)) : ?>
                                             <h3><?= $slide->pre; ?></h3>
                                             <?php endif; ?>
                                             <h1><?= $slide->title; ?></h1>
                                             <a href="<?= $slide->href; ?>" class="section-btn btn btn-default smoothScroll"><?= $slide->button; ?></a>
                                        </div>
                                   </div>
                              </div>
                         </div>
                         <?php endforeach; ?>

                    </div>

          </div>
     </section>

