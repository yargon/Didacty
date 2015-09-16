<?php
ini_set('date.timezone', 'Europe/Berlin');
require '../vendor/autoload.php';
require '../app/config.php';
require '../app/tutorial_engine.php';

$content = "";

$parser = new hacker12\tutorial_engine\ParseManifest(); 

$manifest = 'manifest.json';
$parser->manifest = $manifest;
if($parser->loadManifest($manifest))
{
    $version = $parser->getVersion();
    $content .= "Can read manifest.".$version;
}
else
{
    $content .= "Could not read.";
}

$content .= d($parser);

$tutorial = $parser->getTutorial();

if($debug)
{
    $content .= d($tutorial);
}

try 
{
    $ressources = (array) $tutorial['ressources'];
    d($ressource);
    foreach($ressources as $ressource_name => $ressource)
    {
        $parser->registerRessource($ressource);
    }
} 
catch (Exception $e) 
{
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}

// create object
$smarty = new Smarty;

// assign some content. This would typically come from
// a database or other source, but we'll use static
// values for the purpose of this example.
$smarty->assign('title', 'Didacty');
$smarty->assign('content', $content);

// display it
$smarty->display('../app/templates/default.tpl');
?>
