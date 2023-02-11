<?php

/*
 * ESTE CONTROLADOR PARA CONSULTAR LA BUENA CALIDAD EL AGUA...
 *
 * @author Usuario
 */
class CalidadAguaController extends Controller {
    
    public function actionIndex()
    {
        $criteria = new CDbCriteria();
        $criteria->limit=10;
        $datos = Cantones::model()->findAll($criteria);
        $this->render("index",  compact("datos"));
    }
       
    public function actionCalidadAlausi($id=null) 
    {
        if (!$id){
                Yii::app()->user->setFlash('mensaje','Selecione un cantón');
                $this->redirect(Yii::app()->request->baseUrl."/calidadAgua");
            }else{
                $model = new Sistemas();
                $reg = $model->getSistemasByCanton($id);
                $num_reg = count($reg);
                $array = array(
                        'reg'=>$reg,
                        'id'=>$id,
                        'num_reg'=>$num_reg
                        );
                $this->render("calidadAlausi",$array);                
            }
    }
    
    public function actionCalidadChambo($id=null) 
    {
        if (!$id){
                Yii::app()->user->setFlash('mensaje','Selecione un cantón');
                $this->redirect(Yii::app()->request->baseUrl."/calidadAgua");
            }else{
                $model = new Sistemas();
                $reg = $model->getSistemasByCanton($id);
                $num_reg = count($reg);
                $array = array(
                        'reg'=>$reg,
                        'id'=>$id,
                        'num_reg'=>$num_reg
                        );
                $this->render("calidadChambo",$array);                
            }
    }
    
    public function actionCalidadChunchi($id=null) 
    {
        if (!$id){
                Yii::app()->user->setFlash('mensaje','Selecione un cantón');
                $this->redirect(Yii::app()->request->baseUrl."/calidadAgua");
            }else{
                $model = new Sistemas();
                $reg = $model->getSistemasByCanton($id);
                $num_reg = count($reg);
                $array = array(
                        'reg'=>$reg,
                        'id'=>$id,
                        'num_reg'=>$num_reg
                        );
                $this->render("calidadChunchi",$array);                
            }
    }
    
    public function actionCalidadColta($id=null) {
        if (!$id){
                Yii::app()->user->setFlash('mensaje','Selecione un cantón');
                $this->redirect(Yii::app()->request->baseUrl."/calidadAgua");
            }else{
                $model = new Sistemas();
                $reg = $model->getSistemasByCanton($id);
                $num_reg = count($reg);
                $array = array(
                        'reg'=>$reg,
                        'id'=>$id,
                        'num_reg'=>$num_reg
                        );
                $this->render("calidadColta",$array);                
            }        
    }
    
    public function actionCalidadCumanda($id=null) {
        if (!$id){
                Yii::app()->user->setFlash('mensaje','Selecione un cantón');
                $this->redirect(Yii::app()->request->baseUrl."/calidadAgua");
            }else{
                $model = new Sistemas();
                $reg = $model->getSistemasByCanton($id);
                $num_reg = count($reg);
                $array = array(
                        'reg'=>$reg,
                        'id'=>$id,
                        'num_reg'=>$num_reg
                        );
                $this->render("calidadCumanda",$array);                
            }
    }
    
     public function actionCalidadGuamote($id=null) {
        if (!$id){
                Yii::app()->user->setFlash('mensaje','Selecione un cantón');
                $this->redirect(Yii::app()->request->baseUrl."/calidadAgua");
            }else{
                $model = new Sistemas();
                $reg = $model->getSistemasByCanton($id);
                $num_reg = count($reg);
                $array = array(
                        'reg'=>$reg,
                        'id'=>$id,
                        'num_reg'=>$num_reg
                        );
                $this->render("calidadGuamote",$array);                
            }       
    }
    
    public function actionCalidadGuano($id=null) {
        if (!$id){
                Yii::app()->user->setFlash('mensaje','Selecione un cantón');
                $this->redirect(Yii::app()->request->baseUrl."/calidadAgua");
            }else{
                $model = new Sistemas();
                $reg = $model->getSistemasByCanton($id);
                $num_reg = count($reg);
                $array = array(
                        'reg'=>$reg,
                        'id'=>$id,
                        'num_reg'=>$num_reg
                        );
                $this->render("calidadGuano",$array);                
            } 
    }
    
    public function actionCalidadPallatanga($id=null) {
        if (!$id){
                Yii::app()->user->setFlash('mensaje','Selecione un cantón');
                $this->redirect(Yii::app()->request->baseUrl."/calidadAgua");
            }else{
                $model = new Sistemas();
                $reg = $model->getSistemasByCanton($id);
                $num_reg = count($reg);
                $array = array(
                        'reg'=>$reg,
                        'id'=>$id,
                        'num_reg'=>$num_reg
                        );
                $this->render("calidadPallatanga",$array);                
            }
    }
    
    public function actionCalidadPenipe($id=null) {
         if (!$id){
                Yii::app()->user->setFlash('mensaje','Selecione un cantón');
                $this->redirect(Yii::app()->request->baseUrl."/calidadAgua");
            }else{
                $model = new Sistemas();
                $reg = $model->getSistemasByCanton($id);
                $num_reg = count($reg);
                $array = array(
                        'reg'=>$reg,
                        'id'=>$id,
                        'num_reg'=>$num_reg
                        );
                $this->render("calidadPenipe",$array);                
            }
    }
    
    public function actionCalidadRiobamba($id=null) {
        if (!$id){
                Yii::app()->user->setFlash('mensaje','Selecione un cantón');
                $this->redirect(Yii::app()->request->baseUrl."/calidadAgua");
            }else{
                $model = new Sistemas();
                $reg = $model->getSistemasByCanton($id);
                $num_reg = count($reg);
                $array = array(
                        'reg'=>$reg,
                        'id'=>$id,
                        'num_reg'=>$num_reg
                        );
                $this->render("calidadRiobamba",$array);                
            }   
    }
    
    public function actionDetallesCalidad($id=null,$id2=null)
    {
        if($id){
            $tb_nombre = tabla_muestras($id2);
            $model = new Muestras();
            $regis = $model->getDetalles_id($tb_nombre,$id);
            $sistem_info = getinfobysistema($id);
            $array = array('datos'=>$regis,'sistema'=>$sistem_info);
            $this->render("detallesCalidad",$array);
        }else{
            Yii::app()->user->setFlash('mensaje','Selecione un cantón');
            $this->redirect(Yii::app()->request->baseUrl."/calidadAgua/index");
        }
        
    }
}
