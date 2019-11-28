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
	                                    <label>Nombres</label>
	                                    
	                                    <input type="text" v-model="nombre" class="form-control">
	                                    
                                    </div>
	                            
                                
                                    <div class="col-md-6">
                                        <label>Apellidos</label>
                                        
                                        <input type="text" v-model="apellidos" class="form-control">
                                        
                                    </div>
                                </div>
                                <div class="row">
                                    
                                    <div class="col-md-6">
                                        <label>Direccion :</label>
                                            
                                        <input type="text" v-model="direccion" class="form-control">
                                            
                                    </div>

                                    <div class="col-md-6">
                                        <label>Telefono :</label>
                                            
                                        <input type="text" v-model="celular" class="form-control">
                                            
                                    </div>
                                </div>
                        	</form>
                        	
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" @click="cerrarModal()">Cerrar</button>
                            <button type="button" v-if="tipoAccion==1" class="btn btn-primary animated" @click="RegistrarDocente()">Guardar</button>
                            <button type="button" v-if="tipoAccion==2" class="btn btn-primary animated" @click="ActualizarDocente()">Actualizar</button>
                        </div>
                    </div>
            </div>
	        <div class="container">
	        	<div class="ibox float-e-margins">
	        		<div class="ibox-content">
	        			<div>
			    	<section style="padding: 20px">
			            <button class="btn btn-primary" @click="abrirModal('agregar')">Nuevo Docente</button>		            
			        </section>
			    </div>
	            <div class="table-responsive">
	                </header> 
				        <div>
					         <section style="padding: 20px">
					          <h3><b>Alumnos</b></h3>
					         </section>
				        </div> 
				    </header>

	                <table class="table table-striped dataTable table-bordered table-sm">
	                	<thead>
	                		<tr>
	                			<th>Nombre</th>
		                		<th>Apellidos</th>
		                		<th>Direccion</th>
		                		<th>Celular</th>
		                		<th>
		                			Opciones
		                		</th>
	                		</tr>	                		
	                	</thead>
	                	<tbody>
	                		<tr v-for="datadocentes in docentes" :key="datadocentes.idDocente">
	                			<td>{{datadocentes.docente_nombres}}</td>
	                			<td>{{datadocentes.docente_apellidos}}</td>
	                			<td>{{datadocentes.docente_direccion}}</td>
	                			<td>{{datadocentes.docente_celular}}</td>
	                			<td>
	                				<button name="Editar" class="btn btn-primary" @click="abrirModal('editar',datadocentes)">Editar</button>
				                   <button name="eliminar" class="btn btn-yellow" @click="EliminarDocente(datadocentes.idDocente)">Eliminar</button>
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
	                    docentes:[],
	                    docente:{},
	                    modal : 0,
	                    tituloModal:'',
	                    tipoAccion:0,
	                    id:'',
	                    nombre:'',
	                    apellidos:'',
	                    direccion:'',
	                    celular:'',
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
                                this.tituloModal = 'Agregar Docente';
                                this.tipoAccion = 1;
                                this.nombre='';
                                this.apellidos='';
                                this.direccion='';
                                this.celular='';
                                break;
                            }
                            case 'editar':
                            {
                            	this.modal=1;
                                this.tituloModal='Actualizar Datos de Docente';
                                this.tipoAccion=2;
                                this.id=data['idDocente'];
                                this.nombre=data['docente_nombres'];
                                this.apellidos = data['docente_apellidos'];
                                this.direccion = data['docente_direccion'];
                                this.celular=data['docente_celular'];
                                break;  
                            }
                        }
                },

	            DataDocente(){
	            	let me = this;
	                 axios.get('/api/getdocente').then(function(response){
	                    me.docentes=response.data;
	                    console.log(me.docentes);
	                 })
	            },

	            EliminarDocente(id){
	            	let me = this;
	                axios.delete('/api/docente/' + id).then(function(data){
	                	if (data.data.status === 'success') {
                    			me.DataDocente();
                         		console.log("exito!!");
                        } else {
                        		me.DataDocente();
                          		console.log("Error");
                        };
	                })
	            },


	            ActualizarDocente(){
	            	let me = this;
	                axios.put('/api/docente',{
	                	'id':me.id,
	                	'docente_nombres':me.nombre,
	                	'docente_apellidos':me.apellidos,
	                	'docente_direccion':me.direccion,
	                	'docente_celular':me.celular

	                }).then(function(data){
	                    if (data.data.status === 'success') {
                    			
                    			me.cerrarModal();
                    			me.DataDocente();
                         		console.log("exito!!");
                        } else {
                        		
                    			me.cerrarModal();
                    			me.DataDocente();
                          		console.log("Error");
                        };
	                })
	            },


	            RegistrarDocente(){
	            	let me = this;
	                axios.post('/api/docente',{
	                	'docente_nombres':me.nombre,
	                	'docente_apellidos':me.apellidos,
	                	'docente_direccion':me.direccion,
	                	'docente_celular':me.celular
	                }).then(function(data){
	                    if (data.data.status === 'success') {
                       			me.cerrarModal();
                    			me.DataDocente();
                         		console.log("exito!!");
                        } else {
                        		
                    			me.cerrarModal();
                    			me.DataDocente();
                          		console.log("Error");
                        };
	                })
	            }

	         },

	        mounted:function(){
	        	let self = this
	            setTimeout(function(){
	                self.DataDocente();
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