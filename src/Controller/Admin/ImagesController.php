<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;
use \Verot\Upload;
use Cake\Datasource\ConnectionManager;
/**
 * Users Controller
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ImagesController extends AppController
{

    function upload($file){
        $dir = "webroot/uploaded_files";
        $newFile = explode('.', $file['name']);
        $extension = end($newFile);
        $newName = date('ms') . $this->clean($newFile[0]) .".". $extension;
        // Move o arquivo da pasta temporaria de upload para a pasta de destino
        if (move_uploaded_file($file["tmp_name"], "$dir/".$newName)) {
            $this->saveImage($newName);
            return $this->getImage($newName);
        }
        else {
            echo "Erro, o arquivo n&atilde;o pode ser enviado.";
        }
    }


    function removeImageFromPage($imageId, $pageId){
        $this->disableAutoRender();

        $conn = ConnectionManager::get('default');
        $conn->execute("DELETE FROM pages_images WHERE page_id = $pageId AND image_id = $imageId");

        echo json_encode(true);
    }

    function saveImage($name){
        $conn = ConnectionManager::get('default');
        $conn->execute("INSERT INTO images (name, url) VALUES('$name', '$name')");


    }
    function getImage($name){
        $conn = ConnectionManager::get('default');
        return $conn->execute("SELECT * FROM images WHERE name = '$name'")->fetchAll('assoc');
    }


}
