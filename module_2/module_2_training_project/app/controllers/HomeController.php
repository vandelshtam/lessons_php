<?php

namespace App\controllers;

use PDO;
use Delight\Auth\Auth;
use \DI\ContainerBuilder;
use League\Plates\Engine;
use Aura\SqlQuery\QueryFactory;
use Tamtamchik\SimpleFlash\Flash;



class HomeController{

    private $templates;
    private $queryFactory;
    private $pdo;
    private $auth;
    public $flash;
    public $dispatcher;
    
    
    

    public function __construct(Engine $engine, QueryFactory $queryFactory, PDO $pdo, Auth $auth, Flash $flash)
    {
        $this->auth = $auth;
        $this->templates = $engine;
        $this->queryFactory = $queryFactory;
        $this->pdo = $pdo;
        $this->flash = $flash;
        //$this->auth = new \Delight\Auth\Auth($this->pdo, null, null, false);
        
    }
    public function home(){
        
        
        $select=$this->queryFactory->newSelect();
            $select
            ->cols(['*'])
            ->from('users');
            $sth = $this->pdo->prepare($select->getStatement());
            $sth->execute($select->getBindValues());           
            $users=$sth->fetchAll(PDO::FETCH_ASSOC);
            
            
        echo $this->templates->render('homepage', ['name'=>'All users', 'users' => $users, 's'=>$s]);
        
    }

    public function register(){
        
        echo $this->templates->render('register', ['name' => 'Register user!']);
        
        if(isset($_POST)){

        try {
            $userId = $this->auth->register($_POST['email'],$_POST['password'],$_POST['username'], function ($selector, $token) {
            echo 'Send ' . $selector . ' and ' . $token . ' to the user (e.g. via email)';
            });
            //echo 'We have signed up a new user with the ID ' . $userId;
            flash()->info('We have signed up a new user with the ID ' . $userId);
        }
        catch (\Delight\Auth\InvalidEmailException $e) {
            flash()->error('Invalid email address');
            die();
        }
        catch (\Delight\Auth\InvalidPasswordException $e) {
            flash()->error('Invalid password');
            die();
        }
        catch (\Delight\Auth\UserAlreadyExistsException $e) {
            flash()->error('User already exists');
            die();
        }
        catch (\Delight\Auth\TooManyRequestsException $e) {
            flash()->error('Too many requests');
            die();
        }
        }    
    }

    public function email_verification(){
       
        echo $this->templates->render('email_varification', ['name' => 'User email verification!']);

        if(isset($_POST)){
            try {
            $this->auth->confirmEmail($_POST['code'], $_POST['tokin']);
            flash()->error('Email address has been verified');
            //echo 'Email address has been verified';
        }
        catch (\Delight\Auth\InvalidSelectorTokenPairException $e) {
            flash()->error('Invalid token');
            die();
        }
        catch (\Delight\Auth\TokenExpiredException $e) {
            flash()->error('Token expired');

            die();
        }
        catch (\Delight\Auth\UserAlreadyExistsException $e) {
            flash()->error('Email address already exists');

            die();
        }
        catch (\Delight\Auth\TooManyRequestsException $e) {
            flash()->error('Too many requests');

            die();
        }
        }    
    }

     public function login(){
        echo $this->templates->render('login', ['name' => 'User login!']);   
        
        
        if ( $this->auth -> isLoggedIn ()) {
            echo  'Пользователь вошел в систему' ; 
       } else {
            echo 'Пользователь еще не вошел в систему' ; 
       }
        

        
        //echo $this->templates->render('login', ['name' => 'User login!']);   
    }

    public function page_profile(){
        
        

        $select=$this->queryFactory->newSelect();
            $select
            ->cols(['*'])
            ->from('users')
            ->where('id = :id')
            ->bindValue('id', 9);
            $sth = $this->pdo->prepare($select->getStatement());
            $sth->execute($select->getBindValues());           
            $users=$sth->fetch(PDO::FETCH_ASSOC);
            
 
        echo $this->templates->render('page_profile', ['name'=>'Page profile', 'users' => $users]);
        
    }

    public function edit(){
        $id = \Delight\Cookie\Session::get($id_user);
        d($id);
        
        if(isset($_POST['username']) OR isset($_POST['city']) OR isset($_POST['phone']) OR isset($_POST['occupation'])){
            $username= $_POST['username'];
            $city = $_POST['city'];
            $phone = $_POST['phone'];
            $occupation = $_POST['occupation'];
        
            $update = $this->queryFactory->newUpdate();
            $update->table('users')           
            ->cols([                    
                'username' => $username,
                'city' => $city,
                'phone' => $phone,
                'occupation' => $occupation
            ])
            ->where('id = :id')
            ->bindValue('id', $id);
        
            $sth = $this->pdo->prepare($update->getStatement());   
            $sth->execute($update->getBindValues()); 
            flash()->success('Вы успешно обновили профиль');
        }
        
        echo $this->templates->render('edit', ['name'=>'Edit profile']);
    }

    public function status($vars){
        $id = \Delight\Cookie\Session::get($id_user);
        d($vars['id']);
        d($id);
        d($routeInfo[2]['id']);
        
        $list_statuses=[0 => 'online', 1 => 'walked away', 2 => 'do not disturb'];
        $list_statuses_set=[ 'online' => 0,  'walked away' => 1,  'do not disturb' => 2];
               
        $status_key = $list_statuses_set[$_POST['status']];
                      
        if(isset($_POST['status'])){
                
            $update = $this->queryFactory->newUpdate();
            $update->table('users')           
                ->cols([                    
                    'status' => $status_key
                        
                ])
                ->where('id = :id')
                ->bindValue('id', 9);    
            $sth = $this->pdo->prepare($update->getStatement());   
            $sth->execute($update->getBindValues()); 
            flash()->success('Вы успешно обновили свой статус');    
        }
                                   
        $select=$this->queryFactory->newSelect();
            $select
            ->cols(['*'])
            ->from('users')
            ->where('id = :id')
            ->bindValue('id', $id);
            $sth = $this->pdo->prepare($select->getStatement());
            $sth->execute($select->getBindValues());           
            $statuses=$sth->fetch(PDO::FETCH_ASSOC);
            d($statuses['status']);
               
        echo $this->templates->render('status', ['name'=>'status', 'statuses'=> $statuses, 'list_statuses' => $list_statuses]);

    }

    
    
}
