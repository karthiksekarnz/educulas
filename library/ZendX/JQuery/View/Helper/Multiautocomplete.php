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

 *      Builds a Multiple valued AutoComplete ready input field.
 *
 *  This view helper builds an input field with the {@link Zend_View_Helper_FormText} FormText
     * Helper and adds additional javascript to the jQuery stack to initialize an AutoComplete
     * field. Make sure you have set one out of the two following options: $params['data'] or
     * $params['url']. The first one accepts an array as data input to the autoComplete, the
     * second accepts an url, where the autoComplete content is returned from. For the format
     * see jQuery documentation.
     * @requires ZendX library
     * @throws ZendX_JQuery_Exception
     * @param  String $id
     * @param  String $value
     * @param  array $params
     * @param  array $attribs
     * @return String
 */

/**
 * 
 * @author karthik sekar
 */
require_once "ZendX/JQuery/View/Helper/UiWidget.php";

class ZendX_JQuery_View_Helper_Multiautocomplete extends ZendX_JQuery_View_Helper_UiWidget
{
    public function multiautoComplete($id, $value = null, array $params = array(), array $attribs = array())
    {
        $attribs = $this->_prepareAttributes($id, $value, $attribs);      

        if(!isset($params['source']))
        {
            if (isset($params['url'])) {

                $params = ZendX_JQuery::encodeJson($params['url']);
               
            } else if (isset($params['data'])) {
                $params = $params['data'];
                
            } else {
                require_once "ZendX/JQuery/Exception.php";
                throw new ZendX_JQuery_Exception(
                    "Cannot construct AutoComplete field without specifying 'source' field, ".
                    "either an url or an array of elements."
                );
            }
        }
        else
        {
             $params = ZendX_JQuery::encodeJson($params);
        }

         //var_dump($params);      

        $js = sprintf('%s("#%s").tokenInput(%s);',
                ZendX_JQuery_View_Helper_JQuery::getJQueryHandler(),
                $attribs['id'],
                $params
        );

        $this->jquery->addOnLoad($js);

        return $this->view->formText($id, $value, $attribs);
    }
    
}
?>
