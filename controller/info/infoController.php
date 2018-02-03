<?php

class infoController{

    public function url_alias(){

        /* Load one page to fill out the url_alias database */
        $data = array();
        $route = BACK_VIEW.'pags/info/url_aliasView.php';
        $data['styles'][] = '
                        <style>
                            table,thead,td,th{
                                border:1px solid black;
                            }    
                        </style>';

        /* If POST info then save into ddbb */
        if(count($_POST) > 0){

            //Save into ddbb


        }

        //Get data from dddbb


        viewClass::load($route,$data);
    }

    public function google(){

        //Load the page to see the google settings
        Load::load_model('info/info');
        $info_model = new infoModel();

        Load::load_model('store/store');
        $store_model = new storeModel();

        $data = array();
        $data['stores'] = $store_model->getAllStores();
        $data['google_data'] = $info_model->getGoogleData();
        $route = BACK_VIEW.'pags/info/googleDataView.php';

        viewClass::load($route,$data);
    }

    public function stock_prods(){

        //Here show the prods out of stock
        Load::load_model('products/product');
        $temp_prod_model = new productModel();

        $data = array();
        $data['prods'] = $temp_prod_model->getProdsOutStock();
        $route = BACK_VIEW . 'pags/info/prodStockOutView.php';

        viewClass::load($route,$data);
    }

    public function database(){

        /* Shows the changes made on the database */
        $data = array();
        $route = BACK_VIEW.'pags/info/databaseView.php';
        viewClass::load($route,$data);
    }

    public function display_info($title='',$body=''){
        
        $data = array();
        $data['title'] = $title;
        $data['body'] = $body;
        
        $route = BACK_VIEW.'pags/info/infoView.php';
        
        viewClass::load($route,$data);
    }
}