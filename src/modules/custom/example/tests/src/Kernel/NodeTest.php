<?php
namespace Drupal\Tests\example\Kernel;

use Drupal\KernelTests\KernelTestBase;
use Drupal\node\Entity\Node;

/**
 * Test para verificar la creación de un nodo.
 *
 * @group example
 */
class NodeTest extends KernelTestBase {

  /**
   * {@inheritdoc}
   */
  protected static $modules = ['user', 'node', 'example'];

  /**
   * An 'owner' user object.
   *
   * @var \Drupal\user\UserInterface
   */
  protected $owner;


  protected function setUp(): void {
    parent::setUp();

    $this->installEntitySchema('user');
    $this->installEntitySchema('node');
  }


  /**
   * Verifica si un nodo fue creado.
   */
  public function testNodeCreation() {
    // Crear un nodo de tipo 'article'
    $node = Node::create([
      'type' => 'article',
      'title' => 'Test Node',
      'body' => 'This is a body of the test node.',
    ]);
    $node->save();

    // Verificar que el nodo fue guardado en la base de datos.
    $loaded_node = \Drupal\node\Entity\Node::load($node->id());

    // Asegurarse de que el nodo existe.
    $this->assertNotNull($loaded_node, 'El nodo ha sido creado y cargado correctamente.');
    // Verificar el título del nodo.
    $this->assertEquals($loaded_node->getTitle(), 'Test Node', 'El título del nodo es correcto.');
  }
}
