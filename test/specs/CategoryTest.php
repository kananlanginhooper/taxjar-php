<?php
if (!class_exists('TaxJarTest')) {
  require __DIR__ . '/../TaxJarTest.php';
}

class CategoryTest extends TaxJarTest {
  public function test_categories() {
    $this->http->mock
        ->when()
            ->methodIs('GET')
            ->pathIs('/categories')
        ->then()
            ->body(file_get_contents(__DIR__ . "/../fixtures/categories.json"))
        ->end();

    $this->http->setUp();
    
    $response = $this->client->categories();
    
    $this->assertJsonStringEqualsJsonFile(__DIR__ . '/../fixtures/categories.json', json_encode($response));
  }
}