<?php
/** ADMIN
 * @version		2012-03
 */
// no direct access
defined('_JEXEC') or die('Restricted access');

define('JPATH_BASE', dirname(__FILE__));
define('DS', DIRECTORY_SEPARATOR);
require_once ( '..' . DS . 'components' . DS . 'com_biblioteka' . DS . 'config.php' );
require_once ( '..' . DS . 'components' . DS . 'com_biblioteka' . DS . 'bibl.class.php');



$document = JFactory::getDocument();
$document->addStyleSheet('..' . DS . 'administrator' . DS . 'components' . DS . 'com_biblioteka' . DS . 'bootstrap_pom.css');
JToolbarHelper::title('Biblioteka', 'myclass');
?>
<div class="bibl_adm">
    <?php
    $db = & JFactory::getDBO();

    $id = 0;
    if (isset($_GET['id']))
        $id = (int) $_GET['id'];

    $typ = 1;
    if (isset($_GET['typ']))
        $typ = (int) $_GET['typ'];
    $a = 1;
    if (isset($_GET['a']))
        $a = (int) $_GET['a'];


    $b = new biblioteka($typ, $db, $dane);

    $wynik_txt .= '<ul class="list-inline list-unstyled">';
    $wynik_txt .= '<li><a class="btn btn-primary" href="?option=com_biblioteka&amp;a=2&amp;typ=1">Dodaj Książke</a></li>';
    $wynik_txt .= '<li><a class="btn btn-primary" href="?option=com_biblioteka&amp;a=2&amp;typ=2">Dodaj Starodruki</a></li>';
    $wynik_txt .= '<li><a class="btn btn-primary" href="?option=com_biblioteka&amp;a=3&amp;typ=1">Wyświetl listę Książek</a></li>';
    $wynik_txt .= '<li><a class="btn btn-primary" href="?option=com_biblioteka&amp;a=3&amp;typ=2">Wyświetl listę Starodruków</a></li>';
    $wynik_txt .= '</ul>';
    if ($a == 1) {
        
    } else if ($a == 2) {

        if (isset($_POST) && count($_POST)) {
            //print_r($_POST);
            $b->uzupelnijWart($_POST, $b->dt_nazwa);
            //echo $b->dt_nazwa; die();
            if ($b->Waliduj($_POST)) {
                if ($id > 0) {

                    $b->dane[$b->dt_nazwa]['id']['properties']['value'] = $id;
                    $b->dane[$b->dt_nazwa]['id']['type'] = "pk";
                    $b->updateDB($b->dane, $b->pgsql_link);
                    $wynik_txt .="<h4>Pomyślnie zaktualizowano rekord.</h4>";
                } else {
                    $b->insertDB($b->dane);
                    unset($b->dane);

                    $wynik_txt .="<h4>Pomyślnie dodano rekord.</h4>";
                }
            } else {
                $wynik_txt .="<h4>Popraw błędy!</h4>";
                $wynik_txt .=$b->wyswietlFormularz($id);
            }
        } else
            $wynik_txt .= $b->wyswietlFormularz($id);
    } else if ($a == 3) {

        $b->inicjujFiltr();
        $b->pobierzWyniki();
        $wynik_txt.= $b->wyswietlStronicowanie();
        $wynik_txt.= $b->wyswietlListeAdm();
        $wynik_txt.= $b->wyswietlStronicowanie();
    } else if ($a == 4) { //dodawanie plików
        if (count($_FILES) > 0) {

            // print_r($_FILES['pliki']['name']);
            $wynik_txt .= "<ul>Lista przesłanych plików:";

            //1: Array ( [pliki] => Array ( [name] => DSC00881.jpg [type] => image/jpeg 
            //[tmp_name] => /tmp/phpoAId3J 
            //[error] => 0 
            //[size] => 1131575 ) )
// 4:            Array ( [pliki] => Array ( 
// [name] => Array ( [0] => DSC00883.jpg [1] => DSC00881.jpg [2] => DSC00872.jpg [3] => DSC00864.jpg ) [type] => Array ( [0] => image/jpeg [1] => image/jpeg [2] => image/jpeg [3] => image/jpeg ) [tmp_name] => Array ( [0] => /tmp/phpLxG2O8 [1] => /tmp/phpLMTN8d [2] => /tmp/phpqRrJtj [3] => /tmp/phpRmlaQo ) [error] => Array ( [0] => 0 [1] => 0 [2] => 0 [3] => 0 ) [size] => Array ( [0] => 698741 [1] => 1131575 [2] => 1409358 [3] => 1430821 ) ) )
            foreach ($_FILES['pliki']['name'] as $k => $v) {
                $target_dir = "uploads/";
                $target_file = $target_dir . uniqid() . '_' . basename($_FILES["pliki"]["name"][$k]);


                $size = $_FILES['pliki']["size"][$k];
                if (move_uploaded_file($_FILES["pliki"]["tmp_name"][$k], $target_file)) {
                    $wynik_txt .= "<li>" . basename($_FILES["pliki"]["name"][$k]) . "</li>";
                }
            }
            $wynik_txt .= "</ul>";
//http://www.w3schools.com/php/php_file_upload.asp
//if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
//        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
//    } else {
//        echo "Sorry, there was an error uploading your file.";
//    }
            // $b->updateDB($b->dane, $b->pgsql_link);
        } else {
            $wynik_txt .= $b->wyswietlFormularzPlikow($id);
        }


        /*
          Array
          (
          [pliki] => Array
          (
          [name] => Array
          (
          [0] => 6631468241_2.jpg
          [1] => 6631468241_1.jpg
          )

          [type] => Array
          (
          [0] => image/jpeg
          [1] => image/jpeg
          )

          [tmp_name] => Array
          (
          [0] => /tmp/phpuZoWBS
          [1] => /tmp/php5BZMdv
          )

          [error] => Array
          (
          [0] => 0
          [1] => 0
          )

          [size] => Array
          (
          [0] => 40076
          [1] => 40561
          )

          )

          ) */
    }


    /* $b->inicjujFiltr();
      $b->pobierzWyniki();
      echo $b->wyswietlStronicowanie();
      echo $b->wyswietlGoreListy();
      echo $b->wyswietlListe();
      echo $b->wyswietlStronicowanie(); */


    echo $wynik_txt;
    ?>
</div>