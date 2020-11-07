<?php
require_once 'header.php';
require_once 'sidebar.php';

?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->



  <section class="content">


   <?php

   if (isset($_GET['blogsInsert'])) {?>
    <div class="box box-primary">



      <div class="content-header">
        <h1 >Blog Ekle</h1>
        <hr>
      </div>

      <div class="box-body">

        <?php
        if (isset($_POST['blogs_insert'])) {

         $sonuc=$db->insert("blogs",$_POST,[
          "form_name" => "blogs_insert",
          "dir" => "blogs",
          "slug" => "blogs_slug",
          "title" => "blogs_title",
          "file_name" => "blogs_file"]
        );

        if ($sonuc['status']) {
          header("Refresh: 3; url=blogs.php");?>
          <div class="alert alert-success">
           kayıt basarili bir sekilde eklenmistir yonlendırılıyorsunuz.
         </div>
       <?php } else {?>

        <div class="alert alert-danger">
         Kayıt Başarısız.<?php echo $sonuc['error'] ?>
       </div>
     <?php }
   }
   ?>


      <!--  <div class="alert alert-success">
        Kayıt Başarılı
      </div> -->


      <form method="POST" enctype="multipart/form-data">

        <div class="form-group">
          <label>Resim Seç</label>
          <div class="row">
            <div class="col-xs-12">
              <input type="file" name="blogs_file" required="" class="form-control">
            </div>
          </div>
        </div>

        <div class="form-group">
          <label>Blog Başlık</label>
          <div class="row">
            <div class="col-xs-12">
              <input type="text" name="blogs_title" required="" class="form-control">
            </div>
          </div>
        </div>

        <div class="form-group">
          <label>blogs slug</label>
          <div class="row">
            <div class="col-xs-12">
              <input type="text" name="blogs_slug" class="form-control">
              <small>ornek blog slug yapısı: blog-01</small>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label>Blog İçerik</label>
          <div class="row">
            <div class="col-xs-12">
              <textarea id="editor1" name="blogs_content" class="form-control"></textarea>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label>Blog Etiket</label>
          <div class="row">
            <div class="col-xs-12">
              <textarea name="blogs_tags" rows="2" cols="20" class="form-control"></textarea>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label>Blog Yazar</label>
          <div class="row">
            <div class="col-xs-12">
              <select readonly class="form-control" name="blogs_author">
                <option value="<?php echo $_SESSION['admins']['admins_namesurname']; ?>"><?php echo $_SESSION['admins']['admins_namesurname']; ?></option>
              </select>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label>Blog Durum</label>
          <div class="row">
            <div class="col-xs-12">
              <select class="form-control" name="blogs_status">
                <option value="1">Aktif</option>
                <option value="0">Pasif</option>
              </select>
            </div>
          </div>
        </div>

        <div align="right" class="box-footer">
          <button type="submit" class="btn btn-success" name="blogs_insert">Ekle</button>
        </div>
      </form>
    </div>

  </div>
  <script>
    CKEDITOR.replace( 'editor1' );
  </script>
<?php }
   if (isset($_GET['blogsUpdate'])) {
     //bagli id bilgilerini burda cek
     ?>
     <div class="box box-primary">



       <div class="content-header">
         <h1 >Blog Düzenle</h1>
         <hr>
       </div>

       <div class="box-body">

         <?php
         if (isset($_POST['blogs_update'])) {

          $sonuc=$db->update("blogs",$_POST,[
           "form_name" => "blogs_update",
           "columns" => "blogs_id",
           "dir" => "blogs",
           "slug" => "blogs_slug",
           "title" => "blogs_title",
           "file_name" => "blogs_file",
           "file_delete" => "delete_file"]
         );

         if ($sonuc['status']) {
            header("Refresh: 3; url=blogs.php"); ?>
           <div class="alert alert-success">
            kayıt basarili bir sekilde guncellenmistir yonlendırılıyorsunuz.
          </div>
        <?php } else {?>

         <div class="alert alert-danger">
          Kayıt Başarısız.<?php echo $sonuc['error'] ?>
        </div>
      <?php }
    }
    $sql=$db->wread("blogs","blogs_id",$_GET['blogs_id']);
    $row=$sql->fetch(PDO::FETCH_ASSOC);
    ?>


       <form method="POST" enctype="multipart/form-data">

         <div class="form-group">
           <label>yuklu resim</label>
           <div class="row">
             <div class="col-xs-12">
               <img width="75" src="dimg/blogs/<?php echo $row['blogs_file']; ?>" alt="">
             </div>
           </div>
         </div>

         <div class="form-group">
           <label>resim sec</label>
           <div class="row">
             <div class="col-xs-12">
               <input type="file" name="blogs_file" class="form-control">
             </div>
           </div>
         </div>

         <div class="form-group">
           <label>blogs Title</label>
           <div class="row">
             <div class="col-xs-12">
               <input type="text" name="blogs_title" required="" value="<?php echo $row['blogs_title']; ?>" class="form-control">
             </div>
           </div>
         </div>

         <div class="form-group">
           <label>blogs slug</label>
           <div class="row">
             <div class="col-xs-12">
               <input type="text" name="blogs_slug" value="<?php echo $row['blogs_slug']; ?>" class="form-control">
               <small>ornek blog slug yapısı: blog-01</small>
             </div>
           </div>
         </div>

         <div class="form-group">
           <label>blogs content</label>
           <div class="row">
             <div class="col-xs-12">
               <textarea id="editor1" name="blogs_content" class="form-control"><?php echo $row['blogs_content']; ?></textarea>
             </div>
           </div>
         </div>

         <div class="form-group">
           <label>Blog Etiket</label>
           <div class="row">
             <div class="col-xs-12">
               <textarea name="blogs_tags" rows="2" cols="20" class="form-control"><?php echo $row['blogs_tags']; ?></textarea>
             </div>
           </div>
         </div>

         <div class="form-group">
           <label>Blog Yazar</label>
           <div class="row">
             <div class="col-xs-12">
               <select readonly class="form-control" name="blogs_author" value="<?php echo $row['blogs_author']; ?>">
                 <option <?php if ($row['blogs_author']===$_SESSION['admins']['admins_namesurname']) {?> selected <?php } ?> value="<?php echo $_SESSION['admins']['admins_namesurname']; ?>"><?php echo $_SESSION['admins']['admins_namesurname']; ?></option>
               </select>
             </div>
           </div>
         </div>

         <div class="form-group">
           <label>Blog durum</label>
           <div class="row">
             <div class="col-xs-12">
               <select class="form-control" name="blogs_status" value="<?php echo $row['blogs_status']; ?>">
                 <option <?php if ($row['blogs_status']==1) {?>
                   selected
                 <?php } ?> value="1">Aktif</option>
                 <option <?php if ($row['blogs_status']==0) {?>
                   selected
                 <?php } ?> value="0">Pasif</option>
               </select>
             </div>
           </div>
         </div>

        <input type="hidden" name="blogs_id" value="<?php echo $row['blogs_id']; ?>">
        <input type="hidden" name="delete_file" value="<?php echo $row['blogs_file']; ?>">

         <div align="right" class="box-footer">
           <button type="submit" class="btn btn-success" name="blogs_update">duzenle</button>
         </div>



       </form>
     </div>
     <script>
       CKEDITOR.replace( 'editor1' );
     </script>
   </div>


<?php }?>


<!-- Default box -->
<div class="box box-primary">

 <div class="content-header">
  <h1 >Blog</h1>
  <div style="margin-bottom:5px;" align="right">
    <a href="?blogsInsert=true"><button class="btn btn-success">Yeni Ekle</button></a>
  </div>
  <?php
  if (isset($_GET['blogsDelete'])) {
    $sonuc=$db->delete("blogs","blogs_id",$_GET['blogs_id'],$_GET['file_delete']);
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
        <th>Blog Title</th>
        <th>Blog Yazar</th>
        <th>Blog Durum</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody id="sortable">

      <?php
      // $sql=$db->qSql("SELECT * FROM blogs order by blogs_must ASC");
      $sql=$db->read("blogs",[
        "columns_name" => "blogs_must",
        "columns_sort" => "ASC"
      ]);
      $say=1;
      while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {  ?>

        <tr id="item-<?php echo $row['blogs_id'] ?>">
          <td><?php echo $say++; ?></td>
          <td class="sortable"><?php echo $row['blogs_title'] ?></td>
          <td><?php echo $row['blogs_author'] ?></td>
          <td><?php
          if ($row['blogs_status']==0) {
            echo "Pasif";
          } else if ($row['blogs_status']==1) {
            echo "Aktif";
          }
          ?></td>
          <td align="center" width="5"><a href="?blogsUpdate=true&blogs_id=<?php echo $row['blogs_id'] ?>"><i class="fa fa-pencil-square"></i></a></td>
          <td align="center" width="5"><a href="?blogsDelete=True&blogs_id=<?php echo $row['blogs_id'] ?>&file_delete=<?php echo $row['blogs_file'] ?>"><i class="fa fa-trash-o"></i></a></td>
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
          url:"netting/order-ajax.php?blogs_must=true",
          success:function(msg) {
           //alert("Sıralama Başarılı...");
          }
        });
      }



    });
    $("#sortable").disableSelection();
  });

</script>
