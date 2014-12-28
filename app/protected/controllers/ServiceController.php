<?php

class ServiceController extends Controller {
    //เพิ่ม แก้ไข : ข้อมูลรายการ
    public function actionForm($id=null){
        $service=new Service();
        $datas = new CActiveDataProvider($service);
        
        if(!empty($_POST)){
            $id=$_POST["Service"]["id"];
            
            if(!empty($id)){
                $service= Service::model()->findByPk($id);
            }
            $service->_attributes=$_POST["Service"];
            
            if($service->save()){
                $this->redirect(array("Form"));
            }
                    
        }
        if ((!empty($id))){
            $service=  Service::model()->findByPk($id);
        }
        
        $this->render('form',array(
            "service" => $service,
            "datas" => $datas,
        ));
       
    }
    
    //ลบ : ข้อมูลรายการ
    public function actionDelete($id){
        Service::model()->deleteByPk($id);
        $this->redirect(array("form"));
    }
    
}
