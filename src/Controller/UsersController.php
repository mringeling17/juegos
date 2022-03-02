<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
// Prior to 3.6 use Cake\Network\Exception\NotFoundException
use Cake\Http\Exception\NotFoundException;
/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{



    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['add', 'logout']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        return $this->redirect(['controller' => 'Articles', 'action' => 'index']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->viewBuilder()->setLayout('ajax');
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */

    public function login()
{
     if ($this->request->is('post')) {
        $user = $this->Auth->identify();
        if ($user) {
            $this->Auth->setUser($user);
            return $this->redirect($this->Auth->redirectUrl());
        }
        $this->Flash->error('Your username or password is incorrect.');
    
    }
}
    
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {

                $this->Flash->success(__('El usuario ha sido registrado correctamente.'));
                return $this->redirect(['controller' => 'Articles', 'action' => 'index']);
            }
            $this->Flash->error(__('Ha ocurrido un error.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->setLayout('ajax');
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);

        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('La informacion del usuario ha sido actualizada exitosamente.'));

                return $this->redirect(['action' => 'admin']);
            }
            $this->Flash->error(__('Ocurrio un error inesperado, intente otra vez.'));
        }
        $this->set(compact('user'));
    }

    public function change($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Su usuario ha sido actualizado exitosamente'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Ocurrio un error inesperado, intente otra vez.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('El usuario ha sido eliminado de la base de datos.'));
        } else {
            $this->Flash->error(__('Ocurrio un error inesperado, intente otra vez.'));
        }

        return $this->redirect(['action' => 'admin']);
    }


    public function logout()
{   
    $this->Flash->success(__('Ha cerrado sesion exitosamente'));
    return $this->redirect($this->Auth->logout());
    


}

    public function admin()
{   
    $this->viewBuilder()->setLayout('ajax');
    $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    
}

public function isAuthorized($user)
{
    if ($this->request->getParam('action') === 'change') {
        return true;
    }


    return parent::isAuthorized($user);
}

}
