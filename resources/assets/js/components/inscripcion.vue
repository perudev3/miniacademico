<template>
	<div class="row">
	    	<div class="modal" :class="{'mostrar' : modal}" style="overflow-y: auto;">
                    <div class="modal-content login" style="width: auto !important;">
                        <div class="modal-header">
                            <h4 align="center" class="modal-title" v-text="tituloModal"></h4>
                        </div>

                        <div class="modal-body">
                        	<form action="" method="post" enctype="multipart/form-data" files="true">
	                            <div class="row">	                            	 
	                            
                                    <div class="col-md-6">
	                                    <label>Fecha de Inscripcion</label>
	                                    
	                                    <input type="date" v-model="fecha" class="form-control" disabled>
	                                    
                                    </div>
	                            
                                
                                    <div class="col-md-6">
                                        <label>Seleccione un alumno</label>
                                        
                                        <select  v-model="idalumno" class="form-control">
                                            <option v-for="dataalumno in alumnos" :value="dataalumno.idAlumno">
                                                {{dataalumno.alumno_nombres}} {{dataalumno.alumno_apellidos}}
                                            </option>
                                        </select>
                                        
                                    </div>
                                </div>
                                <div class="row">
                                    
                                    <div class="col-md-6">
                                        <label>Seleccione el curso :</label>
                                            
                                        <select  v-model="idcurso" class="form-control">
                                            <option v-for="datadocente in docentes" :value="datadocente.idCurso">
                                                {{datadocente.curso_especialidad}}
                                            </option>
                                        </select>
                                            
                                    </div>

                                    <div class="col-md-6">
                                        <label>Precio del curso :</label>
                                            
                                        <input type="text" v-model="precio" class="form-control">
                                            
                                    </div>
                                </div>
                        	</form>
                        	
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" @click="cerrarModal()">Cerrar</button>
                            <button type="button" v-if="tipoAccion==1" class="btn btn-primary animated" @click="RegistrarInscripcion()">Guardar</button>
                            <button type="button" v-if="tipoAccion==2" class="btn btn-primary animated" @click="ActualizarInscripcion()">Actualizar</button>
                        </div>
                    </div>
            </div>
	        <div class="container">
	        	<div class="ibox float-e-margins">
	        		<div class="ibox-content">
	        			<div>
					    	<section style="padding: 20px">
					            <button class="btn btn-primary" @click="abrirModal('agregar')">Inscribir</button>	            
					        </section>
					    </div>
	            <div class="table-responsive">
	                </header> 
				               <div>
					               	<section style="padding: 20px">
					               		<h3><b>Inscripciones</b></h3>
					               	</section>
				               </div> 
				           </header>


	                <table class="table table-striped dataTable table-bordered table-sm">
	                	<thead>
	                		<tr>
	                			<th>Fecha de Inscripcion</th>
		                		<th>Nombre del Curso</th>
		                		<th>Alumno</th>
		                		<th>Precio del  Curso</th>
		                		<th>
		                			Opciones
		                		</th>
	                		</tr>	                		
	                	</thead>
	                	<tbody>
	                		<tr v-for="datainscripciones in inscripciones" :key="datainscripciones.idInscripcion">
	                			<td>{{datainscripciones.inscripcion_fecha}}</td>
	                			<td>{{datainscripciones.curso_especialidad}}</td>
	                			<td>{{datainscripciones.alumno_nombres}} {{datainscripciones.alumno_apellidos}}</td>
	                			<td>{{datainscripciones.inscripcion_precio}}</td>
	                			<td>
	                				<button name="Editar" class="btn btn-primary" @click="abrirModal('editar',datainscripciones)">Editar</button>
				                   <button name="eliminar" class="btn btn-yellow" @click="EliminarInscripcion(datainscripciones.idInscripcion)">Eliminar</button>
	                			</td>
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
	                    inscripciones:[],
	                    inscripcion:{},
	                    modal : 0,
	                    tituloModal:'',
	                    tipoAccion:0,
	                    id:'',
	                    fecha:'',
	                    idalumno:'',
	                    idcurso:'',
	                    precio:'',
	                    contador: 1,
	                    limit: 3,
	                    alumnos:[],
	                    docentes:[],
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
                                this.tituloModal = 'Agregar Inscripion';
                                this.tipoAccion = 1;
                                this.fecha=new Date().toISOString().slice(0,10);
                                this.idalumno='';
                                this.idcurso='';
                                this.precio='';
                                break;
                            }
                            case 'editar':
                            {
                            	this.modal=1;
                                this.tituloModal='Actualizar Datos de Inscripion';
                                this.tipoAccion=2;
                                this.id=data['idInscripcion'];
                                this.fecha=data['inscripcion_fecha'];
                                this.idalumno = data['idAlumno'];
                                this.idcurso = data['idCurso'];
                                this.precio=data['inscripcion_precio'];
                                break;  
                            }
                        }
                },

	            DataInscripcion(){
	            	let me = this;
	                 axios.get('/api/getinscripcion').then(function(response){
	                    me.inscripciones=response.data;
	                    console.log(me.inscripciones);
	                 })
	            },

	            Alumnos(){
	                let me=this;
	                axios.get('/alumnos/listar/').then(function(response){
	                    me.alumnos=response.data;
	                    console.log(me.alumnos);
	                 })
	            },

	            Docentes(){
	                let me=this;
	                axios.get('/docentes/listar/').then(function(response){
	                    me.docentes=response.data;
	                    console.log(me.docentes);
	                 })
	            },

	            EliminarInscripcion(id){
	            	let me = this;
	                axios.delete('/api/inscripcion/' + id).then(function(data){
	                	if (data.data.status === 'success') {
                    			me.DataInscripcion();
                         		console.log("exito!!");
                        } else {
                        		me.DataInscripcion();
                          		console.log("Error");
                        };
	                })
	            },


	            ActualizarInscripcion(){
	            	let me = this;
	                axios.put('/api/inscripcion',{
	                	'id':me.id,
	                	'inscripcion_fecha':me.fecha,
	                	'idCurso':me.idcurso,
	                	'idAlumno':me.idalumno,
	                	'inscripcion_precio':me.precio

	                }).then(function(data){
	                    if (data.data.status === 'success') {
                    			
                    			me.cerrarModal();
                    			me.DataInscripcion();
                         		console.log("exito!!");
                        } else {
                        		
                    			me.cerrarModal();
                    			me.DataInscripcion();
                          		console.log("Error");
                        };
	                })
	            },
	            
	            RegistrarInscripcion(){
	            	let me = this;
	                axios.post('/api/inscripcion',{
	                	'inscripcion_fecha':me.fecha,
	                	'idCurso':me.idcurso,
	                	'idAlumno':me.idalumno,
	                	'inscripcion_precio':me.precio
	                }).then(function(data){
	                    if (data.data.status === 'success') {
                       			me.cerrarModal();
                    			me.DataInscripcion();
                         		console.log("exito!!");
                        } else {
                        		
                    			me.cerrarModal();
                    			me.DataInscripcion();
                          		console.log("Error");
                        };
	                })
	            }

	         },

	        mounted:function(){
	        	let self = this
	            setTimeout(function(){
	                self.DataInscripcion();
	                self.Alumnos();
	                self.Docentes();
	            },2000);
	        }

       }

    </script>


<style>    
    .modal-content{
        width: 100% !important;
        position: absolute !important;
    }

</style>