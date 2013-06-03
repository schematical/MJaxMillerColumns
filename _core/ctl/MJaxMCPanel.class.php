<?php
class MJaxMCPanel extends MJaxPanel{
     public $arrColumns = array();
     public $intMaxColumns = 4;
     protected $strSelectedKey = null;

     public function __construct($objParentControl, $strControlId = null) {
         parent::__construct($objParentControl, $strControlId);
         $this->strTemplate = __MJAX_MILLER_COLUMNS_CORE_VIEW__ . '/' .get_class($this) . '.tpl.php';
         //$this->objForm->AddHeaderAsset(new MJaxJSHeaderAsset('https://www.google.com/jsapi'));
         $this->objForm->AddHeaderAsset(
             new MJaxCssHeaderAsset(__MJAX_MILLER_COLUMNS_CORE_ASSETS__ . 'css/style.css')
         );
         $this->objForm->AddHeaderAsset(
             new MJaxJSHeaderAsset(__MJAX_MILLER_COLUMNS_CORE_ASSETS__ . 'js/MJax.MillerColumns.js')
         );
         /*$this->objForm->AddJSCall(
             sprintf(
                'MJax.MillerColumns.Init("#%s")',
                $this->strControlId
             )
         );*/
         $this->AddCssClass('MJaxMCPanel');
     }
     public function AddColumn(MJaxMCColumn $ctlColumn){
        $this->arrColumns[$ctlColumn->ControlId] = $ctlColumn;
     }
    /////////////////////////
    // Public Properties: GET
    /////////////////////////
    public function __get($strName) {
        switch ($strName) {
            case "SelectedKey": return $this->strSelectedKey;
            case "MaxColumns": return $this->intMaxColumns;
            default:
                return parent::__get($strName);
        }
    }
    public function RemoveAllColumns(){
        foreach($this->arrColumns as $intIndex => $objColumn){
            $this->RemoveLastColumn();
        }
    }
    public function RemoveLastColumn(){
        $arrKeys = array_keys($this->arrColumns);
        $strControlId = $arrKeys[count($this->arrColumns) - 1];
        $this->arrColumns[$strControlId]->Remove();
        unset($this->arrColumns[$strControlId]);

    }

    /////////////////////////
    // Public Properties: SET
    /////////////////////////
    public function __set($strName, $mixValue) {
        $this->blnModified = true;
        switch ($strName) {
            case "SelectedKey":
                return ($this->strSelectedKey = $mixValue);
            case "MaxColumns":
                return ($this->intMaxColumns = $mixValue);
            default:
                return parent::__set($strName, $mixValue);
        }
    }

}