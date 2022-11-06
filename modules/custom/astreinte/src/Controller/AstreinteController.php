<?php
namespace Drupal\astreinte\Controller;

use StringTranslationTrait;
use Drupal\Core\Controller\ControllerBase;

class AstreinteController extends ControllerBase
{
    public function Start()
    {
        $astreinteService = \Drupal::service('astreinte.service');
        $services = $astreinteService->callAstreinte();
        //dd($services);
        $element = array('#markup' => 'Ceci est un bloc pour les Gardes et Astreintes du CHIC !');
        return $element;

        return array(
            '#theme' => 'astreinte',
            '#data' => [
                'salut' => $salut,
            ],
        );
    }
}

?>