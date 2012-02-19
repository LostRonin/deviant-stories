<?php
class StatusesController extends AppController {

	var $name = 'Statuses';

	function index() 
    {
        if($this->Auth->user('id') == 1) // identifies if admin logs in
        {                        
    		$this->layout = 'admin';
            $this->Status->recursive = 0;
    		$this->set('statuses', $this->paginate());
        }
        else
        {
            $this->flashWarningGrowl('You are not authorized to access this page!', 'users', 'login');
        }            
	}


	function view($id = null) 
    {
		$this->layout = 'admin';
        $this->idEmpty($id, 'index');
        $this->set('status', $this->Status->read(null, $id));
	}


	function add() 
    {
        if($this->Auth->user('id') == 1) // identifies if admin logs in
        {                        
    		$this->layout = 'admin';
            if (!empty($this->data)) 
            {
    			$this->Status->create();
    			if ($this->Status->save($this->data)) 
                {
                    $this->flashSuccess('The status has been saved', 'index');
    			} 
                else 
                {
    				$this->flashWarning('The status could not be saved. Please, try again.');                
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
    			if ($this->Status->save($this->data)) 
                {
    				$this->flashSuccess('The status has been saved', 'index');
    			} 
                else 
                {
    				$this->flashWarning('The status could not be saved. Please, try again.');
    			}
    		}
    		
            if (empty($this->data)) 
            {
    			$this->data = $this->Status->read(null, $id);
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
    		
            if ($this->Status->delete($id)) 
            {
    			$this->flashSuccess('Status deleted', 'index');
    		}
            $this->flashWarning('Status was not deleted', 'index');
        }
        else
        {
            $this->flashWarningGrowl('You are not authorized to access this page!', 'users', 'login');
        }                                                
	}
}
?>