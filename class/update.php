<?php
    /**
     * updateConfig
     *
     * @param  mixed $idProduct
     * @param  mixed $textPiece
     *
     * @return {true: Success, (-1): Warning, false: error}
     */
    function updateConfig($label, $value)
    {
        $tableConfig = 'map_config';       
        $where = 'name = \'__DATA__MAP__GOO__\'';
        $ans = array();
        if(!empty($value)):
            $datos = array(
                $label => $value
            );
            $ans[] = DB::getInstance()->update(
                $tableConfig,
                $datos,
                $where
            );
        endif;
        if(!empty($ans))
            return true;  
        return false;
    }
    function getConfig()
    {
        $tableConfig = 'map_config';       
        $where = 'name = \'__DATA__MAP__GOO__\'';

        $sql = 'SELECT * FROM '._DB_PREFIX_.$tableConfig.' WHERE '.$where;
        $ans = DB::getInstance()->executeS($sql);

        if(!empty($ans[0])):
            return $ans[0];
        else:
            return false;
        endif;
    }
    function getAdressShop(){
        $sql = 'SELECT SQL_CALC_FOUND_ROWS a.* , cl.`name` country, st.`name` state, sl.* FROM `'._DB_PREFIX_.'store` a LEFT JOIN `'._DB_PREFIX_.'country_lang` cl ON (cl.`id_country` = a.`id_country` AND cl.`id_lang` = 1) LEFT JOIN `'._DB_PREFIX_.'state` st ON (st.`id_state` = a.`id_state`) LEFT JOIN `'._DB_PREFIX_.'store_lang` sl ON (sl.`id_store` = a.`id_store` AND sl.`id_lang` = 1) WHERE 1 ORDER BY a.id_store ASC';
        $ans = DB::getInstance()->executeS($sql);
        return $ans;
    }
    
    function getAdressShopTechnicalServer(){
        $sql = 'SELECT SQL_CALC_FOUND_ROWS a.* , cl.`name` country, st.`name` state, sl.* FROM `'._DB_PREFIX_.'store` a LEFT JOIN `'._DB_PREFIX_.'country_lang` cl ON (cl.`id_country` = a.`id_country` AND cl.`id_lang` = 1) LEFT JOIN `'._DB_PREFIX_.'state` st ON (st.`id_state` = a.`id_state`) LEFT JOIN `'._DB_PREFIX_.'store_lang` sl ON (sl.`id_store` = a.`id_store` AND sl.`id_lang` = 1) WHERE a.`type_store` = "Technical Server" ORDER BY a.id_store ASC';
        $ans = DB::getInstance()->executeS($sql);
        return $ans;
    }
    
    function getAdressShopSellPoint(){
        $sql = 'SELECT SQL_CALC_FOUND_ROWS a.* , cl.`name` country, st.`name` state, sl.* FROM `'._DB_PREFIX_.'store` a LEFT JOIN `'._DB_PREFIX_.'country_lang` cl ON (cl.`id_country` = a.`id_country` AND cl.`id_lang` = 1) LEFT JOIN `'._DB_PREFIX_.'state` st ON (st.`id_state` = a.`id_state`) LEFT JOIN `'._DB_PREFIX_.'store_lang` sl ON (sl.`id_store` = a.`id_store` AND sl.`id_lang` = 1) WHERE a.`type_store` = "Sell Point" ORDER BY a.id_store ASC';
        $ans = DB::getInstance()->executeS($sql);
        return $ans;
    }
    
    function getLatLon(){
        $sql = 'SELECT a.id_store, a.city, a.latitude, a.longitude, sl.name, sl.address1, st.name AS "name_state" FROM `'._DB_PREFIX_.'store` a LEFT JOIN `'._DB_PREFIX_.'country_lang` cl ON (cl.`id_country` = a.`id_country` AND cl.`id_lang` = 1) LEFT JOIN `'._DB_PREFIX_.'state` st ON (st.`id_state` = a.`id_state`) LEFT JOIN `'._DB_PREFIX_.'store_lang` sl ON (sl.`id_store` = a.`id_store` AND sl.`id_lang` = 1) WHERE 1 ORDER BY a.id_store ASC';
        $ans = DB::getInstance()->executeS($sql);
        return $ans;
    }
    
    function getLatLonShopTechnicalServer(){
        $sql = 'SELECT a.id_store, a.city, a.latitude, a.longitude, sl.name, sl.address1, st.name AS "name_state" FROM `'._DB_PREFIX_.'store` a LEFT JOIN `'._DB_PREFIX_.'country_lang` cl ON (cl.`id_country` = a.`id_country` AND cl.`id_lang` = 1) LEFT JOIN `'._DB_PREFIX_.'state` st ON (st.`id_state` = a.`id_state`) LEFT JOIN `'._DB_PREFIX_.'store_lang` sl ON (sl.`id_store` = a.`id_store` AND sl.`id_lang` = 1) WHERE a.`type_store` = "Technical Server" ORDER BY a.id_store ASC';
        $ans = DB::getInstance()->executeS($sql);
        return $ans;
    }
    
    function getLatLonShopSellPoint(){
        $sql = 'SELECT a.id_store, a.city, a.latitude, a.longitude, sl.name, sl.address1, st.name AS "name_state" FROM `'._DB_PREFIX_.'store` a LEFT JOIN `'._DB_PREFIX_.'country_lang` cl ON (cl.`id_country` = a.`id_country` AND cl.`id_lang` = 1) LEFT JOIN `'._DB_PREFIX_.'state` st ON (st.`id_state` = a.`id_state`) LEFT JOIN `'._DB_PREFIX_.'store_lang` sl ON (sl.`id_store` = a.`id_store` AND sl.`id_lang` = 1) WHERE a.`type_store` = "Sell Point" ORDER BY a.id_store ASC';
        $ans = DB::getInstance()->executeS($sql);
        return $ans;
    }
    
    function getCity(){
        $sql = 'SELECT a.city FROM `'._DB_PREFIX_.'store` a LEFT JOIN `'._DB_PREFIX_.'country_lang` cl ON (cl.`id_country` = a.`id_country` AND cl.`id_lang` = 1) LEFT JOIN `'._DB_PREFIX_.'state` st ON (st.`id_state` = a.`id_state`) LEFT JOIN `'._DB_PREFIX_.'store_lang` sl ON (sl.`id_store` = a.`id_store` AND sl.`id_lang` = 1) WHERE 1 ORDER BY a.city ASC';
        $ans = DB::getInstance()->executeS($sql);
        return $ans;
    }
    
    function getCityShopTechnicalServer(){
        $sql = 'SELECT a.city FROM `'._DB_PREFIX_.'store` a LEFT JOIN `'._DB_PREFIX_.'country_lang` cl ON (cl.`id_country` = a.`id_country` AND cl.`id_lang` = 1) LEFT JOIN `'._DB_PREFIX_.'state` st ON (st.`id_state` = a.`id_state`) LEFT JOIN `'._DB_PREFIX_.'store_lang` sl ON (sl.`id_store` = a.`id_store` AND sl.`id_lang` = 1) WHERE a.`type_store` = "Technical Server" ORDER BY a.city ASC';
        $ans = DB::getInstance()->executeS($sql);
        return $ans;
    }
    
    function getCityShopSellPoint(){
        $sql = 'SELECT a.city FROM `'._DB_PREFIX_.'store` a LEFT JOIN `'._DB_PREFIX_.'country_lang` cl ON (cl.`id_country` = a.`id_country` AND cl.`id_lang` = 1) LEFT JOIN `'._DB_PREFIX_.'state` st ON (st.`id_state` = a.`id_state`) LEFT JOIN `'._DB_PREFIX_.'store_lang` sl ON (sl.`id_store` = a.`id_store` AND sl.`id_lang` = 1) WHERE a.`type_store` = "Sell Point" ORDER BY a.city ASC';
        $ans = DB::getInstance()->executeS($sql);
        return $ans;
    }