<div class="artists view">
<h2><?php echo __('Artist'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($artist['Artist']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Groupe'); ?></dt>
		<dd>
			<?php echo h($artist['Artist']['groupe']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Talent'); ?></dt>
		<dd>
			<?php echo h($artist['Artist']['talent']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Presentation'); ?></dt>
		<dd>
			<?php echo h($artist['Artist']['presentation']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Biographie'); ?></dt>
		<dd>
			<?php echo h($artist['Artist']['biographie']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Etat'); ?></dt>
		<dd>
			<?php echo h($artist['Artist']['etat']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Citie'); ?></dt>
		<dd>
			<?php echo $this->Html->link($artist['Citie']['name'], array('controller' => 'cities', 'action' => 'view', $artist['Citie']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Artist'), array('action' => 'edit', $artist['Artist']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Artist'), array('action' => 'delete', $artist['Artist']['id']), array(), __('Are you sure you want to delete # %s?', $artist['Artist']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Artists'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Artist'), array('action' => 'add')); ?> </li>
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
<div class="related">
	<h3><?php echo __('Related Likes'); ?></h3>
	<?php if (!empty($artist['Like'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Artist Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($artist['Like'] as $like): ?>
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
	<h3><?php echo __('Related Projets'); ?></h3>
	<?php if (!empty($artist['Projet'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Titre'); ?></th>
		<th><?php echo __('Presentation'); ?></th>
		<th><?php echo __('Date Debut'); ?></th>
		<th><?php echo __('Date Fin'); ?></th>
		<th><?php echo __('Montant'); ?></th>
		<th><?php echo __('Etat'); ?></th>
		<th><?php echo __('Salle'); ?></th>
		<th><?php echo __('Citie Id'); ?></th>
		<th><?php echo __('Prix Salle'); ?></th>
		<th><?php echo __('Prix Technique'); ?></th>
		<th><?php echo __('Prix Materiel'); ?></th>
		<th><?php echo __('Prix Boisson'); ?></th>
		<th><?php echo __('Prix Billet'); ?></th>
		<th><?php echo __('Prix Vip'); ?></th>
		<th><?php echo __('Prix Cf1'); ?></th>
		<th><?php echo __('Prix Cf2'); ?></th>
		<th><?php echo __('Prix Cf3'); ?></th>
		<th><?php echo __('Prix Cf4'); ?></th>
		<th><?php echo __('Prix Cf5'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($artist['Projet'] as $projet): ?>
		<tr>
			<td><?php echo $projet['id']; ?></td>
			<td><?php echo $projet['titre']; ?></td>
			<td><?php echo $projet['presentation']; ?></td>
			<td><?php echo $projet['date_debut']; ?></td>
			<td><?php echo $projet['date_fin']; ?></td>
			<td><?php echo $projet['montant']; ?></td>
			<td><?php echo $projet['etat']; ?></td>
			<td><?php echo $projet['salle']; ?></td>
			<td><?php echo $projet['citie_id']; ?></td>
			<td><?php echo $projet['prix_salle']; ?></td>
			<td><?php echo $projet['prix_technique']; ?></td>
			<td><?php echo $projet['prix_materiel']; ?></td>
			<td><?php echo $projet['prix_boisson']; ?></td>
			<td><?php echo $projet['prix_billet']; ?></td>
			<td><?php echo $projet['prix_vip']; ?></td>
			<td><?php echo $projet['prix_cf1']; ?></td>
			<td><?php echo $projet['prix_cf2']; ?></td>
			<td><?php echo $projet['prix_cf3']; ?></td>
			<td><?php echo $projet['prix_cf4']; ?></td>
			<td><?php echo $projet['prix_cf5']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'projets', 'action' => 'view', $projet['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'projets', 'action' => 'edit', $projet['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'projets', 'action' => 'delete', $projet['id']), array(), __('Are you sure you want to delete # %s?', $projet['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Projet'), array('controller' => 'projets', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Users'); ?></h3>
	<?php if (!empty($artist['User'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Prenom'); ?></th>
		<th><?php echo __('Nom'); ?></th>
		<th><?php echo __('Tel'); ?></th>
		<th><?php echo __('Birthday'); ?></th>
		<th><?php echo __('Mail'); ?></th>
		<th><?php echo __('Token'); ?></th>
		<th><?php echo __('Fb Id'); ?></th>
		<th><?php echo __('Last Connection'); ?></th>
		<th><?php echo __('Newsletter'); ?></th>
		<th><?php echo __('Etat'); ?></th>
		<th><?php echo __('Citie Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($artist['User'] as $user): ?>
		<tr>
			<td><?php echo $user['id']; ?></td>
			<td><?php echo $user['prenom']; ?></td>
			<td><?php echo $user['nom']; ?></td>
			<td><?php echo $user['tel']; ?></td>
			<td><?php echo $user['birthday']; ?></td>
			<td><?php echo $user['mail']; ?></td>
			<td><?php echo $user['token']; ?></td>
			<td><?php echo $user['fb_id']; ?></td>
			<td><?php echo $user['last_connection']; ?></td>
			<td><?php echo $user['newsletter']; ?></td>
			<td><?php echo $user['etat']; ?></td>
			<td><?php echo $user['citie_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'users', 'action' => 'view', $user['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'users', 'action' => 'edit', $user['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'users', 'action' => 'delete', $user['id']), array(), __('Are you sure you want to delete # %s?', $user['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
