<div class="users view">
<h2><?php echo __('User'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Prenom'); ?></dt>
		<dd>
			<?php echo h($user['User']['prenom']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nom'); ?></dt>
		<dd>
			<?php echo h($user['User']['nom']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($user['User']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($user['User']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tel'); ?></dt>
		<dd>
			<?php echo h($user['User']['tel']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Birthday'); ?></dt>
		<dd>
			<?php echo h($user['User']['birthday']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Token'); ?></dt>
		<dd>
			<?php echo h($user['User']['token']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Facebook'); ?></dt>
		<dd>
			<?php echo h($user['User']['facebook']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Last Connection'); ?></dt>
		<dd>
			<?php echo h($user['User']['last_connection']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Newsletter'); ?></dt>
		<dd>
			<?php echo h($user['User']['newsletter']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Etat'); ?></dt>
		<dd>
			<?php echo h($user['User']['etat']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Citie'); ?></dt>
		<dd>
			<?php echo $this->Html->link($user['Citie']['name'], array('controller' => 'cities', 'action' => 'view', $user['Citie']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), array(), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cities'), array('controller' => 'cities', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Citie'), array('controller' => 'cities', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Likes'), array('controller' => 'likes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Like'), array('controller' => 'likes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Participations'), array('controller' => 'participations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Participation'), array('controller' => 'participations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Artists'), array('controller' => 'artists', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Artist'), array('controller' => 'artists', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Likes'); ?></h3>
	<?php if (!empty($user['Like'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Artist Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['Like'] as $like): ?>
		<tr>
			<td><?php echo $like['id']; ?></td>
			<td><?php echo $like['artist_id']; ?></td>
			<td><?php echo $like['user_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'likes', 'action' => 'view', $like['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'likes', 'action' => 'edit', $like['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'likes', 'action' => 'delete', $like['id']), array(), __('Are you sure you want to delete # %s?', $like['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Like'), array('controller' => 'likes', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Participations'); ?></h3>
	<?php if (!empty($user['Participation'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Projet Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Date'); ?></th>
		<th><?php echo __('Montant'); ?></th>
		<th><?php echo __('Type'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['Participation'] as $participation): ?>
		<tr>
			<td><?php echo $participation['id']; ?></td>
			<td><?php echo $participation['projet_id']; ?></td>
			<td><?php echo $participation['user_id']; ?></td>
			<td><?php echo $participation['date']; ?></td>
			<td><?php echo $participation['montant']; ?></td>
			<td><?php echo $participation['type']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'participations', 'action' => 'view', $participation['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'participations', 'action' => 'edit', $participation['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'participations', 'action' => 'delete', $participation['id']), array(), __('Are you sure you want to delete # %s?', $participation['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Participation'), array('controller' => 'participations', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Artists'); ?></h3>
	<?php if (!empty($user['Artist'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Groupe'); ?></th>
		<th><?php echo __('Talent'); ?></th>
		<th><?php echo __('Presentation'); ?></th>
		<th><?php echo __('Biographie'); ?></th>
		<th><?php echo __('Etat'); ?></th>
		<th><?php echo __('Citie Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['Artist'] as $artist): ?>
		<tr>
			<td><?php echo $artist['id']; ?></td>
			<td><?php echo $artist['groupe']; ?></td>
			<td><?php echo $artist['talent']; ?></td>
			<td><?php echo $artist['presentation']; ?></td>
			<td><?php echo $artist['biographie']; ?></td>
			<td><?php echo $artist['etat']; ?></td>
			<td><?php echo $artist['citie_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'artists', 'action' => 'view', $artist['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'artists', 'action' => 'edit', $artist['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'artists', 'action' => 'delete', $artist['id']), array(), __('Are you sure you want to delete # %s?', $artist['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Artist'), array('controller' => 'artists', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
