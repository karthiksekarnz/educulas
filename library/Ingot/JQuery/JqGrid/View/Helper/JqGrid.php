<?php

/**
 * @see ZendX_JQuery_View_Helper_UiWidget
 */
require_once 'ZendX/JQuery/View/Helper/UiWidget.php';

/**
 * JqGrid View Helper
 * 
 * @package Ingot_JQuery_JqGrid
 * @copyright Copyright (c) 2005-2009 Warrant Group Ltd. (http://www.warrant-group.com)
 * @author Andy Roberts
 */

class Ingot_JQuery_JqGrid_View_Helper_JqGrid extends ZendX_JQuery_View_Helper_UiWidget {
	 
	private $_arrUnEscapeList = array ();
	
	protected function getOptionsString(Ingot_JQuery_JqGrid $grid) {
		
		$arrGridOptions = $grid->getOptions ();
		
		$strOptions = $grid->encodeJsonOptions($arrGridOptions);
		return $strOptions;
	}
	
	/**
	 * Render jqGrid
	 * 
	 * @param Ingot_JQuery_JqGrid $grid
	 */
	public function jqGrid(Ingot_JQuery_JqGrid $grid) {
		
		$html = array ();
		$js = array ();
		$onload = array ();
		
		$onload [] = sprintf ( '%s("#%s").jqGrid(%s);', ZendX_JQuery_View_Helper_JQuery::getJQueryHandler (), $grid->getId (), $this->getOptionsString ( $grid ) );
		
		$html [] = '<table id="' . $grid->getId () . '"><tr><td /></tr></table>';
		
		// Load the jqGrid plugin view variables
		$html = array_merge ( $html, $this->view->jqGridPluginBroker ['html'] );
		$js = array_merge ( $js, $this->view->jqGridPluginBroker ['js'] );
		$onload = array_merge ( $onload, $this->view->jqGridPluginBroker ['onload'] );
		
		$this->jquery->addOnLoad ( implode ( "\n", $onload ) );
		$this->view->headScript ()->appendScript ( implode ( "\n", $js ) );
		
		return implode ( "\n", $html );
	}
}