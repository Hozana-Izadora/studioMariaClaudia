<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Atendimentos Controller
 *
 * @property \App\Model\Table\AtendimentosTable $Atendimentos
 * @method \App\Model\Entity\Atendimento[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AtendimentosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Agendas', 'Horarios', 'Clients', 'Services'],
        ];
        $atendimentos = $this->paginate($this->Atendimentos);

        $this->set(compact('atendimentos'));
    }

    /**
     * View method
     *
     * @param string|null $id Atendimento id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $atendimento = $this->Atendimentos->get($id, [
            'contain' => ['Agendas', 'Horarios', 'Clients', 'Services'],
        ]);

        $this->set(compact('atendimento'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $atendimento = $this->Atendimentos->newEmptyEntity();
        if ($this->request->is('post')) {
            $atendimento = $this->Atendimentos->patchEntity($atendimento, $this->request->getData());
            if ($this->Atendimentos->save($atendimento)) {
                $this->Flash->success(__('The atendimento has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The atendimento could not be saved. Please, try again.'));
        }
        $agendas = $this->Atendimentos->Agendas->find('list', ['limit' => 200]);
        $horarios = $this->Atendimentos->Horarios->find('list', ['limit' => 200]);
        $clients = $this->Atendimentos->Clients->find('list', ['limit' => 200]);
        $services = $this->Atendimentos->Services->find('list', ['limit' => 200]);
        $this->set(compact('atendimento', 'agendas', 'horarios', 'clients', 'services'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Atendimento id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $atendimento = $this->Atendimentos->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $atendimento = $this->Atendimentos->patchEntity($atendimento, $this->request->getData());
            if ($this->Atendimentos->save($atendimento)) {
                $this->Flash->success(__('The atendimento has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The atendimento could not be saved. Please, try again.'));
        }
        $agendas = $this->Atendimentos->Agendas->find('list', ['limit' => 200]);
        $horarios = $this->Atendimentos->Horarios->find('list', ['limit' => 200]);
        $clients = $this->Atendimentos->Clients->find('list', ['limit' => 200]);
        $services = $this->Atendimentos->Services->find('list', ['limit' => 200]);
        $this->set(compact('atendimento', 'agendas', 'horarios', 'clients', 'services'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Atendimento id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $atendimento = $this->Atendimentos->get($id);
        if ($this->Atendimentos->delete($atendimento)) {
            $this->Flash->success(__('The atendimento has been deleted.'));
        } else {
            $this->Flash->error(__('The atendimento could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
