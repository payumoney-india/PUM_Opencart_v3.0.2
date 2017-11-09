<?php
/* Opencart Module v2.3.0.2 for PayUmoney and Citrus Payment ICP - Copyrighted file - Please do not modify/refactor/disasseble/extract any or all part content  */
// Heading
$_['heading_title']      	= 'PayUmoney &amp; Citrus ICP'; 

// Text 
$_['text_payment']       	= 'Extensions';

$_['text_pumcp']      		= '<a onclick="window.open(\'https://www.payumoney.com\');"><img src="view/image/payment/payulogo.png" alt="PayUmoney" title="PayUmoney" style="border: 1px solid #EEEEEE;" height="25" /></a><a onclick="window.open(\'http://www.citruspay.com/\');"><img src="view/image/payment/citrus.png" alt="Citrus Website" title="Citrus Website" style="border: 1px solid #EEEEEE;" height="30" /></a>';

$_['text_edit'] 			= 'Edit Module Parameters';

//General Settings
$_['entry_route']    		= 'Route Traffic (%):';
$_['entry_route_payu']  	= 'PayUmoney';
$_['entry_route_citrus'] 	= 'Citrus Pay';
$_['help_route'] 			= '% of total transactions to route to each gateway. This option will come into effect only if both PayUmoney and Citrus are configured.';

$_['entry_module']   		= 'Gateway Mode:';  
$_['entry_module_id'] 		='Sandbox|Production';
$_['entry_geo_zone']     	= 'Geo Zone:';
$_['entry_currency']		= 'Currency';
$_['entry_total']        	= 'Total';
$_['entry_order_status'] 	= 'Success Order Status:';
$_['entry_order_fail_status'] = 'Cancel/Fail Order Status:';
$_['text_disabled']  		= 'Disabled';
$_['text_enabled']  		= 'Enabled';
$_['entry_status']       	= 'Status:';
$_['entry_sort_order']   	= 'Sort Order:';
$_['text_success']       	= 'Success: You have successfully modified Payment settings';
$_['help_total']       		= 'Order total on which this payment option to be available for checkout.';
$_['help_currency']			= 'Three-letter ISO 4217 currency code required. e.g. USD,INR,etc.';
// Entry PayUM
$_['entry_merchant']     	= 'Merchant Key:';
$_['entry_salt']         	= 'Salt:';
$_['help_salt']		     	= 'Enter the Salt value provided by PayUmoney.';
$_['help_merchant']		    = 'Enter the Merchant Key provided by PayUmoney.';


//Entry Citrus
$_['entry_vanityurl']  		= 'Payment or Vanity Url:';
$_['entry_access_key']  	= 'Access Key:';
$_['entry_secret_key']  	= 'Secret Key:';
$_['help_vanityurl']		= 'Payment or Vanity URL as provided by Citrus Pay.';
$_['help_accesskey']		= 'Access Key as provided by Citrus Pay.';
$_['help_secretkey']		= 'Secret Key as provided by Citrus Pay.';

// Error
$_['error_permission']   	= 'Warning: You do not have permission to modify payment details!';
$_['error_route']     	    = 'Total %-ge value must be equal to 100!';
//Error PayUM
$_['error_merchant']     	= 'Merchant Key Required!';
$_['error_salt']         	= 'Salt Required!';
//Error Citrus
$_['error_module']   		= 'Invalid Mode';
$_['error_vanityrul']   	= 'Invalid payment or vanity url';
$_['error_accesskey']   	= 'Invalid access key';
$_['error_secretkey']   	= 'Invalid secret key';
$_['error_currency']		= 'Currency code required.';
$_['error_status'] 			= 'Either PayUmoney or Citrus Pay parameters must be configured to enable this module.';

/* config keys -
pumcp_payu_merchant
pumcp_payu_salt
pumcp_citrus_vanityurl
pumcp_citrus_access_key
pumcp_citrus_secret_key

pumcp_route_payu
pumcp_route_citrus

pumcp_module
pumcp_geo_zone_id
pumcp_currency
pumcp_total
pumcp_order_status_id
pumcp_order_fail_status_id
pumcp_status
pumcp_sort_order
*/

?>