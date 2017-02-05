<?php
/*
* Plik: tmpl/default.php
*/
defined('_JEXEC') or die ('brak dostępu');
?>
<div class="ostatnio_dodane">
  <h3><?php echo $params->get('thtitle'); ?></h3>
  
  <table><tr><th>Tytuł</th><th>Autor</th><th>Rok</th></td>
<?php
foreach ($res as $r)
{ ?>
	  
    <tr>
      <td><a href="?option=com_biblioteka&amp;Itemid=2&amp;typ=1&amp;id=<?php echo $r->id; ?>" title="<?php echo $r->tytul; ?>"><?php echo $r->tytul; ?></a></td>
      <td><a href="?option=com_biblioteka&amp;Itemid=2&amp;typ=1&amp;id=<?php echo $r->id; ?>" title="<?php echo $r->autor; ?>"><?php echo $r->autor; ?></a></td>
      <td><a href="?option=com_biblioteka&amp;Itemid=2&amp;typ=1&amp;id=<?php echo $r->id; ?>" title="<?php echo $r->rok; ?>"><?php echo $r->rok; ?></a></td>
    </tr>

<?php } ?>
  </table>

</div>

