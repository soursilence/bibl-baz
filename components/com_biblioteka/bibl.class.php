<?php
require_once 'util.class.php';

//require_once 'config.php';
class biblioteka extends util {

    public $biblioteka = null;

    function __construct($typ, $db, $dane) {
        //$biblioteka = new util($d_nazwa);
        // $dane = include('config.php');
        $this->db = $db;
        $this->mt = 'pozycja';
        $this->baseUrl = '?option=com_biblioteka&amp;Itemid=2';
        if (isset($_GET['p']) && $_GET['p'] != null)
            $this->p = (int) $_GET['p'];
        $this->sort = $_GET['sort'];
        $this->filtr = $_GET['filtr'];
        //$this->this_url = substr($_SERVER['REQUEST_URI'],strrpos($_SERVER['REQUEST_URI'],'/')+1);
        $this->this_url = $_SERVER['REQUEST_URI'];
        // print_r($_SERVER); die;
        //$this->db = & JFactory::getDBO();
        $this->typ = $typ;
        $this->dt_nazwa = $this->getNazwa($typ);

        $this->dane = $dane;
        $this->kolumny = $this->dane['lista'][$this->dt_nazwa];



        //print_r($this->dane);
        //print_r($this->kolumny);
    }

    public function getNazwa($typ) {
        $zap = "SELECT nazwa FROM typ_dokumentacji WHERE id=$typ";
        $this->db->setQuery($zap);
        $n = $this->db->loadResult();
        return $n;
    }

    public function wyswietlGoreListy() {
        $wynik = "<table class=\"lista round\">";
        $wynik .= "<tr>";
        foreach ($this->dane['lista'][$this->dt_nazwa] as $k => $v) {
            $val[$k] = $this->dane[$this->mt][$k]['label'];
            if (!$this->dane[$this->mt][$k]['hide'])
                $wynik .= "<th><a href=\"" . $this->showSortUrl($k) . "\">" . $v . "</a></th>";
        }
        if ($_SESSION['sesja_uzytkownik_funkcja'] == 'a')
            $wynik .= "<th></th><th>Edytowanie</th>";
        $wynik .= "</tr>";
        return $wynik;
    }

    public function wyswietlSzczegoly() {
        $wynik = "";
        $wynik .= "<div class=\"column\">";
        $wynik .= "<table class=\"szczegoly_table\">";
        //print_r($this->results_array);
        foreach ($this->dane['szczegoly'][$this->dt_nazwa] as $k => $v) {
            if (!$this->dane[$this->mt][$k]['hide']) {
                $wynik .= "<tr><td class=\"szczegoly_th\">" . $v . "</td><td>" . $this->results_array[0][$k] . "</td></tr>";
            }
        }
        $wynik .= "</table>";
        $wynik .= "</div>";
        return $wynik;
    }

    public function wyswietlPodobne0() {
        $wynik = "";

        $wynik .= "<div class=\"column\">";
        $wynik .= "<h4>Podobne</h4>";
        $zap = "Select * From ksiazki_lista where id <> " . $this->results_array[0]['id'] . " AND (autor_id = " . $this->results_array[0]['autor_id'] . " or temat_id = " . $this->results_array[0]['temat_id'] . ") order by RAND()  LIMIT " . ($this->na_stronie / 2) . "";
        $this->_setQuery($zap);
        $row = $this->_loadAssocList();
        $wynik .= "<table class=\"lista round\">";
        $wynik .= "<tr>";
        foreach ($this->dane['lista_mini'][$this->dt_nazwa] as $k => $v) {
            $val[$k] = $this->dane[$this->mt][$k]['label'];
            if (!$this->dane[$this->mt][$k]['hide'])
                $wynik .= "<th><a href=\"" . $this->showSortUrl($k) . "\">" . $v . "</a></th>";
        }
        $licz = 0;
        foreach ($row as $key => $val) {
            $wynik .= '<tr class="bibl_tr' . ($licz % 2 + 1) . '">';
            $licz++;
            foreach ($this->dane['lista_mini'][$this->dt_nazwa] as $k => $v) {
                if (!$this->dane[$this->mt][$k]['hide']) {
                    if ($val[$k] == 0 && $k == 'rok')
                        $val[$k] = '';
                    $wynik .= "<td><div class=\"bibl_td bibl_$k\"><a href=\"" . $this->baseUrl . '&amp;typ=' . $this->typ . '&amp;id=' . $val['id'] . "\" title=\"" . $val[$k] . "\">" . $val[$k] . "</a></div></td>";
                }
            }
            $wynik .= "</tr>";
        }
        $wynik .= "</table>";
        // print_r($row);
        $wynik .= "</div>";
        return $wynik;
    }

    public function listaMini($results_array, $html = null) {
        $wynik = '';
        $wynik .= "<div class=\"column\">$html <table class=\"lista round\">";
        $wynik .= "<tr>";
        foreach ($this->dane['lista_mini'][$this->dt_nazwa] as $k => $v) {
            $val[$k] = $this->dane[$this->mt][$k]['label'];
            if (!$this->dane[$this->mt][$k]['hide'])
                $wynik .= "<th><a href=\"" . $this->showSortUrl($k) . "\">" . $v . "</a></th>";
        }
        $licz = 0;
        foreach ($results_array as $key => $val) {
            $wynik .= '<tr class="bibl_tr' . ($licz % 2 + 1) . '">';
            $licz++;
            foreach ($this->dane['lista_mini'][$this->dt_nazwa] as $k => $v) {
                if (!$this->dane[$this->mt][$k]['hide']) {
                    if ($val[$k] == 0 && $k == 'rok')
                        $val[$k] = '';
                    $wynik .= "<td><div class=\"bibl_td bibl_$k\"><a href=\"" . $this->baseUrl . '&amp;typ=' . $this->typ . '&amp;id=' . $val['id'] . "\" title=\"" . $val[$k] . "\">" . $val[$k] . "</a></div></td>";
                }
            }
            $wynik .= "</tr>";
        }
        $wynik .= "</table></div>";
        return $wynik;
    }

    public function listaAdm($results_array, $html = null) {
        $wynik = '';
        $wynik .= "$html <table class=\"lista round  table table-striped\">";
        $wynik .= "<tr>";
        foreach ($this->dane['lista_adm'][$this->dt_nazwa] as $k => $v) {
            $val[$k] = $this->dane[$this->mt][$k]['label'];
            if (!$this->dane[$this->mt][$k]['hide'])
                $wynik .= "<th><a href=\"" . $this->showSortUrl($k) . "\">" . $v . "</a></th>";
        }
        $wynik .= "<th></th></tr>";
        $licz = 0;
        foreach ($results_array as $key => $val) {
            $wynik .= '<tr class="bibl_tr' . ($licz % 2 + 1) . '">';
            $licz++;
            $id = 0;
            foreach ($this->dane['lista_adm'][$this->dt_nazwa] as $k => $v) {
                if (!$this->dane[$this->mt][$k]['hide']) {
                    if ($val[$k] == 0 && $k == 'rok')
                        $val[$k] = '';
                    $id = $val['id'];
                    $wynik .= "<td>" . $val[$k] . "</td>";
                }
            }
            $wynik .= "<td><a class=\"btn btn-info\" href=\"" . $this->baseUrl . '&amp;a=2&amp;typ=' . $this->typ . '&amp;id=' . $id . "\">edytuj</a>"
                    . "<a class=\"btn btn-success\" href=\"" . $this->baseUrl . '&amp;a=4&amp;typ=' . $this->typ . '&amp;id=' . $id . "\">dodaj plik</a></td>";

            $wynik .= "</tr>";
        }
        $wynik .= "</table>";
        return $wynik;
    }

    public function wyswietlListeMini() {
        $wynik = "";
        if (count($this->results_array) > 0) {
            $i = $this->na_stronie * ($this->strona - 1) + 1;
            $results_array_split = array_chunk($this->results_array, ((int) $this->na_stronie / 2));
            foreach ($results_array_split as $results_array) {
                $wynik .= $this->listaMini($results_array);
            }
        } else {
            $wynik.="Nie znaleziono rekordów spełniających kryteria.";
        }
        return $wynik;
    }

    public function wyswietlListeAdm() {
        $wynik = "";
        if (count($this->results_array) > 0) {
            $i = $this->na_stronie * ($this->strona - 1) + 1;
            //$results_array_split = array_chunk($this->results_array,((int)$this->na_stronie/2));
            //foreach($results_array_split as $results_array){
            $wynik .= $this->listaAdm($this->results_array);
            //}
        } else {
            $wynik.="Nie znaleziono rekordów spełniających kryteria.";
        }
        return $wynik;
    }

    public function wyswietlPodobne() {
        $wynik = "";
        $zap_tmp[1] = "AND (autor_id = " . $this->results_array[0]['autor_id'] . " or temat_id = " . $this->results_array[0]['temat_id'] . ")";
        $zap_tmp[2] = "";

        $zap = "Select * From " . $this->dt_nazwa . "_lista where id <> " . $this->results_array[0]['id'] . " " . $zap_tmp[$this->typ] . " order by RAND()  LIMIT " . ($this->na_stronie / 2) . "";
        $this->_setQuery($zap);
        $row = $this->_loadAssocList();
        $wynik .= $this->listaMini($row, '<h4>Podobne</h4>');
        return $wynik;
    }

    public function wyswietlListe() {
        $wynik = "";
        if (count($this->results_array) > 0) {
            $i = $this->na_stronie * ($this->strona - 1) + 1;
            foreach ($this->results_array as $key => $val) {
                $wynik .= "<tr>";
                foreach ($this->dane['lista'][$this->dt_nazwa] as $k => $v) {
                    if (!$this->dane[$this->mt][$k]['hide']) {
                        if ($k == 'numer_referencyjny' || $k == 'numer_umowy')
                            $wynik .= '<td><a href="dokumentacja_szczegoly.php?did=' . $val['id'] . '&amp;dt=' . $this->dt_id . '">' . $val[$k] . "</a></td>";
                        else
                            $wynik .= "<td>" . $val[$k] . "</td>";
                    }
                }

                if ($val['wyp'] != null) {
                    $wynik .= "<td>Wypożyczone - <a href=\"uzytkownicy.php?idu=" . $val['wyp'] . "\">" . $val['username'] . "</a></td>";
                } else
                    $wynik .= "<td><a href=\"wypozycz.php?dt=" . $this->dt_id . "&amp;edit=" . $val['id'] . "\">Wypożycz</a></td>";

                if ($_SESSION['sesja_uzytkownik_funkcja'] == 'a')
                    $wynik .= "<td><a href=\"dokumentacja_form.php?edit=" . $val['id'] . "\">edytuj</a>
				<a href=\"usun_dok.php?del=" . $val['id'] . "&amp;dt=" . $this->dt_id . "\">usuń</a>
				<!--<a href=\"dodaj_plik.php?id_dok=" . $val['id'] . "&amp;dt=" . $this->dt_id . "\">dodaj plik</a>-->
				</td>";
                $wynik .= "</tr>";
            }
            $wynik .= "</table>";
        }
        else {
            $wynik.="Nie znaleziono rekordów spełniających kryteria.";
        }
        return $wynik;
    }

    public function wyswietlFiltrWyszukiwania() {
        $wynik = '';
        $wynik .= "<div class=\"column\">";

        $wynik .= '<br /><h3>Książki</h3>';
        $wynik .= '<div class="szukaj_opis">Wpisz czego szukasz używając alfabetu łacińskiego<br />(dla tytułów i autorów wschodnich używaj transliteracji)</div>';

        $wynik .= '<form action="" method="get"><div class="logowanie">';
        $wynik .= $this->url2formhidden($this->this_url);
        $wynik .='<input type="text" name="szukaj_ksiazki" value="' . addslashes($_GET['szukaj_ksiazki']) . '" size="15" style="width: 290px; margin-right: 5px;" />';
        $wynik .='<input type="hidden" name="p" value="1" />';
        $wynik .='<input type="hidden" name="typ" value="1" />';
        $wynik .='<input type="submit" value="" class="szukaj" />';

        $wynik .= "</div></form>";

        $wynik .= '<br /><h3>Starodruki</h3>';
        $wynik .= '<div class="szukaj_opis">Wpisz czego szukasz używając cyrylicy.</div>';

        $wynik .= '<form action="" method="get"><div class="logowanie">';
        $wynik .= $this->url2formhidden($this->this_url);
        $wynik .='<input type="text" name="szukaj_starodruki" value="' . addslashes($_GET['szukaj_starodruki']) . '" size="15" style="width: 290px; margin-right: 5px;" />';
        $wynik .='<input type="hidden" name="p" value="1" />';
        $wynik .='<input type="hidden" name="typ" value="2" />';
        $wynik .='<input type="submit" value="" class="szukaj" />';

        $wynik .= "</div></form></div>";

        return $wynik;
    }

    public function wyswietlWynikiWyszukiwania() {
        $wynik = "";

        $szukaj = addslashes($_GET['s']);
        //$szukajk = addslashes($_GET['szukaj_ksiazki']);
        // $szukajst = addslashes($_GET['szukaj_starodruki']);
        if ($this->typ == 1) {
            $zap = "Select count(*) From " . $this->dt_nazwa . "_lista where tytul like '%" . $szukaj . "%' or autor like '%" . $szukaj . "%'";
            $this->_setQuery($zap);
            $liczba_rekordow = $this->_loadRow();
            $this->na_stronie = ($this->na_stronie / 2) - 1;
            $this->liczba_rekordow = $liczba_rekordow[0];
            $zap = "Select * From " . $this->dt_nazwa . "_lista where tytul like '%" . $szukaj . "%' or autor like '%" . $szukaj . "%'";
            if (trim($this->sortowanie) != null)
                $zap .= " ORDER BY " . $this->sortowanie;
            $zap .="  LIMIT " . $this->na_stronie . " OFFSET " . (($this->p - 1) * $this->na_stronie);

            $this->_setQuery($zap);
            $row = $this->_loadAssocList();
            $wynik .= $this->listaMini($row, '<h4>Wyniki wyszukiwania</h4>');
            $wynik .= $this->wyswietlStronicowanie();
        } else if ($this->typ == 2) {
            $zap = "Select count(*) From " . $this->dt_nazwa . "_lista where tytul like '%" . $szukaj . "%' or drukarnia like '%" . $szukaj . "%'";
            $this->_setQuery($zap);
            $liczba_rekordow = $this->_loadRow();
            $this->na_stronie = ($this->na_stronie / 2) - 1;
            $this->liczba_rekordow = $liczba_rekordow[0];
            $zap = "Select * From " . $this->dt_nazwa . "_lista where tytul like '%" . $szukaj . "%' or drukarnia like '%" . $szukaj . "%'";
            if (trim($this->sortowanie) != null)
                $zap .= " ORDER BY " . $this->sortowanie;
            $zap .="  LIMIT " . $this->na_stronie . " OFFSET " . (($this->p - 1) * $this->na_stronie);

            $this->_setQuery($zap);
            $row = $this->_loadAssocList();
            $wynik .= $this->listaMini($row, '<h4>Wyniki wyszukiwania</h4>');
            $wynik .= $this->wyswietlStronicowanie();
        }
        return $wynik;
    }

    public function wyswietlWyszukiwarke() {
        $s = ($_GET['s'] != '') ? addslashes($_GET['s']) : '';
        $wynik = '<form class="form-inline" method="get" action="/index.php/component/biblioteka/">
  <div class="form-group form-group-lg">


    <input type="search" class="form-control" id="searchInput" placeholder="Szukaj" name="s" size="90" value="' . $s . '" />

    <select name="typ" class="form-control">
        <option value="1"';
        if ($this->typ == 1)
            $wynik .= ' selected="selected"';
        $wynik .= '>Biblioteka</option>
        <option value="2"';
        if ($this->typ == 2)
            $wynik .= ' selected="selected"';
        $wynik .= '>Starodruki</option>
    </select>
    <input type="hidden" value="2" name="a" />
    <button type="submit" class="btn btn-primary btn-lg">Szutaj</button>
  </div>


</form>';
        return $wynik;
    }

    public function wyswietlFormularzPlikow($id = 0) {
        $val = array();
        $wynik = "";
        if ($id != 0) {
            $zap = "SELECT * FROM pliki ";
            $zap .= " WHERE fk_id = $id  and type = '" . $this->type . "'";
            $this->_setQuery($zap);
            $row = $this->_loadAssocList();
            $val = $row[0];
        }
        if (count($val) > 0) {
            $wynik .= "<ul>Lista plików:";
            foreach ($val as $k => $v) {

                $wynik .= "<li>" . $v['nazwa'] . "</li>";
            }
            $wynik .= "</ul>";
        }



        $wynik .= '<form action="index.php?option=com_biblioteka&Itemid=2&a=4&typ=1&id=0" method="post" enctype="multipart/form-data">';
        $wynik .= '<input type="file" name="pliki[]" multiple>';
        $wynik .= "<input class=\"btn btn-danger\"type=\"submit\" value=\"Wyślij\" >";
        $wynik .= "</form>";


        return $wynik;
    }

    public function wyswietlArtykuly() {
        $option = array();

        $option['driver'] = 'mysqli';
        $option['host'] = 'sql.bazylianie.nazwa.pl';
        $option['user'] = 'bazylianie';
        $option['password'] = '?BaZylianie2010!!';
        $option['database'] = 'bazylianie';
        $option['prefix'] = 'j25_';

//        $option['host'] = 'localhost';
//        $option['user'] = 'root';
//        $option['password'] = '';
//        $option['database'] = 'bazylianie';
//        $option['prefix'] = 'j25_';

        $db = JDatabase::getInstance($option);

        $query = "SELECT title,id FROM #__content where state =1 order by id desc limit 30";
        $db->setQuery($query);
        $r = $db->loadObjectList();
        foreach ($r as $k => $v) {
            ?>
            <a href="http://www.bazylianie.pl/?option=com_content&view=article&id=<?php echo $v->id; ?>"><?php echo $v->title; ?></a><br />
            <?php
        }
        $wynik = "";

        return $wynik;
    }

}
?>