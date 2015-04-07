<div class="prestations view">
<h2><?php echo __('Prestation'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($prestation['Prestation']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date'); ?></dt>
		<dd>
			<?php echo h($prestation['Prestation']['date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($prestation['Prestation']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nom'); ?></dt>
		<dd>
			<?php echo h($prestation['Prestation']['nom']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Prenom'); ?></dt>
		<dd>
			<?php echo h($prestation['Prestation']['prenom']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Societe'); ?></dt>
		<dd>
			<?php echo h($prestation['Prestation']['societe']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Adresse'); ?></dt>
		<dd>
			<?php echo h($prestation['Prestation']['adresse']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($prestation['Prestation']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Telephone'); ?></dt>
		<dd>
			<?php echo h($prestation['Prestation']['telephone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Commentaire'); ?></dt>
		<dd>
			<?php echo h($prestation['Prestation']['commentaire']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Projet'); ?></dt>
		<dd>
			<?php echo $this->Html->link($prestation['Projet']['titre'], array('controller' => 'projets', 'action' => 'view', $prestation['Projet']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($prestation['User']['prenom'], array('controller' => 'users', 'action' => 'view', $prestation['User']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Prestation'), array('action' => 'edit', $prestation['Prestation']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Prestation'), array('action' => 'delete', $prestation['Prestation']['id']), array(), __('Are you sure you want to delete # %s?', $prestation['Prestation']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Prestations'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Prestation'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Projets'), array('controller' => 'projets', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Projet'), array('controller' => 'projets', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
