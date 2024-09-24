<?php

class PluginSatisfacaoMailTemplate
{
   public static function satisfacao_mail_template_alter(CommonDBTM $item): CommonDBTM
   {
      if ($item->raiseevent === 'satisfaction') {

         $ticket_id = $item->obj->fields['id'];
         $user_id = null;

         if (isset($item->target) && !empty($item->target) && count($item->target) === 1) {
            foreach ($item->target as $target_info) {
               $user_id = $target_info['users_id'];
               break;
            }
         }

         if (!empty($user_id)) {
            $satisfaction_survey_direct_vote_link = new PluginSatisfacaoSurveyLink(
               $user_id, $ticket_id
            );
            $item->data['##ticket.satisfactionSurvey##'] = self::getSatisfactionSurveySkeleton(
               $satisfaction_survey_direct_vote_link
            );
         }
      }

      return $item;
   }

   /**
    * Retorna o esqueleto HTML da pesquisa de satisfação para email.
    *
    * @param PluginSatisfacaoSurveyLink $satisfaction_survey_direct_vote_link
    * @return string
    */
   private static function getSatisfactionSurveySkeleton(PluginSatisfacaoSurveyLink $satisfaction_survey_direct_vote_link): string
   {
      global $CFG_GLPI;
      $skeleton = '<div class="satisfaction-survey" style="text-align: center;">';
      $skeleton .= '<table cellpadding="0" cellspacing="0" border="0" style="display: inline-block;">';
      $skeleton .= '<tr>';
      for ($number = 1; $number <= 5; $number++) {
         $file_name = $CFG_GLPI['url_base'] . '/plugins/satisfacao/img/' . 'SmileyFace' . $number . '.png';
         $alternative_text = $number . '/5';
         $skeleton .= '<td style="padding-right: 10px;">';
         $skeleton .= '<a href="' . $satisfaction_survey_direct_vote_link->getSatisfactionSurveyLinkForMailTemplate($number) . '">';
         $skeleton .= '<img src="' . $file_name . '" alt="' . $alternative_text . '" width="30">';
         $skeleton .= '</a></td>';
      }
      $skeleton .= '</tr>';
      $skeleton .= '</table>';
      $skeleton .= '</div>';

      return $skeleton;
   }

   /**
    * Codifica a imagem para o email da pesquisa de satisfação.
    *
    * @param string $file_name
    * @return string
    */
   private static function encodeImg(string $file_name): string
   {
      global $CFG_GLPI;

      $path = $CFG_GLPI['url_base'] . '/plugins/satisfacao/img/' . $file_name;
      $type = pathinfo($path, PATHINFO_EXTENSION);
      $data = file_get_contents($path);

      return 'data:image/' . $type . ';base64,' . base64_encode($data);
   }
}
