<?php
class MJaxMCColumn extends MJaxPanel{
    public $arrOptions = array();
    public function __construct($objParentControl, $strControlId = null) {
        parent::__construct($objParentControl, $strControlId);
        //_dv($objParentControl);
        $this->strTemplate = __MJAX_MILLER_COLUMNS_CORE_VIEW__ . '/' .get_class($this) . '.tpl.php';
    }
    public function AddOption($strOption, $mixKey, $blnDisabled = false){
        if(is_string($mixKey)){
            $strKey = $mixKey;
        }else{
            throw new Exception('No construction method defined for this data type: ' . $mixKey);
        }
        $strIdExtention = str_replace(':','-', $strKey);
        $strControlId = $this->ControlId . '_' . $strIdExtention;
        $strNewKey = $this->strActionParameter . '/' . $strKey;
        $this->arrOptions[$strNewKey] = new MJaxMCOption($this, $strControlId);
        $this->arrOptions[$strNewKey]->ActionParameter = $this->strActionParameter . '/' . $strKey;
        //$this->arrOptions[$strNewKey]->Attr('data-ap', $this->arrOptions[$strNewKey]->ActionParameter);
        $strPayload = explode(':', $strKey);
        if(
            $blnDisabled ||
            (
                (class_exists('MDEThoughtDriver')) && //TMP HACK
                (!array_key_exists($strPayload[0], MDEThoughtDriver::$arrThoughts)) //TMP HACK
            )
        ){
            $this->arrOptions[$strNewKey]->AddCssClass('mlc-disabled');
        }else{
            $this->arrOptions[$strNewKey]->AddAction($this, 'optOption_click');
        }
        $this->arrOptions[$strNewKey]->Text = $strOption;

    }
    public function optOption_click($strFormId, $strControlId, $strActionParam){
        if(array_key_exists($strActionParam, $this->arrOptions)){
            $optSelected = $this->arrOptions[$strActionParam];
            unset($this->arrOptions[$strActionParam]);
            $arrMerge = array($optSelected);
            $this->arrOptions = array_merge($arrMerge, $this->arrOptions);
        }
        $this->objParentControl->SelectedKey = $strActionParam;
        $this->objForm->TriggerControlEvent(
            $this->objParentControl->ControlId,
            'mjax-mc-option-select'
        );
    }
}