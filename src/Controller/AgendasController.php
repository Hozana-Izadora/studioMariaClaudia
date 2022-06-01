<?php

declare(strict_types=1);

namespace App\Controller;

use Google\Client as Google_Client;
use Google\Service\Calendar as Google_Service_Calendar;
use Google\Service\Calendar\Event as Google_Service_Calendar_Event;

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

        if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
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

        // $newEvent = $this->create($service);
        $listEvents = $this->importEvents($service);
        debug($listEvents);exit;
        // $this->set(compact('events'));
    }
    public function list($service){
        $events = $service->events->listEvents('primary');

        return $events->getItems();
    }
    public function create($service){
        
        $newEvent =  array(
            'summary' => 'Google I/O 2015',
            'location' => '800 Howard St., San Francisco, CA 94103',
            'description' => 'A chance to hear more about Google\'s developer products.',
            'start' => array(
              'dateTime' => '2022-05-31T09:00:00-07:00',
              'timeZone' => 'America/Los_Angeles',
            ),
            'end' => array(
              'dateTime' => '2022-05-31T09:00:00-07:00',
              'timeZone' => 'America/Los_Angeles',
            ),
            'recurrence' => array(
              'RRULE:FREQ=DAILY;COUNT=2'
            ),
            'attendees' => array(
              array('email' => 'lpage@example.com'),
              array('email' => 'sbrin@example.com'),
            ),
            'reminders' => array(
              'useDefault' => FALSE,
              'overrides' => array(
                array('method' => 'email', 'minutes' => 24 * 60),
                array('method' => 'popup', 'minutes' => 10),
              ),
            ),
        );
          $event = new Google_Service_Calendar_Event($newEvent);
          
          $calendarId = 'primary';
          $event = $service->events->insert($calendarId, $event);
          return printf('Event created: %s\n', $event->htmlLink);
          
    }
    public function importEvents($service){
        $this->loadModel('Events');
        $events = $this->Agendas->newEmptyEntity();

        $listEvents = $this->list($service);
        foreach($listEvents as $key=>$event){
            $arrayEvents = array(
                'summary' => $event->getSummary(),
                'colorId' => $event->getColorId(),
                'description' => $event->getDescription(),
                'htmlLink' => $event->getHtmlLink(),
                'location' => $event->getLocation(),
                // 'date' ,
                'time_start'=> $event->getStart()->dateTime,
                'time_end'=> $event->getEnd()->dateTime,
                'google_calendar_event_id'=> $event->getId(),
            );
        }
        $events = $this->Events->patchEntity($events, $arrayEvents);
        debug($this->Events->save($events));
        if ($this->Events->save($events)) {
           return $this->Flash->success(__('Eventos importados com sucesso!.'));

        }
       return $this->Flash->error(__('Os eventos não foram importados. Por favor, tente novamente.'));

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