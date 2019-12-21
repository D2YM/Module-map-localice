<?php

if (!defined('_PS_VERSION_')) {
    exit;
}
class Maplocalice extends Module
{
    public function __construct()
    {
        $this->name = 'maplocalice';
        $this->author = 'Arigato';
        $this->version = '1.0.0';
        $this->bootstrap = true;
        parent:: __construct();
        $this->displayName = $this->l('Map Localice');
        $this->description = $this->l('This is Module for prestashop, for look shop with google maps');
        $this->ps_versions_compliancy = array('min'=> '1.7.0.0', 'max'=>'1.7.9.9');
    }
    public function install()
    {
        if (Shop::isFeatureActive()) {
            Shop::setContext(Shop::CONTEXT_ALL);
        }
        include_once($this->local_path.'class/install.php');
        return  parent::install() &&
                $this->registerHook('header') &&
                $this->registerHook('displayHeader') &&
                $this->registerHook('displayBackOfficeHeader') &&
                $this->registerHook('displayFooterProduct') &&
                $this->registerHook('displayFooter') &&
                Configuration::updateValue('maplocalice', 'Map Localice');
    }
    public function uninstall()
    {
        include_once($this->local_path.'class/uninstall.php');
        return parent::uninstall();
    }
    
    public function getContent()
    {
        include_once($this->local_path.'class/update.php');
        $this->context->controller->addCSS(array(
           $this->_path.'views/css/style.css'
        ));
        
        $this->context->controller->addJS(array(
            'https://cdn.tiny.cloud/1/xoti0vqkfc2bum3qpirpgaf7lkgt71y18n03kvv6asjari8w/tinymce/5/tinymce.min.js',
            $this->_path.'views/js/admin.js'
        ));
        $output = null;
        $ans = null;
        $API_KEY = "api_key";
        $TITLE_LEFT_TS = "title_content_left_ts";
        $CONTENT_LEFT_TS = "text_content_left_ts";
        $TITLE_RIGHT_TS = "title_content_right_ts";
        $CONTENT_RIGHT_TS = "text_content_right_ts";
        $TITLE_LEFT_SP = "title_content_left_sp";
        $CONTENT_LEFT_SP = "text_content_left_sp";
        $TITLE_RIGHT_SP = "title_content_right_sp";
        $CONTENT_RIGHT_SP = "text_content_right_sp";
        
        if (Tools::isSubmit('post-config')) {

            $request = addslashes(strval(Tools::getValue($API_KEY)));    
            if (
                !$request ||
                empty($request) ||
                !Validate::isGenericName($request)
            ) {
                $output .= $this->displayError($this->l('Invalid API KEY'));
            } else {
                //Configuration::updateValue('MYMODULE_NAME', $api_key);
                $ans = updateConfig($API_KEY, $request);
                if($ans):
                    $output .= $this->displayConfirmation($this->l('Settings updated API KEY'));
                else:
                    $output .= $this->displayError($this->l('UPS! Error'));
                endif;
            }

            $request = addslashes(strval(Tools::getValue($TITLE_LEFT_TS)));    
            if (
                !$request ||
                empty($request) ||
                !Validate::isGenericName($request)
            ) {
                if(!empty($request))
                    $output .= $this->displayError($this->l('Invalid title left'));
            } else {
                //Configuration::updateValue('MYMODULE_NAME', $api_key);
                $ans = updateConfig($TITLE_LEFT_TS, $request);
                if($ans):
                    $output .= $this->displayConfirmation($this->l('Settings updated title left'));
                else:
                    $output .= $this->displayError($this->l('UPS! Error'));
                endif;
            }

            $request = addslashes(strval(Tools::getValue($CONTENT_LEFT_TS)));
            if (
                !$request ||
                empty($request)
            ) {
                if(!empty($request))
                    $output .= $this->displayError($this->l('Invalid content left'));
            } else {
                //Configuration::updateValue('MYMODULE_NAME', $api_key);
                $ans = updateConfig($CONTENT_LEFT_TS, $request);
                if($ans):
                    $output .= $this->displayConfirmation($this->l('Settings updated content left'));
                else:
                    $output .= $this->displayError($this->l('UPS! Error'));
                endif;
            }

            $request = addslashes(strval(Tools::getValue($TITLE_RIGHT_TS))); 
            if (
                !$request ||
                empty($request) ||
                !Validate::isGenericName($request)
            ) {
                if(!empty($request))
                    $output .= $this->displayError($this->l('Invalid title right'));
            } else {
                //Configuration::updateValue('MYMODULE_NAME', $api_key); 
                $ans = updateConfig($TITLE_RIGHT_TS, $request);
                if($ans):
                    $output .= $this->displayConfirmation($this->l('Settings updated title right'));
                else:
                    $output .= $this->displayError($this->l('UPS! Error'));
                endif;
            }

            $request = addslashes(strval(Tools::getValue($CONTENT_RIGHT_TS)));
            if (
                !$request ||
                empty($request)
            ) {
                if(!empty($request))
                    $output .= $this->displayError($this->l('Invalid content right'));
            } else {
                //Configuration::updateValue('MYMODULE_NAME', $api_key);
                $ans = updateConfig($CONTENT_RIGHT_TS, $request);
                if($ans):
                    $output .= $this->displayConfirmation($this->l('Settings updated content right'));
                else:
                    $output .= $this->displayError($this->l('UPS! Error'));
                endif;
            }

            $request = addslashes(strval(Tools::getValue($TITLE_LEFT_SP)));    
            if (
                !$request ||
                empty($request) ||
                !Validate::isGenericName($request)
            ) {
                if(!empty($request))
                    $output .= $this->displayError($this->l('Invalid title left'));
            } else {
                //Configuration::updateValue('MYMODULE_NAME', $api_key);
                $ans = updateConfig($TITLE_LEFT_SP, $request);
                if($ans):
                    $output .= $this->displayConfirmation($this->l('Settings updated title left'));
                else:
                    $output .= $this->displayError($this->l('UPS! Error'));
                endif;
            }

            $request = addslashes(strval(Tools::getValue($CONTENT_LEFT_SP)));    
            if (
                !$request ||
                empty($request)
            ) {
                if(!empty($request))
                    $output .= $this->displayError($this->l('Invalid content left'));
            } else {
                //Configuration::updateValue('MYMODULE_NAME', $api_key);
                $ans = updateConfig($CONTENT_LEFT_SP, $request);
                if($ans):
                    $output .= $this->displayConfirmation($this->l('Settings updated content left'));
                else:
                    $output .= $this->displayError($this->l('UPS! Error'));
                endif;
            }

            $request = addslashes(strval(Tools::getValue($TITLE_RIGHT_SP)));    
            if (
                !$request ||
                empty($request) ||
                !Validate::isGenericName($request)
            ) {
                if(!empty($request))
                    $output .= $this->displayError($this->l('Invalid title right'));
            } else {
                //Configuration::updateValue('MYMODULE_NAME', $api_key);
                $ans = updateConfig($TITLE_RIGHT_SP, $request);
                if($ans):
                    $output .= $this->displayConfirmation($this->l('Settings updated title right'));
                else:
                    $output .= $this->displayError($this->l('UPS! Error'));
                endif;
            }

            $request = addslashes(strval(Tools::getValue($CONTENT_RIGHT_SP)));    
            if (
                !$request ||
                empty($request)
            ) {
                if(!empty($request))
                    $output .= $this->displayError($this->l('Invalid content right'));
            } else {
                //Configuration::updateValue('MYMODULE_NAME', $api_key);
                $ans = updateConfig($CONTENT_RIGHT_SP, $request);
                if($ans):
                    $output .= $this->displayConfirmation($this->l('Settings updated content right'));
                else:
                    $output .= $this->displayError($this->l('UPS! Error'));
                endif;
            }
        }
        $ans = getConfig();
        $this->context->smarty->assign(array(
            'API_KEY' => $ans[$API_KEY],
            'TITLE_LEFT_TS' => $ans[$TITLE_LEFT_TS],
            'CONTENT_LEFT_TS' => $ans[$CONTENT_LEFT_TS],
            'TITLE_RIGHT_TS' => $ans[$TITLE_RIGHT_TS],
            'CONTENT_RIGHT_TS' => $ans[$CONTENT_RIGHT_TS],
            'TITLE_LEFT_SP' => $ans[$TITLE_LEFT_SP],
            'CONTENT_LEFT_SP' => $ans[$CONTENT_LEFT_SP],
            'TITLE_RIGHT_SP' => $ans[$TITLE_RIGHT_SP],
            'CONTENT_RIGHT_SP' => $ans[$CONTENT_RIGHT_SP]
        ));
        return $output.$this->display(__FILE__, 'views/templates/admin/configure.tpl');
    }
    public function hookDisplayHeader($params)
    {
        if ( Tools::getValue('controller') == 'product' || Tools::getValue('controller') == 'display'  || Tools::getValue('controller') == 'displaysellpoints') {
            include_once($this->local_path.'class/update.php');
           // echo Tools::getValue('controller');
            $this->context->controller->addCSS(array(
               $this->_path.'views/css/style.css',
                $this->_path.'views/css/select2.min.css'
            ));
            $this->context->controller->addJS(array(
                $this->_path.'views/js/main.js',
                $this->_path.'views/js/select2.min.js'
            ));
            if(Tools::getValue('controller') == 'display' || Tools::getValue('controller') == 'product'):
                $latLon = getLatLonShopTechnicalServer();
            elseif(Tools::getValue('controller') == 'displaysellpoints'):
                $latLon = getLatLonShopSellPoint();
            endif;
            $latLon = $this->transformFloat($latLon);
    
            Media::addJsDef(array(
                'map_LAT_LON' => $latLon
            ));
            
            $API_KEY = "api_key";
            $ans = getConfig();
    
            $URL = 'https://maps.googleapis.com/maps/api/js?key='.$ans[$API_KEY].'&callback=initMap&region=CO';
                $this->context->smarty->assign(array(
                    'module_link' => $this->_path.'views/js/map.js'
                ));
            
            return $this->display(__FILE__, 'views/templates/hook/_parcials/jsMap.tpl');
       }
    }
    public function hookDisplayFooter($params)
    {
        if ( Tools::getValue('controller') == 'product' || Tools::getValue('controller') == 'display'  || Tools::getValue('controller') == 'displaysellpoints') {
            
        include_once($this->local_path.'class/update.php');
        
        $API_KEY = "api_key";
        $ans = getConfig();
        $URL = 'https://maps.googleapis.com/maps/api/js?key='.$ans[$API_KEY].'&callback=initMap';
        $this->context->smarty->assign(array(
            '__URL__API__MAP__' => $URL
        ));
        return $this->display(__FILE__, 'views/templates/hook/_parcials/jsApi.tpl');
       }
    }
    public function hookDisplayBackOfficeHeader($params)
    {
    }
    public function hookDisplayFooterProduct()
    {
        include_once($this->local_path.'class/update.php');
        $output = null;
        $ans = null;
        $API_KEY = "api_key";
        $TITLE_LEFT_TS = "title_content_left_ts";
        $CONTENT_LEFT_TS = "text_content_left_ts";
        $TITLE_RIGHT_TS = "title_content_right_ts";
        $CONTENT_RIGHT_TS = "text_content_right_ts";
        $TITLE_LEFT_SP = "title_content_left_sp";
        $CONTENT_LEFT_SP = "text_content_left_sp";
        $TITLE_RIGHT_SP = "title_content_right_sp";
        $CONTENT_RIGHT_SP = "text_content_right_sp";
        $ans = getConfig();
        $addss = getAdressShopTechnicalServer();
        $URL = 'https://maps.googleapis.com/maps/api/js?key='.$ans[$API_KEY].'&callback=initMap';        
        $CITY = $this->uniqueCity(getCityShopTechnicalServer());
        $this->context->smarty->assign(array(
            'API_KEY' => $ans[$API_KEY],
            'TITLE_LEFT_TS' => $ans[$TITLE_LEFT_TS],
            'CONTENT_LEFT_TS' => $ans[$CONTENT_LEFT_TS],
            'TITLE_RIGHT_TS' => $ans[$TITLE_RIGHT_TS],
            'CONTENT_RIGHT_TS' => $ans[$CONTENT_RIGHT_TS],
            'TITLE_LEFT_SP' => $ans[$TITLE_LEFT_SP],
            'CONTENT_LEFT_SP' => $ans[$CONTENT_LEFT_SP],
            'TITLE_RIGHT_SP' => $ans[$TITLE_RIGHT_SP],
            'CONTENT_RIGHT_SP' => $ans[$CONTENT_RIGHT_SP],
            'ADDR' => $addss,
            'CITYS' => $CITY,
            'my_module_link' => $this->context->link->getModuleLink('maplocalice', 'ajax'),
            //'mudule_front_controller' => $this->context->link->getModuleLink('maplocalice', 'display')
        ));
        return $this->display(__FILE__, 'views/templates/hook/map.tpl');
    }
    public function transformFloat($foo)
    {
        $tem = [];
        for ($i = 0; $i < count($foo); $i++) {
            $tem[$i]['id'] = (int)$foo[$i]['id_store'];
            $tem[$i]['name'] = $foo[$i]['name'];
            $tem[$i]['address'] = $foo[$i]['address1'];
            $tem[$i]['lat'] = (float)$foo[$i]['latitude'];
            $tem[$i]['lng'] = (float)$foo[$i]['longitude'];
            $tem[$i]['type'] = 'Motoborda';
            $tem[$i]['state'] = $foo[$i]['name_state'];
            $tem[$i]['city'] = $foo[$i]['city'];
        }
        return $tem;
    }
    public function uniqueCity($foo)
    {
        return array_unique($foo, SORT_REGULAR);
    }
}