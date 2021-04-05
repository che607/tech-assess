<?php

/**
 * @file
 * Contains \Drupal\tableau_block\Controller\TableauBlockController.
 */

namespace Drupal\tableau_block\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Controller routines for tableau_block routes.
 */
class TableauBlockController extends ControllerBase {

  /**
   * Callback for `/api/accessibility/{nid}` API method.
   * @param $nid
   * @return JsonResponse
   * @throws \GuzzleHttp\Exception\GuzzleException
   */
  public function get_accessibility( $nid ) {

    $config = \Drupal::config('tableau_block.adminsettings');
    $authKey = $config->get('key');
    $authValue = $config->get('value');

    $url = 'https://us-central1-api-project-30183362591.cloudfunctions.net/axe-puppeteer-test?url=https://dev-tech-homework.pantheonsite.io/node/'.$nid;
    $method = 'GET';
    $client = \Drupal::httpClient();

    $responseClient = $client->request($method, $url, [
      'headers' => [$authKey => $authValue]
    ]);
    $body = $responseClient->getBody()->getContents();

    $response['data'] = $body;

    return new JsonResponse( $response );
  }

}
