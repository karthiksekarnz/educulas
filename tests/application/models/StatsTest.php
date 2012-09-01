<?php
class Model_StatsTest extends Zend_Test_PHPUnit_ControllerTestCase
{
	protected $stats;
	
	public function setUp()
	{
		parent::setUp();
		$this->stats = new Application_Model_Stats();
	}
	
	public function testCanDoUnitTest()
	{
		$this->assertTrue(true);
	}
	
	public function testCanAddCountry()
	{
		$testCountry = "India";		
		$this->stats->AddCountry($testCountry);
		
		$this->assertEquals(0, count($this->stats->getCountries()));
		foreach($this->stats->getCountries() as $country)
		{
			if($country == $testCountry){
				$this->assertEquals($country,$testCountry);
			}
		}
		 $this->assertEquals(1, count($this->stats->getCountries()));
		
		
	
	}	
	
}