<?php
namespace Drupal\annuaire\Controller;

use StringTranslationTrait;
use Drupal\Core\Controller\ControllerBase;

class AnnuaireController extends ControllerBase
{
    public function Start()
    {
        $servicetest = \Drupal::service('annuaire.service');
        $salut = $servicetest->hello();
        $hopitaux = file_get_contents("http://127.0.0.1:8000/api/hopitaux");
        $element = array('#markup' => $salut);
        // return $element;
        return array(
            '#theme' => 'annuaire',
            '#data' => [
                'salut' => $salut,
            ],
        );
    }
}

?>