<template>
	<div class="row">
	        <div class="container">
	        	<div class="ibox float-e-margins">
	        		<div class="ibox-content">
	        			
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
	                    contador: 1,
	                    limit: 3,
	                 }
	              },

	        methods:{
	           

	            DataPagosAlumno(){
	            	let me = this;
	                 axios.get('/api/getpagosalumno').then(function(response){
	                    me.pagos=response.data;
	                    console.log(me.pagos);
	                 })
	            }

	         },

	        mounted:function(){
	        	let self = this
	            setTimeout(function(){
	                self.DataPagosAlumno();
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