<?php
require_once 'header.php';
require_once 'sidebar.php'

?>




<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content">
   <?php
   if (isset($_GET['settingsUpdate'])) {
     //bagli id bilgilerini burda cek
     ?>
     <div class="box box-primary">
       <div class="content-header">
         <h1 >Ayar Düzenle</h1>
         <hr>
       </div>
       <div class="box-body">
         <?php
         if (isset($_POST['settings_update'])) {
          $sonuc=$db->update("settings",$_POST,[
           "form_name" => "settings_update",
           "columns" => "settings_id",
           "dir" => "settings",
           "file_name" => "settings_value",
           "file_delete" => "delete_file"]
         );
         if ($sonuc['status']) {
            header("Refresh: 3; url=settings.php"); ?>
           <div class="alert alert-success">
            kayıt basarili bir sekilde guncellenmistir yonlendırılıyorsunuz.
          </div>
        <?php } else {?>
         <div class="alert alert-danger">
          Kayıt Başarısız.<?php echo $sonuc['error'] ?>
        </div>
      <?php }
    }
    $sql=$db->wread("settings","settings_id",$_GET['settings_id']);
    $row=$sql->fetch(PDO::FETCH_ASSOC);
    ?>
       <form method="POST" enctype="multipart/form-data">
         <div class="form-group">
           <label>ayar aciklama</label>
           <div class="row">
             <div class="col-xs-12">
               <input type="text" name="settings_description" readonly required="" value="<?php echo $row['settings_description']; ?>" class="form-control">
             </div>
           </div>
         </div>
         <?php $i=$row['settings_type']; ?>
         <?php
         if ($i==file) {?>
           <div class="form-group">
             <label>resim sec</label>
             <div class="row">
               <div class="col-xs-12">
                 <input type="file" name="settings_value" required="" class="form-control">
               </div>
             </div>
           </div>
         <?php } ?>
         <div class="form-group">
           <?php
           if ($row['settings_type']=="file" && !empty($row['settings_value'])) {?>
             <label>İçerik</label>
           <?php }elseif (!empty($row['settings_value'])) {?>
             <label>İçerik</label>
           <?php  } elseif ($row['settings_type']=="file" && empty($row['settings_value'])) {?>
             <label>İçerik eklenmemiştir lütfen içerik ekleyiniz.</label>
           <?php }?>
           <div class="row">
             <div class="col-xs-12">
               <?php if ($row['settings_type']=="text") {?>
                 <input type="text" name="settings_value" value="<?php echo $row['settings_value']; ?>" required="" class="form-control">
               <?php }elseif ($row['settings_type']=="textarea") {?>
                 <textarea name="settings_value" class="form-control"><?php echo $row['settings_value']; ?></textarea>
               <?php }elseif ($row['settings_type']=="ckeditor") {?>
                 <textarea id="editor1" name="settings_value" class="form-control"><?php echo $row['settings_value']; ?></textarea>
               <?php }elseif ($row['settings_type']=="file") {?>
                 <a href="dimg/settings/<?php echo $row['settings_value']; ?>" target="_blank"><img width="65" src="dimg/settings/<?php echo $row['settings_value']; ?>" alt=""></a>
               <?php } ?>
             </div>
           </div>
         </div>
         <input type="hidden"  name="settings_id" value="<?php echo $row['settings_id']; ?>">
         <!--Guncelleme sırasında eskı resmı sılmek icin gonderılen post değerı-->
         <input type="hidden" name="delete_file" value="<?php echo $row['settings_value']; ?>">
         <!--Bitisi-->
         <div align="right" <?php if (!empty($row['settings_type'])): ?> style="margin-top:-15px;" <?php endif; ?> class="box-footer">
           <button type="submit" class="btn btn-success" name="settings_update">duzenle</button>
         </div>



       </form>
     </div>

   </div>
      <script>
        CKEDITOR.replace( 'editor1' );
      </script>

<?php }?>


<!-- Default box -->
<div class="box box-primary">

 <div class="content-header">
  <h1 >Ayarlar</h1>
  <!--
  <div style="margin-bottom:5px;" align="right">
    <a href="?settingsInsert=true"><button class="btn btn-success">Yeni Ekle</button></a>
  </div>-->
  <?php
  if (isset($_GET['settingsDelete'])) {
    $sonuc=$db->delete("settings","settings_id",$_GET['settings_id'],$_GET['file_delete']);
    if ($sonuc['status']) { ?>
      <div class="alert alert-success">
        silme basarili
     </div>
   <?php } else {?>

    <div class="alert alert-danger">
     silme Başarısız.<?php echo $sonuc['error'] ?>
   </div>
  <?php }
  }

 ?>
</div>
<!-- /.box-header -->
<div class="box-body">
  <table id="example1" class="table table-bordered table-striped">
    <thead>
      <tr>
        <th align="center" width="5">#</th>
        <th>Ad</th>
        <th>İçerik</th>
        <th>Key</th>
        <th></th>
      </tr>
    </thead>
    <tbody id="sortable">

      <?php
      // $sql=$db->qSql("SELECT * FROM settings order by settings_must ASC");
      $sql=$db->read("settings",[
        "columns_name" => "settings_must",
        "columns_sort" => "ASC"
      ]);
      $say=1;
      while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {  ?>

        <tr id="item-<?php echo $row['settings_id'] ?>">
          <td><?php echo $say++; ?></td>
          <td class="sortable"><?php echo $row['settings_description'] ?></td>
          <?php
          if ($row['settings_type']=='file') {?>
          <td><img src="dimg/settings/<?php echo $row['settings_value']; ?>" width="75" alt=""></td>
          <?php }else {?>
            <td class="sortable"><?php echo $row['settings_value'] ?></td>
          <?php } ?>
          <td><?php echo $row['settings_key'] ?></td>
          <td align="center" width="5"><a href="?settingsUpdate=true&settings_id=<?php echo $row['settings_id'] ?>"><i class="fa fa-pencil-square"></i></a></td>
        </tr>

      <?php } ?>

    </table>
  </div>
  <!-- /.box-body -->
</div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php require_once 'footer.php'; ?>

<script type="text/javascript">

  $(function() {
    $("#sortable").sortable({
      revert:true,
      handle:".sortable",
      stop:function(event,ui) {
        var data=$(this).sortable('serialize');
        console.log(data);
        $.ajax({
          type:"POST",
          dataType:"json",
          data:data,
          url:"netting/order-ajax.php?settings_must=true",
          success:function(msg) {
           //alert("Sıralama Başarılı...");
          }
        });
      }



    });
    $("#sortable").disableSelection();
  });

</script>
