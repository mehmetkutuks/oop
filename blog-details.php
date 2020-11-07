<?php
require_once 'header.php';
$sql=$db->wread("blogs","blogs_slug",$_GET['blogs_slug']);
$row=$sql->fetch(PDO::FETCH_ASSOC);
?>
<div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h4 class="mt-4 mb-3"><?php echo $row['blogs_title']; ?>
      <small style="text-size:10pt;">by
        <a href="#"><?php echo $row['blogs_author']; ?></a>
      </small>
    </h4>

    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.php">Anasayfa</a>
      </li>
      <li class="breadcrumb-item active">
        <?php echo $row['blogs_title']; ?>
      </li>
    </ol>

    <div class="row">

      <!-- Post Content Column -->
      <div class="col-lg-8">

        <!-- Preview Image -->
        <img class="img-fluid rounded" src="nedmin/dimg/blogs/<?php echo $row['blogs_file']; ?>" alt="">

        <hr>

        <!-- Date/Time -->
        <p>
          <?php
          $deger = $row['blogs_time'];
          $tarihyapisi = strtotime($deger);
          // H:i:s de olurdu, saniyeye gerek yok diyerek kaldırdım
          echo $tarih = date('d.m.Y H:i', $tarihyapisi);
          ?>
        </p>
        <div align="justify">
          <p><?php echo $row['blogs_content']; ?></p>
        </div>
        <hr>
        <!-- Comments Form -->
        <div class="card my-4">
          <h5 class="card-header">Yorum Yapınız:</h5>
          <div class="card-body">
            <form>
              <div class="form-group">
                <textarea class="form-control" rows="3"></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Gönder</button>
            </form>
          </div>
        </div>

        <!-- Single Comment -->
        <!-- <div class="media mb-4">
          <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
          <div class="media-body">
            <h5 class="mt-0">Commenter Name</h5>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
          </div>
        </div> -->

        <!-- Comment with nested comments -->
        <!-- <div class="media mb-4">
          <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
          <div class="media-body">
            <h5 class="mt-0">Commenter Name</h5>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

            <div class="media mt-4">
              <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
              <div class="media-body">
                <h5 class="mt-0">Commenter Name</h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
              </div>
            </div>

            <div class="media mt-4">
              <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
              <div class="media-body">
                <h5 class="mt-0">Commenter Name</h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
              </div>
            </div>

          </div>
        </div> -->

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

        <!-- tags -->
        <div class="card my-4">
          <h5 class="card-header">Etiketler</h5>
          <div class="card-body">
            <div class="col">
                <ul style="margin-left:-15px;" class="list-unstyled mb-0">
                  <?php
                  $sql=$db->wread("blogs","blogs_slug",$_GET['blogs_slug']);
                  $row=$sql->fetch(PDO::FETCH_ASSOC);
                  $explode = explode(",", $row['blogs_tags']);
                   ?>
                  <li>
                    <?php
                    foreach ($explode as $exp):?>
                        <i style="font-size:15pt;"><a href="etiket?kelime=<?= $exp; ?>"><?php echo "#".$exp; ?></a></i>
                    <?php endforeach; ?>

                  </li>

                </ul>
            </div>
          </div>
        </div>

      </div>

    </div>
    <!-- /.row -->

  </div>
<?php require_once 'footer.php'; ?>
