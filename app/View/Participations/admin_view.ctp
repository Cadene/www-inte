<div class="participations view">
<h2><?php echo __('Participation'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($participation['Participation']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Projet'); ?></dt>
		<dd>
			<?php echo $this->Html->link($participation['Projet']['titre'], array('controller' => 'projets', 'action' => 'view', $participation['Projet']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($participation['User']['prenom'], array('controller' => 'users', 'action' => 'view', $participation['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date'); ?></dt>
		<dd>
			<?php echo h($participation['Participation']['date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Montant'); ?></dt>
		<dd>
			<?php echo h($participation['Participation']['montant']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($participation['Participation']['type']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Participation'), array('action' => 'edit', $participation['Participation']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Participation'), array('action' => 'delete', $participation['Participation']['id']), array(), __('Are you sure you want to delete # %s?', $participation['Participation']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Participations'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Participation'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Projets'), array('controller' => 'projets', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Projet'), array('controller' => 'projets', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
