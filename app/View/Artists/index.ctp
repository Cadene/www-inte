<div class="artists index">
	<h2><?php echo __('Artists'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('groupe'); ?></th>
			<th><?php echo $this->Paginator->sort('talent'); ?></th>
			<th><?php echo $this->Paginator->sort('presentation'); ?></th>
			<th><?php echo $this->Paginator->sort('biographie'); ?></th>
			<th><?php echo $this->Paginator->sort('etat'); ?></th>
			<th><?php echo $this->Paginator->sort('citie_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($artists as $artist): ?>
	<tr>
		<td><?php echo h($artist['Artist']['id']); ?>&nbsp;</td>
		<td><?php echo h($artist['Artist']['groupe']); ?>&nbsp;</td>
		<td><?php echo h($artist['Artist']['talent']); ?>&nbsp;</td>
		<td><?php echo h($artist['Artist']['presentation']); ?>&nbsp;</td>
		<td><?php echo h($artist['Artist']['biographie']); ?>&nbsp;</td>
		<td><?php echo h($artist['Artist']['etat']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($artist['Citie']['name'], array('controller' => 'cities', 'action' => 'view', $artist['Citie']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $artist['Artist']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $artist['Artist']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $artist['Artist']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $artist['Artist']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Artist'), array('action' => 'add')); ?></li>
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
