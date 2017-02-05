<?php
/*
* File: mod_minigaleria.php
*/

defined('_JEXEC') or die ('Brak dostępu');

require_once('helper.php');

$res = modHelper::getSomething($params);

require_once( JModuleHelper::getLayoutPath('mod_bazylianie'));

?>