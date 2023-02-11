<?php

/**
 * CONTROLADOR DE CARGA DE DATOS PARA LA CONSULTA DE GRAFICAS CON LOS TIPOS DE SISTEMAS DE AGUA
 * POTABLE...
 * @author JUAN CARLOS MOYOTA
 */
class TiposController extends Controller {
    
    public function actionIndex()
    {
        $model = new Sistemas();
        if(isset($_POST["Sistemas"]))
        {
            $model->attributes=$_POST["Sistemas"];
            if ($model->validate())
            {
                $codcanton=$_POST["Sistemas"]["codcanton"];
                $nombrecanton=  nombre_canton($codcanton);
                $codparroquia = $_POST["Sistemas"]["codparroquia"];
                if($codparroquia != null)
                {
                    $numgravedad = $model->getNumGravedadParroquia($codparroquia);
                    $numbombeo = $model->getNumBombeoParroquia($codparroquia);
                    $nombreparroquia = nombreparroquia($codparroquia);
                    $data = array(
                        'codcanton'=>$codcanton,
                        'parroquia'=>$nombreparroquia,
                        'nombrecanton'=>$nombrecanton,
                        'gravedad'=>$numgravedad,
                        'bombeo'=>$numbombeo
                    );
                    //$this->render("grafica_parroquia",  compact("codparroquia,codcanton"));                   
                    $this->render("grafica_parroquia", $data);
                }else{
                $num = $model->getNumeroBombeo($_POST["Sistemas"]["codcanton"]);
                $num1 = $model->getNumeroGravedad($_POST["Sistemas"]["codcanton"]);
                $array = array(
                    'bombeo'=>$num,
                    'gravedad'=>$num1,
                    'nombrecanton'=>$nombrecanton
                );
                $this->render("grafica",$array);
                }
            }else{
                Yii::app()->user->setFlash('mensaje',"Seleccione los parámetros necesarios");
                $this->refresh();
            }
        }else{
        $this->render("index", compact("model")); 
        }
    }

    /*funcion para cargar el listado de parroquias segun su canton*/
    public function actionListaParroquias()
        {
            $id_uno = $_POST['Sistemas']['codcanton'];
            $criteria = new CDbCriteria();
            //$criteria->condition
            $lista = Parroquias::model()->findAll('codcanton = :id order by nombreparroquia ASC',array(':id'=>$id_uno));
            $lista = CHtml::listData($lista,'codparroquia','nombreparroquia');
            
            echo CHtml::tag('option', array('value' => ''), '--Seleccionar parroquia--', true);
            
            foreach ($lista as $valor => $descripcion){
                echo CHtml::tag('option',array('value'=>$valor),CHtml::encode($descripcion), true );
                
            }
        }
        
}
