<?php
/*
* Plik: tmpl/default.php
*/
defined('_JEXEC') or die ('brak dostępu');

foreach ($res as $k => $v){ ?>
  <?php echo $v->title; ?><br />
<?php } ?>