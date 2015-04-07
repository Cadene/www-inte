<div class="participations form">
<?php echo $this->Form->create('Participation'); ?>
	<fieldset>
		<legend><?php echo __('Edit Participation'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('projet_id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('date');
		echo $this->Form->input('montant');
		echo $this->Form->input('type');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Participation.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Participation.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Participations'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Projets'), array('controller' => 'projets', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Projet'), array('controller' => 'projets', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
