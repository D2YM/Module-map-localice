<?php


   
class MaplocaliceDisplayModuleFrontController extends ModuleFrontController
{
    public function initContent()
    {
        parent::initContent();
        $data_module = new Maplocalice();
        include_once( _PS_MODULE_DIR_ . 'maplocalice/class/update.php');
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
        $addss = getAdressShop();
        $URL = 'https://maps.googleapis.com/maps/api/js?key='.$ans[$API_KEY].'&callback=initMap';        
        $CITY = $data_module->uniqueCity(getCityShopTechnicalServer());
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
            'directory_module' => _PS_MODULE_DIR_
        ));
        
        $this->setTemplate('module:maplocalice/views/templates/front/display.tpl');
    }
}
