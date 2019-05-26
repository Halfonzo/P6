<?php
	
	include "models/database.php";
    $db = new Database();//Se instancia la clase para manejar la base de datos

	//Cuando el usuario presione el boton de registrar, se llamara a la funcion para guardar los datos
	if(isset($_POST['registrarCliente'])){
		//Obtenemos los datos ingresados
		$nombre = $_POST['nombre'];
		$email  = $_POST['email'];
		$tel    = $_POST['telefono'];

		//LLamamos a la funcion que registrara los datos en la bd, le enviamos los parametros
		$db->create_cliente($nombre,$email,$tel);
	}

?>
<div class="content custom-scrollbar">

    <div id="project-dashboard" class="page-layout simple right-sidebar">

        <div class="page-content-wrapper custom-scrollbar">







            <!-- CONTENT -->
            <div class="page-content">

                <ul class="nav nav-tabs" id="myTab" role="tablist">

                    <li class="nav-item">
                        <a class="nav-link btn active" id="home-tab" data-toggle="tab" href="#home-tab-pane" role="tab" aria-controls="home-tab-pane" aria-expanded="true"><i class="icon s-4 icon-account-card-details"></i>Ver</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link btn" id="budget-summary-tab" data-toggle="tab" href="#budget-summary-tab-pane" role="tab" aria-controls="budget-summary-tab-pane"><i class="icon s-4 icon-account-edit"></i>Registrar</a>
                    </li>

                </ul>

                <div class="tab-content">

                	<div class="tab-pane fade show active p-3" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab">
                        
                        <div class="doc forms-doc page-layout simple full-width">
	                        <!-- CONTENT -->
	                        <div class="page-content p-6">
	                            <div class="content container">
	                                <div class="row">
                                		
	                                	<!-- FORM CONTROLS -->
	                                    <div class="col-12">
	                                        <div class="example">
	                                            <div class="description">
	                                                <div class="description-text">
	                                                    <h5>Clientes Registrados</h5>
	                                                </div>
	                                                <div class="toggle-source-preview"></div>

	                                                <i class="icon s-6 icon-account-search"></i>
	                                                <p>&nbsp;&nbsp;&nbsp;&nbsp;</p>
	                                                <input type="text" id="search" placeholder="Buscador...">
	                                                
	                                            </div>

	                                            <div class="source-preview-wrapper">
	                                                <div class="preview">
	                                                    <div class="preview-elements">
	                                                    	
	                                                    	<!-- Empieza la construccion del formulario de clientes -->
	                                                    	<table id="sample-data-table" class="table">
																<thead>
																    <tr>
																        <th class="secondary-text">
																            <div class="table-header">
																                <span class="column-title">ID</span>
																            </div>
																        </th>
																        <th class="secondary-text">
																            <div class="table-header">
																                <span class="column-title">Nombre</span>
																            </div>
																        </th>
																        <th class="secondary-text">
																            <div class="table-header">
																                <span class="column-title">Telefono</span>
																            </div>
																        </th>
																        <th class="secondary-text">
																            <div class="table-header">
																                <span class="column-title">E-Mail</span>
																            </div>
																        </th>
																        <th class="secondary-text">
																            <div class="table-header">
																                <span class="column-title">Visitas</span>
																            </div>
																        </th>
																        <th class="secondary-text">
																            <div class="table-header">
																                <span class="column-title">Controles</span>
																            </div>
																        </th>
																    </tr>
																</thead>
																

																	<!-- Inicia el llenado de la tabla con datos -->
																	<?php 
																	//Se llama la funcion que retorna los datos de la tabla
													                $listado = $db->table("clientes");
																	?>
													                <tbody>
																	<?php
													                    //Funcion que recorre todos los registros y los almacena para mostrarlos en la pagina
													                    while( $row = $listado->fetch() ){
																		#while ($row=mysqli_fetch_object($listado)){
																			$t_id=$row[0];
																			$t_nombre=$row[1];
																			$t_email=$row[3];
																			$t_telefono=$row[2];
																			$t_visitas=$row[4];
																	?>
																		<tr>
																			<td><?php echo $t_id;?></td>
													                        <td><?php echo $t_nombre;?></td>
													                        <td><?php echo $t_telefono;?></td>
													                        <td><?php echo $t_email;?></td>
													                        <td><?php if($t_visitas>5){echo 'Habitual';}else{echo 'Esporádico';}?></td>
													                        <td>
																	        <a onclick="document.location.href='index.php?action=editarCliente&id=<?php echo $t_id ?>'"><i class="icon s-7 icon-account-edit"></i></a>
																	        &nbsp;&nbsp;&nbsp;&nbsp;
																	        <a onclick="if(confirm('Se eliminara al cliente')){document.location.href='index.php?action=eliminarCliente&id=<?php echo $t_id ?>'}"><i class="icon s-7 icon-account-remove"></i></a>
													                        </td>
													                    </tr>	
																	<?php
																		}
																	?>
																	</tbody>
																	<!-- Temina el llenado de la tabla con datos -->

															</table>

															<!-- Este Scrip funciona para agregar los controles de ordenamiento -->
															<script type="text/javascript">
															$('#sample-data-table').DataTable({
															    responsive: true,
															    dom       : 'rt<"dataTables_footer"ip>'
															});
															</script>

															<!-- Este scrip funciona para realizar busquedas en los registros de la tabla -->
															<script>
															 // Write on keyup event of keyword input element
															 $(document).ready(function(){
															 $("#search").keyup(function(){
															 _this = this;
															 // Show only matching TR, hide rest of them
															 $.each($("#sample-data-table tbody tr"), function() {
															 if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
															 $(this).hide();
															 else
															 $(this).show();
															 });
															 });
															});
															</script>
	                                                    	<!-- Termina la construccion del formulario del cliente-->

	                                                    </div>
	                                                </div>
	                                            </div>
	                                        </div>
	                                    </div>

	                                </div>
	                            </div>
	                        </div>
                    	</div>

                    </div>

                    <div class="tab-pane fade p-3" id="budget-summary-tab-pane" role="tabpanel" aria-labelledby="budget-summary-tab">

                    	<div class="doc forms-doc page-layout simple full-width">
	                        <!-- CONTENT -->
	                        <div class="page-content p-6">
	                            <div class="content container">
	                                <div class="row">
                                		
	                                	<!-- FORM CONTROLS -->
	                                    <div class="col-12">
	                                        <div class="example">
	                                            <div class="description">
	                                                <div class="description-text">
	                                                    <h5>Registrar Cliente</h5>
	                                                </div>
	                                            </div>

	                                            <div class="source-preview-wrapper">
	                                                <div class="preview">
	                                                    <div class="preview-elements">
	                                                    	
	                                                    	<!-- Empieza la construccion del formulario de clientes -->
	                                                    	<form action = "" method = "post">

	                                                    		<div class="form-row">
	                                                    			<div class="form-group col-md-12">
															            <input name="nombre" type="text" class="form-control" id="inputNombre" placeholder="Nombre completo">
															            <label for="inputNombre" class="col-form-label">Nombre</label>
															        </div>
	                                                    		</div>

															    <div class="form-row">
															        <div class="form-group col-md-6">
															            <input name="email" type="email" class="form-control" id="inputEmail" placeholder="Email">
															            <label for="inputEmail" class="col-form-label">Email</label>
															        </div>
															        <div class="form-group col-md-6">
															            <input name="telefono" type="text" class="form-control" id="inputTelefono" placeholder="Telefono">
															            <label for="inputTelefono" class="col-form-label">Telefono</label>
															        </div>
															    </div>

															    <button type="submit" name="registrarCliente" class="btn btn-primary">Registrar</button>
															</form>
	                                                    	<!-- Termina la construccion del formulario del cliente-->

	                                                    </div>
	                                                </div>
	                                            </div>
	                                        </div>
	                                    </div>

	                                </div>
	                            </div>
	                        </div>
                    	</div>

                    </div>
                    
                </div>

            </div>
            <!-- / CONTENT -->

        </div>

    </div>

    <script type="text/javascript" src="assets/js/apps/dashboard/project.js"></script>

</div>