<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\EventInterface;
class IndexController extends AppController
{

    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);



    }
    public function index(){
        $this->disableAutoRender();
    }


    public function theProject(){

    }

        public function home(string ...$path): ?Response
    {

        $this->viewBuilder()->setTemplate('home');


         return null;

    }
}
