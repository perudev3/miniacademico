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
	                                    <label>Especialidad</label>
	                                    
	                                    <input type="text" v-model="especialidad" class="form-control">
	                                    
                                    </div>
	                            
                                
                                    <div class="col-md-6">
                                        <label>Duracion</label>
                                        
                                        <input type="text" v-model="duracion" class="form-control">
                                        
                                    </div>
                                </div>
                                <div class="row">
                                    
                                    <div class="col-md-6">
                                        <label>Modalidad :</label>
                                            
                                        <input type="text" v-model="modalidad" class="form-control">
                                            
                                    </div>

                                    <div class="col-md-6">
                                        <label>Horario :</label>
                                            
                                        <input type="text" v-model="horario" class="form-control">
                                            
                                    </div>
                                </div>
                                <div class="row">
                                    
                                    <div class="col-md-6">
                                        <label>Inicio de Clases :</label>
                                            
                                        <input type="text" v-model="inicioclases" class="form-control">
                                            
                                    </div>
                                </div>
                        	</form>
                        	
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" @click="cerrarModal()">Cerrar</button>
                            <button type="button" v-if="tipoAccion==1" class="btn btn-primary animated" @click="RegistrarCurso()">Guardar</button>
                            <button type="button" v-if="tipoAccion==2" class="btn btn-primary animated" @click="ActualizarCurso()">Actualizar</button>
                        </div>
                    </div>
            </div>
	        <div class="container">
	        	<div class="ibox float-e-margins">
	        		<div class="ibox-content">
	        			<div>
	        				<section style="padding: 20px">
					            <button class="btn btn-primary" @click="abrirModal('agregar')">Nuevo Curso</button>		            
					        </section>
	        			</div>
	        			<div class="table-responsive">
			                </header> 
						               <div>
							               	<section style="padding: 20px">
							               		<h3><b>Cursos</b></h3>
							               	</section>
						               </div> 
						           </header>

			                <table class="table table-striped dataTable table-bordered table-sm">
			                	<thead>
			                		<tr>
			                			<th>Especialidad</th>
				                		<th>Duracion</th>
				                		<th>Modalidad</th>
				                		<th>Horario</th>
				                		<th>Inicio de Clases</th>
				                		<th>
				                			Opciones
				                		</th>
			                		</tr>	                		
			                	</thead>
			                	<tbody>
			                		<tr v-for="datacursos in cursos" :key="datacursos.idCurso">
			                			<td>{{datacursos.curso_especialidad}}</td>
			                			<td>{{datacursos.curso_duracion}}</td>
			                			<td>{{datacursos.curso_modalidad}}</td>
			                			<td>{{datacursos.curso_horario}}</td>
			                			<td>{{datacursos.curso_inicio_clases}}</td>
			                			<td>
			                				<button name="Editar" class="btn btn-primary" @click="abrirModal('editar',datacursos)">Editar</button>
						                   <button name="eliminar" class="btn btn-yellow" @click="EliminarCurso(datacursos.idCurso)">Eliminar</button>
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
	                    cursos:[],
	                    curso:{},
	                    modal : 0,
	                    tituloModal:'',
	                    tipoAccion:0,
	                    id:'',
	                    especialidad:'',
	                    duracion:'',
	                    modalidad:'',
	                    horario:'',
	                    inicioclases:'',
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
                                this.tituloModal = 'Agregar Curso';
                                this.tipoAccion = 1;
                                this.especialidad='';
                                this.duracion='';
                                this.modalidad='';
                                this.horario='';
                                this.inicioclases='';
                                break;
                            }
                            case 'editar':
                            {
                            	this.modal=1;
                                this.tituloModal='Actualizar Datos de Curso';
                                this.tipoAccion=2;
                                this.id=data['idCurso'];
                                this.especialidad=data['curso_especialidad'];
                                this.duracion = data['curso_duracion'];
                                this.modalidad = data['curso_modalidad'];
                                this.horario=data['curso_horario'];
                                this.inicioclases=data['curso_inicio_clases'];
                                break;  
                            }
                        }
                },

	            DataCurso(){
	            	let me = this;
	                 axios.get('/api/getcurso').then(function(response){
	                    me.cursos=response.data;
	                    console.log(me.cursos);
	                 })
	            },

	            EliminarCurso(id){
	            	let me = this;
	                axios.delete('/api/curso/' + id).then(function(data){
	                	if (data.data.status === 'success') {
                    			me.DataCurso();
                         		console.log("exito!!");
                        } else {
                        		me.DataCurso();
                          		console.log("Error");
                        };
	                })
	            },


	            ActualizarCurso(){
	            	let me = this;
	                axios.put('/api/curso',{
	                	'id':me.id,
	                	'curso_especialidad':me.especialidad,
	                	'curso_duracion':me.duracion,
	                	'curso_modalidad':me.modalidad,
	                	'curso_horario':me.horario,
	                	'curso_inicio_clases':me.inicioclases

	                }).then(function(data){
	                    if (data.data.status === 'success') {
                    			
                    			me.cerrarModal();
                    			me.DataCurso();
                         		console.log("exito!!");
                        } else {
                        		
                    			me.cerrarModal();
                    			me.DataCurso();
                          		console.log("Error");
                        };
	                })
	            },


	            RegistrarCurso(){
	            	let me = this;
	                axios.post('/api/curso',{
	                	'curso_especialidad':me.especialidad,
	                	'curso_duracion':me.duracion,
	                	'curso_modalidad':me.modalidad,
	                	'curso_horario':me.horario,
	                	'curso_inicio_clases':me.inicioclases
	                }).then(function(data){
	                    if (data.data.status === 'success') {
                       			me.cerrarModal();
                    			me.DataCurso();
                         		console.log("exito!!");
                        } else {
                        		
                    			me.cerrarModal();
                    			me.DataCurso();
                          		console.log("Error");
                        };
	                })
	            }

	         },

	        mounted:function(){
	        	let self = this
	            setTimeout(function(){
	                self.DataCurso();
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