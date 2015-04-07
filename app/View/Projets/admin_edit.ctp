<div class="projets form">
<?php echo $this->Form->create('Projet'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Projet'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('titre');
		echo $this->Form->input('presentation');
		echo $this->Form->input('date_debut');
		echo $this->Form->input('date_fin');
		echo $this->Form->input('montant');
		echo $this->Form->input('etat');
		echo $this->Form->input('salle');
		echo $this->Form->input('citie_id');
		echo $this->Form->input('prix_salle');
		echo $this->Form->input('prix_technique');
		echo $this->Form->input('prix_materiel');
		echo $this->Form->input('prix_boisson');
		echo $this->Form->input('prix_billet');
		echo $this->Form->input('prix_vip');
		echo $this->Form->input('prix_cf1');
		echo $this->Form->input('prix_cf2');
		echo $this->Form->input('prix_cf3');
		echo $this->Form->input('prix_cf4');
		echo $this->Form->input('prix_cf5');
		echo $this->Form->input('Artist');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Projet.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Projet.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Projets'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Cities'), array('controller' => 'cities', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Citie'), array('controller' => 'cities', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Participations'), array('controller' => 'participations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Participation'), array('controller' => 'participations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Artists'), array('controller' => 'artists', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Artist'), array('controller' => 'artists', 'action' => 'add')); ?> </li>
	</ul>
</div>
