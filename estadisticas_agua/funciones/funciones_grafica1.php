<?php
function titulo_ejey($parametro)
{
	$tituloy = "";
	if ($parametro == "ph"){
		$tituloy = "pH (unidades)";
	}
	if ($parametro == "color"){
		$tituloy = "Color (unidad de color)";
	}
	if ($parametro == "turbiedad"){
		$tituloy = "Turbiedad (NTU)";
	}
	if ($parametro == "temperatura"){
		$tituloy = "Temperatura (°C)";
	}
        if ($parametro == "solidos_totales"){
		$tituloy = "Sólidos totales disueltos (mg/l)";
	}
        if ($parametro == "conductividad"){
		$tituloy = "Conductividad (μS/cm)";
	}
        if ($parametro == "dureza"){
		$tituloy = "Dureza (mg/l)";
	}
        if ($parametro == "cloro_libre"){
		$tituloy = "Cloro libre residual (mg/l)";
	}
        if ($parametro == "nitratos"){
		$tituloy = "Nitratos (mg/l)";
	}
        if ($parametro == "nitritos"){
		$tituloy = "Nitritos (mg/l)";
	}
        if ($parametro == "sulfatos"){
		$tituloy = "Sulfatos (mg/l)";
	}
        if ($parametro == "fosfatos"){
		$tituloy = "Fosfatos (mg/l)";
	}
        if ($parametro == "manganeso"){
		$tituloy = "Manganeso (mg/l)";
	}
        if ($parametro == "fluoruros"){
		$tituloy = "Fluoruros (mg/l)";
	}
        if ($parametro == "amoniaco"){
		$tituloy = "Nitrógeno amoniacal (mg/l)";
	}
        if ($parametro == "coliformes_fecales"){
		$tituloy = "Coliformes fecales (NMP/100 ml)";
	}
		if ($parametro == "coliformes_ufc"){
		$tituloy = "Coliformes fecales (UFC/100 ml)";
	}
        if ($parametro == "coliformes_totales"){
		$tituloy = "Coliformes totales (NMP/100 ml)";
	}
	return $tituloy;
}
function titulo_grafica($parametro)
{
	$tituloy = "";
	if ($parametro == "ph"){
		$tituloy = "pH";
	}
	if ($parametro == "color"){
		$tituloy = "Color";
	}
	if ($parametro == "turbiedad"){
		$tituloy = "Turbiedad";
	}
	if ($parametro == "temperatura"){
		$tituloy = "Temperatura";
	}
        if ($parametro == "solidos_totales"){
		$tituloy = "Sólidos totales disueltos";
	}
        if ($parametro == "conductividad"){
		$tituloy = "Conductividad";
	}
        if ($parametro == "dureza"){
		$tituloy = "Dureza";
	}
        if ($parametro == "cloro_libre"){
		$tituloy = "Cloro libre residual";
	}
        if ($parametro == "nitratos"){
		$tituloy = "Nitratos";
	}
        if ($parametro == "nitritos"){
		$tituloy = "Nitritos";
	}
        if ($parametro == "sulfatos"){
		$tituloy = "Sulfatos";
	}
        if ($parametro == "fosfatos"){
		$tituloy = "Fosfatos";
	}
        if ($parametro == "manganeso"){
		$tituloy = "Manganeso";
	}
        if ($parametro == "fluoruros"){
		$tituloy = "Fluoruros";
	}
        if ($parametro == "amoniaco"){
		$tituloy = "Nitrógeno amoniacal";
	}
        if ($parametro == "coliformes_fecales"){
		$tituloy = "Coliformes fecales NMP";
	}
	if ($parametro == "coliformes_ufc"){
		$tituloy = "Coliformes fecales UFC";
	}
        if ($parametro == "coliformes_totales"){
		$tituloy = "Coliformes totales (NMP/100 ml)";
	}
	return $tituloy;
}

/*   funcion para el limite permisible   */
function getLimitePermisible($param) 
    {
        $lim_sup[] = array();
        if($param == "ph")
        {
            $lim_sup[0] = 6;
            
            $lim_sup[1] = 9;
        }
        if($param == "color")
        {
            $lim_sup = 15;
        }
        if($param == "turbiedad")
        {
            $lim_sup = 5;
        }
        if($param == "temperatura")
        {
            $lim_sup = "";
        }
        if($param == "solidos_totales")
        {
            $lim_sup = 500;
        }
        if($param == "conductividad")
        {
            $lim_sup = "";
        }
        if($param == "dureza")
        {
            $lim_sup = 500;
        }
        if($param == "cloro_libre")
        {
            $lim_sup[0] = 0.3;
            $lim_sup[1] = 1.5;
        }
        if($param == "hierro")
        {
            $lim_sup = 0.3;
        }
        if($param == "nitritos")
        {
            $lim_sup = 3;
        }
        if($param == "nitratos")
        {
            $lim_sup = 50;
        }
        if($param == "sulfatos")
        {
            $lim_sup = 250;
        }
        if($param == "fosfatos")
        {
            $lim_sup = 0.3;
        }
        if($param == "manganeso")
        {
            $lim_sup = 0.1;
        }
        if($param == "fluoruros")
        {
            $lim_sup = 1.5;
        }
        if($param == "amoniaco")
        {
            $lim_sup = 1;
        }
        if($param == "coliformes_fecales")
        {
            $lim_sup = 50;
        }
		if($param == "coliformes_ufc")
        {
            $lim_sup = 50;
        }
        if($param == "coliformes_totales")
        {
            $lim_sup = 3000;
        }
        return $lim_sup;
    }