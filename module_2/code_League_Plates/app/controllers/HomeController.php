<?php
namespace App\controllers;

use PDO;
use Exception;
use SimpleMail;
use Faker\Factory;
use App\QueryBuilder;
use Delight\Auth\Auth;
use League\Plates\Engine;
use JasonGrimes\Paginator;
use Aura\SqlQuery\QueryFactory;
use App\exceptions\NotEnoughMoneyException;
use App\exceptions\AccountIsBlockedException;
use Delight\Db\Database;

class HomeController{

    private $templates;
    private $auth;
    private $qb;
    private $queryFactory;
    private $pdo;
    
    
    
    

    public function __construct(QueryBuilder $qb)
    {
        $this->qb = $qb;
        //$this->auth = $auth;
        $this->templates = new Engine('../app/views');
        $this->pdo = new PDO("mysql:host=localhost:8889; dbname=app3; charset=utf8;","root","root");
        $this->auth = new \Delight\Auth\Auth($this->pdo, null, null, false);
        $this->queryFactory =  new QueryFactory('mysql');
        $this->faker = Factory :: create ();

        
    }
    public function index(){

        try {
            if ($this->auth->admin()->doesUserHaveRole(8, \Delight\Auth\Role::ADMIN)) {
                echo 'The specified user is an administrator';
            }
            else {
                echo 'The specified user is not an administrator';
            }
        }
        catch (\Delight\Auth\UnknownIdException $e) {
            die('Unknown user ID');
        }

    
        if ($this->auth->isLoggedIn()) {
            
            flash()->error('User is signed in');
        }
        else {
            
            flash()->error('User is not signed in yet');
        }
        
        $posts = $this->qb->getAll('posts');
        echo $this->templates->render('homepage', ['name'=>'User', 'posts' => $posts]);
        
    }
    public function about(){
        if(isset($_GET['vars'])){
            $vars=$_GET['vars'];
        }
        else{
            $vars=1;
        }
        
        try {
            
            $this->withdraw($vars);
        }catch (NotEnoughMoneyException $exception){
            
            flash()->error("Ваш баланс меньше чем" .$vars .'$');
        }catch (AccountIsBlockedException $exception){
            flash()->error($exception->getMessage());
        }
        echo $this->templates->render('about', ['name' => 'Jonathan about php']);
        
        
    }
    public function withdraw($amount){
        $total = 10;
        $total_hight = 100;
        if( $amount > $total && $amount < $total_hight){
            throw new NotEnoughMoneyException ("Not enough money!");
        }
        if($amount == 100){
            throw new AccountIsBlockedException ("Your account is blocked!");
        }
    }

    
    public function register(){
        
        echo $this->templates->render('register', ['name' => 'User!']);
        
        if(isset($_POST)){
            try {
            $userId = $this->auth->register($_POST['email'],$_POST['password'],$_POST['username'], function ($selector, $token) {
                echo 'Send ' . $selector . ' and ' . $token . ' to the user (e.g. via email)';
            });
            echo 'We have signed up a new user with the ID ' . $userId;
            flash()->error('We have signed up a new user with the ID ' . $userId);
        }
        catch (\Delight\Auth\InvalidEmailException $e) {
            flash()->error('Invalid email address');
            die('Invalid email address');
        }
        catch (\Delight\Auth\InvalidPasswordException $e) {
            flash()->error('Invalid password');
            die('Invalid password');
        }
        catch (\Delight\Auth\UserAlreadyExistsException $e) {
            die('User already exists');
        }
        catch (\Delight\Auth\TooManyRequestsException $e) {
            flash()->error('Too many requests');
            die('Too many requests');
        }
        }
        
        
    }
     public function email_verification(){
       
        echo $this->templates->render('register', ['name' => 'User email verification!']);

        try {
            $this->auth->confirmEmail('xgfCOlkX9ihRzuhW', 'KjD4J-68-ak7tKou');
            flash()->error('Email address has been verified');
            echo 'Email address has been verified';
        }
        catch (\Delight\Auth\InvalidSelectorTokenPairException $e) {
            flash()->error('Invalid token');
            die('Invalid token');
        }
        catch (\Delight\Auth\TokenExpiredException $e) {
            flash()->error('Token expired');

            die('Token expired');
        }
        catch (\Delight\Auth\UserAlreadyExistsException $e) {
            flash()->error('Email address already exists');

            die('Email address already exists');
        }
        catch (\Delight\Auth\TooManyRequestsException $e) {
            flash()->error('Too many requests');

            die('Too many requests');
        }
     }

     public function login(){

        echo $this->templates->render('login', ['name' => 'User login!']);

         if(isset($_POST)){
             try {
            $this->auth->login($_POST['email'], $_POST['password']);
            flash()->success('User is logged in');
            echo 'User is logged in';
        }
        catch (\Delight\Auth\InvalidEmailException $e) {
            
            die(flash()->error('Wrong email address'));
        }
        catch (\Delight\Auth\InvalidPasswordException $e) {
            flash()->error('Wrong password');
            die('Wrong password');
        }
        catch (\Delight\Auth\EmailNotVerifiedException $e) {
            flash()->error('Email not verified');
            die('Email not verified');
        }
        catch (\Delight\Auth\TooManyRequestsException $e) {
            flash()->success('Email not verified');
            die(flash()->error('Too many requests'));
            
        }
        }
        
     }

     public function logout(){

        echo $this->templates->render('homepage', ['name' => 'User logout']);
        
        try {
            $this->auth->logOutEverywhereElse();
        }
        catch (\Delight\Auth\NotLoggedInException $e) {
            die(flash()->success('Not logged in'));
        }
     }

     public function mail(){
        $mailer = new SimpleMail();
        SimpleMail :: make () 
        -> setTo ( 'cee71195d6-2d2352
        @
        inbox.mailtrap.io' , 'vandelshtam' ) 
        -> setFrom ( 'me@example.com' , 'Admin' ) 
        -> setSubject ( 'send mail' ) 
        -> setMessage ( 'test mail' ) 
        -> send ();
        d(SimpleMail :: make () );
        echo $this->templates->render('mail', ['name' => 'User mail']);
     }

     

     public function insert() {
        
        $insert=$this->queryFactory->newInsert();
        $insert->into('posts');
        for($i=0; $i<30; $i++) {
            $this->qb->insert(['title' => $this->faker->words(3,true)],'posts');
            $insert->addRow();     
        }
           
        $posts = $this->qb->getAll('posts');
        echo $this->templates->render('faker', ['name'=>'User', 'posts' => $posts]);
        }

        public function paginator(){
   
            $select=$this->queryFactory->newSelect();
            $select
            ->cols(['*'])
            ->from('posts')
            ->setPaging(3)
            ->page($_GET['page'] ?? 1);


            
            //3 поста
            $sth = $this->pdo->prepare($select->getStatement());
            $sth->execute($select->getBindValues());
            $items = $sth->fetchAll(PDO::FETCH_ASSOC);

            // все посты
            $selector=$this->queryFactory->newSelect();
            $selector
            ->cols(['*'])
            ->from('posts');
            $sth = $this->pdo->prepare($selector->getStatement());

           
            $sth->execute($selector->getBindValues());           
            $totalItems=$sth->fetchAll(PDO::FETCH_ASSOC);
            d($totalItems);


            $itemsPerPage = 3;
            $currentPage = $_GET['page'] ?? 1;
            $urlPattern = '?page=(:num)';
            $paginator = new Paginator(count($totalItems), $itemsPerPage, $currentPage, $urlPattern);
            
            echo $this->templates->render('paginator', 
            ['name'=>'User Paginator', 'totalItems'=>$totalItems, 
             'itemsPerPage'=>$itemsPerPage,
             'items' => $items,
             'currentPage'=>$currentPage,
             'urlPattern'=>$urlPattern,
             'paginator' => $paginator]);

        }
}
