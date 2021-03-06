<?php
/*
  $Id: rpc.php v1.0 2013-01-01 datazen $

  LoadedCommerce, Innovative eCommerce Solutions
  http://www.loadedcommerce.com

  Copyright (c) 2013 Loaded Commerce, LLC

  @author     LoadedCommerce Team
  @copyright  (c) 2013 LoadedCommerce Team
  @license    http://loadedcommerce.com/license.html

  @function The lC_Modules_payment_Admin_rpc class is for AJAX remote program control
*/
require_once('includes/applications/modules_payment/classes/modules_payment.php');    
require_once('includes/classes/payment.php');

class lC_Modules_payment_Admin_rpc {
 /*
  * Returns the modules datatable data for listings
  *
  * @access public
  * @return json
  */
  public static function getAll() {
    $result = lC_Modules_payment_Admin::getAll();
    $result['rpcStatus'] = RPC_STATUS_SUCCESS;

    echo json_encode($result);
  }
 /*
  * Return the data used on the dialog forms
  *
  * @param string $_GET['module'] The module name
  * @access public
  * @return json
  */
  public static function getFormData() {
    $result = lC_Modules_payment_Admin::getData($_GET['module']);     
    $result['rpcStatus'] = RPC_STATUS_SUCCESS;

    echo json_encode($result);
  } 
 /*
  * Save the module
  *
  * @param string $_GET['configuration'] The module name
  * @access public
  * @return json
  */ 
  public static function saveModule() { 
    $result = array();
    $saved = lC_Modules_payment_Admin::save(array('configuration' => $_GET['configuration']));
    if ($saved) {
      $result['rpcStatus'] = RPC_STATUS_SUCCESS;
    }

    echo json_encode($result);
  } 
 /*
  * Uninstall the module
  *
  * @param string $_GET['module'] The module name
  * @access public
  * @return json
  */
  public static function uninstallModule() {
    $result = array();
    $uninstalled = lC_Modules_payment_Admin::uninstall($_GET['module']);
    if ($uninstalled) {
      $result['rpcStatus'] = RPC_STATUS_SUCCESS;
    }

    echo json_encode($result);
  } 
 /*
  * Install the module
  *
  * @param string $_GET['module'] The module name
  * @access public
  * @return json
  */ 
  public static function installModule() {
    $result = array();
    $installed = lC_Modules_payment_Admin::installModule($_GET['module']);
    if ($installed) {
      $result['rpcStatus'] = RPC_STATUS_SUCCESS;
    }

    echo json_encode($result);
  }        
}
?>