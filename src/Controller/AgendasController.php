<?php

declare(strict_types=1);

namespace App\Controller;

use Google\Client as Google_Client;
use Google\Service\Calendar as Google_Service_Calendar;

defined('STDIN') or define('STDIN', fopen('php://stdin', 'r'));
/**
 * Agendas Controller
 *
 * @property \App\Model\Table\AgendasTable $Agendas
 * @method \App\Model\Entity\Agenda[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AgendasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    private function getClient()
    {
        $client = new Google_Client();
        $client->setApplicationName("Maria Claudia Studio");
        $client->setAuthConfig('credentials.json');
        $client->setDeveloperKey('AIzaSyBvaEvbrT4Vj5hcx4K--Jy9bnJwOZZY9Q8');
        $client->addScope(Google_Service_Calendar::CALENDAR);
        $client->setRedirectUri('http://' . $_SERVER['HTTP_HOST'] . '/studioMariaClaudia/Agendas/calendar');
        $client->setAccessType('online');        // offline a

        if (!isset($_GET['code'])) {
            $authUrl = $client->createAuthUrl();
            header("Location: " . filter_var($authUrl, FILTER_SANITIZE_URL));
            // printf("Open the following link in your browser:\n%s\n", "<a href='$authUrl'>" . $authUrl . "</a>");
        }

        if ($_SESSION['access_token']) {
            $client->setAccessToken($_SESSION['access_token']);
        } else {
            $accessToken = $client->fetchAccessTokenWithAuthCode($_GET['code']);
            $client->setAccessToken($accessToken);
            $_SESSION['access_token'] = $client->getAccessToken();
        }

        if ($client->isAccessTokenExpired()) {
            $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
        }
        return $client;
    }
    public function calendar()
    {
        /**
         * Returns an authorized API client.
         * @return Google_Client the authorized client object
         */

        $client = $this->getClient();

        $calId = 'izadoraferreir@google.com';
        $service = new Google_Service_Calendar($client);
        $events = $service->events->listEvents('izadoraferreir@gmail.com'); //tc2m2ackan7nh88mkpl278mjc8
        $calendarList = $service->calendarList->listCalendarList();
        $calendar = $service->calendars->get('izadoraferreir@gmail.com');
        $acl = $service->acl->listAcl('primary');
        $event = $service->events->get('primary', "tc2m2ackan7nh88mkpl278mjc8");

        debug($event);
        exit;
        $this->set(compact('events'));
    }

    public function index()
    {
        $agendas = $this->paginate($this->Agendas);

        $this->set(compact('agendas'));
    }

    /**
     * View method
     *
     * @param string|null $id Agenda id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $agenda = $this->Agendas->get($id, [
            'contain' => ['Atendimentos', 'Horarios'],
        ]);

        $this->set(compact('agenda'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $agenda = $this->Agendas->newEmptyEntity();
        if ($this->request->is('post')) {
            $agenda = $this->Agendas->patchEntity($agenda, $this->request->getData());
            if ($this->Agendas->save($agenda)) {
                $this->Flash->success(__('The agenda has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The agenda could not be saved. Please, try again.'));
        }
        $this->set(compact('agenda'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Agenda id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $agenda = $this->Agendas->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $agenda = $this->Agendas->patchEntity($agenda, $this->request->getData());
            if ($this->Agendas->save($agenda)) {
                $this->Flash->success(__('The agenda has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The agenda could not be saved. Please, try again.'));
        }
        $this->set(compact('agenda'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Agenda id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $agenda = $this->Agendas->get($id);
        if ($this->Agendas->delete($agenda)) {
            $this->Flash->success(__('The agenda has been deleted.'));
        } else {
            $this->Flash->error(__('The agenda could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
