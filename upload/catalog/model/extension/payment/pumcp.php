<?php 
class ModelExtensionPaymentPumcp extends Model {
  	public function getMethod($address, $total) {
		$this->load->language('extension/payment/pumcp');
		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "zone_to_geo_zone WHERE geo_zone_id = '" . (int)$this->config->get('pumcp_geo_zone_id') . "' AND country_id = '" . (int)$address['country_id'] . "' AND (zone_id = '" . (int)$address['zone_id'] . "' OR zone_id = '0')");
		
		if ($this->config->get('payment_pumcp_total') > $total) {
			$status = false;
		} elseif (!$this->config->get('payment_pumcp_geo_zone_id')) {
			$status = true;
		} elseif ($query->num_rows) {
			$status = true; 
		} else {
			$status = false;
		}	
		
		// Determine which gateway to use!! PayU or Citrus
		// $this->language->get('text_title')
		$text_title = ''; //text_title in language file not used
		
		//Check which or both of the gateways enabled...

		if(!$this->config->get('payment_pumcp_payu_merchant') && !$this->config->get('payment_pumcp_payu_salt')) {
			$text_title = 'CitrusPay';			
		}
		elseif(!$this->config->get('payment_pumcp_citrus_vanityurl') && !$this->config->get('payment_pumcp_citrus_access_key') && !$this->config->get('payment_pumcp_citrus_secret_key')) {
			$text_title = 'PayUmoney';
		}
		else {
			if($this->config->get('payment_pumcp_route_citrus') == 0)
			{
				$text_title = 'PayUmoney';
			}
			elseif($this->config->get('payment_pumcp_route_payu') == 0)
			{
				$text_title = 'CitrusPay';	
			}
			else {
				$cper = $this->db->query("SELECT I.payment_method,I.payment_code, COUNT(*) / T.total * 100 AS percent FROM oc_order as I, (SELECT COUNT(*) AS total FROM oc_order where order_status_id > 0) AS T WHERE payment_method='CitrusPay' and payment_code='pumcp' and order_status_id >= ".$this->config->get('payment_pumcp_order_status_id'));
		
				$pper = $this->db->query("SELECT I.payment_method,I.payment_code, COUNT(*) / T.total * 100 AS percent FROM oc_order as I, (SELECT COUNT(*) AS total FROM oc_order where order_status_id > 0) AS T WHERE payment_method='PayUmoney' and payment_code='pumcp' and order_status_id >= ".$this->config->get('payment_pumcp_order_status_id'));			
				
				if($cper->row['percent'] > $this->config->get('payment_pumcp_route_citrus') && $pper->row['percent'] <= $this->config->get('payment_pumcp_route_payu')) {
					$text_title = 'PayUmoney';
				}
				elseif($cper->row['percent'] <= $this->config->get('payment_pumcp_route_citrus') && $pper->row['percent'] > $this->config->get('payment_pumcp_route_payu')) {
					$text_title = 'CitrusPay';
				}
				else {
					if($pper->row['percent'] >= $cper->row['percent'])
						$text_title = 'CitrusPay';
					else
						$text_title = 'PayUmoney';
				}
			}
		}
		
		$method_data = array();
	
		if ($status && $text_title) {  
      		$method_data = array( 
        		'code'       => 'pumcp',
        		'title'      => $text_title,
				'terms'      => '',
				'sort_order' => $this->config->get('payment_pumcp_sort_order')
      		);
    	}
   
    	return $method_data;
  	}
	
	
	
}
?>