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

                $this->addElement("text", "surname", array(
			"label" => "Surname"
		));


		$this->addElement("text", "password", array(
			"label" => "Password",
			"required" => true,
                        "value" => substr(sha1(mt_rand()), 0, 16),
                        "attribs" => array(				
                                "maxlength" => 5
			)
		));

	  $this->addElement("text", "qualification", array(
			"label" => "Qualification",
			
                        "attribs" => array(
                            "placeholder" => "B.Tech"
                        )
		));

		$this->addElement("select", "designation", array(
			"label" => "Designation",
			"multiOptions" => array(
                                "1" => "Asst Professor",
				"2" => "Senior Lecture"
			)));

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

            $this->addElement("text", "dob", array(
			"label" => "Date of Birth"

		));

            $this->addElement("text", "pob", array(
			"label" => "Place of Birth"

		));
/*

                $this->addElement("text", "lastname", array(
			"label" => "Last name",
			"description" => "Foobar"
		));

		$this->addElement("checkbox", "remember_me", array(
			"label" => "Remember me for two weeks",
		));

		$this->addElement("radio", "terms", array(
			"label" => "I agree to the terms",
		));

		$this->addElement("radio", "terms", array(
			"label" => "Terms",
			"multiOptions" => array(
				"1" => "I agree to the terms",
				"0" => "I don't agree to the terms"
			)
		));

		$this->addElement("multicheckbox", "multichecks", array(
			"description" => "This is a nice thing.",
			"label" => "Foobar",
			"multiOptions" => array(
				"1" => "I agree to the terms",
				"0" => "I don't agree to the terms"
			)
		));

		$this->addElement("multicheckbox", "multichecks2", array(
			"label" => "Inline checkboxes",
			"inline" => true,
			"multiOptions" => array(
				"1" => "One",
				"0" => "Two"
			)
		));

		$this->addElement("file", "file", array(
			"label" => "Please upload a file",
			"required" => true
			));

		$this->addElement("hidden", "id", array(
			"value" => "Test",
			"label" => "Test"
		));

		$elm = $this->createElement("text", "foo", array(
			"label" => "Element created via createElement"));

		$this->addElement($elm);

		$elm2 = new Zend_Form_Element_Text("foo2", array(
			"label" => "Via new instance"));

		$this->addElement($elm2);*/

		$this->addElement("submit", "register", array("label" => "Register"));
		$this->addElement("reset", "reset", array("label" => "Reset"));
		/*$this->addElement("button", "custom", array(
			"class" => "success",
			"label" => "Custom classes, too!"
		));*/

    }
}

