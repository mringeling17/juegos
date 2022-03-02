<?php

namespace App\Controller;
class CategoriesController extends AppController
{

    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('Paginator');
        $this->loadComponent('Flash'); // Include the FlashComponent
        $this->Auth->allow(['index', 'view', 'related']);
    }

        public function index()
    {
        $this->set('categories', $this->Categories->find('all'));
    }

    
    public function view($id = null)
    {
        $category = $this->Categories->get($id, [
            'contain' => ['ParentCategories', 'Articles', 'ChildCategories'],
        ]);

        $this->set(compact('category'));
    }


    public function related($id = null){

        $this->Auth->allow(['display']);

        $category = $this->Categories->get($id, [
            'contain' => ['ParentCategories', 'Articles', 'ChildCategories'],
        ]);

        $this->set(compact('category'));
    }

    public function move_up($id = null)
    {
        $this->request->allowMethod(['post', 'put']);
        $category = $this->Categories->get($id);
        if ($this->Categories->moveUp($category)) {
            $this->Flash->success('The category has been moved Up.');
        } else {
            $this->Flash->error('The category could not be moved up. Please, try again.');
        }
        return $this->redirect($this->referer(['action' => 'index']));
    }

    public function move_down($id = null)
    {
        $this->request->allowMethod(['post', 'put']);
        $category = $this->Categories->get($id);
        if ($this->Categories->moveDown($category)) {
            $this->Flash->success('The category has been moved down.');
        } else {
            $this->Flash->error('The category could not be moved down. Please, try again.');
        }
        return $this->redirect($this->referer(['action' => 'index']));
    }

    public function add()
    {
        $this->viewBuilder()->setLayout('ajax');
        $category = $this->Categories->newEntity();
        if ($this->request->is('post')) {
            $category = $this->Categories->patchEntity($category, $this->request->getData());
            if ($this->Categories->save($category)) {
                $this->Flash->success(__('La categoria ha sido actualizada con exito.'));

                return $this->redirect(['action' => 'admin']);
            }
            $this->Flash->error(__('Ocurrio un error inesperado, intente otra vez.'));
        }
        $parentCategories = $this->Categories->ParentCategories->find('list', ['limit' => 200])->all();
        $this->set(compact('category', 'parentCategories'));
    }

    public function edit($id = null)
    {
        $this->viewBuilder()->setLayout('ajax');
        $category = $this->Categories->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $category = $this->Categories->patchEntity($category, $this->request->getData());
            if ($this->Categories->save($category)) {
                $this->Flash->success(__('La categoria ha sido actualizada con exito.'));

                return $this->redirect(['action' => 'admin']);
            }
            $this->Flash->error(__('Ocurrio un error inesperado, intente otra vez.'));
        }
        $parentCategories = $this->Categories->ParentCategories->find('list', ['limit' => 200])->all();
        $this->set(compact('category', 'parentCategories'));
    }


    public function isAuthorized($user)
    {
        if ($this->request->getParam('action') === 'index, view, related') {
            return true;
        }
    
    
        return parent::isAuthorized($user);
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $category = $this->Categories->get($id);
        if ($this->Categories->delete($category)) {
            $this->Flash->success(__('La categoria ha sido eliminada correctamente.'));
        } else {
            $this->Flash->error(__('Ha ocurrido un error inesperado.'));
        }

        return $this->redirect(['action' => 'admin']);
    }

    


    

    public function admin(){
        $this->viewBuilder()->setLayout('ajax');
        $this->set('categories', $this->Categories->find('all'));

    }


}