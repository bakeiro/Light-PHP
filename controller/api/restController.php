<?php

class rest{

    public function __construct(){
    }

    public function rest(){

        /* Get data */
        $get_data = $GLOBALS['settings']['url']['query'];

        /* Controller */
        require_once($GLOBALS['settings']['model']['file']);
        $model_class = new $GLOBALS['settings']['model']['class'];

        /* Call the method */
        $method = $GLOBALS['settings']['model']['method'];

        //Output
        $output = call_user_func_array(array($model_class,$method),$get_data);
        header('Content-Type: application/json');
        echo json_encode($output);
    }

    public function opencart_controller($route,$parameters = array(), $admin = false){

        if(count($parameters) === 1){
            $parameters = $parameters[0];
        }

        //File & method
        $file = '';
        $route_info = explode('/',$route);
        $class = 'controller'.ucfirst($route_info[0]).ucfirst($route_info[1]);

        $root_folder = "";
        if($admin === true){
            $root_folder = DIR_SITE."admin/";
        }else{
            $root_folder = DIR_SITE."catalog/";
        }

        if(count($route_info) === 2){
            $file = $root_folder.'controller/'.$route.'.php';
            $method = 'index';
        }
        if(count($route_info) === 3 ){
            $file = $root_folder.'controller/'.$route_info[0].'/'.$route_info[1].'.php';
            $method = $route_info[2];
        }

        //Loader
        require_once($root_folder . 'config.php');
        require_once(DIR_SITE . 'system/startup.php');
        require_once($file);

        $config = new Config();
        $registry->set('config', $config);
        
        $registry = new Registry();

        $loader = new Loader($registry);
        $registry->set('load', $loader);
        
        $db = new DB('mysqli', CONN_HOST, CONN_USER, CONN_PASS, CONN_DDBB);
        $registry->set('db', $db);
        
        $session = new Session();
        $registry->set('session', $session);
        
        $controller = new $class($registry);
        $return_info = $controller->$method($order_info['info']['customer_id']);

        return $return_info;
    }

    public function opencart_model($route,$parameters = array(), $admin = false){

        if(count($parameters) === 1){
            //$parameters = $parameters[0];
        }

        //File & method
        $route_info = explode('/',$route);
        $file = '';
        if(strpos($route_info[1],'_')){

            $temp_class = explode('_',$route_info[1]);
            $temp_class = ucfirst($temp_class[0]).ucfirst($temp_class[1]);
            $class = 'Model'. ucfirst($route_info[0]).$temp_class;
        }else{
            $class = 'Model'.ucfirst($route_info[0]).ucfirst($route_info[1]);
        }

        $root_folder = "";
        if($admin === true){
            $root_folder = DIR_SITE."admin/";
        }else{
            $root_folder = DIR_SITE."catalog/";
        }

        if(count($route_info) === 2){
            $file = $root_folder.'model/'.$route.'.php';
            $method = 'index';
        }
        if(count($route_info) === 3 ){
            $file = $root_folder.'model/'.$route_info[0].'/'.$route_info[1].'.php';
            $method = $route_info[2];
        }

        //Loader
        require_once(DIR_SITE . 'config.php');
        require_once(DIR_SITE . 'system/startup.php');
        require_once(DIR_SITE . 'system/library/user.php');
        require_once(DIR_SITE . 'system/library/customer.php');
        require_once($file);

        $registry = new Registry();
        
        $config = new Config();
        $db = new DB('mysqli', CONN_HOST, CONN_USER, CONN_PASS, CONN_DDBB);
        $loader = new Loader($registry);
        $customer = new Customer($registry);    
        $event = new Event($registry);
        $cache = new Cache('file');
        $request = new Request();
        
        $registry->set('db', $db);
        $registry->set('load', $loader);
        $registry->set('customer', $customer);        
        $registry->set('request', $request);
        $registry->set('event', $event);
        $registry->set('cache', $cache);
        $registry->set('request', $request);

        $query = $db->query("SELECT * FROM `" . DB_PREFIX . "setting` WHERE store_id = '0' ORDER BY store_id ASC");
        foreach ($query->rows as $result) {
            if (!$result['serialized']) {
                $config->set($result['key'], $result['value']);
            } else {
                $config->set($result['key'], unserialize($result['value']));
            }
        }

        $languages = array();
        $query = $db->query("SELECT * FROM `" . DB_PREFIX . "language`");        
        foreach ($query->rows as $result) {
            $languages[$result['code']] = $result;
        }
        
        $config->set('config_language_id', $languages[$config->get('config_admin_language')]['language_id']);
        $registry->set('config', $config);

        $controller = new $class($registry);
        $return_info = call_user_func_array(array($controller,$method),$parameters);

        return $return_info;
    }
}