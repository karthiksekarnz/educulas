<?php

class Application_Model_Stats
{
	protected $countryList = array();
	
	public function AddCountry($country)
	{
		if(array_key_exists($country, $this->countryList))
			$this->countryList[$country]++;
		else
			$this->countryList[$country] = 1;
	
	}

	public function getCountries()
	{
		return array_keys($this->countryList);
		
	}


}

