<div class="user">

<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('username');?></th>
			<th><?php echo $this->Paginator->sort('password');?></th>
			<th><?php echo $this->Paginator->sort('online');?></th>
            <th><?php echo $this->Paginator->sort('active');?></th>
			<th><?php echo $this->Paginator->sort('email');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
            <th><?php echo $this->Paginator->sort('last_login');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>

<?php foreach ($users as $user): ?>

    <tr>
       <td><span class="userid"><?php echo $user['User']['id']; ?></span></td>
       <td><span class="name"><?php echo $user['User']['username']; ?></span></td>
       <td><span class="password"><?php echo $user['User']['password']; ?></span></td>
       <td><span class="online"><?php echo $user['User']['online']; ?></span></td>
       <td><span class="online"><?php echo $user['User']['active']; ?></span></td>
       <td><span class="email"><?php echo $user['User']['email']; ?></span></td>       
       <td><?php echo $time->formattedDate($user['User']['created']); ?></td>
       <td><?php echo $time->formattedDate($user['User']['modified']); ?></td>
       <td><?php echo $time->formattedDate($user['User']['last_login']); ?></td>
   </tr>
   
<?php endforeach; ?>   
</table>
   
</div>