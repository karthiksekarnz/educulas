<?php

class AttendanceController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $attendenceForm = new Application_Form_Attendance();
        $this->view->attendanceform = $attendenceForm;

         $books = array(
            array(  'title' => 'PHP Objects, Patterns, and Practice (2nd edition)',
                    'author' => 'Matt Zandstra',
                    'purchased' => '2006-05-01'),

            array(  'title' => 'Patterns of Enterprise Application Architecture',
                    'author' => 'Martin Fowler',
                    'purchased' => '2007-08-10'),

            array(  'title' => 'Domain Driven Design: Tackling Complexity in the Heart of Software',
                    'author' => 'Eric Evans',
                    'purchased' => '2009-02-06')
        );

      $colmodel = '[
           {name:"title",index:"title", width:200, editable:true},
           {name:"author",index:"author", width:80, align:"right",sorttype:"float", formatter:"number", editable:true},
           {name:"purchased",index:"purchased", width:80, align:"right",sorttype:"float", editable:true},
          ]';

      $dat = '[{id:"1",invdate:"2010-05-24",name:"test",note:"note",tax:"10.00",total:"2111.00"},{id:"2",invdate:"2010-05-25",name:"test2",note:"note2",tax:"20.00",total:"320.00"}, {id:"3",invdate:"2007-09-01",name:"test3",note:"note3",tax:"30.00",total:"430.00"},{id:"4",invdate:"2007-10-04",name:"test",note:"note",tax:"10.00",total:"210.00"},{id:"5",invdate:"2007-10-05",name:"test2",note:"note2",tax:"20.00",total:"320.00"}]';
      $colm = "[{name:'id',index:'id', width:60, sorttype:'int'},{name:'invdate',index:'invdate', width:90, sorttype:'date', formatter:'date'},{name:'name',index:'name', width:100, editable:true},{name:'amount',index:'amount', width:80, align:'right',sorttype:'float', formatter:'number', editable:true},{name:'tax',index:'tax', width:80, align:'right',sorttype:'float', editable:true},{name:'total',index:'total', width:80,align:'right',sorttype:'float'},{name:'note',index:'note', width:150, sortable:false}]";

      
      $options = array(
     "data" => $dat,
     "datatype" => "local",
     "height" => 'auto',
     "rowNum" => 30,
     "url" => "dummy",
     "rowList" => array(10,20,30),
      "colNames" => array('Inv No','Date', 'Client', 'Amount','Tax','Total','Notes'),
       "colModel" => $colm,
       "pager" => "#pager",
       "viewrecords" => true,
      "cellEdit" => true,
       "caption" => "jqGrid multigrouping with 'groupingGroupBy' method"
     );

        $grid = new Ingot_JQuery_JqGrid('grid',
                     new Ingot_JQuery_JqGrid_Adapter_Array($books),$options);

      
         
         $grid->registerPlugin(new Ingot_JQuery_JqGrid_Plugin_ToolbarFilter());
                 
         $this->view->grid =  $grid->render();

        

    }


}

