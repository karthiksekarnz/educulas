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


class Application_Form_Classes extends Twitter_Form{

    protected $em;
  
   public function init(){

       $this->em = Zend_Registry::get('doctrine')->getEntityManager();
       $jqueryform = new ZendX_JQuery_Form();

       $this->addElement("text","classname",array("label" => "Class Name","value" => "" ));

       $allteachers = $this->em->getRepository('Campus\Entity\Teacher')->getAllSchoolTeachers(1);
       $teachers_json = Zend_Json_Encoder::encode($allteachers);

       $multiautocomplete = new ZendX_JQuery_Form_Element_Multiautocomplete('demoinputlocal');
       $multiautocomplete->setJQueryParam('data',$teachers_json)
                         ->setLabel('Teachers');

       $termstart = new ZendX_JQuery_Form_Element_DatePicker('tstart');
       $termstart->setJQueryParam('dateFormat', 'dd/mm/yy')
                 ->setLabel('Term start date');

       $termend = new ZendX_JQuery_Form_Element_DatePicker('tend');
       $termend->setJQueryParam('dateFormat', 'dd/mm/yy')
                 ->setLabel('Term end date');


        $jqueryform->addElements(array($multiautocomplete,$termstart,$termend));
        $this->addSubForm($jqueryform, "jqueryform");

       $this->addElement("text","subject",array("label" => "Subject","value" => "" ));
       $this->addElement("text","passmark",array("label" => "Pass mark","value" => "" ));
       $this->addElement("text","maxmark",array("label" => "Maximum marks","value" => "" ));

       $this->addElement("submit", "register", array("label" => "Save"));
       $this->addElement("reset", "reset", array("label" => "Reset"));

    }
}
?>
