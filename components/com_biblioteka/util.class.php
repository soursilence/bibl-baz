<?php

//require_once 'config.php';
class util {

    public $dane;
    public $liczba_rekordow;
    public $results_array;
    public $na_stronie = 32;
    public $p = 1;
    public $this_url;
    public $filtrowanie;
    public $sortowanie;
    public $filtr;
    public $sort;
    public $db;
    public $kolumny;
    public $dt_nazwa;
    public $mt;
    public $typ;
    public $baseUrl;

    function __construct() {
        //$this->dane = include_once 'http://localhost/bb/components/com_biblioteka/config.php';
        //$this->dt_nazwa = $dt_nazwa;

        /* if(isset($_GET['p'])&&$_GET['p']!=null)
          $this->p = (int)$_GET['p'];
          $this->sort = $_GET['sort'];
          $this->filtr = $_GET['filtr'];
          $this->this_url = substr($_SERVER['REQUEST_URI'],strrpos($_SERVER['REQUEST_URI'],'/')+1);

          //$this->db = & JFactory::getDBO();
          $this->kolumny =  $this->dane['lista'][$this->dt_nazwa];
          print_r($this->dane);
          print_r($this->kolumny); */
    }

    public function conf2cols() {
        $this->kolumny = $this->dane['lista'][$this->d_nazwa];
    }

    public function inicjujFiltr() {
        if ($this->sort != null) {
            $prze = "";
            foreach ($this->sort as $k => $v) {
                $this->sortowanie .= $prze . " $k $v ";
                $prze = ",";
            }
        }
        $filtr_bck = array();
        $filtr_bck = $this->filtr;
        print_r($this->filtr);
        if ($this->filtr != null) {
            $prze = " AND ";
            foreach ($this->filtr as $k => $v) {
                if (count($this->dane[$this->mt][strtolower($k)]) > 0 && trim($v) != null) {
                    $this->filtrowanie .= $prze . " $k ilike('%$v%') ";
                }
            }
            $this->filtr = $filtr_bck;
        }
    }

    public function _setQuery($query) {
        $this->db->setQuery($query);
    }

    public function _loadAssocList() {
        return $this->db->loadAssocList();
    }

    public function _loadRow() {
        return $this->db->loadRow();
    }

    public function pobierzWyniki() {
        $kol = '';
        foreach ($this->kolumny as $key => $val) {
            $kol .= $key . ' AS "' . $key . '",';
        }
        $kol = substr($kol, 0, -1);
        $kol = "*";
        $query_wyszukaj = "SELECT " . $kol . " FROM " . $this->dt_nazwa . "_lista ";
        $query_policz = "SELECT count(*) AS ile FROM  " . $this->dt_nazwa . "_lista ";


        //filtrowanie
        $query_wyszukaj .= " WHERE 1=1  " . $this->filtrowanie;
        $query_policz .= " WHERE 1=1  " . $this->filtrowanie;

        //sortowanie
        if (trim($this->sortowanie) != null)
            $query_wyszukaj .= " ORDER BY " . $this->sortowanie;

        $this->db->setQuery($query_policz);
        $row = $this->_loadAssocList();
        foreach ($row as $r) {
            $this->liczba_rekordow = $r['ile'];
        }
        //echo $this->filtrowanie;
        $query_wyszukaj .= " LIMIT " . $this->na_stronie . " OFFSET " . (($this->p - 1) * $this->na_stronie);
        //echo $query_wyszukaj;
        $this->_setQuery($query_wyszukaj);
        $licznik = 0;
        $row2 = $this->_loadAssocList();
        foreach ($row2 as $r) {
            foreach ($this->kolumny as $key => $val) {
                $this->results_array[$licznik][$key] = stripslashes($r[$key]);
            }
            $licznik++;
        }
    }

    public function uzupelnijWart($arr, $tb_name) {
        if (is_array($arr) && count($arr) > 0) {
            foreach ($arr as $k => $v) {
                if ($v == null)
                    unset($this->dane[$tb_name][$k]);
                else if (isset($this->dane[$tb_name][$k]))
                    $this->dane[$tb_name][$k]['properties']['value'] = $v;
            }
            foreach ($this->dane[$tb_name] as $k => $v) {
                if (!isset($arr[$k]))
                    unset($this->dane[$tb_name][$k]);
            }
            foreach ($this->dane as $k => $v) {
                if ($k != $tb_name)
                    unset($this->dane[$k]);
            }
        }
    }

    public function Waliduj($tab) {
        if (count($$tab) == 0)
            $dane = $this->kolumny;
        $this->error_message = array();

        foreach ($tab as $key => $val) {


            if ($key == 'typ') {

                if (!is_numeric($val)) {
                    $this->error_message[$key] = 'Pole ma niewłaściwą wartość';
                    $errors[$key] = 1;
                }
            }
            if (trim($val) == '') {

                if ($key == 'id_oddzialy' || (($this->tabele = 'dkw_wbc' || $this->tabele = 'dkw_nz') && $key == 'id_slownik_bazy')) {
                    $errors[$key] = 1;
                    $this->error_message[$key] = 'Pole puste bądź ma niewłaściwą wartość';
                } else
                    $errors[$key] = 0;
            } else
                $errors[$key] = 0;

            //}
        }

        if (count($this->error_message) > 0)
            return false;
        else
            return true;
    }

    public function wyswietlFormularz($id = 0) {
        $val = array();
        $wynik = "";
        if ($id != 0) {
            $zap = "SELECT * FROM " . $this->dt_nazwa;
            $zap .= " WHERE id = $id;";
            $this->_setQuery($zap);
            $row = $this->_loadAssocList();
            $val = $row[0];
        } else {

        }
        //print_r($val);
        if (isset($_POST) && count($_POST) > 0) {
            foreach ($_POST as $k => $v) {
                $val[$k] = $v;
            }
        }

        // echo '<pre>';	print_r($val); echo '</pre>';

        $wynik .= '<form action="" method="post" class="form-horizontal"><div class="formularz">';
//print_r($this->dane[$this->mt]); die();
        foreach ($this->dane[$this->dt_nazwa] as $k => $v) {
            if ($v['notedit'] != true) {
                $wynik .= '<div class="form-group">';
                $e = "";

//	echo "K: $k, v: ".$val[$k].'<br />';
                if ($v['element'] == 'textarea')
                    $v['html'] = $val[$k];
                else
                    $v['properties']['value'] = $val[$k];
                //echo '<label for="'.$k.'">'.$v['label'].'</label>';
                //if($v['type']=='input')
                //echo '<input type="'.$v['properties']['type'].'" value="'.$v['properties']['value'].'" name="'.$v['properties']['name'].'" id="'.$v['properties']['id'].'" />';
                if ($v['element'] == 'dict') {
                    $wynik .= '<label for="' . $k . '">' . $v['label'] . '</label>';
                    $wynik .= $this->genSelectFromDict($k, $k, array('nazwa'), $val[$k]);
                    $wynik .= '</div>';
                } else if ($v['element'] == 'file') {
                    $wynik .= '<label for="' . $k . '">' . $v['label'] . '</label>';
                    $wynik .= $this->fileUploadForm($k, $k, array('nazwa'), $val[$k]);
                    $wynik .= '</div>';
                } else {
                    if ($v['label'] != "")
                        $e.='<label for="' . $k . '">' . $v['label'] . '</label>';
                    $e.= '<' . $v['element'] . ' class="form-control"';
                    foreach ($v['properties'] as $pk => $pv)
                        $e.=' ' . $pk . '="' . $pv . '"';
                    if ($v['el_end'] == true)
                        $e.=' />';
                    else
                        $e.=">" . $v['html'];
                    $e.= '</' . $v['element'] . '>';
                    $wynik .= $e;
                    $wynik .= '</div>';
                }
            }
            // komunikatty o błedach
        }




        $wynik .= '<script type="text/javascript">var nr_arch = Array(); ';
//$zap = 'SELECT * FROM slownik_lokalizacja where duch <> true;';
//$this->_setQuery($zap); //if (!($pgsql_result)){ $tranzakcja_error++; echo 'Błąd! SQL: '.$zap;}
//			while($row = $this->_loadAssocList()){
//				$wynik .= 'nr_arch['.$row['id'].']='.$this->nastepnyNrArch($row['id'])."; \n";
//			}
//
        $wynik .= '$(document).ready(
	   function(){$("#slownik_lokalizacja").change(function(){
	   $("#numer_archiwizacyjny").attr("value", nr_arch[$(this).attr("value")]);
});});</script>';
        $wynik .= '<input type="submit" class="btn btn-success" value="Wyślij" /></div></form>';
        return $wynik;
    }

    public function wyswietlStronicowanie() {
        $ilosc_stron = (int) ($this->liczba_rekordow / $this->na_stronie);
        if ($ilosc_stron < ($this->liczba_rekordow / $this->na_stronie))
            $ilosc_stron++;
        $form_strona = $this->p;
        $wynik .="<div class=\"stronicowanie\">";
        $wynik .='<ul class="pagination">';
        $znak_zapyt = "";
        $this_url_tmp = str_replace("&p=$form_strona", "", $this->this_url);
        //	if(!strpos($this->this_url, "?"))
        //	$znak_zapyt = "?";
        if ($form_strona != 1) {
            $wynik .="<li><a href=\"" . $this_url_tmp . $znak_zapyt . "&amp;p=" . ($form_strona - 1) . "\">&lt;&lt;</a></li>";
        }
        if ($ilosc_stron < 50) {
            for ($i = 1; $i <= $ilosc_stron; $i++) {
                if (($i) == $form_strona) {
                    $wynik .="<li class=\"active\"><a href=\"#\">" . $i . "</a></li>";
                } else {
                    $wynik .="<li><a href=\"" . $this_url_tmp . $znak_zapyt . "&amp;p=" . ($i) . "\">" . $i . "</a></li>";
                }
            }
        } else {
            for ($i = 1; $i <= $ilosc_stron; $i++) {
                if ($i < 6 || $i > $ilosc_stron - 5 || ($i < $form_strona + 7 && $i > $form_strona - 5) || $i == (int) ($ilosc_stron / 2)) {
                    if ($i == $form_strona) {
                        $wynik .="<li class=\"active\"><a href=\"#\">" . $i . "</a></li>";
                    } else {
                        $wynik .="<li><a href=\"" . $this_url_tmp . $znak_zapyt . "&amp;p=" . ($i) . "\">" . $i . "</a></li>";
                    }
                }
            }
        }
        if ($form_strona != $ilosc_stron) {
            $wynik .="<li><a href=\"" . $this_url_tmp . $znak_zapyt . "&amp;p=" . ($form_strona + 1) . "\">&gt;&gt;</a></li>";
        }
        $wynik .="</ul>";
        $wynik .="</div>";
        return $wynik;
    }

    public function showSortUrl($key) {
        $link = "";
        $this->remSortLink = '';
        if (isset($this->sort[$key])) {
            if (addslashes($this->sort[$key]) == 'asc') {
                $link = str_replace("sort[$key]=asc", "sort[$key]=desc", $this->this_url);
                $this->arrow = '&nbsp;^';
                $s = str_replace("&sort[$key]=asc", "", $this->this_url);
                $this->remSortLink = '<a href="' . $s . '" class="remSortLink">x</a>';
                $this->remSortLink = '<a href="' . str_replace("&amp;sort[$key]=asc", "", $s) . '" class="remSortLink">x</a>';
            } else {
                $link = str_replace("sort[$key]=desc", "sort[$key]=asc", $this->this_url);
                $this->arrow = '&nbsp;v';
                $s = str_replace("&sort[$key]=desc", "", $this->this_url);
                $this->remSortLink = '<a href="' . $s . '" class="remSortLink">x</a>';
                $this->remSortLink = '<a href="' . str_replace("&amp;sort[$key]=desc", "", $s) . '" class="remSortLink">x</a>';

                //$this->remSortLink = '<a href="'.str_replace("&sort[$key]=desc", "", $this->this_url).'" class="remSortLink">x</a>';
                //$this->remSortLink = '<a href="'.str_replace("&amp;sort[$key]=desc", "", $this->this_url).'" class="remSortLink">x</a>';
            }
        } else {
            //if(!strpos($this->this_url, "?"))
            //	$link = $this->this_url."?&amp;sort[$key]=asc";
            //	else
            $link = $this->this_url . "&amp;sort[$key]=asc";
            $this->arrow = ' ';
        }
        return $link;
    }

    public function genSelectFromDict($tabela, $select_name, $pola, $selected = null) {
        $s = "";
        $pola_list = "";
        $pola_list_a = '$s.=';
        $kr = "";
        foreach ($pola as $v) {
            $pola_list.="," . $v;
            if (substr($v, 0, 5) == "data_")
                $pola_list_a.="$kr date('Y-m-d', \$row['$v'])";
            else
                $pola_list_a.="$kr\$row['$v']";
            $kr = ".' '.";
        }
        $pola_list_a .= ';';
        $query = "SELECT id $pola_list FROM $tabela WHERE duch is not TRUE";
        $this->_setQuery($query);
        $s.="<select id=\"$select_name\" name=\"$select_name\">\n<option value=\"\">--------</option>\n";
        $r = $this->db->loadAssocList();
        //print_r($row); die();
        foreach ($r as $row) {
            $s.="<option value=\"" . $row['id'] . "\"";
            if ($selected != null && $selected == $row['id']) {
                $s.=" selected=\"selected\"";
            }
            $s.=">";
            //echo $pola_list_a; die();
            eval($pola_list_a);
            $s.="</option>\n";
        }
        $s.="</select>";
        return $s;
    }

    public function fileUploadForm($k, $k, $nazwa, $val) {
        $wynik = '';
        $wynik = '<script type="text/javascript" src="../components/com_biblioteka/uploadify/jquery.js"></script>
    <script type="text/javascript" src="../components/com_biblioteka/uploadify/jquery.uploadify.v2.1.4.js"></script>';
        $wynik .='<script type="text/javascript">jQuery.noConflict();(function($) {
	$(document).ready(function() {
	  $("#uploadify").uploadify({
		\'uploader\'       : \'../components/com_biblioteka/uploadify/uploadify.swf\',
		\'script\'         : \'../components/com_biblioteka/uploadify/uploadify.php\',
		\'cancelImg\'      : \'cancel.png\',
		\'folder\'         : \'../galeria\',
		\'queueID\'        : \'fileQueue\',
		\'addFileInfo\'	 : \'divFileInfo\',
		\'auto\'           : true,
		\'multi\'          : true
	  });
	});
	})(jQuery);   </script>';

        $wynik = '<div id="divFileInfo"></div>
	<div id="fileQueue"></div>
	<input type="file" name="uploadify" id="uploadify" />
	<p><a href="javascript:jQuery(\'#uploadify\').uploadifyClearQueue()">Cancel All Uploads</a></p>';
        return $wynik;
    }

    public function insertDB($dane, $db_link = NULL) {
        $tranzakcja_global_error = 0;
        if (is_string($dane))
            $dane = array(0 => $dane);
        //echo "--------------\n"; print_r($dane); echo "--------------\n";
        foreach ($dane as $key_tb => $value_tb) {
            //$tranzakcja_error = 0;
            //$zap = 'BEGIN;';
            //$pgsql_result = @pg_query($db_link, $zap);
            //if (!($pgsql_result)) $tranzakcja_error++;

            if (!is_array($value_tb))
                $zap = $value_tb;
            else {
                $pola = "";
                $wartosci = "";
                $przecinek = ", ";
                foreach ($value_tb as $key_pola => $value_pola) {
                    if ($value_pola['type'] != 'pk') {
                        if ($value_pola['type'] == 'num')
                            $__sp = "";
                        else if ($value_pola['type'] == 'str' || $value_pola['type'] == 'dat' || $value_pola['type'] == 'textarea')
                            $__sp = "'";
                        $pola.=$key_pola . $przecinek;
                        $wartosci.=$__sp . $value_pola['properties']['value'] . $__sp . $przecinek;
                    }
                }


                $zap = "INSERT INTO " . $key_tb . " (" . substr($pola, 0, -2) . ") VALUES (" . substr($wartosci, 0, -2) . ");";
            }
            $zap = str_replace("'null'", 'null', $zap);
            echo $zap;
            $this->_setQuery($zap);
            $this->db->query();
            //if ($tranzakcja_error == 0) { // if (!($pgsql_result)){ $tranzakcja_error++; echo "Błąd! SQL: $zap";} }
            //	if ($tranzakcja_error == 0) $zap = 'COMMIT;'; else $zap = 'ROLLBACK;';
            //	$pgsql_result = @pg_query($db_link, $zap);
            //	if (!($pgsql_result)) $tranzakcja_error++;
            //	$tranzakcja_global_error +=$tranzakcja_error;
        }
        return $tranzakcja_global_error;
    }

    public function insertDBJ() {
        if (!$database->insertObject('#__szkolenie_zglaszajacy', $rr, 'id')) {
            echo $database->stderr();
            return false;
        } else {
            $msg = "Pomyślnie wysłano zgłoszenie.";
        }
    }

    public function updateDB($dane, $db_link = NULL) {
        $tranzakcja_global_error = 0;
        $pk = array();
        if (is_string($dane))
            $dane = array(0 => $dane);
        $zap = "";
        //print_r($dane);
        foreach ($dane as $key_tb => $value_tb) {
            $tranzakcja_error = 0;

            if (!is_array($value_tb))
                $zap = $value_tb;
            else {
                $pola = "";
                $wartosci = "";
                /* foreach($value_tb as $key_pola =>$value_pola)
                  {
                  if($key_pola == 'pk'){
                  $pk=$value_pola;
                  }
                  else{
                  if($key_pola == 'dat')
                  $__sp = "";
                  else if($key_pola == 'num')
                  $__sp = "";
                  else
                  $__sp = "'";
                  }
                  $przecinek = ", ";
                  foreach($value_pola as $key_wart =>$value_wart)
                  {
                  if($key_pola == 'dat')
                  $value_wart = strtotime($value_wart);
                  $pola .=$key_wart."=".$__sp.$value_wart.$__sp.$przecinek;
                  }
                  } */
                $przecinek = ", ";
                //print_r($value_tb); die();
                foreach ($value_tb as $key_pola => $value_pola) {
                    if ($value_pola['type'] == 'pk') {
                        //echo 'a'; die();
                        $pk[$key_pola] = $value_pola['properties']['value'];
                    }
                    if (!$value_pola['notedit']) {
                        if ($value_pola['type'] == 'num')
                            $__sp = "";
                        else if ($value_pola['type'] == 'str' || $value_pola['type'] == 'dat')
                            $__sp = "'";
                        $pola .=$key_pola . "=" . $__sp . $value_pola['properties']['value'] . $__sp . $przecinek;
                        //$pola.=$key_pola.$przecinek;
                        //$wartosci.=$__sp.$value_pola['properties']['value'].$__sp.$przecinek;
                    }
                }


                $zap = "UPDATE " . $key_tb . " SET " . substr($pola, 0, -2) . " WHERE ";
                foreach ($pk as $pk_key => $pk_val) {
                    $zap .="$pk_key = $pk_val";
                    if (next($pk)) {
                        $zap .=" AND ";
                    }
                }
                $zap = str_replace("'null'", 'null', $zap);
            }

            $this->_setQuery($zap);
            $this->db->query();
        }
        return $tranzakcja_global_error;
    }

    public function url2formhidden($url) {
        $wynik = '';
        $url = substr($url, strpos($url, '?') + 1);
        $tmp = explode('&', $url);
        foreach ($tmp as $t) {
            $tm = explode("=", $t);
            if ($tm[0] != 'szukaj_ksiazki' && $tm[0] != 'szukaj_starodruki' && $tm[0] != 'typ' && $tm[0] != 'p')
                $wynik .='<input type="hidden" name="' . $tm[0] . '" value="' . addslashes($tm[1]) . '" />';
        }
        return $wynik;
    }

}
