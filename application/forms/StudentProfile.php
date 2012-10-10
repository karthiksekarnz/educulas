<?php
class Application_Form_StudentProfile extends Twitter_Form
{
    public function init()
    {
        // Make this form horizontal
		$this->setAttrib("horizontal", true);

		$this->addElement("text", "firstname", array(
			"label" => "First name"
			
		));

                $this->addElement("text", "lastname", array(
			"label" => "Surname"
		));

                $this->addElement("text", "regno", array(
			"label" => "Reg number",
                        "value" => ""

		));

                $this->addElement("text", "username", array(
			"label" => "Username",
                        "value" => ""

		));

		$this->addElement("text", "password", array(
			"label" => "Password",
			"required" => true,
                        "value" => substr(sha1(mt_rand()), 0, 16),
                        "attribs" => array(				
                                "maxlength" => 5
			)
		));

	 	

                $this->addElement("select", "gender", array(
			"label" => "Gender",
			"multiOptions" => array(
                                "1" => "Male",
				"2" => "Female"
			)));


                $this->addElement("select", "citizenship", array(
			"label" => "Citizenship",
			"multiOptions" => array(
                                "1" => "India",
				"2" => "US"
			)));

            $jqueryform = new ZendX_JQuery_Form();

            $dob = new ZendX_JQuery_Form_Element_DatePicker('dob');
            $dob->setJQueryParam('dateFormat', 'dd/mm/yy')
                    ->setLabel('Date of Birth');

            
           
            $jqueryform->setElementDecorators(array(
                'ViewHelper',
                array(array('data' => 'HtmlTag'),
                array('tag' => 'div','class' => 'control-group')),
                'Label'
                ));           

            $jqueryform->addElements(array($dob));
            //$dob->setDecorators(array('ViewHelper'));


            $this->addSubForm($jqueryform, 'jform');

            
            $this->addElement("text", "pob", array(
			"label" => "Place of Birth"

		));

                          $this->addElement("text", "streetaddress", array(
			"label" => "Street Address",
                        "value" => ""

		));


            $this->addElement("text", "nationality", array(
			"label" => "Nationality",
                        "value" => ""

		));

             $this->addElement("text", "religion", array(
			"label" => "Religion",
                        "value" => ""
		));


             $this->addElement("text", "caste", array(
		  "label" => "Caste",
                  "value" => ""

		));


             $this->addElement("text", "phno", array(
		  "label" => "Phone Number",
                  "value" => ""

		));

              $this->addElement("text", "passportno", array(
		  "label" => "Passport Number",
                  "value" => ""

		));

              $this->addElement("text", "mobile", array(
		  "label" => "Mobile",
                  "value" => ""

		));

              $this->addElement("text", "website", array(
		  "label" => "Website",
                  "value" => ""

		));


		$this->addElement("submit", "register", array("label" => "Register"));
		$this->addElement("reset", "reset", array("label" => "Reset"));
		
    }
}

