<?php
if (!class_exists('TaxJarTest')) {
  require __DIR__ . '/../TaxJarTest.php';
}

class RateTest extends TaxJarTest {
  public function test_rates_for_location() {
    $this->http->mock
        ->when()
            ->methodIs('GET')
            ->pathIs('/rates/90002')
        ->then()
            ->body(file_get_contents(__DIR__ . "/../fixtures/rates.json"))
        ->end();

    $this->http->setUp();
    
    $response = $this->client->ratesForLocation(90002);
    
    $this->assertJsonStringEqualsJsonFile(__DIR__ . '/../fixtures/rates.json', json_encode($response));
  }
}