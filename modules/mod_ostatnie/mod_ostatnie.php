<?php
/*
* File: mod_ostatnie.php
*/

defined('_JEXEC') or die ('Brak dostępu');

require_once( dirname(__FILE__).DS.'helper.php');

$res = modOstatnieHelper::getSomething($params);

require_once( JModuleHelper::getLayoutPath('mod_ostatnie'));

?>