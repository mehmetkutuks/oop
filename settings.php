<?php
require_once 'nedmin/netting/class.crud.php';

$db=new crud();
$sql=$db->read("settings");
// fetchAll komutu settings tablosundaki tüm satırları çekecektir.
$row=$sql->fetchAll(PDO::FETCH_ASSOC);

foreach ($row as $key) {

  $settings[$key['settings_key']]=$key['settings_value'];
}
  ?>
