<div class="artists form">
<?php echo $this->Form->create('Artist'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Artist'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('groupe');
		echo $this->Form->input('talent');
		echo $this->Form->input('presentation');
		echo $this->Form->input('biographie');
		echo $this->Form->input('etat');
		echo $this->Form->input('citie_id');
		echo $this->Form->input('Projet');
		echo $this->Form->input('User');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Artist.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Artist.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Artists'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Cities'), array('controller' => 'cities', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Citie'), array('controller' => 'cities', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Likes'), array('controller' => 'likes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Like'), array('controller' => 'likes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Projets'), array('controller' => 'projets', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Projet'), array('controller' => 'projets', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
