<?php

namespace App\Controller;
use Cake\Http\Exception\NotFoundException;
use Cake\ORM\TableRegistry;


class ArticlesController extends AppController
{

    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('Paginator');
        $this->loadComponent('Flash'); // Include the FlashComponent
        $this->Auth->allow(['categories']);
    }

    public function index()
    {
        $articles = $this->Articles->find('all')->order(['created'=>'DESC']);
        $this->set(compact('articles'));

    }

    public function admin()
    {   
        $this->viewBuilder()->setLayout('ajax');
        $articles = $this->Articles->find('all');
        $this->set(compact('articles'));
        
    }

    public function view($id = null)
    {
        $article = $this->Articles->get($id);
        $this->set(compact('article'));

        $cat_id = $article->category_id;
        $this->set(compact('cat_id'));

        $categories = TableRegistry::getTableLocator()->get('Categories');
        $query = $categories->get($cat_id);
        $this->set(compact('query'));
        $this->set(compact('categories'));

        $parent_id = $query->parent_id;
        $query2 = $categories->get($parent_id);
        $this->set(compact('query2'));


        $comments = TableRegistry::getTableLocator()->get('Comments')->find();
        $this->set(compact('comments'));
        $com = $comments->find('all')->where(['post_id' => $id]);
        $this->set(compact('com'));


  }
    

    public function add()
    {   
        $article = $this->Articles->newEntity();
        if ($this->request->is('post')) {
            $imageFileName='0.png';
            if(!empty($this->request->getData('photo'))){
                $file = $this->request->getData('photo');
                $ext = substr(strtolower(strrchr($file['name'],'.')),1);
                $arr_ext = array('jpg', 'jpeg', 'gif', 'png'); 
                date_default_timezone_set("America/Santiago"); 
                $setNewFileName = date("Ymdhis"); //Define la fecha actual
                if (in_array($ext, $arr_ext)) {
                    move_uploaded_file($file['tmp_name'], WWW_ROOT . '/img/' . $setNewFileName . '.' . $ext);
                    $imageFileName = $setNewFileName . '.' . $ext;
                }
            }
            $article = $this->Articles->patchEntity($article, $this->request->getData());
            if (!empty($this->request->getData('photo'))) {
                $article->photo = $imageFileName;
            }

            $article = $this->Articles->patchEntity($article, $this->request->getData());
            if (!empty($this->request->getData('photo'))) {
                //Se asigna el nombre de la imagen al objeto
                $article->photo = $imageFileName;
            }
            $article->user_id = $this->Auth->user('id');
            $article->creator = $this->Auth->user('username');
            if ($this->Articles->save($article)) {
                $this->Flash->success(__('El articulo ha sido creado correctamente.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Ha ocurrido un error.'));
        }
        $this->set('article', $article);


        $categories = $this->Articles->Categories->find('treeList');
        $this->set(compact('categories'));
    }

    public function edit($id = null)
    {

    $this->viewBuilder()->setLayout('ajax');
    $article = $this->Articles->get($id);
    
    $imageFileName=$article->photo;

    if ($this->request->is(['post', 'put'])) {
        if(!empty($this->request->getData('photo'))){
            $file = $this->request->getData('photo');
            $ext = substr(strtolower(strrchr($file['name'],'.')),1);
            $arr_ext = array('jpg', 'jpeg', 'gif', 'png'); 
            date_default_timezone_set("America/Santiago"); 
            $setNewFileName = date("Ymdhis"); //Define la fecha actual
            if (in_array($ext, $arr_ext)) {
                move_uploaded_file($file['tmp_name'], WWW_ROOT . '/img/' . $setNewFileName . '.' . $ext);
                $imageFileName = $setNewFileName . '.' . $ext;
            }
        }
        if (!empty($this->request->getData('photo'))) {
            $article->photo = $imageFileName;
        }

        $this->Articles->patchEntity($article, $this->request->getData(), [
            'accessibleFields' => ['user_id' => false]
        ]);
        if (!empty($this->request->getData('photo'))) {
            //Se asigna el nombre de la imagen al objeto
            $article->photo = $imageFileName;
        }
        if ($this->Articles->save($article)) {
            $this->Flash->success(__('Tu artículo ha sido actualizado.'));
            return $this->redirect(['action' => 'admin']);
        }
        $this->Flash->error(__('Tu artículo no se ha podido actualizar.'));
    }

    $this->set('article', $article);
    $categories = $this->Articles->Categories->find('treeList');
    $this->set(compact('categories'));
    }

    public function delete($id)
    {
    $this->request->allowMethod(['post', 'delete']);

    $article = $this->Articles->get($id);
    if ($this->Articles->delete($article)) {
        $this->Flash->success(__('El artículo ha sido eliminado exitosamente.'));
        return $this->redirect(['action' => 'admin']);
    }
    }
    

    

    public function isAuthorized($user)
{
    // All registered users can add articles
    if ($this->request->getParam('action') === 'add') {
        return true;
    }


    return parent::isAuthorized($user);
}

}