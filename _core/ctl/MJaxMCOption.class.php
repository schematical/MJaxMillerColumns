<?php
class MJaxMCOption extends MJaxPanel{
    public function __construct($objParentControl, $strControlId = null) {
        parent::__construct($objParentControl, $strControlId);
        //$this->strTemplate = __MJAX_MILLER_COLUMNS_CORE_VIEW__ . '/' .get_class($this) . '.tpl.php';
        $this->AddCssClass('MJaxMCOption');
    }
}