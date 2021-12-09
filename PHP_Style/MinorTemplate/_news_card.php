<div class="carousel-item <?php echo ($i==1)? "active" : "";?>">
      <img src="./assets/news/news1.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block bg-dark">
            <h5><?php echo empty($caption_title)? $caption_title: $i." Caption title"?></h5>
            <p><?php echo empty($caption_description)? $caption_description: $i." Caption description"?></p>
      </div>
</div>

<!-- $i = index, $caption_title = caption title, $caption_description = caption description, $image = image directopry, $alternative_name = alternative name-->