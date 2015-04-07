<div class="projets index">
	<h2><?php echo __('Projets'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('titre'); ?></th>
			<th><?php echo $this->Paginator->sort('presentation'); ?></th>
			<th><?php echo $this->Paginator->sort('date_debut'); ?></th>
			<th><?php echo $this->Paginator->sort('date_fin'); ?></th>
			<th><?php echo $this->Paginator->sort('montant'); ?></th>
			<th><?php echo $this->Paginator->sort('etat'); ?></th>
			<th><?php echo $this->Paginator->sort('salle'); ?></th>
			<th><?php echo $this->Paginator->sort('citie_id'); ?></th>
			<th><?php echo $this->Paginator->sort('prix_salle'); ?></th>
			<th><?php echo $this->Paginator->sort('prix_technique'); ?></th>
			<th><?php echo $this->Paginator->sort('prix_materiel'); ?></th>
			<th><?php echo $this->Paginator->sort('prix_boisson'); ?></th>
			<th><?php echo $this->Paginator->sort('prix_billet'); ?></th>
			<th><?php echo $this->Paginator->sort('prix_vip'); ?></th>
			<th><?php echo $this->Paginator->sort('prix_cf1'); ?></th>
			<th><?php echo $this->Paginator->sort('prix_cf2'); ?></th>
			<th><?php echo $this->Paginator->sort('prix_cf3'); ?></th>
			<th><?php echo $this->Paginator->sort('prix_cf4'); ?></th>
			<th><?php echo $this->Paginator->sort('prix_cf5'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($projets as $projet): ?>
	<tr>
		<td><?php echo h($projet['Projet']['id']); ?>&nbsp;</td>
		<td><?php echo h($projet['Projet']['titre']); ?>&nbsp;</td>
		<td><?php echo h($projet['Projet']['presentation']); ?>&nbsp;</td>
		<td><?php echo h($projet['Projet']['date_debut']); ?>&nbsp;</td>
		<td><?php echo h($projet['Projet']['date_fin']); ?>&nbsp;</td>
		<td><?php echo h($projet['Projet']['montant']); ?>&nbsp;</td>
		<td><?php echo h($projet['Projet']['etat']); ?>&nbsp;</td>
		<td><?php echo h($projet['Projet']['salle']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($projet['Citie']['name'], array('controller' => 'cities', 'action' => 'view', $projet['Citie']['id'])); ?>
		</td>
		<td><?php echo h($projet['Projet']['prix_salle']); ?>&nbsp;</td>
		<td><?php echo h($projet['Projet']['prix_technique']); ?>&nbsp;</td>
		<td><?php echo h($projet['Projet']['prix_materiel']); ?>&nbsp;</td>
		<td><?php echo h($projet['Projet']['prix_boisson']); ?>&nbsp;</td>
		<td><?php echo h($projet['Projet']['prix_billet']); ?>&nbsp;</td>
		<td><?php echo h($projet['Projet']['prix_vip']); ?>&nbsp;</td>
		<td><?php echo h($projet['Projet']['prix_cf1']); ?>&nbsp;</td>
		<td><?php echo h($projet['Projet']['prix_cf2']); ?>&nbsp;</td>
		<td><?php echo h($projet['Projet']['prix_cf3']); ?>&nbsp;</td>
		<td><?php echo h($projet['Projet']['prix_cf4']); ?>&nbsp;</td>
		<td><?php echo h($projet['Projet']['prix_cf5']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $projet['Projet']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $projet['Projet']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $projet['Projet']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $projet['Projet']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Projet'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Cities'), array('controller' => 'cities', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Citie'), array('controller' => 'cities', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Participations'), array('controller' => 'participations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Participation'), array('controller' => 'participations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Artists'), array('controller' => 'artists', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Artist'), array('controller' => 'artists', 'action' => 'add')); ?> </li>
	</ul>
</div>
