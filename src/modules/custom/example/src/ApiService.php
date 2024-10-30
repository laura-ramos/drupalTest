<?php
namespace Drupal\example;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;

class ApiService {
  protected $httpClient;

  public function __construct(ClientInterface $http_client) {
    $this->httpClient = $http_client;
  }

  public function fetchData($url) {
    try {
      $response = $this->httpClient->get($url);
      return json_decode($response->getBody(), TRUE);
    } catch (RequestException $e) {
      // Manejo de errores.
      \Drupal::logger('example')->error($e->getMessage());
      return NULL;
    }
  }
}
