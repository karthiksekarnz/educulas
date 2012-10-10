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

/**
 * @see Zend_Registry
 */
/**
 * @see Zend_Registry
 */
require_once "Zend/Registry.php";

require_once "ZendX/JQuery/View/Helper/UiWidget.php";



class ZendX_JQuery_View_Helper_CalendarLink extends ZendX_JQuery_View_Helper_UiWidget
{
    public function calendarlink($id)
    {
       
        // get current jQuery handler based on noConflict settings
        $jqHandler = ZendX_JQuery_View_Helper_JQuery::getJQueryHandler();

         $jmarkup = sprintf('%s("#%s").datepicker({dateFormat: \'dd-mm-yy\',onSelect:function(date){'.
                 
                 ' $.post("ajax/attendance",{date:date,classroom:$("#classy").val()},function(data){$("#attdsheet").html(data);}); '.

                 '}'. '})',ZendX_JQuery_View_Helper_JQuery::getJQueryHandler(),$id);
        ;
        
        $this->jquery->addOnLoad($jmarkup);

        $hmarkup = '<div id= "datepicker"></div>'.
        '<div id="attdsheet"></div>';

        return $hmarkup;

    }
}
?>
