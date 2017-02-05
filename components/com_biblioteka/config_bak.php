<?php
defined('_JEXEC') or die('Restricted access'); 
$dane = array();
$dane['pozycja']['id']['element']="input";
$dane['pozycja']['id']['type']="pk";
$dane['pozycja']['id']['properties']['name']="id";
$dane['pozycja']['id']['properties']['id']="id";
$dane['pozycja']['id']['properties']['value']="";
$dane['pozycja']['id']['properties']['type']="text";
$dane['pozycja']['id']['label']="id";
$dane['pozycja']['id']['el_end']=true;
$dane['pozycja']['id']['notedit']=true;

$dane['pozycja']['typ_dokumentacji']['element']="dict";
$dane['pozycja']['typ_dokumentacji']['type']="num";
$dane['pozycja']['typ_dokumentacji']['properties']['name']="typ_dokumentacji";
$dane['pozycja']['typ_dokumentacji']['properties']['id']="typ_dokumentacji";
$dane['pozycja']['typ_dokumentacji']['properties']['value']="";
$dane['pozycja']['typ_dokumentacji']['properties']['type']="text";
$dane['pozycja']['typ_dokumentacji']['label']="Typ dokumentacji";
$dane['pozycja']['typ_dokumentacji']['el_end']=true;
//$dane['pozycja']['typ_dokumentacji']['hide']=true;
//$dane['pozycja']['typ_dokumentacji']['notedit']=true;

$dane['pozycja']['id_dok']['element']="input";
$dane['pozycja']['id_dok']['type']="num";
$dane['pozycja']['id_dok']['properties']['name']="id_dok";
$dane['pozycja']['id_dok']['properties']['id']="id_dok";
$dane['pozycja']['id_dok']['properties']['value']="";
$dane['pozycja']['id_dok']['properties']['type']="text";
$dane['pozycja']['id_dok']['label']="Id Dokumentacji";
$dane['pozycja']['id_dok']['el_end']=true;

$dane['pozycja']['inne_informacje']['element']="input";
$dane['pozycja']['inne_informacje']['type']="str";
$dane['pozycja']['inne_informacje']['properties']['name']="inne_informacje";
$dane['pozycja']['inne_informacje']['properties']['id']="inne_informacje";
$dane['pozycja']['inne_informacje']['properties']['value']="";
$dane['pozycja']['inne_informacje']['properties']['type']="text";
$dane['pozycja']['inne_informacje']['label']="Inne informacje";
$dane['pozycja']['inne_informacje']['el_end']=true;

$dane['pozycja']['wyp']['element']="input";
$dane['pozycja']['wyp']['type']="num";
$dane['pozycja']['wyp']['properties']['name']="wyp";
$dane['pozycja']['wyp']['properties']['id']="wyp";
$dane['pozycja']['wyp']['properties']['value']="";
$dane['pozycja']['wyp']['properties']['type']="text";
$dane['pozycja']['wyp']['label']="Wyp";
$dane['pozycja']['wyp']['hide']=true;
$dane['pozycja']['wyp']['notedit']=true;

$dane['pozycja']['wprowadzil']['element']="input";
$dane['pozycja']['wprowadzil']['type']="num";
$dane['pozycja']['wprowadzil']['properties']['value']="";
$dane['pozycja']['wprowadzil']['label']="Wprowadził";
$dane['pozycja']['wprowadzil']['hide']=true;
$dane['pozycja']['wprowadzil']['notedit']=true;

$dane['pozycja']['data_dodania']['element']="input";
$dane['pozycja']['data_dodania']['type']="dat";
$dane['pozycja']['data_dodania']['properties']['value']="";
$dane['pozycja']['data_dodania']['label']="data_dodania";
$dane['pozycja']['data_dodania']['hide']=true;
$dane['pozycja']['data_dodania']['notedit']=true;

/*$dane['pozycja']['duch']['element']="input";
$dane['pozycja']['duch']['type']="str";
$dane['pozycja']['duch']['properties']['name']="duch";
$dane['pozycja']['duch']['properties']['id']="duch";
$dane['pozycja']['duch']['properties']['value']="";
$dane['pozycja']['duch']['properties']['type']="text";
$dane['pozycja']['duch']['label']="";
$dane['pozycja']['duch']['el_end']=true;
$dane['pozycja']['duch']['hide']=true;
$dane['pozycja']['duch']['notedit']=true;
*/

$dane['lista']['ksiazki']=array( 'id' => 'Id książki', 'tytul' => 'Tytuł', 'autor' => 'Autor', 'rok'=>'Rok','wydawnictwo' => 'wydawnictwo' ,'ilosc_stron' => 'Ilość stron', 'numer_polki' => 'Numer półki', 
  'miejsce' => 'miejsce', 'temat' => 'Temat', 'data_dodania' =>'data_dodania', 'temat_id' => 'temat_id', 'autor_id' => 'autor_id');
$dane['lista']['starodruki']=array( 'id' => 'Id starodruki', 'nazwa_pelna' => 'Nazwa pełna', 'tytul' => 'Tytuł', 'tytul_alternatywny1' => 'Tytuł alternatywny 1', 'tytul_alternatywny2' => 'Tytuł alternatywny 2', 'opis' => 'Opis', 'rok'=>'Rok', 'drukarnia' => 'Drukarnia' ,'miejsce' => 'Miejsce', 'kategoria' => 'Kategoria', 
   'data_dodania' =>'data_dodania');
$dane['lista_mini']['ksiazki']=array( 'tytul' => 'Tytuł', 'autor' => 'Autor', 'rok'=>'Rok');
$dane['lista_mini']['starodruki']=array('tytul' => 'Tytuł','drukarnia' => 'Drukarnia', 'rok'=>'Rok');
$dane['szczegoly']['ksiazki']=array( 'id' => 'Id książki', 'tytul' => 'Tytuł', 'autor' => 'Autor', 'rok'=>'Rok','wydawnictwo' => 'wydawnictwo' ,'ilosc_stron' => 'Ilość stron', 'numer_polki' => 'Numer półki', 
  'miejsce' => 'miejsce', 'temat' => 'Temat', 'data_dodania' =>'data_dodania');
$dane['szczegoly']['starodruki']=array( 'id' => 'Id starodruki', 'nazwa_pelna' => 'Nazwa pełna', 'tytul' => 'Tytuł', 'tytul_alternatywny1' => 'Tytuł alternatywny 1', 'tytul_alternatywny2' => 'Tytuł alternatywny 2', 'opis' => 'Opis', 'rok'=>'Rok', 'drukarnia' => 'Drukarnia' ,'miejsce' => 'Miejsce', 'kategoria' => 'Kategoria', 
   'data_dodania' =>'data_dodania');





$dane['ksiazki']['id']['element']="input";
$dane['ksiazki']['id']['type']="pk";
$dane['ksiazki']['id']['properties']['name']="id";
$dane['ksiazki']['id']['properties']['id']="id";
$dane['ksiazki']['id']['properties']['value']="";
$dane['ksiazki']['id']['properties']['type']="text";
$dane['ksiazki']['id']['label']="id";
$dane['ksiazki']['id']['el_end']=true;
$dane['ksiazki']['id']['notedit']=true;

$dane['ksiazki']['tytul']['element']="input";
$dane['ksiazki']['tytul']['type']="str";
$dane['ksiazki']['tytul']['properties']['name']="tytul";
$dane['ksiazki']['tytul']['properties']['id']="tytul";
$dane['ksiazki']['tytul']['properties']['value']="";
$dane['ksiazki']['tytul']['properties']['type']="text";
$dane['ksiazki']['tytul']['label']="Tytuł";
$dane['ksiazki']['tytul']['el_end']=false;
//$dane['ksiazki']['typ_dokumentacji']['hide']=true;
//$dane['ksiazki']['typ_dokumentacji']['notedit']=true;

$dane['ksiazki']['autor']['element']="dict";
$dane['ksiazki']['autor']['type']="num";
$dane['ksiazki']['autor']['properties']['name']="autor";
$dane['ksiazki']['autor']['properties']['id']="autor";
$dane['ksiazki']['autor']['properties']['value']="";
$dane['ksiazki']['autor']['properties']['type']="text";
$dane['ksiazki']['autor']['label']="Autor";
$dane['ksiazki']['autor']['el_end']=true;

$dane['ksiazki']['rok']['element']="input";
$dane['ksiazki']['rok']['type']="str";
$dane['ksiazki']['rok']['properties']['name']="rok";
$dane['ksiazki']['rok']['properties']['id']="rok";
$dane['ksiazki']['rok']['properties']['value']="";
$dane['ksiazki']['rok']['properties']['type']="text";
$dane['ksiazki']['rok']['label']="Rok";
$dane['ksiazki']['rok']['el_end']=true;

$dane['ksiazki']['wydawnictwo']['element']="dict";
$dane['ksiazki']['wydawnictwo']['type']="num";
$dane['ksiazki']['wydawnictwo']['properties']['name']="wydawnictwo";
$dane['ksiazki']['wydawnictwo']['properties']['id']="wydawnictwo";
$dane['ksiazki']['wydawnictwo']['properties']['value']="";
$dane['ksiazki']['wydawnictwo']['properties']['type']="text";
$dane['ksiazki']['wydawnictwo']['label']="Wydawnictwo";
$dane['ksiazki']['wydawnictwo']['el_end']=true;

$dane['ksiazki']['miejsce']['element']="dict";
$dane['ksiazki']['miejsce']['type']="num";
$dane['ksiazki']['miejsce']['properties']['name']="miejsce";
$dane['ksiazki']['miejsce']['properties']['id']="miejsce";
$dane['ksiazki']['miejsce']['properties']['value']="";
$dane['ksiazki']['miejsce']['properties']['type']="text";
$dane['ksiazki']['miejsce']['label']="Miejsce";
$dane['ksiazki']['miejsce']['el_end']=true;

$dane['ksiazki']['temat']['element']="dict";
$dane['ksiazki']['temat']['type']="num";
$dane['ksiazki']['temat']['properties']['name']="temat";
$dane['ksiazki']['temat']['properties']['id']="temat";
$dane['ksiazki']['temat']['properties']['value']="";
$dane['ksiazki']['temat']['properties']['type']="text";
$dane['ksiazki']['temat']['label']="Temat";
$dane['ksiazki']['temat']['el_end']=true;


$dane['ksiazki']['ilosc_stron']['element']="input";
$dane['ksiazki']['ilosc_stron']['type']="str";
$dane['ksiazki']['ilosc_stron']['properties']['name']="ilosc_stron";
$dane['ksiazki']['ilosc_stron']['properties']['id']="ilosc_stron";
$dane['ksiazki']['ilosc_stron']['properties']['value']="";
$dane['ksiazki']['ilosc_stron']['properties']['type']="text";
$dane['ksiazki']['ilosc_stron']['label']="Ilość stron";
$dane['ksiazki']['ilosc_stron']['hide']=true;
$dane['ksiazki']['ilosc_stron']['notedit']=false;

$dane['ksiazki']['numer_polki']['element']="input";
$dane['ksiazki']['numer_polki']['type']="str";
$dane['ksiazki']['numer_polki']['properties']['name']="numer_polki";
$dane['ksiazki']['numer_polki']['properties']['id']="numer_polki";
$dane['ksiazki']['numer_polki']['properties']['value']="";
$dane['ksiazki']['numer_polki']['label']="Numer półki";
$dane['ksiazki']['numer_polki']['hide']=true;

$dane['ksiazki']['uwagi']['element']="textarea";
$dane['ksiazki']['uwagi']['type']="str";
$dane['ksiazki']['uwagi']['properties']['name']="uwagi";
$dane['ksiazki']['uwagi']['properties']['id']="uwagi";
$dane['ksiazki']['uwagi']['html']="";
$dane['ksiazki']['uwagi']['properties']['rows']="2";
$dane['ksiazki']['uwagi']['properties']['cols']="20";
$dane['ksiazki']['uwagi']['label']="Uwagi";
$dane['ksiazki']['uwagi']['hide']=true;



$dane['ksiazki']['data_dodania']['element']="input";
$dane['ksiazki']['data_dodania']['type']="dat";
$dane['ksiazki']['data_dodania']['properties']['value']="";
$dane['ksiazki']['data_dodania']['label']="data_dodania";
$dane['ksiazki']['data_dodania']['hide']=true;
$dane['ksiazki']['data_dodania']['notedit']=true;




$dane['starodruki']['id']['element']="input";
$dane['starodruki']['id']['type']="pk";
$dane['starodruki']['id']['properties']['name']="id";
$dane['starodruki']['id']['properties']['id']="id";
$dane['starodruki']['id']['properties']['value']="";
$dane['starodruki']['id']['properties']['type']="text";
$dane['starodruki']['id']['label']="id";
$dane['starodruki']['id']['el_end']=true;
$dane['starodruki']['id']['notedit']=true;

$dane['starodruki']['tytul']['element']="input";
$dane['starodruki']['tytul']['type']="str";
$dane['starodruki']['tytul']['properties']['name']="tytul";
$dane['starodruki']['tytul']['properties']['id']="tytul";
$dane['starodruki']['tytul']['properties']['value']="";
$dane['starodruki']['tytul']['properties']['type']="text";
$dane['starodruki']['tytul']['label']="Tytuł";
$dane['starodruki']['tytul']['el_end']=false;

$dane['starodruki']['tytul_alternatywny1']['element']="input";
$dane['starodruki']['tytul_alternatywny1']['type']="str";
$dane['starodruki']['tytul_alternatywny1']['properties']['name']="tytul_alternatywny1";
$dane['starodruki']['tytul_alternatywny1']['properties']['id']="tytul_alternatywny1";
$dane['starodruki']['tytul_alternatywny1']['properties']['value']="";
$dane['starodruki']['tytul_alternatywny1']['properties']['type']="text";
$dane['starodruki']['tytul_alternatywny1']['label']="Tytuł alternatywny 1";
$dane['starodruki']['tytul_alternatywny1']['el_end']=false;

$dane['starodruki']['tytul_alternatywny2']['element']="input";
$dane['starodruki']['tytul_alternatywny2']['type']="str";
$dane['starodruki']['tytul_alternatywny2']['properties']['name']="tytul_alternatywny2";
$dane['starodruki']['tytul_alternatywny2']['properties']['id']="tytul_alternatywny2";
$dane['starodruki']['tytul_alternatywny2']['properties']['value']="";
$dane['starodruki']['tytul_alternatywny2']['properties']['type']="text";
$dane['starodruki']['tytul_alternatywny2']['label']="Tytuł alternatywny 2";
$dane['starodruki']['tytul_alternatywny2']['el_end']=false;

$dane['starodruki']['nazwa_pelna']['element']="input";
$dane['starodruki']['nazwa_pelna']['type']="str";
$dane['starodruki']['nazwa_pelna']['properties']['name']="nazwa_pelna";
$dane['starodruki']['nazwa_pelna']['properties']['id']="nazwa_pelna";
$dane['starodruki']['nazwa_pelna']['properties']['value']="";
$dane['starodruki']['nazwa_pelna']['label']="Nazwa pełna";
$dane['starodruki']['nazwa_pelna']['hide']=true;

$dane['starodruki']['rok']['element']="input";
$dane['starodruki']['rok']['type']="str";
$dane['starodruki']['rok']['properties']['name']="rok";
$dane['starodruki']['rok']['properties']['id']="rok";
$dane['starodruki']['rok']['properties']['value']="";
$dane['starodruki']['rok']['properties']['type']="text";
$dane['starodruki']['rok']['label']="Rok";
$dane['starodruki']['rok']['el_end']=true;

$dane['starodruki']['drukarnia']['element']="dict";
$dane['starodruki']['drukarnia']['type']="num";
$dane['starodruki']['drukarnia']['properties']['name']="drukarnia";
$dane['starodruki']['drukarnia']['properties']['id']="drukarnia";
$dane['starodruki']['drukarnia']['properties']['value']="";
$dane['starodruki']['drukarnia']['properties']['type']="text";
$dane['starodruki']['drukarnia']['label']="drukarnia";
$dane['starodruki']['drukarnia']['el_end']=true;

$dane['starodruki']['miejsce']['element']="dict";
$dane['starodruki']['miejsce']['type']="num";
$dane['starodruki']['miejsce']['properties']['name']="miejsce";
$dane['starodruki']['miejsce']['properties']['id']="miejsce";
$dane['starodruki']['miejsce']['properties']['value']="";
$dane['starodruki']['miejsce']['properties']['type']="text";
$dane['starodruki']['miejsce']['label']="Miejsce";
$dane['starodruki']['miejsce']['el_end']=true;

$dane['starodruki']['kategoria']['element']="dict";
$dane['starodruki']['kategoria']['type']="num";
$dane['starodruki']['kategoria']['properties']['name']="kategoria";
$dane['starodruki']['kategoria']['properties']['id']="kategoria";
$dane['starodruki']['kategoria']['properties']['value']="";
$dane['starodruki']['kategoria']['properties']['type']="text";
$dane['starodruki']['kategoria']['label']="Kategoria";
$dane['starodruki']['kategoria']['el_end']=true;

$dane['starodruki']['indeks']['element']="input";
$dane['starodruki']['indeks']['type']="str";
$dane['starodruki']['indeks']['properties']['name']="indeks";
$dane['starodruki']['indeks']['properties']['id']="indeks";
$dane['starodruki']['indeks']['properties']['value']="";
$dane['starodruki']['indeks']['properties']['type']="text";
$dane['starodruki']['indeks']['label']="Indeks";
$dane['starodruki']['indeks']['hide']=true;
$dane['starodruki']['indeks']['notedit']=false;

$dane['starodruki']['uwagi']['element']="textarea";
$dane['starodruki']['uwagi']['type']="str";
$dane['starodruki']['uwagi']['properties']['name']="uwagi";
$dane['starodruki']['uwagi']['properties']['id']="uwagi";
$dane['starodruki']['uwagi']['html']="";
$dane['starodruki']['uwagi']['properties']['rows']="2";
$dane['starodruki']['uwagi']['properties']['cols']="20";
$dane['starodruki']['uwagi']['label']="Uwagi";
$dane['starodruki']['uwagi']['hide']=true;

$dane['starodruki']['opis']['element']="textarea";
$dane['starodruki']['opis']['type']="str";
$dane['starodruki']['opis']['properties']['name']="opis";
$dane['starodruki']['opis']['properties']['id']="opis";
$dane['starodruki']['opis']['html']="";
$dane['starodruki']['opis']['properties']['rows']="2";
$dane['starodruki']['opis']['properties']['cols']="20";
$dane['starodruki']['opis']['label']="Opis";
$dane['starodruki']['opis']['hide']=true;

$dane['starodruki']['data_dodania']['element']="input";
$dane['starodruki']['data_dodania']['type']="dat";
$dane['starodruki']['data_dodania']['properties']['value']="";
$dane['starodruki']['data_dodania']['label']="data_dodania";
$dane['starodruki']['data_dodania']['hide']=true;
$dane['starodruki']['data_dodania']['notedit']=true;
//return $dane;
?>