<?php
/*
* File: helper.php
*/

defined('_JEXEC') or die ('Brak dostępu');

class modHelper
{
	function getSomething($params)
	{
	  $option = array(); //prevent problems

	  $option['driver']   = 'mysqli';
	  $option['host']     = 'sql.bazylianie.nazwa.pl';
	  $option['user']     = 'bazylianie';
	  $option['password'] = '?BaZylianie2010!!';
	  $option['database'] = 'bazylianie';
	  $option['prefix']   = 'j25_';

$option['host']     = 'localhost';
$option['user']     = 'root';
$option['password'] = '';
$option['database'] = 'bazylianie';
$option['prefix']   = 'j25_';

	  $db = JDatabase::getInstance( $option );

	  $query = "SELECT title,id FROM #__content order by id desc limit 10";
	  $db->setQuery($query);
	  $r = $db->loadObjectList();
	  return $r;
	}
}
?>