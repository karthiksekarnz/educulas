<?php
class Application_Form_StaffProfile extends Twitter_Form
{
    protected $em;
    public function init()
    {
        $this->em = Zend_Registry::get('doctrine')->getEntityManager();

        // Make this form horizontal
		$this->setAttrib("horizontal", true);

		$this->addElement("text", "firstname", array(
			"label" => "First name",
                        "value" => ""))
                        ;

                $this->addElement("text", "lastname", array(
			"label" => "Surname",
                        "value" => ""
		));

                 $this->addElement("select", "gender", array(
			"label" => "Gender",
			"multiOptions" => array(
                                "1" => "Male",
				"2" => "Female"
			)));

                 $this->addElement("text", "username", array(
			"label" => "Username",
                         "description" => "Auto-generated",
                        "value" => ""

		));

		$this->addElement("text", "password", array(
			"label" => "Password",
			"required" => true,
                        "value" => substr(sha1(mt_rand()), 0, 16),
                        "description" => "auto-generated",
                        "attribs" => array(				
                                "maxlength" => 5
			)
		));

                $this->addElement("text", "qualification", array(
			"label" => "Qualification",
                        "value" => "",
			
                        "attribs" => array(
                            "placeholder" => "B.Tech"
                        )
		));              

                   $this->addElement("text", "doj", array(
			"label" => "Date of Joining",
                        "value" => ""

		));

            $this->addElement("text", "dob", array(
			"label" => "Date of Birth",
                        "value" => ""

		));
            

            $this->addElement("text", "pob", array(
			"label" => "Place of Birth",
                        "value" => ""

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

