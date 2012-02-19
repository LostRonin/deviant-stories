<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Stories', true), array('controller' => 'stories', 'action' => 'adminstoryoverview')); ?></li>
        <li><?php echo $this->Html->link(__('New Story', true), array('controller' => 'stories', 'action' => 'add')); ?></li>

        <HR color="grey" WIDTH="100%" SIZE="1"><br />

		<li><?php echo $this->Html->link(__('List Chapter Titles', true), array('controller' => 'titles', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('New Chapter Title', true), array('controller' => 'titles', 'action' => 'add')); ?></li>

        <HR color="grey" WIDTH="100%" SIZE="1"><br />

		<li><?php echo $this->Html->link(__('List Chapters', true), array('controller' => 'chapters', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Chapter', true), array('controller' => 'chapters', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('Published Chapters', true), array('controller' => 'chapters', 'action' => 'allChaptersPublished', 2)); ?> </li>
        <li><?php echo $this->Html->link(__('Draft Chapters', true), array('controller' => 'chapters', 'action' => 'allChaptersPublished', 1)); ?> </li>
        <li><?php echo $this->Html->link(__('Arab Slaves', true), array('controller' => 'chapters', 'action' => 'allChaptersStory', 1)); ?> </li>
        <li><?php echo $this->Html->link(__('Barbarian Invasion', true), array('controller' => 'chapters', 'action' => 'allChaptersStory', 2)); ?> </li>

        <HR color="grey" WIDTH="100%" SIZE="1"><br />
        
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>

        <HR color="grey" WIDTH="100%" SIZE="1"><br />
        
        <li><?php echo $this->Html->link(__('List Updates', true), array('controller' => 'updates', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Update', true), array('controller' => 'updates', 'action' => 'add')); ?> </li>

        <HR color="grey" WIDTH="100%" SIZE="1"><br />
        
        <li><?php echo $this->Html->link(__('List Images', true), array('controller' => 'images', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image', true), array('controller' => 'images', 'action' => 'add')); ?> </li>
		
        <HR color="grey" WIDTH="100%" SIZE="1"><br />
        
		<li><?php echo $this->Html->link(__('List Ramblings', true), array('controller' => 'ramblings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Rambling', true), array('controller' => 'ramblings', 'action' => 'add')); ?> </li>

        <HR color="grey" WIDTH="100%" SIZE="1"><br />
        
        <li><?php echo $this->Html->link(__('List Statuses', true), array('controller' => 'statuses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Status', true), array('controller' => 'statuses', 'action' => 'add')); ?> </li>
        
        <HR color="grey" WIDTH="100%" SIZE="1"><br />
        
        <li><?php echo $this->Html->link(__('List Contacts', true), array('controller' => 'contacts', 'action' => 'index')); ?> </li>

        <HR color="grey" WIDTH="100%" SIZE="1"><br />
        
		<li><?php echo $this->Html->link(__('List Groups', true), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group', true), array('controller' => 'groups', 'action' => 'add')); ?> </li>

        <HR color="grey" WIDTH="100%" SIZE="1"><br />
        
        <li><?php echo $this->Html->link(__('DS Home', true), array('controller' => 'updates', 'action' => 'dashboard')); ?> </li>
		
	</ul>