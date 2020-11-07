<?php
require_once 'header.php';
require_once 'slider.php';
?>
  <!-- Page Content -->
  <div class="container">

    <h2 class="mt-4">Haberler</h2>

    <div class="row mt-4">
      <?php
      // $sql=$db->qSql("SELECT * FROM blogs order by blogs_must ASC");
      $sql=$db->read("blogs",[
        "columns_name" => "blogs_must",
        "columns_sort" => "DESC",
        "limit" => "6"
      ]);
      $say=1;
      while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {  ?>
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100">
          <a href="haber/<?php echo $db->seo($row['blogs_title']); ?>/<?php echo $row['blogs_id']; ?>"><img class="card-img-top" src="nedmin/dimg/blogs/<?php echo $row['blogs_file']; ?>" alt=""></a>
          <div class="card-body">
            <h5 class="card-title">
              <a href="haber/<?php echo $db->seo($row['blogs_title']); ?>/<?php echo $row['blogs_id']; ?>"><?php echo $row['blogs_title']; ?></a>
            </h5>
            <p class="card-text"><font size="3"> <?php echo strstr($row['blogs_content'], '.', true); ?></font></p>
          </div>
        </div>
      </div>
    <?php } ?>
    </div>
    <!-- /.row -->

    <!-- Features Section -->
    <div class="row">
      <div class="col-lg-6">
        <?php echo $settings['home_01_content']; ?>
      </div>
      <div class="col-lg-6">
        <img class="img-fluid rounded" src="nedmin/dimg/settings/<?php echo $settings['home_01_file']; ?>" alt="">
      </div>
    </div>
    <!-- /.row -->

    <hr>

    <!-- Call to Action Section -->
    <div class="row mb-4">
      <div class="col-md-8">
        <p><?php echo $settings['slogan']; ?></p>
      </div>
      <div class="col-md-4">
        <a class="btn btn-lg btn-secondary btn-block" href="<?php echo $settings['slogan_url']; ?>">Medya Ajans Yazılım Geliştirme</a>
      </div>
    </div>

  </div>
  <!-- /.container -->
  <?php require_once 'footer.php'; ?>
