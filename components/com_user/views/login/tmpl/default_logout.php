<?php defined('_JEXEC') or die('Restricted access'); ?>
<?php /** @todo Should this be routed */ ?>

<form action="<?php echo JRoute::_( 'index.php' ); ?>" method="post" name="login" id="login">
<div class="login">
<?php if ( $this->params->get( 'show_logout_title' ) ) : ?>
<div>
	<?php echo $this->escape($this->params->get( 'header_logout' )); ?>
</div>
<?php endif; ?>

		<div>
		<?php echo $this->image; ?>
		<?php
			if ($this->params->get('description_logout')) :
				echo $this->escape($this->params->get('description_logout_text'));
			endif;
		?>
		</div>

			<input type="submit" name="Submit" class="button" value="<?php echo JText::_( 'Logout' ); ?>" />


<br /><br />

<input type="hidden" name="option" value="com_user" />
<input type="hidden" name="task" value="logout" />
<input type="hidden" name="return" value="<?php echo $this->return; ?>" />
</div></form>
