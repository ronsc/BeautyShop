<?php
//ใช้งาน session
@ob_start(); @session_start(); 

class ShopController extends Controller {
    //เพิ่ม แก้ไข : ข้อมูลร้านเสริมสวย
    public function actionForm($id = null){
        $shop = new Shop();
        $datas = new CActiveDataProvider($shop);
        
        if(!empty($_POST)){
            $id = $_POST["Shop"]["id"];
            
            if(!empty($id)){
                $shop = Shop::model()->findByPk($id);
            }
            $shop->_attributes = $_POST["Shop"];
            $shop->pic = CUploadedFile::getInstance($shop,'pic');
        
            if($shop->save()){
                $ImgPath = 'files/images/'.$shop->pic;
                $shop->pic->saveAs($ImgPath);

                //ปรับขนาดรูปเป็น 242x200 px
                $thumb = Yii::app()->phpThumb->create($ImgPath);
                $thumb->adaptiveResize(242, 200);
                $thumb->save($ImgPath);

                $this->redirect(array('form'));
            }                    
        }
        if(!empty($id)){
            $shop = Shop::model()->findByPk($id);
        }

        $this->render('form',array(
            "shop" => $shop,
            "datas" => $datas,
            "picP" => $shop->pic,
        ));
    }
    
    //ลบ : ข้อมูลร้านเสริมสวย
    public function actionDelete($id, $name){
        Shop::model()->deleteByPk($id);
        $ImgPath = 'files/images/'.$name;
        unlink($ImgPath);
        $this->redirect(array("form"));
    }
    
    //แสดงรายละเอียดของร้าน + รายการ
    public function actionShowList($id = null) {
        $this->layout = '/layouts/frontend';

        $model = Shop::model()->findByPk($id);

        $this->render('showlist', array(
            'id' => $id,
            'model' => $model,
            'no' => 1,
        ));
    }   
    
    /* ============ เปรียบเทียบร้านเสริมสวย ============ */
    
    //บันทึกร้านที่เลือกใน session [เก็บ id]
    public function actionSelectCompare($id=null) {
        $session = Yii::app()->session;

        $check = true;
        if(isset($_SESSION['ids'])) {
            foreach($_SESSION['ids'] as $value) {
                if($id == $value['id']) {
                    $check = false;
                }
            }
        }
        if($check)
            $_SESSION['ids'][]['id'] = $id;
    }  
    
    //แสดงร้านที่เลือกไว้จาก session แบบ JSON [แสดง id]
    public function actionShowCompare() {
        echo CJSON::encode(Yii::app()->session['ids']);
    } 

    //ลบร้านที่เลือกจาก session
    public function actionDelSession($id=null) {
        if(empty($id)) {    //ถ้าไม่มีค่า id ให้ลบออกทั้งหมด
            unset(Yii::app()->session['ids']);
            $this->redirect(array('Site/Index'));
        }else{              //ถ้ามี id ให้ลบ id นั้นออก
            $ids = Yii::app()->session['ids'];
            print_r($ids);
            $total = COUNT($ids);
            $arr = array();
            for($i = 0; $i < $total; $i++) {
                if($ids[$i]['id'] != $id) {
                    $arr[] = $ids[$i];
                }
            }
            print_r($arr);
            Yii::app()->session['ids'] = $arr;
        }
    } 
    
    //เปรียบเทียบร้านที่เลือก
    public function actionCompare() {
        $this->layout = '/layouts/frontend';

        $ids = Yii::app()->session['ids'];

        $services = Service::model()->findAll();

        if(!empty($ids)) {
            $arr = array();
            foreach($ids as $id) {
                $arr[] = $id['id'];
            }

            $criteria = new CDbCriteria();
            $criteria->addInCondition("id", $arr);
            $criteria->order = "id ASC";

            $shops = Shop::model()->findAll($criteria);

            $results = array();
            foreach ($shops as $shop) {
                $arr = array();
                
                foreach ($shop->shopHaveServices as $service) {
                    $arr[$service->service_id] = array(
                        'price_min' => $service->price_min,
                        'price_max' => $service->price_max
                    );
                }
                $results[] = array(
                    'id'        => $shop->id,
                    'shopname'  => $shop->shopname,
                    'pic'       => $shop->pic,
                    'services'  => $arr,
                );
            }
        } else {
            $shops = null;

        }

        $this->render('compare', array(
            'ids'       => $ids,    
            'shops'     => $shops,
            'services'  => $services,
            'results'   => $results,
            'color'     => 'white',
        ));
    }
    
    public function actionTest() {
        $this->render('test', array(
            't' => 10
        ));
    }
}