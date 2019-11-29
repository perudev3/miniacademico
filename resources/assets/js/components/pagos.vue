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
	                                    <label>Numero de Vaucher</label>
	                                    
	                                    <input type="text" v-model="numero_vaucher" class="form-control">
	                                    
                                    </div>
	                            
                                
                                    <div class="col-md-6">
                                        <label>Fecha</label>
                                        
                                        <input type="text" v-model="fecha" class="form-control">
                                        
                                    </div>
                                </div>
                                
                                <div class="row">
                                    
                                    <div class="col-md-6">
                                        <label>Curso :</label>
                                            
                                        <select  v-model="idCurso" class="form-control" @change="PrecioCurso(idCurso)">
                                            <option v-for="datacursos in cursos" :value="datacursos.idCurso">
                                                {{datacursos.curso_especialidad}}
                                            </option>
                                        </select>
                                            
                                    </div>

                                    <div class="col-md-6">
                                        <label>Alumno :</label>
                                            
                                        <select  v-model="idAlumno" class="form-control">
                                            <option v-for="dataalumno in alumnos" :value="dataalumno.idAlumno">
                                                {{dataalumno.alumno_nombres}} {{dataalumno.alumno_apellidos}}
                                            </option>
                                        </select>
                                            
                                    </div>
                                </div>

                                <div class="row">
                                    
                                    <div class="col-md-6">
                                        <label>Pago Parcial :</label>
                                            
                                        <input type="text" v-model="pago_parcial" class="form-control">

                                            
                                    </div>

                                    <div class="col-md-6">
                                        <label>Pago Total :</label>

                                    	<label v-model="pago_total" v-for="p in precios" class="form-control" disabled>{{p.curso_costo}}</label>
                                            
                                    </div>
                                </div>

                        	</form>
                        	
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" @click="cerrarModal()">Cerrar</button>
                            <button type="button" v-if="tipoAccion==1" class="btn btn-primary animated" @click="RegistrarPagos()">Guardar</button>
                            <button type="button" v-if="tipoAccion==2" class="btn btn-primary animated" @click="ActualizarPagos()">Actualizar</button>
                        </div>
                    </div>
            </div>
	        <div class="container">
	        	<div class="ibox float-e-margins">
	        		<div class="ibox-content">
	        			<div>
			    	<section style="padding: 20px">
			            <button class="btn btn-primary" @click="abrirModal('agregar')">Registrar Pago</button>		            
			        </section>
			    </div>
	            <div class="table-responsive">
	                </header> 
				        <div>
					         <section style="padding: 20px">
					          <h3><b>Listado de Pagos</b></h3>
					         </section>
				        </div> 
				    </header>

	                <table class="table table-striped dataTable table-bordered table-sm">
	                	<thead>
	                		<tr>
	                			<th>N° de Vaucher</th>
		                		<th>Fecha</th>
		                		<th>Curso</th>
		                		<th>Alumno</th>
		                		<th>Pago Parcial</th>
		                		<th>Costo del Curso</th>
		                		<th>Total a Cancelar</th>
		                		<th>
		                			Opciones
		                		</th>
	                		</tr>	                		
	                	</thead>
	                	<tbody>
	                		<tr v-for="datapagos in pagos" :key="datapagos.idPagos">
	                			<td>{{datapagos.numero_vaucher}}</td>
	                			<td>{{datapagos.fecha}}</td>
	                			<td>{{datapagos.curso_especialidad}}</td>
	                			<td>{{datapagos.alumno_nombres}} {{datapagos.alumno_apellidos}}</td>
	                			<td>{{datapagos.pago_parcial}}</td>
	                			<td>{{datapagos.curso_costo}}</td>
	                			<td>{{datapagos.pago_total}}</td>
	                			<td>
	                				<button name="Editar" class="btn btn-primary" @click="abrirModal('editar',datapagos)">Editar</button>
				                   <button name="eliminar" class="btn btn-yellow" @click="EliminarPagos(datapagos.idDocente)">Eliminar</button>
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
	                    pagos:[],
	                    cursos:[],
	                    alumnos:[],
	                    precios:[],
	                    modal : 0,
	                    tituloModal:'',
	                    tipoAccion:0,
	                    id:'',
	                    numero_vaucher:'',
	                    fecha:'',
	                    idCurso:'',
	                    idAlumno:'',
	                    pago_parcial:'',
	                    pago_total:'',
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
                                this.tituloModal = 'Registrar Pago';
                                this.tipoAccion = 1;
                                this.numero_vaucher='';
                                this.fecha=new Date().toISOString().slice(0,10);
                                this.idCurso='';
                                this.idAlumno='';
                                this.pago_parcial='';
                                this.pago_total='';
                                break;
                            }
                            case 'editar':
                            {
                            	this.modal=1;
                                this.tituloModal='Actualizar Datos de Pago';
                                this.tipoAccion=2;
                                this.id=data['idPagos'];
                                this.numero_vaucher=data['numero_vaucher'];
                                this.fecha = data['fecha'];
                                this.idCurso = data['idCurso'];
                                this.idAlumno=data['idAlumno'];
                                this.pago_parcial=data['pago_parcial'];
                                break;  
                            }
                        }
                },

	            DataPagos(){
	            	let me = this;
	                 axios.get('/api/getpagos').then(function(response){
	                    me.pagos=response.data;
	                    console.log(me.pagos);
	                 })
	            },

	            Alumnos(){
	                let me=this;
	                axios.get('/alumnos/listar/').then(function(response){
	                    me.alumnos=response.data;
	                    console.log(me.alumnos);
	                 })
	            },

	            Cursos(){
	                let me=this;
	                axios.get('/cursos/listar/').then(function(response){
	                    me.cursos=response.data;
	                    console.log(me.cursos);
	                 })
	            },

	            PrecioCurso:function(id){
	                axios.get('/api/preciocurso/'+id).then(function(response){
	                    this.precios=response.data;
	                    console.log(this.precios);
	                 }.bind(this))
	            },



	            EliminarPagos(id){
	            	let me = this;
	                axios.delete('/api/pagos/' + id).then(function(data){
	                	if (data.data.status === 'success') {
                    			me.DataPagos();
                         		console.log("exito!!");
                        } else {
                        		me.DataPagos();
                          		console.log("Error");
                        };
	                })
	            },


	            ActualizarPagos(){
	            	let me = this;
	                axios.put('/api/pagos',{
	                	'id':me.id,
	                	'numero_vaucher':me.numero_vaucher,
	                	'fecha':me.fecha,
	                	'idCurso':me.idCurso,
	                	'idAlumno':me.idAlumno,
	                	'pago_parcial':me.pago_parcial
	                }).then(function(data){
	                    if (data.data.status === 'success') {
                    			
                    			me.cerrarModal();
                    			me.DataPagos();
                         		console.log("exito!!");
                        } else {
                        		
                    			me.cerrarModal();
                    			me.DataPagos();
                          		console.log("Error");
                        };
	                })
	            },


	            RegistrarPagos(){
	            	let me = this;
	                axios.post('/api/pagos',{
	                	'numero_vaucher':me.numero_vaucher,
	                	'fecha':me.fecha,
	                	'idCurso':me.idCurso,
	                	'idAlumno':me.idAlumno,
	                	'pago_parcial':me.pago_parcial,
	                	'pago_total':me.pago_total
	                }).then(function(data){
	                    if (data.data.status === 'success') {
                       			me.cerrarModal();
                    			me.DataPagos();
                         		console.log("exito!!");
                        } else {
                        		
                    			me.cerrarModal();
                    			me.DataPagos();
                          		console.log("Error");
                        };
	                })
	            }

	         },

	        mounted:function(){
	        	let self = this
	            setTimeout(function(){
	                self.DataPagos();
	                self.Alumnos();
	                self.Cursos();
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