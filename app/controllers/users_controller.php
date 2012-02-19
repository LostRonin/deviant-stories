<?php

uses('sanitize');
class UsersController extends AppController {

	var $name = 'Users';

    function beforeFilter()
    {
        parent::beforeFilter();

        $this->Auth->autoRedirect = false; /* this allows us to run further checks on login() action.*/
        $this->Auth->allow('login', 'register', 'activate', 'logout');
        $this->Auth->userScope = array('User.is_banned' => 0);
    }


    // Allows a user to sign up for a new account
    function register()
    {
        if (!empty($this->data))
        {
            // Turn the supplied password into the correct Hash.
            // and move into the ‘password’ field so it will get saved.
            $this->data['User']['password'] = $this->Auth->password($this->data['User']['passwrd']);

            $this->User->data = Sanitize::clean($this->data);

            // Successfully created account – send activation email

            if ($this->User->save())
            {
                $this->__sendActivationEmail($this->User->getLastInsertID());

                // this view is not show / listed – use your imagination and inform
                // users that an activation email has been sent out to them.
                $this->flashSuccess('The activation eMail has been sent to you. Please click on the link in your eMail to activate your account. Please note that right now there is no possibility to recover a lost password for you.', 'login');
            }
                // Failed, clear password field
            else
            {
                $this->data['User']['passwrd'] = null;
            }
        }
        $groups = $this->User->Group->find('list');
        $this->set(compact('groups'));
    }


    function activate($user_id = null, $in_hash = null)
    {
        $this->User->id = $user_id;

        if ($this->User->exists() && ($in_hash == $this->User->getActivationHash()))
        {
            if (empty($this->data))
            {
                $this->data = $this->User->read(null, $user_id);
                // Update the active flag in the database
                $this->User->set('active', 1);
                $this->User->save();

                $this->flashSuccess('Your account has been activated, please log in.', 'login');
            }
        }
        $this->flashWarning('Your account could not be activated.', 'register');
       // Activation failed, render '/views/user/activate.ctp' which should tell the user.
    }


    function login()
    {
        // Check for incoming login request.
        if ($this->data)
        {
            // Use the AuthComponent's login action
            if ($this->Auth->login($this->data))
            {
                // Retrieve user data
                $results = $this->User->find(array('User.username' => $this->data['User']['username']), array('User.active'), null, false);
                // Check to see if the User's account isn't active

                if ($results['User']['active'] == 0)
                {
                    // account has not been activated
                    $this->Auth->logout();
                    $this->flashNotice('Hello ' . $this->Session->read('Auth.User.username') . '. Your account has not been activated yet! Please check your mail and activate your account.', 'login');
                }
                    // user is active, redirect post login
                else
                {
                    $this->User->id = $this->Auth->user('id');
                    $this->flashSuccess('Hello ' . $this->Session->read('Auth.User.username') .  '. You have successfully logged in. Please choose your destination on the left menu.');
                    $this->User->saveField('last_login', date('Y-m-d H:i:s') );
                    $this->redirect(array('controller' => 'users', 'action' => 'login'));
                }
            }
            $this->flashWarning('You could not be logged in. Maybe wrong username or password?');
        }
    }



    function logout()
    {
      $this->flashSuccess('Good-Bye, ' . $this->Session->read('Auth.User.username') . '. You have been successfully logged out.');
      $this->Auth->logout();
      $this->redirect(array('controller' => 'users', 'action' => 'login'));
    }


    function __sendActivationEmail($user_id)
    {
        $user = $this->User->find(array('User.id' => $user_id), array('User.email', 'User.username','User.id'), null, false);

        if ($user === false)
        {
            return false;
        }

        // Set data for the "view" of the Email
        $this->set('activate_url', 'http://www.deviant-stories.com/users/activate/' . $user['User']['id'] . '/' . $this->User->getActivationHash());
        $this->set('username', $this->data['User']['username']);

        $this->Email->to = $user['User']['email'];
        //$this->Email->to = '<lostronin@safe-mail.net>';
        $this->Email->subject = 'www.deviant-stories.com - please confirm your email address';
        $this->Email->from = 'Admin <admin@deviant-stories.com>';
        $this->Email->template = 'user_confirm';
        $this->Email->sendAs = 'text';   // you probably want to use both :)
        $this->Email->smtpOptions = array(
            'port'=>'25',
            'host' => 'relay-hosting.secureserver.net');
        $this->Email->delivery = 'smtp';

        return $this->Email->send();
    }


	function index()
    {
        if($this->Auth->user('id') == 1) // identifies if admin logs in
        {
    		$this->layout = 'admin';
            $this->User->recursive = 0;
    		$this->set('users', $this->paginate());
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
            $this->set('user', $this->User->read(null, $id));
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
    			if ($this->User->save($this->data))
                {
    				$this->flashSuccess('The user has been saved', 'index');
    			}
                else
                {
    				$this->flashWarning('The user could not be saved. Please, try again.');
    			}
    		}

            if (empty($this->data))
            {
    			$this->data = $this->User->read(null, $id);
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

            if ($this->User->delete($id))
            {
    			$this->flashSuccess('User deleted', 'index');
    		}
            $this->flashWarning('User was not deleted', 'index');
        }
        else
        {
            $this->flashWarningGrowl('You are not authorized to access this page!', 'users', 'login');
        }
    }

}
?>