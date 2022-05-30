<?php
while (true) {
    foreach ($events->getItems() as $event) {
        echo $event->getSummary();
    }
    $pageToken = $events->getNextPageToken();
    if ($pageToken) {
        $optParams = array('pageToken' => $pageToken);
        $events = $service->events->listEvents('primary', $optParams);
    } else {
        break;
    }
}
