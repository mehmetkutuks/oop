   <?php
    require_once 'header.php';
    require_once 'sidebar.php';
   ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Gösterge Paneli</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          Muhteşem sayfanızı sol taraftaki menü aracılığı ile yönetmeye başlayın!
          <?php
          echo "<pre>";
          print_r($_SESSION['admins']);
          echo "</pre>";
           ?>
        </div>
        <!-- /.box-body -->
        <!-- <div class="box-footer">
          alt
        </div> -->
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
  </div>
  <!-- /.content-wrapper -->
<?php require_once 'footer.php'; ?>
