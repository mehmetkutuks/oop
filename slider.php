<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner" role="listbox">
    <!-- Slide One - Set the background image for this slide in the line below -->
    <?php
    // $sql=$db->qSql("SELECT * FROM sliders order by sliders_must ASC");
    $sql=$db->read("sliders",[
      "columns_name" => "sliders_must",
      "columns_sort" => "ASC"
    ]);
    $say=0;
    while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {$say++;?>
    <div class="carousel-item <?php echo $say==1 ? 'active' : '' ?>" style="background-image: url('nedmin/dimg/sliders/<?php echo $row['sliders_file']; ?>')">
      <div class="carousel-caption d-none d-md-block">
        <h3><?php echo $row['sliders_title']; ?></h3>
        <p>This is a description for the first slide.</p>
      </div>
    </div>
  <?php } ?>
  </div>
  <ol class="carousel-indicators">
    <?php for ($i=0; $i < $say ; $i++) {?>
      <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i; ?>" class="<?php echo $i==0 ? 'active' : '' ?>"></li>
    <?php } ?>
  </ol>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
