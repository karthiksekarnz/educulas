<?php
/* 
 *  Copyright 2012 Actuality, Inc.
 * 
 *  Licensed under the Apache License, Version 2.0 (the "License");
 *  you may not use this file except in compliance with the License.
 *  You may obtain a copy of the License at
 * 
 *       http://www.apache.org/licenses/LICENSE-2.0
 * 
 *  Unless required by applicable law or agreed to in writing, software
 *  distributed under the License is distributed on an "AS IS" BASIS,
 *  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 *  See the License for the specific language governing permissions and
 *  limitations under the License.
 *  under the License.
 */


/**
 * 
 * @author karthik sekar
 */

class Application_Form_Attendance extends Twitter_Form {

    protected $em;
    const Teacher_Online = 1;
    
    public function init()
    {

        $this->em = Zend_Registry::get('doctrine')->getEntityManager();

        
        $classes = $this->em->getRepository('Campus\Entity\Papers')->getClassesbyTeacher(self::Teacher_Online);       
        $classlist = new Zend_Form_Element_Select("classy");
         //$classlist->addMultiOptions(array("1" => "IT-sem4", "2" => "BME-sem6","3" => "ece-sem3"));

       foreach($classes as $key){
            $classlist->addMultiOption($key['classId'],$key['className']);
        }  
        $classlist->setLabel("class list");
        $this->addElement($classlist);
        
       
        $jqform = new ZendX_JQuery_Form();

        $cus = new ZendX_JQuery_Form_Element_CalendarLink('datepicker');
        $cus->setLabel("Select a Date");

        $jqform->addElements(array($cus));
        $this->addSubForm($jqform,'jqform');
   

        $this->addElement("submit","save",array("value" => "save"))
                ->setElementDecorators(array("ViewHelper",
                array(array("data" => "HtmlTag"),array("tag" => "dt","class" => "load")),
                array(array("row" => "HtmlTag"),array("tag" => "dd"))
        ));

        $this->setDecorators(array(
            "formelements",
            array("HtmlTag",array("tag" => "div","class" => "fm"))
        ));
                      

    }

  }
?>
