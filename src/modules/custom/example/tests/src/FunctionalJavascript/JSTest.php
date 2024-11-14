<?php

namespace Drupal\Tests\example\FunctionalJavascript;

use Drupal\Core\Url;
use Drupal\FunctionalJavascriptTests\WebDriverTestBase;

/**
 * test module.
 *
 * @group example
 */
class JSTest extends WebDriverTestBase {

  /**
   * The admin user.
   *
   * @var \Drupal\Core\Session\AccountInterface
   */
  protected $adminUser;

  /**
   * {@inheritdoc}
   */
  protected static $modules = ['node','example'];

  /**
   * {@inheritdoc}
   */
  protected $defaultTheme = 'stark';

  /**
   * {@inheritdoc}
   */
  protected function setUp(): void {
    parent::setUp();

    $this->drupalCreateContentType(['type' => 'article', 'name' => 'Article']);
    $this->adminUser = $this->drupalCreateUser(
      [
        'access content',
      ]
    );
  }

  /**
   * Test the redirect UI.
   */
  public function testRedirectUI() {
    $this->drupalLogin($this->adminUser);

    // Test populating the redirect form with predefined values.
    $this->drupalGet('login');

    $this->assertSession()->pageTextContains('Iniciar sesión');
    
  }

}
