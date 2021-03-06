<?php

/**
 * This grid component allows the rendering of jqGrid which is an ajax-enabled 
 * javascript control that provides solutions for representing and manipulating 
 * tabular data on the web. 
 * 
 * jqGrid uses the jQuery javascript library. 
 *
 * @see http://www.trirand.com/blog/
 * @package Ingot_JQuery_JqGrid
 * @copyright Copyright (c) 2005-2009 Warrant Group Ltd. (http://www.warrant-group.com)
 * @author Andy Roberts
 */
class Ingot_JQuery_JqGrid
{
    /**
     * The unique id assigned to the grid
     * 
     * @var string
     */
    protected $_id = null;
    /**
     * The name of the ID column
     * 
     * @var string
     */
    protected $_idCol = null;
    /**
     * An array of grid options
     * 
     * @see http://www.trirand.com/jqgridwiki/doku.php?id=wiki:options
     * @var array
     */
    protected $_options = array();
    /**
     * An array of grid columns objects
     * 
     * @var array
     */
    protected $_columns = array();
    /**
     * An adaptor for accessing a data source directly, making use 
     * of Zend_Paginator for pagination.
     *
     * @var Zend_Paginator_Adapter_Interface
     * @var Ingot_JQuery_JqGrid_Adaptor_Interface
     */
    protected $_adapter = null;
    /**
     * The provided view
     * 
     * @var Zend_View_Interface
     */
    protected $_view = null;
    /**
     * Pagination object
     * 
     * @var Zend_Paginator
     */
    protected $_paginator = null;
    /**
     * Default item count per page
     * 
     * @var int
     */
    protected $_defaultItemCountPerPage = 20;
    /**
     * The shorthand search operator provided by jqgrid will be 
     * converted to a more readable format, to provide a standard
     * expression set for use within the adapters.
     * 
     * @var string
     */
    protected $_expression;
    public static $searchOperators = array('eq' => Ingot_JQuery_JqGrid_Adapter_DbSelect::EQUAL, 'ne' => Ingot_JQuery_JqGrid_Adapter_DbSelect::NOT_EQUAL, 'lt' => Ingot_JQuery_JqGrid_Adapter_DbSelect::LESS_THAN, 'le' => Ingot_JQuery_JqGrid_Adapter_DbSelect::LESS_THAN_OR_EQUAL, 'gt' => Ingot_JQuery_JqGrid_Adapter_DbSelect::GREATER_THAN, 'ge' => Ingot_JQuery_JqGrid_Adapter_DbSelect::GREATER_THAN_OR_EQUAL, 
    'bw' => Ingot_JQuery_JqGrid_Adapter_DbSelect::BEGIN_WITH, 'bn' => Ingot_JQuery_JqGrid_Adapter_DbSelect::NOT_BEGIN_WITH, 'in' => Ingot_JQuery_JqGrid_Adapter_DbSelect::IN, 'ni' => 'NOT_IN', 'ew' => Ingot_JQuery_JqGrid_Adapter_DbSelect::END_WITH, 'en' => Ingot_JQuery_JqGrid_Adapter_DbSelect::NOT_END_WITH, 'cn' => Ingot_JQuery_JqGrid_Adapter_DbSelect::CONTAIN, 'nc' => Ingot_JQuery_JqGrid_Adapter_DbSelect::NOT_CONTAIN);
    
    
    
    /**
     * Instance of Ingot_JQuery_JqGrid_Plugin_Broker
     * 
     * @var unknown_type
     */
    protected $_plugins;
    protected $_pagerClass = "Ingot_JQuery_JqGrid_Plugin_Pager";
    public static $arrEvents = array("afterShowForm", "unformat", "dataInit", "beforeShowForm", "afterSubmit", "afterInsertRow", "beforeRequest", "beforeSelectRow", "gridComplete", "loadBeforeSend", 
    "loadComplete", "loadError", "onCellSelect", "ondblClickRow", "onHeaderClick", "onPaging", "onRightClickRow", "onSelectAll", "onSelectRow", "onSortCol", "resizeStart", "resizeStop", 
    "serializeGridData");
    public static $arrCallbacks = array("custom_func");
    private $_boolCustomJson = false;

    CONST SORT_ASC = 'asc';

    CONST SORT_DESC = 'desc';
    
    CONST RETURN_CODE_OK = 'ok';
    
    CONST RETURN_CODE_ERROR = 'error';
    
    CONST RETURN_INDEX_MSG = 'msg';
    CONST RETURN_INDEX_CODE = 'code';
    

    /**
     * Constructor.
     *
     * @param Ingot_JQuery_JqGrid_Adapter_Interface $adaptor
     * @param array $options
     */
    public function __construct ($id, $adapter, array $options = array())
    {
        $this->_expression = self::$searchOperators;
        Zend_Paginator::addAdapterPrefixPath('Ingot_JQuery_JqGrid_Adapter', 'Ingot/JQuery/JqGrid/Adapter');
        $this->_plugins = new Ingot_JQuery_JqGrid_Plugin_Broker();
        $this->_plugins->setGrid($this);
        $this->setAdapter($adapter);
        $this->_id = $id;
        // Set grid options, automatically set the default options
        // and over-ride with user options.
       // $this->_setDefaultOptions();
        if (isset($options)) {
            if ($options instanceof Zend_Config) {
                $options = $options->toArray();
            }
            if (! is_array($options)) {
                throw new Zend_Exception('JqGrid options must be in an array or a Zend_Config object');
            }
            $this->setOptions($options);
        }
        $this->_plugins->registerPlugin(new $this->_pagerClass());
    }

    public function setAdapter ($adapter)
    {
        if ($adapter instanceof Ingot_JQuery_JqGrid_Adapter_Interface) {
            $this->_adapter = $adapter;
        } elseif ($adapter instanceof Zend_Db_Table_Select) {
            $this->_adapter = new Ingot_JQuery_JqGrid_Adapter_DbTableSelect($adapter);
        } elseif ($adapter instanceof Zend_Db_Select) {
            $this->_adapter = new Ingot_JQuery_JqGrid_Adapter_DbSelect($adapter);
        } elseif ($adapter instanceof Zend_Db_Table) {
            $this->_adapter = new Ingot_JQuery_JqGrid_Adapter_DbSelect($adapter->select(TRUE));
        } elseif (is_string($adapter)) {
            $objDbTable = new $adapter();            
            $objSelect = $objDbTable->select(TRUE);            
            if ($objDbTable instanceof Bf_Db_Table){
                $objSelect->where('is_deleted = ?',FALSE);
            }            
            $this->_adapter = new Ingot_JQuery_JqGrid_Adapter_DbTableSelect($objSelect);
        } else {
            throw new Ingot_JQuery_JqGrid_Exception('Ingot_JQuery_JqGrid only accepts instances of the type ' . 'Ingot_JQuery_JqGrid_Adapter_Interface');
        }
    }
    
    /**
     * 
     * Get current Adapter
     * @return Ingot_JQuery_JqGrid_Adapter_DbTableSelect
     */
    public function getAdapter () {
        return $this->_adapter;
    }

    /**
     * Get unique grid identifier
     * 
     * @return string
     */
    public function getId ()
    {
        return $this->_id;
    }

    /**
     * Get grid ID Col Name
     * 
     * @return string
     */
    public function getIdCol ()
    {
        return $this->_idCol;
    }

    /**
     * Set Grid Id Col Name
     * 
     * @param string $strCol
     * @return string
     */
    public function setIdCol ($strCol)
    {
        return $this->_idCol = $strCol;
    }

    /**
     * Set default grid options
     * 
     * @return void
     */
    protected function _setDefaultOptions ()
    {
        $this->_options['url'] = '';
        $this->_options['datatype'] = 'json';
        $this->_options['mtype'] = 'POST';
        $this->_options['viewrecords'] = true;
        $this->_options['colModel'] = array();
        $this->_options['autowidth'] = true;
        $this->_options['height'] = '480px';
        $this->_options['rowNum'] = $this->_defaultItemCountPerPage;
        $this->_options['rowList'] = range($this->_defaultItemCountPerPage, $this->_defaultItemCountPerPage * 5, $this->_defaultItemCountPerPage);
        $this->_options['caption'] = ucwords(str_replace("_", "", $this->_id));
        $this->_options['postData'] = array('grid' => $this->_id);
    }

    /**
     * Override set to allow access to grid options
     * 
     * @return void
     */
    public function __set ($name, $value)
    {
        $this->setOption($name, $value);
    }

    /**
     * Override get to allow access to grid options
     * 
     * @param string $name Grid option name
     * @return void
     */
    public function __get ($name)
    {
        return $this->getOption($name);
    }

    /**
     * Set a single grid option
     * 
     * @return Ingot_JQuery_JqGrid
     */
    public function setOption ($name, $value)
    {
        $arrUnEscapeList = array_merge(Ingot_JQuery_JqGrid::$arrEvents, Ingot_JQuery_JqGrid::$arrCallbacks);
        if (in_array($name, $arrUnEscapeList, true)) {
            $this->_options[$name] = new Zend_Json_Expr($value);
        } else {
            $this->_options[$name] = $value;
        }
        return $this;
    }

    /**
     * Sets grid options
     *
     * @param array $options
     * @return Ingot_JQuery_JqGrid
     */
    public function setOptions (array $options = array())
    {
        foreach ($options as $k => $v) {
            //Zend_Debug::dump($k);
            if ($k == "plugin") {
                $this->_plugins->setOptions($v);
            } else {
                $this->setOption($k, $v);
            }
        }
        return $this;
    }

    /**
     * Get a single grid option
     * 
     * @return mixed
     */
    public function getOption ($name)
    {
        if (array_key_exists($name, $this->_options)) {
            return $this->_options[$name];
        } else {
            return false;
        }
    }

    /**
     * Get all grid options
     * 
     * @return array
     */
    public function getOptions ()
    {
        return $this->_options;
    }

    /**
     * Sets the view object.
     *
     * @param  Zend_View_Interface $view
     * @return Zend_PaginatorIngot_JQuery_JqGrid_Adapter_DbSelect
     */
    public function setView (Zend_View_Interface $view = null)
    {
        $this->_view = $view;
        return $this;
    }

    /**
     * Retrieves the view instance.  If none registered, attempts to pull 
     * from ViewRenderer.
     *
     * @return Zend_View_Interface|null
     */
    public function getView ()
    {
        if ($this->_view === null) {
            /**
             * @see Zend_Controller_Action_HelperBroker
             */
            require_once 'Zend/Controller/Action/HelperBroker.php';
            $viewRenderer = Zend_Controller_Action_HelperBroker::getStaticHelper('viewRenderer');
            if ($viewRenderer->view === null) {
                $viewRenderer->initView();
            }
            $this->_view = $viewRenderer->view;
        }
        return $this->_view;
    }

    /**
     * Add a column object to the grid.
     * 
     * @param Ingot_JQuery_JqGrid_Column $column
     * @return Ingot_JQuery_JqGrid
     */
    public function addColumn ($column)
    {
        $this->_columns[$column->getName()] = $column;
        $column->setGrid($this);
        //$column->setGridId ($this->getId());
        $column->decorate();
        return $column;
    }
    
    public function removeColumn($strColumnName){
        if (isset($this->_columns[$strColumnName])){
            unset($this->_columns[$strColumnName]);
            return $this;
        }
        return FALSE;
    }

    /**
     * Return all columns
     * 
     * @return array
     */
    public function getColumns ()
    {
        return $this->_columns;
    }

    /**
     * Return column object
     * 
     * @return Ingot_JQuery_JqGrid_Column_Decorator_Abstract
     */
    public function getColumn ($column)
    {
        if (isset($this->_columns[$column])) {
            return $this->_columns[$column];
        }
        $objColumns = $this->getColumns();
        foreach ($objColumns as $objColumn) {
            $objColOptions = $objColumn->getOptions();
            if (isset($objColOptions['index']) && $objColOptions['index'] == $column) {
                return $objColumn;
            }
        }
        return;
    }

    /**
     * Render the grid.
     *
     * @param  Zend_View_Interface $view
     * @return string
     */
    public function render (Zend_View_Interface $view = null, $arrOptions = null)
    {
        if (null !== $view) {
            $this->setView($view);
        }
        $view = $this->getView();
        $view->addHelperPath("Ingot/JQuery/JqGrid/View/Helper", "Ingot_JQuery_JqGrid_View_Helper");
        $this->_plugins->setView($view);
        $this->_plugins->preRender();
        $request = Zend_Controller_Front::getInstance()->getRequest();
        // Check if a remote URL has been set, if not set to current controller
        if (empty($this->_options['url'])) {
            $this->_options['url'] = $request->getRequestUri();
            $this->_options['postData']['grid'] = $this->_id;
            
            // Automatically send a response to update jqGrid
            if ($request->isXmlHttpRequest() && $request->getParam('grid') == $this->_id && !$request->getParam('oper')) {
                $this->sendResponse($request);
                exit();
            } elseif ($request->isXmlHttpRequest() && $request->getParam('grid') == $this->_id && $request->getParam('oper') && ($this->_adapter instanceof Ingot_JQuery_JqGrid_Adapter_DbTableSelect)) {
                $this->_adapter->gridSave($request, $view);
            }
            $arrParams = $request->getParams();
        }
        foreach ($this->_columns as $column) {
            $this->_options['colModel'][] = $column->getOptions();
        }
        $this->_plugins->postRender();
        if (! empty($arrOptions) && ! empty($arrOptions['DblClkEdit']) && ($arrOptions['DblClkEdit'] == TRUE)) {
            $this->setDblClkEdit();
        }
        return $view->jqGrid($this);
    }

    /**
     * Send Response
     * 
     * @param $request Zend_Controler_Request_Abstract
     * @return string
     */
    protected function sendResponse (Zend_Controller_Request_Abstract $request)
    {
        Zend_Controller_Action_HelperBroker::getStaticHelper('viewRenderer')->setNoRender();
        Zend_Controller_Action_HelperBroker::getStaticHelper('layout')->disableLayout();
        echo $this->response($request);
        $this->_plugins->postResponse();
    }

    /**
     * Return a data type which describe's the jqGrid structure, currently only 
     * JSON is supported.
     * 
     * @todo Allow a factory to return different data types ie: XML.
     * @return string
     */
    public function response (Zend_Controller_Request_Abstract $request)
    {
        $data = $this->_createGridData($request);
        $this->_plugins->setGridData($data);
        $this->_plugins->preResponse();
        return ZendX_JQuery::encodeJson($data);
    }

    /**
     * Register Plugin
     * 
     * @return void;
     */
    public function registerPlugin ($plugin)
    {
        return $this->_plugins->registerPlugin($plugin);
    }

    /**
     * Has plugin already been registered?
     * 
     * @param $plugin
     * @return boolean
     */
    public function hasPlugin ($plugin)
    {
        return $this->_plugins->hasPlugin($plugin);
    }

    /**
     * Get plugin already been registered?
     * 
     * @param $plugin
     * @return Ingot_JQuery_JqGrid_Plugin_Abstract
     */
    public function getPlugin ($plugin)
    {
        return $this->_plugins->getPlugin($plugin);
    }

    /**
     * Unregister Plugin
     * 
     * @return void;
     */
    public function unregisterPlugin ($plugin)
    {
        return $this->_plugins->unregisterPlugin($plugin);
    }

    /**
     * Create the grid data structure
     * 
     * @return object
     */
    protected function _createGridData (Zend_Controller_Request_Abstract $request)
    {
        // Instantiate Zend_Paginator with the required data source adaptor
        if (! $this->_paginator instanceof Zend_Paginator) {
            $this->_paginator = new Zend_Paginator($this->_adapter);
            $this->_paginator->setDefaultItemCountPerPage($request->getParam('rows', $this->_defaultItemCountPerPage));
        }
        // Filter items by supplied search criteria
        if ($request->getParam('_search') == 'true') {
            $filter = $this->_getFilterParams($request);
            $this->_paginator->getAdapter()->filter($filter, $filter['options']);
        }
        // Sort items by the supplied column field
        if ($request->getParam('sidx')) {
            $this->_paginator->getAdapter()->sort(new Zend_Db_Expr($request->getParam('sidx')), $request->getParam('sord', 'asc'));
        }
        // Pass the current page number to paginator
        $this->_paginator->setCurrentPageNumber($request->getParam('page', 1));
        // Fetch a row of items from the adapter
        $rows = $this->_paginator->getCurrentItems();
        $grid = new stdClass();
        $grid->page = $this->_paginator->getCurrentPageNumber();
        $grid->total = $this->_paginator->count();
        $grid->records = $this->_paginator->getTotalItemCount();
        $grid->rows = array();
        // :TODO Check 
        //		Zend_Debug::dump($rows);
        $intCounter = 0;
        foreach ($rows as $k => $row) {
            $strIdCol = $this->getIdCol();
            if (! empty($strIdCol)) {
                $grid->rows[$intCounter]['id'] = $row[$strIdCol];
            } elseif (isset($row['id'])) {
                $grid->rows[$intCounter]['id'] = $row['id'];
            }
            $grid->rows[$intCounter]['cell'] = array();
            foreach ($this->_columns as $column) {
                array_push($grid->rows[$intCounter]['cell'], $column->cellValue($row));
            }
            $intCounter ++;
        }
        return $grid;
    }

    /**
     * Return filter parameters for single or multiple fields.
     *
     * @param Zend_Request $request
     */
    private function _getFilterParams ($request)
    {
        $filters = array();
        // Multiple field filtering
        if ($request->getParam('filters')) {
            $filter = Zend_Json::decode($request->getParam('filters'));
            if (count($filter['rules']) > 0) {
                foreach ($filter['rules'] as $rule) {
                    $objColumn = $this->getColumn($rule['field']);
                    if ($objColumn->getOption('schema')) {
                        $filters['field'][] = $objColumn->getOption('schema') . "." . $rule['field'];
                    } elseif ($objColumn->getOption('customField')) {
                        $filters['field'][] = $objColumn->getOption('customField');
                    } else {
                        $filters['field'][] = $rule['field'];
                    }
                    $filters['value'][] = $objColumn->unformatValue($rule['data'],$rule['op']);
                    $filters['expression'][] = $objColumn->getExpression($this->_expression[$rule['op']]);
                    $boolHaving = $objColumn->getOption('useHaving');
                    if (! empty($boolHaving)) {
                        $filters['useHaving'][] = true;
                    } else {
                        $filters['useHaving'][] = false;
                    }
                    $intUnionPart = $objColumn->getOption('unionPart');
                    if (! empty($intUnionPart)) {
                        $filters['unionPart'][] = $intUnionPart;
                    } else {
                        $filters['unionPart'][] = 0;
                    }
                }
                $filters['options']['multiple'] = true;
                $filters['options']['boolean'] = (isset($filter['groupOp'])) ? $filter['groupOp'] : 'AND';
                return $filters;
            }
        }
        // Single field filtering
        $arrFilters = array('field' => $request->getParam('searchField'), 'value' => trim($request->getParam('searchString')), 
        'expression' => $this->_expression[$request->getParam('searchOper', 'eq')], 'options' => array());
        return $arrFilters;
    }

    protected function setGridEvent ($strEventName, $strData = null)
    {
        $this->setOption($strEventName, $strData);
    }

    public function setDblClkEdit ()
    {
        $strParamsEdit = $this->getPager()->getConfig('strEditData');
        //		$arrParamsEdit = array ();
        //		if (! empty ( $arrParamsPlugin ) && ! empty ( $arrParamsPlugin ['edit'] )) {
        //			$arrParamsEdit = $arrParamsPlugin ['edit'];
        //		}
        //		
        //		$strParamsEdit = $this->encodeJsonOptions ( $arrParamsEdit );
        $this->setGridEvent('ondblClickRow', "function(rowId, iRow, iCol, e){ if(rowId){  $(this).jqGrid('editGridRow',rowId, {$strParamsEdit}); } }");
    }

    public function setLocalEdit ()
    {
        $request = Zend_Controller_Front::getInstance()->getRequest();
        $strUrl = $this->getView()->url(array('module' => $request->getModuleName(), 'controller' => $request->getControllerName(), 'action' => $request->getActionName(), 'grid' => $this->getId()), null, false, true);
        $this->setOption("editurl", $strUrl);
        return $this;
    }

    public function encodeJsonOptions ($arrProperties)
    {
        $strOptions = '';
        if ($this->isUseCustonJson()) {
            $arrUnEscapeList = array_merge(Ingot_JQuery_JqGrid::$arrEvents, Ingot_JQuery_JqGrid::$arrCallbacks);
            // Iterate over array
            foreach ((array) $arrProperties as $strPropertyKey => $mixProperty) {
                if (! empty($strOptions)) {
                    $strOptions .= ", ";
                }
                // Check that it's not one of the elements that needs escaiping 	
                if (in_array($strPropertyKey, $arrUnEscapeList, true)) {
                    // This value does not need escaiping
                    $strOptions .= '"' . $strPropertyKey . '":' . $mixProperty;
                } else {
                    if (is_array($mixProperty)) {
                        // Recursive call
                        $strOptions .= '"' . $strPropertyKey . '":' . $this->encodeJsonOptions($mixProperty);
                    } else {
                        $strOptions .= '"' . $strPropertyKey . '":' . ZendX_JQuery::encodeJson($mixProperty);
                    
     //$strOptions .= '"' . $strPropertyKey . '":' . custom_json::encode ( $mixProperty );
                    }
                }
            }
            $strOptions = "{" . $strOptions . "}";
        } else {
            $strOptions = ZendX_JQuery::encodeJson($arrProperties);
        }
        return $strOptions;
    }

    public function clearFilterParams ($request)
    {
        return $this->_getFilterParams($request);
    }

    /**
     *
     * Use Local JSON class or not
     *
     * @param bool $boolFlag
     * @return Ingot_JQuery_JqGrid
     */
    public function setCustomJson ($boolFlag = true)
    {
        $this->_boolCustomJson = $boolFlag;
        return $this;
    }

    /**
     *
     * Use Local JSON class or not
     *
     * @return bool
     */
    public function isUseCustonJson ()
    {
        return $this->_boolCustomJson;
    }

    /**
     * 
     * Enter description here ...
     * @return Ingot_JQuery_JqGrid_Plugin_Abstract
     */
    public function getPager ()
    {
        return $this->getPlugin($this->_pagerClass);
    }
}

class custom_json
{

    /**
     * Convert array to javascript object/array
     * :TODO Work with numbers
     * 
     * @param array $array the array
     * @return string
     */
    public static function encode ($array)
    {
        if (! is_array($array) && ! is_object($array)) {
            $output = self::_val($array);
        } else {
            // determine type
            if (is_numeric(key($array))) {
                $last = sizeof($array) - 1;
                // indexed (list)
                $output = '[';
                for ($i = 0, $last = (sizeof($array) - 1); isset($array[$i]); ++ $i) {
                    if (is_array($array[$i]))
                        $output .= self::encode($array[$i]);
                    else
                        $output .= self::_val($array[$i]);
                    if ($i !== $last)
                        $output .= ',';
                }
                $output .= ']';
            } else {
                // associative (object)
                $output = '{';
                $last = count($array) - 1;
                $last = 0;
                foreach ($array as $key => $value) {
                    $last ++;
                }
                $last --;
                $i = 0;
                foreach ($array as $key => $value) {
                    $output .= '"' . $key . '":';
                    if (is_array($value))
                        $output .= self::encode($value);
                    else
                        $output .= self::_val($value);
                    if ($i !== $last)
                        $output .= ',';
                    ++ $i;
                }
                $output .= '}';
            }
        }
        // return
        return $output;
    }

    /**
     * [INTERNAL] Format value
     * @param mixed $val the value
     * @return string
     */
    private static function _val ($val)
    {
        if (is_string($val)) {
            return '"' . $val . '"';
        } elseif (is_int($val)) {
            return sprintf('%d', $val);
        } elseif (is_float($val)) {
            return sprintf('%F', $val);
        } elseif (is_bool($val)) {
            return ($val ? 'true' : 'false');
        } else
            return 'null';
    }
}