<div class="prestations form">
<?php echo $this->Form->create('Prestation'); ?>
	<fieldset>
		<legend><?php echo __('Add Prestation'); ?></legend>
	<?php
		echo $this->Form->input('date');
		echo $this->Form->input('type');
		echo $this->Form->input('nom');
		echo $this->Form->input('prenom');
		echo $this->Form->input('societe');
		echo $this->Form->input('adresse');
		echo $this->Form->input('email');
		echo $this->Form->input('telephone');
		echo $this->Form->input('commentaire');
		echo $this->Form->input('projet_id');
		echo $this->Form->input('user_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Prestations'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Projets'), array('controller' => 'projets', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Projet'), array('controller' => 'projets', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
