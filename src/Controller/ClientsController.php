<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * Clients Controller
 *
 * @property \App\Model\Table\ClientsTable $Clients
 * @method \App\Model\Entity\Client[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ClientsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $clients = $this->paginate($this->Clients);
        $this->set(compact('clients'));
    }

    /**
     * View method
     *
     * @param string|null $id Client id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $client = $this->Clients->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('client'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $client = $this->Clients->newEmptyEntity();
        if ($this->request->is('post')) {
            $client = $this->Clients->patchEntity($client, $this->request->getData());
            $id_client = $this->Clients->find()->order('id_client desc')->first();
            $id = ($id_client->id_client) + 1;
            $file = 'client_photo';
            if ($this->request->getData('client_photo')) {
                $imagem = $this->request->getUploadedFile($file);
                if (!$imagem->getError()) {
                    $nome_imagem = $imagem->getClientFileName();
                    $path_info   = pathinfo($nome_imagem);
                    $client[$file] = 'photo' . '_' . $id . '.' . $path_info['extension'];
                    $path_base = WWW_ROOT . "img" . DS . "Clients";
                    $full_path = $path_base . DS . 'Photos' . DS . $client[$file];
                    $imagem->moveTo($full_path);
                }
            }
            if ($this->Clients->save($client)) {
                $this->Flash->success(__('Cliente foi salvo com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Cliente não foi salvo. Por favor, tente novamente.'));
        }
        $this->set(compact('client'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Client id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $client = $this->Clients->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $client = $this->Clients->patchEntity($client, $this->request->getData());
            $file = 'client_photo';
            if ($this->request->getData('client_photo')) {
                $imagem = $this->request->getUploadedFile($file);
                if (!$imagem->getError()) {
                    $nome_imagem = $imagem->getClientFileName();
                    $path_info   = pathinfo($nome_imagem);
                    $client[$file] = 'photo' . '_' . $id . '.' . $path_info['extension'];
                    $path_base = WWW_ROOT . "img" . DS . "Clients";
                    $full_path = $path_base . DS . 'Photos' . DS . $client[$file];
                    $imagem->moveTo($full_path);
                }
            }

            if ($this->Clients->save($client)) {
                $this->Flash->success(__('Cliente foi salvo com sucesso.'));

                return $this->redirect(['action' => 'view',$id]);
            }
            $this->Flash->error(__('Cliente não foi salvo. Por favor, tente novamente.'));
        }
        $this->set(compact('client'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Client id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $client = $this->Clients->get($id);
        if ($this->Clients->delete($client)) {
            $this->Flash->success(__('The client has been deleted.'));
        } else {
            $this->Flash->error(__('The client could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
