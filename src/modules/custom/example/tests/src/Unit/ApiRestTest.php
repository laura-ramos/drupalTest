<?php
namespace Drupal\Tests\example\Unit;

use Drupal\Tests\UnitTestCase;
use Drupal\example\ApiService;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Client;

/**
 * Tests the API endpoint.
 *
 * @group example
 */
class ApiRestTest extends UnitTestCase {

  /**
   * Tests the GET request to the API.
   */
  public function testGetApiEndpoint() {
    // Crear un mock para el cliente HTTP.
    $mockHttpClient = $this->createMock(Client::class);

    // Simular una respuesta exitosa de la API.
    $mockHttpClient->method('get')->willReturn(new Response(200, [], json_encode(['key' => 'value'])));

    // Crear una instancia con el mock.
    $apiConsumer = new ApiService($mockHttpClient);

    // Llamar al método fetchData.
    $result = $apiConsumer->fetchData('https://api.example.com/data');

    // Afirmar que el resultado es el esperado.
    $this->assertEquals(['key' => 'value'], $result);
  }

}
