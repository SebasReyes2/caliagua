<?php
/*
*controlador para graficos de parametros de calidad del agua
* Autor: JUAN CARLOS MOYOTA
*/
class ParametroController extends Controller {
    
    public function actionIndex() {
        $model = new Muestras();
        if(isset($_POST["Muestras"]))
        {
            unset($lim_per,$fuente,$fecha,$regi);
            $idcanton = (int)$_POST["Muestras"]["codcanton"];
            $idsistema = (int)$_POST["Muestras"]["codsistema"];
            $parametro = (string)$_POST["Muestras"]["parametro"];
            $titulo = nombre_parametro($parametro);
            $tabla_nombre = tabla_muestras($idcanton);
            $nombre_sistema = nombresistema($idsistema);
            $lim = getLimitePermisible($parametro);
            $unidad = getUnidadesParametro($parametro);
            $regi = array();
            $fecha = array();
            $fuente = array();
            $lim_per = array();
            if (($_POST["Muestras"]["fecha"]!=null) and ($_POST["Muestras"]["fecha2"]!=null))
                {
                $fecha_inicial = $_POST["Muestras"]["fecha"];
                $fecha_tope = $_POST["Muestras"]["fecha2"];
                $reg = $model->GetDatosParamFecha($tabla_nombre,$idsistema,$parametro,$fecha_inicial,$fecha_tope);
                for ($i = 0; $i < count($reg); $i++) {
                    $regi[]=(float)$reg[$i]["$parametro"];
                    $fecha[]=$reg[$i]["fecha"]."<br>".$reg[$i]["hora"];
                    $fuente[]=$reg[$i]["fuente"];
                    $lim_per[] = $lim;
                }
                $array = array(
                        'fecha1'=>$fecha_inicial,
                        'fecha2'=>$fecha_tope,
                        'parametro'=>$titulo,
                        'reg'=>$regi,
                        'mes'=>$fecha,
                        'nombresistema'=>$nombre_sistema,
                        'fuente'=>$fuente,
                        'lim'=>$lim_per,
                        'unidad'=>$unidad
                    );
                if($parametro=="ph" or $parametro=="cloro_libre"){
                    $this->render("graficaFecha2",$array);
                }else{
                    $this->render("graficaFecha",$array);
                }    
            }else{
                $reg = $model->getDatosParamBySistema($tabla_nombre,$idsistema,$parametro);
                for($i=0;$i<count($reg);$i++)
                {
                    $regi[]=(float)$reg[$i]["$parametro"];
                    $fecha[]=$reg[$i]["fecha"]."<br>".$reg[$i]["hora"];
                    $fuente[]=$reg[$i]["fuente"];
                    $lim_per[] = $lim;
                }
                $datos = array('tabla'=>$tabla_nombre,'idsistema'=>$idsistema,
                  'parametro'=>$titulo,'regi'=>$regi,
                  'mes'=>$fecha,'nombre_sistema'=>$nombre_sistema,
                  'fuente'=>$fuente,'lim'=>$lim_per,'unidad'=>$unidad
                );
                if ($parametro == "ph" or $parametro=="cloro_libre"){
                    $this->render("graficaParametro2",$datos);
                }else{
                    $this->render("graficaParametro", $datos);
                }
            }
        }else{
        $this->render("index",compact("model"));
        }
    }
    
    public function actionGraficaParametro(){
        $this->render("graficaParametro");
    }
    
    public function actionGraficaFecha() {
        $this->render("graficaFecha");
    }

    public function actionListaParroquias()
        {
            $id_uno = $_POST['Muestras']['codcanton'];
            //$criteria = new CDbCriteria();
            //$criteria->condition
            $lista = Parroquias::model()->findAll('codcanton = :id order by nombreparroquia ASC',array(':id'=>$id_uno));
            $lista = CHtml::listData($lista,'codparroquia','nombreparroquia');
            
            echo CHtml::tag('option', array('value' => ''), '--Seleccionar parroquia--', true);
            
            foreach ($lista as $valor => $descripcion){
                echo CHtml::tag('option',array('value'=>$valor),CHtml::encode($descripcion), true );
                
            }
        }
        
    public function actionListaBarrios()
        {
            $id_dos = $_POST['Muestras']['codparroquia'];
            $lista = Barrios::model()->findAll('codparroquia = :id order by nombrebarrio ASC',array(':id'=>$id_dos));
            $lista = CHtml::listData($lista,'codbarrio','nombrebarrio');
            echo CHtml::tag('option', array('value' => ''), '--Seleccionar barrio--', true);
            foreach ($lista as $valor => $descripcion){
                echo CHtml::tag('option',array('value'=>$valor),CHtml::encode($descripcion), true );
            }
        }
        
        public function actionListaSistemas()
        {
            $id_tres = $_POST['Muestras']['codbarrio'];
            $lista = Sistemas::model()->findAll('codbarrio = :id order by nombresistema ASC',array(':id'=>$id_tres));
            $lista = CHtml::listData($lista,'codsistema','nombresistema');
            echo CHtml::tag('option', array('value' => ''), '--Seleccionar sistema--', true);
            foreach ($lista as $valor => $descripcion){
                echo CHtml::tag('option',array('value'=>$valor),CHtml::encode($descripcion), true );
                
            }
        }
}
