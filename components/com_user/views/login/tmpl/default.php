<?php defined('_JEXEC') or die('Restricted access'); ?>
<br /><div class="column">
<?php if ($this->params->get( 'show_page_title', 1)) : ?>
<div class="componentheading<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>">
	<?php echo $this->escape($this->params->get('page_title')); ?>
</div>
<?php endif; ?>
<?php echo $this->loadTemplate($this->type); ?>
</div>
