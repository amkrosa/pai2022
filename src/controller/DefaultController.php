<?php

require_once 'AppController.php';

class DefaultController extends AppController
{

    public function index()
    {
        $this->render('landing_page');
    }

    public function abc()
    {
        $this->render('abc');
    }

    public function login()
    {
        $this->render('login');
    }

    public function modal()
    {
        $this->render('modal');
    }
}