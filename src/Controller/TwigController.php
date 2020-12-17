<?php
namespace App\Controller;

use App\Controller\AppController;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use App\Model\Entity\Menu;

class TwigController extends AppController
{
    public function index($name){
        //

        $menu = new Menu();
        $menu->name = $name;

        $menu = $menu->find();
        // $this->debugIt($menu);
        $template = $this->fileRender($menu);
        // $this->set(compact('template'));
        return $template;

    }

    public function debugIt($item){

        $this->disableAutoRender();
        debug($item);
    }


    public function fileRender($menu){
        $loader = new FilesystemLoader('webroot/Templates');
        $twig = new Environment($loader, [ 'debug' => true]);
        $twig->addExtension(new \Twig\Extension\DebugExtension());
        return $twig->render('main.html', ['data' => $menu]);
    }
}
