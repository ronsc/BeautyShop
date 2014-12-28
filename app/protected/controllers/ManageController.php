<?php
class ManageController extends Controller {
    
    //
    public function actionIndex($id = null) {
    	$shophaveservices = new ShopHaveServices();
    	$shopList = CHtml::listData(Shop::model()->findAll(), "id", "shopname");

        if(!empty($_POST)) {
    		if(isset($_POST['services'])) {
    			$service_ids = $_POST['services'];
    			foreach($service_ids as $service_id) {
    				$shophaveservices = new ShopHaveServices();

                    $prices = $_POST['prices'][$service_id];
                    $chk = strpos($prices, "-");
                    if(empty($chk)) {
                        $price_min = 0;
                        $price_max = $prices;
                    } else {
                        $price = explode("-", $prices);
                        $price_min = $price[0];
                        $price_max = $price[1];
                    }

    				$shophaveservices->_attributes = array(
						'shop_id'     => $_POST['shopid'],
						'service_id'  => $service_id,
						'price_min'   => $price_min,
						'price_max'   => $price_max,
					);
					$shophaveservices->save();
    			}
    		}
    	}

        $model = Shop::model()->findByPk($id);

        $this->render('index',array(
            'service'           => Service::model()->findAll(),
            'shophaveservices'  => $shophaveservices,
            'shopList'          => $shopList,
            'id'                => $id,
            'model'             => $model,
        ));        
    }
}
