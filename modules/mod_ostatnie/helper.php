<?php
/*
* File: helper.php
*/

defined('_JEXEC') or die ('Brak dostępu');

class modOstatnieHelper
{
	function getSomething($params)
	{
	  $db =& JFactory::getDBO();
	  $r = null;
	  $ile = (int)$params->get('ilepozycji');
	  $kat = (int)$params->get('idkat');
	  
	  $query = "SELECT * FROM ksiazki_lista ORDER BY id DESC LIMIT ".$ile;
	  $db->setQuery($query);
	  $r = $db->loadObjectList();
	  return $r;
	}
}
?>