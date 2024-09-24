<?php

function plugin_version_satisfacao()
{
   return [
      'name' => 'Satisfacao',
      'version' => '1.0.0', 
      'author' => '<a href="http://www.example.com">Isaque Silva</a>',
      'license' => 'GPLv3', 
      'homepage' => 'http://www.example.com/plugin-satisfacao', 
      'requirements' => [
         'glpi' => [
            'min' => '10.0',
         ]
      ]
   ];
}

/**
 * Inicializa os hooks do plugin.
 * OBRIGATÓRIO
 *
 * @return void
 */
function plugin_init_satisfacao()
{
   global $PLUGIN_HOOKS;

   $PLUGIN_HOOKS['csrf_compliant']['satisfacao'] = true;
   $PLUGIN_HOOKS['item_get_datas']['satisfacao'] = [
      'NotificationTargetTicket' => [
         'PluginSatisfacaoMailTemplate',
         'satisfacao_mail_template_alter'
      ]
   ];
}