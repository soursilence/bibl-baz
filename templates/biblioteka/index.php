<?php

defined('_JEXEC') or die('Restricted access');

?>
<?php echo '<?xml version="1.0" encoding="utf-8"?'.'>'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" >
<head>
  <jdoc:include type="head" />
  <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template;?>/css/style.css" type="text/css" />


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
    <?php if(addslashes($_GET['option']) == 'com_content'){ ?>
    <div id="content">
      <jdoc:include type="component" />
    </div>
    <?php } else { ?>   
    <div id="comp">
    <?php if($this->countModules('menu')){ ?>
      <jdoc:include type="message" />
      <jdoc:include type="component" />
    <?php } else if(addslashes($_GET['option']) == 'com_user'){
         //	loadComponent('com_user');
	?>
        
       
        <jdoc:include type="component" />
       <?php /* <div class="column"><br />Zaloguj się<jdoc:include type="modules" name="logowanie" /></div> */?>
        <?php
        

	 } else { ?>
	 <div class="column"><jdoc:include type="message" /></div><div class="column"><jdoc:include type="modules" name="logowanie" /></div>
	    <?php
        
	 } ?>
    </div>
    <?php } ?>
		
    <div id="stopka">
      <jdoc:include type="modules" name="stopka" />
    </div>
  </div>
</body>
</html>
