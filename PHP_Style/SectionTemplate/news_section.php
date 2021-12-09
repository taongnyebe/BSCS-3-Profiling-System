<section class="container-fluid news mb-5 pb-3 pt-2">
      <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                  <?php 
                        $count = 3;
                        for ($i=0; $i < $count; $i++) { 
                              echo '<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="'.$i.'" '.(($i == 1)? 'class="active" aria-current="true"': '').'aria-label="Slide '.$i.'"></button>';
                        }
                  ?>
            </div>
            <div class="carousel-inner">
                  <?php 
                        for ($i=0; $i < $count; $i++) { 
                              $image = '';
                              $alternative_name = '';
                              $caption_title = '';
                              $caption_description = '';

                              include './MinorTemplate/_news_card.php';
                        }
                  ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
            </button>
</section>