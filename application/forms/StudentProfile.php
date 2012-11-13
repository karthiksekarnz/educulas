<?php
class Application_Form_StudentProfile extends ZendX_JQuery_Form
{
    public function init()
    {
        // Make this form horizontal
		$this->setAttrib("vertical", true);

		$this->addElement("text", "firstname", array(
			"label" => "First name",
                    "required" => "true",
                    'validators' => array ('NotEmpty' => array (
                                                  'validator' => 'NotEmpty',
                                                  'options' => array (
                                                   'messages' => 'Enter First Name'))),
                    "value" => ""
			
		));

                $this->addElement("text", "lastname", array(
			"label" => "Surname",
                    "required" => "true",
                    'validators' => array ('NotEmpty' => array (
                                                  'validator' => 'NotEmpty',
                                                  'options' => array (
                                                   'messages' => 'Enter Last Name'))),
                    "value" => ""
		));

                $this->addElement("text", "regno", array(
			"label" => "Reg number",
                    "required" => "true",
                        "value" => "",
                    'validators' => array ('NotEmpty' => array (
                                                  'validator' => 'NotEmpty',
                                                  'options' => array (
                                                   'messages' => 'Enter Registration Number'))),

		));

                $this->addElement("text", "username", array(
			"label" => "Username",
                    "required" => "true",
                        "value" => "",
                    'validators' => array ('NotEmpty' => array (
                                                  'validator' => 'NotEmpty',
                                                  'options' => array (
                                                   'messages' => 'Enter Username'))),

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

          //$jform = new Zend_Form_SubForm();
          $dob = new ZendX_JQuery_Form_Element_DatePicker('dob',array(
                   'jQueryParams'=> array('dateFormat'=> 'dd/mm/yy',
                                          'changeMonth'=>true,
                                          'changeYear'=> true,
                                          'yearRange' =>'1910:date(\'y\')')
                                         )
                                     );

          $dob->setLabel("Date of Birth");
          $dob->setDecorators(array("FormElements","UiWidgetElement"));


            
          //  $jform->addElement($dob);

            //$this->addSubForm($jform,'dob');



            $this->addElement($dob);

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


		$this->addElement("submit", "register", array("value" => "Register","class" => "btn btn-primary"));
                            
		$this->addElement("reset", "reset", array("value" => "Reset","class" => "btn"))
                        ->removeDecorator('DtDdWrapper');

               
      $this->addDisplayGroups(array(
    'left' => array(
        'options'  => array('description' => ''),
        'elements' => array('firstname', 'lastname', 'gender', 'regno','username', 'password','dob','pob','streetaddress'),
    ),
    
    'right' => array(
        'options'  => array('description' => ''),
        'elements' => array('nationality', 'religion', 'caste', 'phno', 'passportno', 'mobile','website'),
    ),
        'bottom' => array(
         'options' => array("class" => "form-actions"),
        'elements' => array('register','reset'),
    )
  ));        

 

$this->setDisplayGroupDecorators(array('Description', 'FormElements', 'Fieldset'));






		
    }
}

