<?php
class GroupsController extends AppController {

	var $name = 'Groups';

	function index() 
    {
        if($this->Auth->user('id') == 1) // identifies if admin logs in
        {
    		$this->layout = 'admin';            
    		$this->set('groups', $this->paginate());
        }
        else
        {
            $this->flashWarningGrowl('You are not authorized to access this page!', 'users', 'login');
        }                    
	}


	function view() 
    {
        if($this->Auth->user('id') == 1) // identifies if admin logs in
        {
    		$this->layout = 'admin';            
            $this->set('group', $this->Group->read(null, $id));
        }
        else
        {
            $this->flashWarningGrowl('You are not authorized to access this page!', 'users', 'login');
        }                    
	}

	
    function add() 
    {
        if($this->Auth->user('id') == 1) // identifies if admin logs in
        {
    		$this->layout = 'admin';
            if (!empty($this->data)) 
            {
    			$this->Group->create();
    			if ($this->Group->save($this->data)) 
                {
    				$this->flashSuccess('This group has been saved', 'index');
    			} 
                else 
                {
    				$this->flashWarning('This group could not be saved. Please, try again.');
    			}
    		}
        }
        else
        {
            $this->flashWarningGrowl('You are not authorized to access this page!', 'users', 'login');
        }            
	}


	function edit($id = null) 
    {
        if($this->Auth->user('id') == 1) // identifies if admin logs in
        {
    		$this->layout = 'admin';
            $this->idEmpty($id, 'index');
    		
            if (!empty($this->data)) 
            {
    			if ($this->Group->save($this->data)) 
                {
    				$this->flashSuccess('This group has been saved', 'index');
    			} 
                else 
                {
    				$this->flashWarning('This group could not be saved. Please, try again.');
    			}
    		}
    		
            if (empty($this->data)) 
            {
    			$this->data = $this->Group->read(null, $id);
    		}
        }
        else
        {
            $this->flashWarningGrowl('You are not authorized to access this page!', 'users', 'login');
        }            
	}

	
    function delete($id = null) 
    {
        if($this->Auth->user('id') == 1) // identifies if admin logs in
        {        
    		$this->layout = 'admin';
            $this->idEmpty($id, 'index');
    		
            if ($this->Group->delete($id)) 
            {
    			$this->flashSuccess('Group deleted', 'index');
    		}
    		
            $this->flashWarning('Group was not deleted', 'index');
        }
        else
        {
            $this->flashWarningGrowl('You are not authorized to access this page!', 'users', 'login');
        }                        
	}

}
?>