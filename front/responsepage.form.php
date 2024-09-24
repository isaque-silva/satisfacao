<?php

include_once("../../../inc/includes.php");

$plugin = new Plugin();
if (!$plugin->isInstalled('satisfacao') || !$plugin->isActivated('satisfacao')) {
   Html::displayNotFoundError();
}

Html::header(__('Pesquisa de satisfação', 'satisfacao'), $_SERVER['PHP_SELF'], "helpdesk");


$object = new PluginSatisfacaoResponsePage();
echo $object->displayPage();
