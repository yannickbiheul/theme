<?php

namespace Drupal\annuaire\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a "Annuaire' Block.
 * 
 * @Block(
 *  id = "annuaire_block",
 *  admin_label = @Translation("Annuaire Block"),
 *  category = @Translation("Annuaire"),
 * )
 */
class AnnuaireBlock extends BlockBase
{
    /**
     * {@inheritdoc}
     */
    public function build()
    {
        $annuaireService = \Drupal::service('annuaire.service');
        $salut = $annuaireService->hello();
        $services = $annuaireService->callAnnuaire();
        $hopitaux = json_decode(file_get_contents("http://127.0.0.1:8000/api/hopitaux"));
        return array(
            '#theme' => 'my_template',
            '#services' => $services,
            '#hopitaux' => $hopitaux,
            '#data' => [
                'salut' => $salut,
                'services' => $services,
            ],
        );
    }
}