<?php // no direct access
defined('_JEXEC') or die('Restricted access'); ?>
<script type="text/javascript">
<!--
	Window.onDomReady(function(){
		document.formvalidator.setHandler('passverify', function (value) { return ($('password').value == value); }	);
	});
// -->
</script>
<div class="column"><br />
<?php
	if(isset($this->message)){
		$this->display('message');
	}
	$gwiazdka = '';
?>

<form action="<?php echo JRoute::_( 'index.php?option=com_user' ); ?>" method="post" id="josForm" name="josForm" class="form-validate">
  <div class="logowanie">
<?php if ( $this->params->def( 'show_page_title', 1 ) ) : ?>
<div class="componentheading<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>">Aby skorzystać z biblioteki musisz się zarejestrować. Rejestracja jest darmowa.<?php //echo $this->escape($this->params->get('page_title')); ?></div>
<?php endif; ?>
<br />
	<?php /*	<label id="namemsg" for="name">
			<?php echo JText::_( 'Name' ); ?>:
		</label>
		<br />

  		<input type="text" name="name" id="name" size="40" value="<?php echo $this->escape($this->user->get( 'name' ));?>" class="inputbox required" maxlength="50" /><?php echo $gwiazdka; ?>
<br /><br />
		<label id="usernamemsg" for="username">
			<?php echo JText::_( 'User name' ); ?>:
		</label>
<br />
		<input type="text" id="username" name="username" size="40" value="<?php echo $this->escape($this->user->get( 'username' ));?>" class="inputbox required validate-username" maxlength="25" /><?php echo $gwiazdka; ?>
	<br /><br />*/ ?>
		<label id="emailmsg" for="email">
			<?php echo JText::_( 'Email' ); ?>:
		</label>
<br />
		<input type="text" id="email" name="email" size="40" value="<?php echo $this->escape($this->user->get( 'email' ));?>" class="inputbox required validate-email" maxlength="100" /><?php echo $gwiazdka; ?>
<br /><br />
		<label id="pwmsg" for="password">
			<?php echo JText::_( 'Password' ); ?>:
		</label>
<br />
  		<input class="inputbox required validate-password" type="password" id="password" name="password" size="40" value="" /><?php echo $gwiazdka; ?>
<br /><br />
		<label id="pw2msg" for="password2">
			<?php echo JText::_( 'Verify Password' ); ?>:
		</label>
<br />
		<input class="inputbox required validate-passverify" type="password" id="password2" name="password2" size="40" value="" /><?php echo $gwiazdka; ?>
<br />
		<?php //echo JText::_( 'REGISTER_REQUIRED' ); ?>
<br />
	<button class="button validate" type="submit"><?php echo JText::_('Register'); ?></button>
	<input type="hidden" name="task" value="register_save" />
	<input type="hidden" name="id" value="0" />
	<input type="hidden" name="gid" value="0" />
	<?php echo JHTML::_( 'form.token' ); ?>
  </div>
</form>
</div>
<div class="column"><?php
jimport('joomla.application.module.helper');
// this is where you want to load your module position
$modules = JModuleHelper::getModules('logowanie');
foreach($modules as $module)
{
echo JModuleHelper::renderModule($module);
}

?></div>