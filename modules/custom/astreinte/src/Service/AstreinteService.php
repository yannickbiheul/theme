<?php
namespace Drupal\astreinte\Service;

use Symfony\Component\ldap\Ldap;
use Drupal\astreinte\Model;

/**
 * Class AstreinteService
 * @package Drupal\astreinte\Service
 */
class AstreinteService
{
    public function hello()
    {
        return "Salut à toi le petit monstre !";
    }

    public function callAstreinte()
    {
		// Création d'un tableau d'objets pour tester l'affichage
        $imagerie = new Service("Imagerie","4077","02 90 94 40 77", null, null);
        $reanimation = new Service("Réanimation","4073","02 90 94 40 73", null, null);
        $urgences = new Service("Urgences","4105","02 90 94 41 05", null, null);
        $cardiologie = new Service("Cardiologie","4070","02 90 94 40 70", null, null);
        $gynecologie = new Service("Gynécologie obstétrique","4200","02 90 94 42 00", "4264", "02 90 94 42 64");
        $pediatrie = new Service("Pédiatrie néonatologie","4076","02 90 94 40 76", null, null);
        $anesthesie = new Service("Anesthésie","4073","02 90 94 40 72", "4469", "02 90 26 44 69");
        $services = array($imagerie, $reanimation, $urgences, $cardiologie, $gynecologie, $pediatrie, $anesthesie);
        return $services;
    }
}