<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="dimg/admins/<?php echo $_SESSION['admins']['admins_file']; ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $_SESSION['admins']['admins_namesurname']; ?></p>
        <a href="#">Yönetici</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">Menüler</li>

      <li><a href="index.php"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>

      <li class="treeview">
        <a href="#"><i class="fa fa-user"></i> <span>Kullanıcı İşlemleri</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="admins.php"><i class="fa fa-user-secret"></i> Yöneticiler</a></li>
          <li><a href="users.php"><i class="fa fa-user"></i> Kullanıcılar</a></li>
        </ul>
      </li>

      <li class="treeview">
        <a href="#"><i class="fa fa-key"></i> <span>Yönetim</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="settings.php"><i class="fa fa-cogs"></i> Ayarlar</a></li>
        </ul>
      </li>

      <li><a href="sliders.php"><i class="fa fa-image"></i> <span>Slider</span></a></li>
      <li><a href="blogs.php"><i class="fa fa-newspaper-o"></i> <span>Blog</span></a></li>
    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>
