<?php
/**
 * @version		2012-03
 */

// no direct access
defined('_JEXEC') or die('Restricted access'); 

define('JPATH_BASE', dirname(__FILE__));
define( 'DS', DIRECTORY_SEPARATOR );
require_once ( '..'.DS.'components'.DS.'com_biblioteka'.DS.'config.php' );
require_once ( '..'.DS.'components'.DS.'com_biblioteka'.DS.'bibl.class.php');
?>
<div class="bibl_adm">
<?php
$db = & JFactory::getDBO();

$id=0;
if(isset($_GET['id'])) $id = (int)$_GET['id'];

$typ=1;
if(isset($_GET['typ'])) $typ = (int)$_GET['typ'];
$a=1;
if(isset($_GET['a'])) $a = (int)$_GET['a'];


$b = new biblioteka($typ,$db,$dane);

  $wynik_txt .= '<ul class="menu_bibl_adm">';
  $wynik_txt .= '<li><a href="?option=com_biblioteka&amp;a=2&amp;typ=1">Dodaj Książke</a></li>';
  $wynik_txt .= '<li><a href="?option=com_biblioteka&amp;a=2&amp;typ=2">Dodaj Starodruki</a></li>';
  $wynik_txt .= '<li><a href="?option=com_biblioteka&amp;a=3&amp;typ=1">Wyświetl listę Książek</a></li>';
  $wynik_txt .= '<li><a href="?option=com_biblioteka&amp;a=3&amp;typ=2">Wyświetl listę Starodruków</a></li>';
  $wynik_txt .= '</ul>';
if($a==1){

  

}
else if($a==2){

  if(isset($_POST)&&count($_POST)){
	//print_r($_POST);
	$b->uzupelnijWart($_POST,$b->dt_nazwa);
	//echo $b->dt_nazwa; die();
	if($b->Waliduj($_POST)){
		if($id>0){
			
			$b->dane[$b->dt_nazwa]['id']['properties']['value'] = $id;
			$b->dane[$b->dt_nazwa]['id']['type']="pk";
			$b->updateDB($b->dane, $b->pgsql_link);
			$wynik_txt .="<h4>Pomyślnie zaktualizowano rekord.</h4>";
		}
		else{
			$b->insertDB($b->dane);
			unset($b->dane);
			
			$wynik_txt .="<h4>Pomyślnie dodano rekord.</h4>";
		}

	}
	else{
		$wynik_txt .="<h4>Popraw błędy!</h4>";
		$wynik_txt .=$b->wyswietlFormularz($id);
	}
}
else
  $wynik_txt .= $b->wyswietlFormularz($id);
} else if($a==3){

  $b->inicjujFiltr();
  $b->pobierzWyniki();
  echo $b->wyswietlListeAdm();
  echo $b->wyswietlStronicowanie();

}
/*$b->inicjujFiltr();
$b->pobierzWyniki();
echo $b->wyswietlStronicowanie();
echo $b->wyswietlGoreListy();
echo $b->wyswietlListe();
echo $b->wyswietlStronicowanie();*/


echo $wynik_txt;
?>
</div>