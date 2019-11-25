<template>
	<div class="container">
	    <div class="row justify-content-center">
	    	<div class="modal" :class="{'mostrar' : modal}" style="overflow-y: auto;">
                    <div class="modal-content login" style="width: 80% !important;">
                        <div class="modal-header">
                            <h4 align="center" class="modal-title" v-text="tituloModal"></h4>
                        </div>

                        <div class="modal-body">
                        	<form action="" method="post" enctype="multipart/form-data" files="true">
                        		<div style="background: #b1abab;">
                        			<h2>Datos Personales</h2>
                        		</div>
	                            <div class="row">	                            	 
	                            
                                    <div class="col-md-6">
	                                    <label>Nombres </label>
	                                    
	                                    <input type="text" v-model="nombres" class="form-control">
	                                    
                                    </div>
	                            
                                
                                    <div class="col-md-6">
                                        <label>Apellidos</label>
                                        
                                        <input type="text" v-model="apellidos" class="form-control">
                                        
                                    </div>
                                </div>
                                <div class="row">
                                    
                                    <div class="col-md-6">
                                        <label>CI :</label>
                                            
                                        <input type="text" v-model="CI" class="form-control">
                                            
                                    </div>

                                    <div class="col-md-6">
                                        <label>CU :</label>
                                            
                                        <input type="text" v-model="CU" class="form-control">
                                            
                                    </div>
                                </div>
                                <div class="row">
                                    
                                    <div class="col-md-6">
                                        <label>Telefono :</label>
                                            
                                        <input type="text" v-model="telefono" class="form-control">
                                            
                                    </div>

                                    <div class="col-md-6">
                                        <label>Celular :</label>
                                            
                                        <input type="text" v-model="celular" class="form-control">
                                            
                                    </div>
                                </div>

                                <div class="row">
                                    
                                    <div class="col-md-6">
                                        <label>Email :</label>
                                            
                                        <input type="text" v-model="email" class="form-control">
                                            
                                    </div>

                                    <div class="col-md-6">
                                        <label>Domicilio :</label>
                                            
                                        <input type="text" v-model="domicilio" class="form-control">
                                            
                                    </div>
                                </div>

                                <div class="row">
                                    
                                    <div class="col-md-6">
                                        <label>Foto :</label>
                                            
                                        <input type="file"  ref="archivo" class="form-control">
                                            
                                    </div>

                                    
                                </div>
                                <br><br>

                                <div class="row">
                                	<div class="col-md-3">
                                        <label>Estudio Universitario :
                                            
                                        <input type="checkbox" v-model="estudiouniversitario" >

                                        </label>
                                            
                                    </div>
                                    
                                    <div class="col-md-3">
                                        <label>Tecnico :
                                            
                                        <input type="checkbox" v-model="tecnico" >

                                        </label>
                                            
                                    </div>

                                    <div class="col-md-3">
                                        <label>Licenciatura :
                                            
                                        <input type="checkbox" v-model="licenciatura" >

                                        </label>
                                            
                                    </div>

                                    <div class="col-md-3">
                                        <label>PosGrado :
                                            
                                        <input type="checkbox" v-model="posgrado" >

                                        </label>
                                            
                                    </div>
                                </div>
                                <br><br>

                                <div class="row">                                    
                                    

                                    <div class="col-md-6">
                                        <label>Carrera :</label>
                                            
                                        <input type="text" v-model="carrera" class="form-control">
                                            
                                    </div>
                                </div>

                                <div class="row">
                                    
                                    <div class="col-md-6">
                                        <label>Curso :</label>
                                            
                                        <input type="text" v-model="curso" class="form-control">
                                            
                                    </div>

                                    <div class="col-md-6">
                                        <label>Titulo Obtenido :</label>
                                            
                                        <input type="text" v-model="tituloobtenido1" class="form-control">
                                            
                                    </div>
                                </div>

                                <div class="row">
                                    
                                    <div class="col-md-6">
                                        <label>Titulo Obtenido :</label>
                                            
                                        <input type="text" v-model="tituloobtenido2" class="form-control">
                                            
                                    </div>

                                    <div class="col-md-6">
                                        <label>Titulo Obtenido :</label>
                                            
                                        <input type="text" v-model="tituloobtenido3" class="form-control">
                                            
                                    </div>
                                </div>
                        	</form>
                        	
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" @click="cerrarModal()">Cerrar</button>
                            <button type="button" v-if="tipoAccion==1" class="btn btn-primary animated" @click="RegistrarAlumno()">Guardar</button>
                            <button type="button" v-if="tipoAccion==2" class="btn btn-primary animated" @click="ActualizarAlumno()">Actualizar</button>
                        </div>
                    </div>
            </div>
	        <div class="row">
	        	<div>
			    	<section style="padding: 20px">
			            <button class="btn btn-primary" @click="abrirModal('agregar')">Nuevo Alumno</button>		            
			        </section>
			    </div>
	            <div class="card table-responsive">
	                <div class="card-header">Alumnos</div>

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
	                			<td>
	                				<button name="Editar" class="btn btn-primary" @click="abrirModal('editar',dataalumno)">Editar</button>
				                   <button name="eliminar" class="btn btn-yellow" @click="EliminarCurso(dataalumno.idAlumno)">Eliminar</button>
	                			</td>
	                		</tr>
	                	</tbody>
	                </table>
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
	            cerrarModal(){
                    this.modal=0;
                },

                abrirModal(accion,data=[]){
                    switch(accion){
                            case 'agregar':
                            {
                                this.modal = 1;
                                this.tituloModal = 'Agregar Alumno';
                                this.tipoAccion = 1;
                                this.nombres='';
			                    this.apellidos='';
			                    this.CI='';
			                    this.CU='';
			                    this.telefono='';
			                    this.celular='';
			                    this.email='';
			                    this.domicilio='';
			                    this.archivo='';
			                    this.estudiouniversitario='';
			                    this.tecnico='';
			                    this.licenciatura='';
			                    this.posgrado='';
			                    this.carrera='';
			                    this.curso='';
			                    this.tituloobtenido1='';
			                    this.tituloobtenido2='';
			                    this.tituloobtenido3='';
                                break;
                            }
                            case 'editar':
                            {
                            	this.modal=1;
                                this.tituloModal='Actualizar Datos de Alumno';
                                this.tipoAccion=2;
                                this.id=data['idAlumno'];
                                this.nombres=data['alumno_nombres'];
			                    this.apellidos=data['alumno_apellidos'];
			                    this.CI=data['alumno_CI'];
			                    this.CU=data['alumno_CU'];
			                    this.telefono=data['alumno_telefono'];
			                    this.celular=data['alumno_celular'];
			                    this.email=data['alumno_email'];
			                    this.domicilio=data['alumno_domicilio'];
			                    this.archivo=data['alumno_foto'];
			                    this.estudiouniversitario=data['alumno_estudio_universitario'];
			                    this.tecnico=data['alumno_tecnico'];
			                    this.licenciatura=data['alumno_licenciatura'];
			                    this.posgrado=data['alumno_posgrado'];
			                    this.carrera=data['alumno_carrera'];
			                    this.curso=data['alumno_curso'];
			                    this.tituloobtenido1=data['alumno_titulo_obtenido1'];
			                    this.tituloobtenido2=data['alumno_titulo_obtenido2'];
			                    this.tituloobtenido3=data['alumno_titulo_obtenido3'];
                                break;  
                            }
                        }
                },

	            DataAlumno(){
	            	let me = this;
	                 axios.get('/api/getalumno').then(function(response){
	                    me.alumnos=response.data;
	                    console.log(me.alumnos);
	                 })
	            },

	            EliminarAlumno(id){
	            	let me = this;
	                axios.delete('/api/alumno/' + id).then(function(data){
	                	if (data.data.status === 'success') {
                    			me.DataAlumno();
                         		console.log("exito!!");
                        } else {
                        		me.DataAlumno();
                          		console.log("Error");
                        };
	                })
	            },


	            ActualizarAlumno(){
	            	let me = this;
	                axios.put('/api/alumno',{
	                	'id':me.id,
	                	'alumno_nombres':me.nombres,
	                    'alumno_apellidos':me.apellidos,
	                    'alumno_CI':me.CI,
	                    'alumno_CU':me.CU,
	                    'alumno_telefono':me.telefono,
	                    'alumno_celular':me.celular,
	                    'alumno_email':me.email,
	                    'alumno_domicilio':me.domicilio,
	                    'alumno_foto':me.foto,
	                    'alumno_estudio_universitario':me.estudiouniversitario,
	                    'alumno_tecnico':me.tecnico,
	                    'alumno_licenciatura':me.licenciatura,
	                    'alumno_posgrado':me.posgrado,
	                    'alumno_carrera':me.carrera,
	                    'alumno_curso':me.curso,
	                    'alumno_titulo_obtenido1':me.tituloobtenido1,
	                    'alumno_titulo_obtenido2':me.tituloobtenido2,
	                    'alumno_titulo_obtenido3':me.tituloobtenido3

	                }).then(function(data){
	                    if (data.data.status === 'success') {
                    			
                    			me.cerrarModal();
                    			me.DataAlumno();
                         		console.log("exito!!");
                        } else {
                        		
                    			me.cerrarModal();
                    			me.DataAlumno();
                          		console.log("Error");
                        };
	                })
	            },


	            RegistrarAlumno(){
	            	let me = this;
	            	var data = new FormData()

	            	data.append("alumno_nombres", me.nombres)
	                data.append("alumno_apellidos", me.apellidos)
	                data.append("alumno_CI", me.CI)
	                data.append("alumno_CU", me.CU)
	                data.append("alumno_telefono", me.telefono)
	                data.append("alumno_celular", me.celular)
	                data.append("alumno_email", me.email)
	                data.append("alumno_domicilio", me.domicilio)
	                data.append("alumno_foto", me.$refs.archivo.files[0])
	                data.append("alumno_estudio_universitario", me.estudiouniversitario)
	                data.append("alumno_tecnico", me.tecnico)
	                data.append("alumno_licenciatura", me.licenciatura)
	                data.append("alumno_posgrado", me.posgrado)
	                data.append("alumno_carrera", me.carrera)
	                data.append("alumno_curso", me.curso)
	                data.append("alumno_titulo_obtenido1", me.tituloobtenido1)
	                data.append("alumno_titulo_obtenido2", me.tituloobtenido2)
	                data.append("alumno_titulo_obtenido3", me.tituloobtenido3)	                

	                axios.post('/api/alumno',data).then(function(data){
	                    if (data.data.status === 'success') {
                       			me.cerrarModal();
                    			me.DataAlumno();
                         		console.log("exito!!");
                        } else {
                        		
                    			me.cerrarModal();
                    			me.DataAlumno();
                          		console.log("Error");
                        };
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