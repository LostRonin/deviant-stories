<?php
App::import('Sanitize');

class ContactsController extends AppController {
	var $name = 'Contacts';

	/**
	 * You can create a view in app/views/plugins/contacts/contacts/add.ctp
	 * if you need to customize the contact form
	 */

    function beforeFilter()
    {
        parent::beforeFilter();

        $this->Auth->allow('add', 'submit');
    }


	function index()
    {
        if($this->Auth->user('id') == 1) // identifies if admin logs in
        {
    		$this->layout = 'admin';
            $this->Contact->recursive = 0;
    		$this->set('contacts', $this->paginate());
        }
        else
        {
            $this->flashWarningGrowl('You are not authorized to access this page!', 'users', 'login');
        }
	}


    function view($id = null)
    {
        if($this->Auth->user('id') == 1) // identifies if admin logs in
        {
    		$this->layout = 'admin';
            $this->idEmpty($id, 'index');
            $this->set('contact', $this->Contact->read(null, $id));
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
    			if ($this->Contact->save($this->data))
                {
    				$this->flashSuccess('This contact has been saved', 'index');
    			}
                else
                {
    				$this->flashWarning('This contact could not be saved. Please, try again.');
    			}
    		}

            if (empty($this->data))
            {
    			$this->data = $this->Contact->read(null, $id);
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

            if ($this->Contact->delete($id))
            {
    			$this->flashSuccess('Contact deleted', 'index');
    		}

            $this->flashWarning('Contact was not deleted', 'index');
        }
        else
        {
            $this->flashWarningGrowl('You are not authorized to access this page!', 'users', 'login');
        }
	}


	function add()
    {
        if (!empty($this->data))
        {
            $this->Contact->set($this->data);

            if ($this->Contact->validates())
            {
            	if ($this->MathCaptcha->validates($this->data['Contact']['security_code']))
                {
                    if (!$this->Contact->save(Sanitize::paranoid($this->data, array(
                       ' ', '@', '.', ',', ';', '?', '!', ':', '-', '_', '"')), false))
                    {
                        $this->flashWarning('An error occured while saving. Please try again.');
                    }
                    else
                    {
//                        $this->Email->reset();
//
//                        if (Configure::read('debug') > 0)
//                        {
//                        	$this->Email->delivery = 'debug';
//                        }

//                        $this->Email->to = Configure::read('Contact.email');
//                        $this->Email->from = $this->data['Contact']['email'];
//                        $this->Email->replyTo = $this->data['Contact']['email'];
//                        $this->Email->subject = __d('contacts', 'New Contact', true);
//                        $this->Email->template = 'add';
//                        $this->Email->sendAs = 'text';
//                        $this->set('contact', $this->data);
//                        $this->Email->send();
//
                          $this->flashSuccess('Your message was submitted successfully.', 'submit');
            	   }
                }
                else
                {
                    $this->flashWarning('Please enter the correct answer to the math question.');
                }
            }
            else
            {
                $this->flashWarning('Please fill-in the missing fields.');
            }
        }
        $this->set('mathCaptcha', $this->MathCaptcha->generateEquation());
	}


	/**
	 * Create a app/views/plugins/contacts/contacts/thanks.ctp
	 * to customize your thanks page
	 */

	function submit() {}
}
?>