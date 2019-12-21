<?php


class MaplocaliceAjaxsellpointsModuleFrontController extends ModuleFrontController
{
    public function initContent()
    {
        $this->ajax = true;
		// your code here
		parent::initContent();
    }
    
    public function displayAjax()
	{
	    $print_r = isset( $_GET['data'] ) ? $_GET['data'] : '';
	    if ( isset($_POST['datos']) && !empty($_POST['datos']) ) {
	        
	        $sql = 'SELECT a.id_store, a.city, a.latitude, a.longitude, sl.name, sl.address1, st.name AS \'name_state\', cl.name as \'country_name\' FROM `ps_store` a LEFT JOIN `ps_country_lang` cl ON (cl.`id_country` = a.`id_country` AND cl.`id_lang` = 1) LEFT JOIN `ps_state` st ON (st.`id_state` = a.`id_state`) LEFT JOIN `ps_store_lang` sl ON (sl.`id_store` = a.`id_store` AND sl.`id_lang` = 1) WHERE a.id_store = "' . $_POST['datos'] . '" AND a.`type_store` = "Sell Point" ORDER BY a.id_store ASC';
	        $responses = DB::getInstance()->ExecuteS( $sql );
	        die(Tools::JsonEncode(['resuesta' => $responses]));
	    }
	    if (!empty( $print_r ) ) {
	        $sql = 'SELECT a.id_store, a.city, a.latitude, a.longitude, sl.name, sl.address1, st.name AS \'name_state\', cl.name as \'country_name\' FROM `ps_store` a LEFT JOIN `ps_country_lang` cl ON (cl.`id_country` = a.`id_country` AND cl.`id_lang` = 1) LEFT JOIN `ps_state` st ON (st.`id_state` = a.`id_state`) LEFT JOIN `ps_store_lang` sl ON (sl.`id_store` = a.`id_store` AND sl.`id_lang` = 1) WHERE a.city = "' . $print_r . '" AND a.`type_store` = "Sell Point" ORDER BY a.id_store ASC';
	        
	        $responses = DB::getInstance()->ExecuteS( $sql );
            $output = '';
	        foreach ($responses as $response) {
	            //print_r($response);die();
	            $output .= '<div class="margin-d">';
	            $output .= '<span class="title">' . $response['name'] . '</span>';
	            $output .= '<span class="span-mb">' . $response['address1'] . '</span>';
	            $output .= '<span class="span-mb">' . ucfirst($response['city']) . ' ' . ucfirst($response['name_state']) . '</span>';
	            $output .= '<span class="span-mb">' . $response['country_name'] . '</span>';
	            $output .= '<a href="javascript:void(0);" id="' . $response['id_store'] . '" data-lat="' . $response['latitude'] . '" data-lng="' . $response['longitude'] . '">Cómo llegar</a>';
	            $output .= '</div>';
	        }
	        
	         die( Tools::jsonEncode( [$output ,JSON_HEX_QUOT | JSON_HEX_TAG, 'error' => false] ) );
	         
	    } else {
	        die( Tools::jsonEncode( array( 'error' => true, 'message' => $this->l('Error data') ) ) );
	    }
	}
	
	public function displayProcess()
	{
	    die(Tools::JsonEncode(['resuesta' => 'hello']));
	}
	
	public function centerOfServices()
	{
	    // Will use the file modules/cheque/views/templates/front/validation.tpl
        $this->setTemplate('test.tpl');
	}
}