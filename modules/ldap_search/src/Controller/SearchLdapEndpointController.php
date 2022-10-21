<?php

/**
* @file providing Controller of End Point for Search Results from LDAP.
*
*/

namespace Drupal\ldap_search\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class SearchLdapEndpointController extends ControllerBase {

  /**
   * {@inheritdoc}
   */
  public function get(Request $request) {
    $response = new JsonResponse();
    $emp_records = [];
    // Get the Reqeuest Object.
    if (isset($request) && is_object($request)) {
      $base_dn = $request->query->get('base_dn');
      $extra_filter = $request->query->get('extra_filter');
      $type = $request->query->get('type');
      $result_count = $request->query->get('result_count');
      $attributes = $request->query->get('attributes');

      if (isset($base_dn) && !is_null($base_dn)) {
        $service = \Drupal::service('ldap_search.search');
        $service->set_base_dn($base_dn);
        if(isset($extra_filter) && !is_null($extra_filter)) {
          $service->set_extra_filter($extra_filter);
        }
        if(isset($type) && !is_null($type)) {
          $service->set_type($type);
        }
        if(isset($result_count) && !is_null($result_count)) {
          $service->set_result_count($result_count);
        }
        if(isset($attributes) && !is_null($attributes)) {
          $service->set_attributes($attributes);
        }
        $emp_records = $service->search_resource();
      }
    }
    $response->setData($emp_records);

    return $response;
  }
}