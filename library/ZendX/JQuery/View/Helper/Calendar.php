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
require_once "Zend/Registry.php";

/**
 * @see ZendX_JQuery_View_Helper_UiWidget
 */
require_once "ZendX/JQuery/View/Helper/UiWidget.php";


class ZendX_JQuery_View_Helper_Calendar extends ZendX_JQuery_View_Helper_UiWidget
{

    public function calendar($id, $value = null, array $params = array(), array $attribs = array())
    {
        $attribs = $this->_prepareAttributes($id, $value, $attribs);

        if(!isset($params['dateFormat']) && Zend_Registry::isRegistered('Zend_Locale')) {
            $params['dateFormat'] = self::resolveZendLocaleToDatePickerFormat();
        }

        // TODO: Allow translation of DatePicker Text Values to get this action from client to server
        $params = ZendX_JQuery::encodeJson($params);

        $js = sprintf('%s("#%s").datepicker(%s);',
                ZendX_JQuery_View_Helper_JQuery::getJQueryHandler(),
                $attribs['id'],
                $params
        );

        $this->jquery->addOnLoad($js);


       $html = '<div'
                . $this->_htmlAttribs($attribs)
                . '>'
                . '</div>';
       
        return $html;
    }

    /**
     * A Check for Zend_Locale existance has already been done in {@link datePicker()}
     * this function only resolves the default format from Zend Locale to
     * a jQuery Date Picker readable format. This function can be potentially buggy
     * because of its easy nature and is therefore stripped from the core functionality
     * to be easily overriden.
     *
     * @return string
     */
    public static function resolveZendLocaleToDatePickerFormat($format=null)
    {
        if($format == null) {
            $locale = Zend_Registry::get('Zend_Locale');
            if( !($locale instanceof Zend_Locale) ) {
                require_once "ZendX/JQuery/Exception.php";
                throw new ZendX_JQuery_Exception("Cannot resolve Zend Locale format by default, no application wide locale is set.");
            }
            /**
             * @see Zend_Locale_Format
             */
            require_once "Zend/Locale/Format.php";
            $format = Zend_Locale_Format::getDateFormat($locale);
        }

        $dateFormat = array(
            'EEEEE' => 'D', 'EEEE' => 'DD', 'EEE' => 'D', 'EE' => 'D', 'E' => 'D',
            'MMMM' => 'MM', 'MMM' => 'M', 'MM' => 'mm', 'M' => 'm',
            'YYYYY' => 'yy', 'YYYY' => 'yy', 'YYY' => 'yy', 'YY' => 'y', 'Y' => 'yy',
            'yyyyy' => 'yy', 'yyyy' => 'yy', 'yyy' => 'yy', 'yy' => 'y', 'y' => 'yy',
            'G' => '', 'e' => '', 'a' => '', 'h' => '', 'H' => '', 'm' => '',
            's' => '', 'S' => '', 'z' => '', 'Z' => '', 'A' => '',
        );

        $newFormat = "";
        $isText = false;
        $i = 0;
        while($i < strlen($format)) {
            $chr = $format[$i];
            if($chr == '"' || $chr == "'") {
                $isText = !$isText;
            }
            $replaced = false;
            if($isText == false) {
                foreach($dateFormat AS $zl => $jql) {
                    if(substr($format, $i, strlen($zl)) == $zl) {
                        $chr = $jql;
                        $i += strlen($zl);
                        $replaced = true;
                    }
                }
            }
            if($replaced == false) {
                $i++;
            }
            $newFormat .= $chr;
        }

        return $newFormat;
    }
}
?>
