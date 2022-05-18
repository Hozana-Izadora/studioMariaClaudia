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
    // private function getClient()
    // {
    //     $client = new Google_Client();
    //     $client->setApplicationName('Google Calendar API PHP Quickstart');
    //     $client->setScopes(Google_Service_Calendar::CALENDAR_READONLY);
    //     $client->setAuthConfig(WWW_ROOT . 'credentials.json');
    //     $client->setRedirectUri('http://' . $_SERVER['HTTP_HOST'] . '/oauth2callback.php');
    //     $client->setAccessType('offline');
    //     $client->setPrompt('select_account consent');

    //     // Load previously authorized token from a file, if it exists.
    //     // The file token.json stores the user's access and refresh tokens, and is
    //     // created automatically when the authorization flow completes for the first
    //     // time.
    //     $tokenPath = 'token.json';
    //     if (file_exists($tokenPath)) {
    //         $accessToken = json_decode(file_get_contents($tokenPath), true);
    //         $client->setAccessToken($accessToken);
    //     }

    //     // If there is no previous token or it's expired.
    //     if ($client->isAccessTokenExpired()) {
    //         // Refresh the token if possible, else fetch a new one.
    //         if ($client->getRefreshToken()) {
    //             $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
    //         } else {
    //             // Request authorization from the user.
    //             $authUrl = $client->createAuthUrl();
    //             printf("Open the following link in your browser:\n%s\n", $authUrl);
    //             print 'Enter verification code: ';

    //             $authCode = trim(fgets(STDIN));

    //             // Exchange authorization code for an access token.
    //             $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);
    //             $client->setAccessToken($accessToken);

    //             // Check to see if there was an error.
    //             if (array_key_exists('error', $accessToken)) {
    //                 throw new Exception(join(', ', $accessToken));
    //             }
    //         }
    //         // Save the token to a file.
    //         if (!file_exists(dirname($tokenPath))) {
    //             mkdir(dirname($tokenPath), 0700, true);
    //         }
    //         file_put_contents($tokenPath, json_encode($client->getAccessToken()));
    //     }
    //     return $client;
    // }
    public function oauth2callback()
    {
        // session_start();

        $client = new Google_Client();
        $client->setAuthConfig('credentials.json');
        $client->setRedirectUri('http://' . $_SERVER['HTTP_HOST'] . '/oauth2callback.php');
        $client->addScope(Google_Service_Calendar::CALENDAR_READONLY);

        if (!isset($_GET['code'])) {
            $auth_url = $client->createAuthUrl();
            header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
        } else {
            $client->fetchAccessTokenWithAuthCode($_GET['code']);
            $_SESSION['access_token'] = $client->getAccessToken();
            $redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . '/';
            header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
        }
    }
    private function getClient()
    {
        $client = new Google_Client();
        $client->setApplicationName("Maria Claudia Studio");
        $client->setAuthConfig('credentials.json');
        $client->setDeveloperKey('AIzaSyBvaEvbrT4Vj5hcx4K--Jy9bnJwOZZY9Q8');
        $client->addScope(Google_Service_Calendar::CALENDAR_READONLY);
        // $client->setScopes('email');
        $client->setRedirectUri('http://' . $_SERVER['HTTP_HOST'] . '/oauth2callback.php');
        $client->setLoginHint('izadoraferreir@google.com');
        $client->setAccessType('offline');        // offline access
        $client->setIncludeGrantedScopes(true); //
        $client->setPrompt('select_account consent');
        if (!isset($_GET['code'])) {
            $auth_url = $client->createAuthUrl();
            header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
        } else {
            $client->fetchAccessTokenWithAuthCode($_GET['code']);
            $_SESSION['access_token'] = $client->getAccessToken();
            $redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . '/';
            header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
        }
        return $client;
    }
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
        $service = new Google_Service_Calendar($client);
        debug($service->events->listEvents('primary'));
        exit;
        // $auth_url = $client->createAuthUrl();

        // Print the next 10 events on the user's calendar.
        // $calendarId = 'primary';
        // $optParams = array(
        //     'maxResults' => 10,
        //     'orderBy' => 'startTime',
        //     'singleEvents' => true,
        //     'timeMin' => date('c'),
        // );
        // $results = $service->events->listEvents($calendarId, $optParams);

        // $events = $results->getItems();
        // if (empty($events)) {
        //     print "No upcoming events found.\n";
        // } else {
        //     print "Upcoming events:\n";
        //     foreach ($events as $event) {
        //         $start = $event->start->dateTime;
        //         if (empty($start)) {
        //             $start = $event->start->date;
        //         }
        //         printf("%s (%s)\n", $event->getSummary(), $start);
        //     }
        // }
        $this->set(compact('service'));
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
