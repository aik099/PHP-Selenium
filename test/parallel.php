<?php
require_once __DIR__.'/../autoload.php';

$client  = new Selenium\Client('localhost', 4444);
$browser = $client->getBrowser('http://alexandre-salome.fr');
$browserB = $client->getBrowser('http://alexandre-salome.fr');

// Starts the browser
$browser->start();
$browserB->start();

$browser
    ->open('/')
    ->click(Selenium\Locator::linkContaining('Blog'))
;

$browserB
    ->open('/')
    ->click(Selenium\Locator::linkContaining('Contact'))
;

$browser->waitForPageToLoad(10000);
$browserB->waitForPageToLoad(10000);

$titleA = $browser->getTitle();
$titleB = $browserB->getTitle();

// Stops the browser
$browser->stop();
$browserB->stop();

echo "Page A title: ".$titleA."\n";
echo "Page B title: ".$titleB."\n";
