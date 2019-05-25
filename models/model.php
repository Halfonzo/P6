<?php

	class enlacesPaginas{
		public function enlacesPaginasModel($enlacesModel){
			if($enlacesModel=="reservaciones" || $enlacesModel=="clientes" || $enlacesModel=="habitaciones" || $enlacesModel=="finanzas" || $enlacesModel=="editarCliente" || $enlacesModel=="eliminarCliente"){
				$module = "views/modules/".$enlacesModel.".php";
			}
			else if ($enlacesModel=="index") {
				$module = "views/modules/inicio.php";
			}
			else{
				$module = "views/modules/inicio.php";
			}
			return $module;
		}
	}

?>