<?php 

$config = array(

		/**
		* Formulario
		*/

		

			'vali_estudiantes'	=>	array(
			array('field' => 'id',			            'label'=> 'id',			            'rules' => 'required|is_string|trim|xss_clean'),
			array('field' => 'nombre',		            'label'=> 'nombre', 		        'rules' => 'required|is_string|trim|xss_clean'),
			array('field' => 'apellido', 	            'label'=> 'apellido', 		        'rules' => 'required|is_string|trim|xss_clean'),
			array('field' => 'fecha', 	                'label'=> 'fecha', 		            'rules' => 'required|trim|xss_clean'),		
			array('field' => 'direccion', 	            'label'=> 'direccion', 		        'rules' => 'required|is_string|trim|xss_clean'),	
			array('field' => 'telefono', 	            'label'=> 'telefono', 		        'rules' => 'required|numeric|trim|xss_clean'),		
            array('field' => 'correo', 		            'label'=> 'correo', 		        'rules' => 'required|valid_email|trim|xss_clean'),
			array('field' => 'sexo', 		            'label'=> 'sexo', 			        'rules' => 'required|xss_clean|validaSelect')
			),

		'vali_profesores'	=>	array(
			array('field' => 'id',			            'label'=> 'id',			            'rules' => 'required|is_string|trim|xss_clean'),
			array('field' => 'nombre',		            'label'=> 'nombre', 		        'rules' => 'required|is_string|trim|xss_clean'),
			array('field' => 'apellido', 	            'label'=> 'apellido', 		        'rules' => 'required|is_string|trim|xss_clean'),
			array('field' => 'fecha', 	                'label'=> 'fecha', 		            'rules' => 'required|trim|xss_clean'),		
			array('field' => 'direccion', 	            'label'=> 'direccion', 		        'rules' => 'required|is_string|trim|xss_clean'),	
			array('field' => 'telefono', 	            'label'=> 'telefono', 		        'rules' => 'required|numeric|trim|xss_clean'),		
            array('field' => 'correo', 		            'label'=> 'correo', 		        'rules' => 'required|valid_email|trim|xss_clean'),
			array('field' => 'sexo', 		            'label'=> 'sexo', 			        'rules' => 'required|xss_clean|validaSelect')
			),
                   
		

	    'vali_Productos'	=> array(
			array('field' => 'id_producto',	   'label'=> 'id_producto',	    	'rules' => 'required|is_string|trim|xss_clean',),
			array('field' => 'nom_producto',   'label'=> 'nom_producto', 		'rules' => 'required|is_string|trim|xss_clean'),
			array('field' => 'cantidad', 	   'label'=> 'cantidad',            'rules' => 'required|numeric|trim|xss_clean'),			
			array('field' => 'valor_producto', 'label'=> 'valor_producto', 		'rules' => 'required|numeric|trim|xss_clean'),	
			array('field' => 'id_categoria',   'label'=> 'id_categoria', 		'rules' => 'required|trim|xss_clean'),
			array('field' => 'id_proveedor',   'label'=> 'id_proveedor', 		'rules' => 'required|trim|xss_clean')		
	
	),
	     'vali_Productos_search'	=> array(
			array('field' => 'criterio',	   'label'=> 'criterio',	    	'rules' => 'required|is_string|trim|xss_clean',),
			array('field' => 'valor',          'label'=> 'valor', 		        'rules' => 'required|is_string|trim|xss_clean')
			
	),
	    
	    'empleados/add'	=>	array(
			array('field' => 'id',			'label'=> 'Id',				'rules' => 'required|is_string|trim|xss_clean'),
			array('field' => 'nombre',		'label'=> 'Nombre', 		'rules' => 'required|is_string|trim|xss_clean'),
			array('field' => 'apellido',	'label'=> 'Apellido', 		'rules' => 'required|is_string|trim|xss_clean'),
			array('field' => 'direccion', 	'label'=> 'Direccion', 		'rules' => 'required|is_string|trim|xss_clean'),
			array('field' => 'telefono', 	'label'=> 'Telefono', 		'rules' => 'required|numeric|trim|xss_clean'),			
			array('field' => 'correo', 		'label'=> 'Correo', 		'rules' => 'required|valid_email|trim|xss_clean'),
			//array('field' => 'fecha', 		'label'=> 'Fecha', 		    'rules' => 'required|valid_email|trim|xss_clean'),
			array('field' => 'sexo', 		'label'=> 'Sexo', 			'rules' => 'required|xss_clean|validaSelect')
			)


		)

 ?>