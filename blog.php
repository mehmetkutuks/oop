  <?php require_once 'header.php'; ?>
  <!-- Page Content -->
  <div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h3 class="mt-4 mb-3">Haberler
    </h3>

    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.php">Anasayfa</a>
      </li>
      <li class="breadcrumb-item active">Blog</li>
    </ol>

    <div class="row">

      <!-- Blog Entries Column -->
      <div class="col-md-8">

        <!-- Blog Post -->
        <?php
        // $sql=$db->qSql("SELECT * FROM blogs order by blogs_must ASC");
        $sql=$db->read("blogs",[
          "columns_name" => "blogs_must",
          "columns_sort" => "ASC"
        ]);
        $say=1;
        while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {  ?>
        <div class="card mb-4">
            <img class="card-img-top" src="nedmin/dimg/blogs/<?php echo $row['blogs_file']; ?>" alt="Card image cap">
          <div class="card-body">
            <h4 class="card-title" style="margin-bottom:-20px;"><font size="5"><?php echo $row['blogs_title']; ?></font></h4>
            <p class="card-text"><font size="3"> <?php echo strstr($row['blogs_content'], '.', true); ?></font></p>
            <a href="haber/<?php echo $row['blogs_slug']; ?>" class="btn btn-primary">Devamını Oku &rarr;</a>
          </div>
          <div class="card-footer text-muted">
            <?php
            $deger = $row['blogs_time'];
            $tarihyapisi = strtotime($deger);
            // H:i:s de olurdu, saniyeye gerek yok diyerek kaldırdım
            echo $tarih = date('d.m.Y H:i', $tarihyapisi);
            ?>
            &nbsp;&nbsp;<a href="#">Yazar İsmi Gelecek ve Yazar Sayfasına gidecek</a>
          </div>
        </div>
      <?php } ?>

        <!-- Pagination
        <ul class="pagination justify-content-center mb-4">
          <li class="page-item">
            <a class="page-link" href="#">&larr; Older</a>
          </li>
          <li class="page-item disabled">
            <a class="page-link" href="#">Newer &rarr;</a>
          </li>
        </ul>-->

      </div>

      <!-- Sidebar Widgets Column -->
      <div class="col-md-4">

        <!-- Search Widget -->
        <div class="card mb-4">
          <h5 class="card-header">Search</h5>
          <div class="card-body">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-secondary" type="button">Go!</button>
              </span>
            </div>
          </div>
        </div>

        <!-- Categories Widget -->
        <div class="card my-4">
          <h5 class="card-header">Categories</h5>
          <div class="card-body">
            <div class="row">
              <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                  <li>
                    <a href="#">Web Design</a>
                  </li>
                  <li>
                    <a href="#">HTML</a>
                  </li>
                  <li>
                    <a href="#">Freebies</a>
                  </li>
                </ul>
              </div>
              <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                  <li>
                    <a href="#">JavaScript</a>
                  </li>
                  <li>
                    <a href="#">CSS</a>
                  </li>
                  <li>
                    <a href="#">Tutorials</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <!-- Side Widget -->
        <div class="card my-4">
          <h5 class="card-header">Side Widget</h5>
          <div class="card-body">
            You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
          </div>
        </div>

      </div>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <?php require_once 'footer.php'; ?>
