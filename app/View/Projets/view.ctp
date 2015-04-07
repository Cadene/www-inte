<div class="projets view">
<h2><?php echo __('Projet'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($projet['Projet']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Titre'); ?></dt>
		<dd>
			<?php echo h($projet['Projet']['titre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Presentation'); ?></dt>
		<dd>
			<?php echo h($projet['Projet']['presentation']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date Debut'); ?></dt>
		<dd>
			<?php echo h($projet['Projet']['date_debut']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date Fin'); ?></dt>
		<dd>
			<?php echo h($projet['Projet']['date_fin']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Montant'); ?></dt>
		<dd>
			<?php echo h($projet['Projet']['montant']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Etat'); ?></dt>
		<dd>
			<?php echo h($projet['Projet']['etat']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Salle'); ?></dt>
		<dd>
			<?php echo h($projet['Projet']['salle']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Citie'); ?></dt>
		<dd>
			<?php echo $this->Html->link($projet['Citie']['name'], array('controller' => 'cities', 'action' => 'view', $projet['Citie']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Prix Salle'); ?></dt>
		<dd>
			<?php echo h($projet['Projet']['prix_salle']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Prix Technique'); ?></dt>
		<dd>
			<?php echo h($projet['Projet']['prix_technique']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Prix Materiel'); ?></dt>
		<dd>
			<?php echo h($projet['Projet']['prix_materiel']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Prix Boisson'); ?></dt>
		<dd>
			<?php echo h($projet['Projet']['prix_boisson']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Prix Billet'); ?></dt>
		<dd>
			<?php echo h($projet['Projet']['prix_billet']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Prix Vip'); ?></dt>
		<dd>
			<?php echo h($projet['Projet']['prix_vip']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Prix Cf1'); ?></dt>
		<dd>
			<?php echo h($projet['Projet']['prix_cf1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Prix Cf2'); ?></dt>
		<dd>
			<?php echo h($projet['Projet']['prix_cf2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Prix Cf3'); ?></dt>
		<dd>
			<?php echo h($projet['Projet']['prix_cf3']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Prix Cf4'); ?></dt>
		<dd>
			<?php echo h($projet['Projet']['prix_cf4']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Prix Cf5'); ?></dt>
		<dd>
			<?php echo h($projet['Projet']['prix_cf5']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Projet'), array('action' => 'edit', $projet['Projet']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Projet'), array('action' => 'delete', $projet['Projet']['id']), array(), __('Are you sure you want to delete # %s?', $projet['Projet']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Projets'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Projet'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cities'), array('controller' => 'cities', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Citie'), array('controller' => 'cities', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Participations'), array('controller' => 'participations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Participation'), array('controller' => 'participations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Artists'), array('controller' => 'artists', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Artist'), array('controller' => 'artists', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Participations'); ?></h3>
	<?php if (!empty($projet['Participation'])): ?>
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
	<?php foreach ($projet['Participation'] as $participation): ?>
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
	<?php if (!empty($projet['Artist'])): ?>
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
	<?php foreach ($projet['Artist'] as $artist): ?>
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
