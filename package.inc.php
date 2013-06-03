<?php
define('__MJAX_MILLER_COLUMNS__', dirname(__FILE__));
define('__MJAX_MILLER_COLUMNS_CORE__', __MJAX_MILLER_COLUMNS__ . '/_core');
define('__MJAX_MILLER_COLUMNS_CORE_CTL__', __MJAX_MILLER_COLUMNS_CORE__ . '/ctl');
define('__MJAX_MILLER_COLUMNS_CORE_MODEL__', __MJAX_MILLER_COLUMNS_CORE__ . '/model');
define('__MJAX_MILLER_COLUMNS_CORE_VIEW__', __MJAX_MILLER_COLUMNS_CORE__ . '/view');
define('__MJAX_MILLER_COLUMNS_CORE_ASSETS__', MLCApplication::GetAssetUrl('/', 'MJaxMillerColumns'));


MLCApplicationBase::$arrClassFiles['MJaxMCPanel'] = __MJAX_MILLER_COLUMNS_CORE_CTL__ . '/MJaxMCPanel.class.php';
MLCApplicationBase::$arrClassFiles['MJaxMCColumn'] = __MJAX_MILLER_COLUMNS_CORE_CTL__ . '/MJaxMCColumn.class.php';
MLCApplicationBase::$arrClassFiles['MJaxMCOption'] = __MJAX_MILLER_COLUMNS_CORE_CTL__ . '/MJaxMCOption.class.php';

require_once(__MJAX_MILLER_COLUMNS_CORE_CTL__ . '/_events.inc.php');


