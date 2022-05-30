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
        // $client->setScopes('email');
        $client->setRedirectUri('http://' . $_SERVER['HTTP_HOST'] . '/studioMariaClaudia/Agendas/calendar');
        // $client->setLoginHint('izadoraferreir@google.com');
        $client->setAccessType('online');        // offline access
        // $client->setIncludeGrantedScopes(true); //
        // $client->setPrompt('select_account consent');
        if(isset($_GET['code'])){
            $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
            $client->setAccessToken($token);

            $_SESSION['access_token'] = $token;
        }
        debug($client->getAccessToken());exit;
        $authUrl = $client->createAuthUrl();
        printf("Open the following link in your browser:\n%s\n", "<a href='$authUrl'>" . $authUrl . "</a>");
        $authCode = $_GET['code']; // <--- Appears to be the problem
        $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);
        $client->setAccessToken($accessToken);
        if ($client->isAccessTokenExpired()) {
            $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
        }
    return $client;
    }
    // private function getClient()
    // {
    //     $client = new Google_Client();
    //     $client->setApplicationName("Maria Claudia Studio");
    //     $client->setAuthConfig('credentials.json');
    //     $client->setDeveloperKey('AIzaSyBvaEvbrT4Vj5hcx4K--Jy9bnJwOZZY9Q8');
    //     $client->addScope(Google_Service_Calendar::CALENDAR_READONLY);
    //     // $client->setScopes('email');
    //     $client->setRedirectUri('http://' . $_SERVER['HTTP_HOST'] . '/studioMariaClaudia/Agendas/calendar');
    //     $client->setLoginHint('izadoraferreir@google.com');
    //     $client->setAccessType('online');        // offline access
    //     $client->setIncludeGrantedScopes(true); //
    //     $client->setPrompt('select_account consent');

    //     // If there is no previous token or it's expired.
    //     if ($client->isAccessTokenExpired()) {
    //         // Refresh the token if possible, else fetch a new one.
    //         if ($client->getRefreshToken()) {
    //             $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
    //         } else {
    //             // Request authorization from the user.
    //             $authUrl = $client->createAuthUrl();
    //             header('Location: ' . filter_var($authUrl, FILTER_SANITIZE_URL));
    //         }
    //         //  else {
    //         //     $client->fetchAccessTokenWithAuthCode($_GET['code']);
    //         //     $_SESSION['access_token'] = $client->getAccessToken();
    //         //     $redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . '/studioMariaClaudia/Agendas/index';
    //         //     header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
    //         // }
    //     }
    //     // return $client;
    //     $service = new Google_Service_Calendar($client);
    //     return $service;
    // }
    public function calendar()
    {
        /**
         * Returns an authorized API client.
         * @return Google_Client the authorized client object
         */

        // Get the API client and construct the service object.
        $client = $this->getClient();
        debug($client);
        exit;
        $calId = 'izadoraferreir@google.com';
        $service = new Google_Service_Calendar($client);
        $events = $service->events->listEvents('izadoraferreir@gmail.com'); //tc2m2ackan7nh88mkpl278mjc8
        $calendarList = $service->calendarList->listCalendarList();
        $calendar = $service->calendars->get('izadoraferreir@gmail.com');
        $acl = $service->acl->listAcl('primary');
        $event = $service->events->get('primary', "tc2m2ackan7nh88mkpl278mjc8");

        debug($event->start);


        // debug($calendarList);
        exit;
        $this->set(compact('events'));
        // $results = $service->events->listEvents($calId);
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
