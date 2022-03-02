<?php

namespace App\Controller;
use Cake\Http\Exception\NotFoundException;
use Cake\ORM\TableRegistry;


class CommentsController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('Paginator');
        $this->loadComponent('Flash'); // Include the FlashComponent
    }

    public function list($id){
        $this->viewBuilder()->setLayout('ajax');
        $comments = $this->Comments->find('all');
        $this->set(compact('comments'));
        $this->set(compact('id'));
    }
    public function delete($id)
    {
    $this->request->allowMethod(['post', 'delete']);

    $com = $this->Comments->get($id);
    if ($this->Comments->delete($com)) {
        $this->Flash->success(__('El comentario ha sido eliminado exitosamente.'));
        return $this->redirect(['action' => '../articles/admin']);
    }
    }

    public function addcomment($post_id)
    {
        $this->viewBuilder()->setLayout('commentdefault');

        $comment = $this->Comments->newEntity();
        $comment->user_id = $this->Auth->user('id');
        $comment->post_id = $post_id;
        if ($this->request->is('post')) {
            $comment = $this->Comments->patchEntity($comment, $this->request->getData());
            if ($this->Comments->save($comment)) {

                $this->Flash->success(__('El Comentario se ha hecho correctamente correctamente.'));
                echo "<script>window.close();</script>";
            }
            $this->Flash->error(__('Ha ocurrido un error.'));
        }
        $this->set(compact('comment'));

    }

    public function isAuthorized($user)
    {
        // All registered users can add articles
        if ($this->request->getParam('action') === 'addcomment') {
            return true;
        }
    
    
        return parent::isAuthorized($user);
    }



}