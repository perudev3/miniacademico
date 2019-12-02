<template>
	<div class="row">
	    
	        <div class="container">
	        	<div class="ibox float-e-margins">
	        		<div class="ibox-content">
	        			
			            <div class="table-responsive">
			               </header> 
				               <div>
					               	<section style="padding: 20px">
					               		<h3><b>Lista de Alumnos</b></h3>
					               	</section>
				               </div> 
				           </header>

			                <table class="table table-striped dataTable table-bordered table-sm">
			                	<thead>
			                		<tr>
			                			<th>Nombres</th>
				                		<th>Apellidos</th>
				                		<th>CI</th>
				                		<th>CU</th>
				                		<th>Telefono</th>
				                		<th>Celular</th>
				                		<th>Email</th>
				                		<th>Domicilio</th>
				                		<th>Foto</th>
				                		<th>Estudio Universitario</th>
				                		<th>Tecnico</th>
				                		<th>Licenciatura</th>
				                		<th>Posgrado</th>
				                		<th>Carrera</th>
				                		<th>Curso</th>
				                		<th>Titulo Obtenido</th>
				                		<th>Titulo Obtenido</th>
				                		<th>Titulo Obtenido</th>		                		
				                		<th>
				                			Opciones
				                		</th>
			                		</tr>	                		
			                	</thead>
			                	<tbody>
			                		<tr v-for="dataalumno in alumnos" :key="dataalumno.idAlumno">
			                			<td>{{dataalumno.alumno_nombres}}</td>
			                			<td>{{dataalumno.alumno_apellidos}}</td>
			                			<td>{{dataalumno.alumno_CI}}</td>
			                			<td>{{dataalumno.alumno_CU}}</td>
			                			<td>{{dataalumno.alumno_telefono}}</td>
			                			<td>{{dataalumno.alumno_celular}}</td>
			                			<td>{{dataalumno.alumno_email}}</td>
			                			<td>{{dataalumno.alumno_domicilio}}</td>
			                			<td>
			                				<figure class="photo">
			                					<img :src="'http://127.0.0.1:8000/avatar/'+dataalumno.alumno_foto+''" id="img" />
			                				</figure>
			                			</td>
			                			<td>
			                				<input type="checkbox" :checked="dataalumno.alumno_estudio_universitario" >
			                			</td>
			                			<td>
			                				<input type="checkbox" :checked="dataalumno.alumno_tecnico" >
			                			</td>
			                			<td>
			                				<input type="checkbox" :checked="dataalumno.alumno_licenciatura" >
			                			</td>
			                			<td>
			                				<input type="checkbox" :checked="dataalumno.alumno_posgrado" >
			                			</td>
			                			<td>{{dataalumno.alumno_carrera}}</td>
			                			<td>{{dataalumno.alumno_curso}}</td>
			                			<td>{{dataalumno.alumno_titulo_obtenido1}}</td>
			                			<td>{{dataalumno.alumno_titulo_obtenido2}}</td>
			                			<td>{{dataalumno.alumno_titulo_obtenido3}}</td>
			                		</tr>
			                	</tbody>
			                </table>
			            </div>
	        		</div>
	        		
	        	</div>
	        	
	        </div>
	    
	</div>
</template>


<script>

     export default {
	        data:function(){
	                return {
	                    alumnos:[],
	                    alumno:{},
	                    modal : 0,
	                    tituloModal:'',
	                    tipoAccion:0,
	                    id:'',
	                    nombres:'',
	                    apellidos:'',
	                    CI:'',
	                    CU:'',
	                    telefono:'',
	                    celular:'',
	                    email:'',
	                    domicilio:'',
	                    estudiouniversitario:'',
	                    tecnico:'',
	                    licenciatura:'',
	                    posgrado:'',
	                    carrera:'',
	                    curso:'',
	                    tituloobtenido1:'',
	                    tituloobtenido2:'',
	                    tituloobtenido3:'',
	                    contador: 1,
	                    limit: 3,
	                 }
	              },

	        methods:{
	            DataAlumno(){
	            	let me = this;
	                 axios.get('/api/getlistaalumnos').then(function(response){
	                    me.alumnos=response.data;
	                    console.log(me.alumnos);
	                 })
	            }

	         },

	        mounted:function(){
	        	let self = this
	            setTimeout(function(){
	                self.DataAlumno();
	            },2000);
	        }

       }

    </script>


<style>    
    .modal-content{
        width: 100% !important;
        position: absolute !important;
    }

    .photo {
	  border: 2px solid #555;
	  height: 120px;
	  margin: 30px;
	  width: 100px;
	}

	#img{
	    border: 2px solid #555;
	    height: 120px; 
	    margin: 0; 
	    width: 100px;
	}

</style>