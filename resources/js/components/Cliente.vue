<template>
    <div class="container">
        <div class="text-center" style="margin: 20px 0px 40px 0px;">
            <span class="text-secondary">Datos del Cliente</span>
        </div>
      

         <button class="btn btn-primary" data-toggle="modal" data-target="#myModalcarga"><i class="fas fa-user-plus"></i>
                        Ingresar Nuevo Cliente
                    </button>
        <table class="table table-striped" id="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">C.I del Cliente</th>
                        <th scope="col">Nombres del Cliente</th>
                        <th scope="col">Apellidos del Cliente</th>
                        <th scope="col">Direccion</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for ="car in Cliente">
                        <th scope="row">{{car.id_cliente}}</th>
                        <td>{{car.cedula}}</td>
                        <td>{{car.nombres}}</td>
                        <td>{{car.apellidos}}</td>
                        <td>{{car.direccion}}</td>
                        <td>{{car.correo}}</td>
                        <td>{{car.telefono}}</td>
                        

                        <td @click="editcliente(car)"   class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModalcarga"><i class="far fa-edit"></i>
                        </td>
                        <td  @click.prevent="deleteCliente(car)" class="btn btn-danger btn-xs"> 
                        <i class="fas fa-trash-alt"></i>
                        </td>
                        <td  @click.prevent="cuenta_cliente(car)" class="btn btn-success btn-xs" data-toggle="modal" data-target="#myModalcuenta"> 
                        <i class="fas fa-donate"></i>
                        </td>
                        </tr>
                    </tbody>
                     
                </table>



                <!-- Modal carga de datos-->
                    <div id="myModalcarga" class="modal fade" role="dialog">
                    <div class="modal-dialog modal-lg">

                        <!-- Modal content-->
                        <div class="modal-content">
                        <div class="modal-header">
                <h5 v-if="edit" class="modal-title" id="Cargar Bancos">Actualizar Información del Banco</h5>        
                <h5 v-else class="modal-title" id="Cargar Bancos">Cargar Información del Cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
                       
                        <div class="modal-body">
                            
                        <div class="form-group">

                        <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationCustom01">Cedula del Cliente</label>
      <input type="text" class="form-control" v-model="car.cedula" name="cedula" id="cedula" placeholder="Número de Cedula" required>
      <div class="valid-feedback">
        Looks good!
      </div>

    </div>
    <div class="col-md-4 mb-3">
      <label for="validationCustom02">Nombres</label>
      <input type="text" class="form-control" v-model="car.nombres" name="nombres" id="nombres" placeholder="Nombres del Cliente" required>
      <div class="valid-feedback">
        Looks good!
      </div>

    </div>
   

 <div class="col-md-4 mb-3">
      <label for="validationCustom04">Apellidos</label>
      <input type="text" class="form-control" v-model="car.apellidos" name="apellidos" id="apellidos" placeholder="Apellidos del Cliente" required>
      <div class="invalid-feedback">
        Please provide a valid state.
      </div>
    </div>







  </div>
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="validationCustom03">Dirreccion</label>
      <input type="text" class="form-control" v-model="car.direccion" name="direccion" id="direccion" placeholder="Dirección" required>
      <div class="invalid-feedback">
        Please provide a valid city.
      </div>
    </div>

     <div class="col-md-3 mb-3">
      <label for="validationCustomUsername">E-mail</label>
      <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroupPrepend">@</span>
                </div>
        <input type="text" class="form-control" v-model="car.correo" name="correo" id="correo" placeholder="E-mail" aria-describedby="inputGroupPrepend" required>
                <div class="invalid-feedback">
                  Please choose a username.
                </div>
      </div>
    </div>

   

    <div class="col-md-3 mb-3">
      <label for="validationCustom05">Número de Teléfono</label>
      <input type="text" class="form-control" v-model="car.telefono" name="telefono" id="telefono" placeholder="Numero de Teléfono" required>

      <div class="invalid-feedback">
        Please provide a valid zip.
      </div>


      
                        
    </div>




  </div>


<div class="modal-footer">
                           
                     
                     <button v-if="edit"class="btn btn-primary" @click.prevent="updateCliente()">
                       Actualizar Información
                    </button>
                    <button v-else  class="btn btn-primary" @click.prevent="CrearCliente()">
                       Guardar Información
                    </button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>


  </div>
</div>

 










 

  


<div></div>
        










                       
                        </div>

                    </div>
                    </div>




<!-- --------------------------------------------------------------------------------- --!>




<!-- Modal -->
<div class="modal fade" id="myModalcuenta" tabindex="-1" role="dialog" aria-labelledby="myModalcuenta" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="Cargar Bancos">Registro Número de Cuentas del Cliente</h5>
        <h4><b>&nbsp {{ car.nombres }} &nbsp{{ car.apellidos }}</b></h4>  
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
<div >
       <input type="hidden" class="form-control" v-model="car.cedula" name="cedula" id="cedula" placeholder="Número de Cedula" >
       <input type="hidden" class="form-control" v-model="car.nombres" name="nombres" id="nombres"  >
       <input type="hidden" class="form-control" v-model="car.apellidos" name="apellidos" id="apellidos"  >
      

    </div>
      


      <div class="modal-body">

 
  <div class="form-row">
    <div class="col-md-3 mb-3">
         <label>Pais donde reside el Banco</label>
                <select class='form-control' v-model='car.id_pais_banco'  @change='getNombre()'>
                    <option value='0' >Seleccion el Pais</option>
                    <option v-for='data in pais' :value='data.id_pais'>{{ data.nombre_pais }}</option>
                </select>

    </div>
    <div class="col-md-3 mb-3">
      
        <div class="form-group">
            <label>Nombre Banco</label>
            <select class='form-control' v-model='state' @change='getCodigo()'>
                <option value='0' >Nombre Banco</option>
                <option v-for='data in states' :value='data.codigo_banco'>{{ data.nombre_banco }}</option>
            </select>
        </div>
    </div>
 
    <div class="col-md-3 mb-3" v-for="item in codigo_banco">
      <label for="validationDefault05">Codigo del Banco</label>
    
      <input type="hidden" class="form-control" name='codigo_banco' v-model='item.codigo_banco'   id="codigo_banco" placeholder="Codigo Banco" >
      <b>&nbsp {{ item.codigo_banco }} </b> 
      <input type="text" class="form-control" name='co_banco' v-model='co_banco'   id="co_banco" placeholder="Numero de Cuenta" >
    </div>

     

    


    <div class="col-md-3 mb-3" >
       <div class="form-group">

        <div class="modal-footer">
                      <button class="btn btn-success btn-xs" @click.prevent="createCuenta()">
                       Añadir
                    </button>
                    
                        </div>

         
         </div>
    </div>
 
  </div>



<div></div>
        <table class="table table-striped" id="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre del Banco</th>
                        <th scope="col">Codigo del banco</th>
                         <th scope="col">Numero de Cuenta</th>
                        <th scope="col">Pais</th>
                        <th scope="col">Accion</th>
                        </tr>
                    </thead>
                     <tbody>
                        <tr v-for ="car in car1">
                        <th scope="row">{{car.id_cliente_banco }}</th>
                        <td>{{car.nombre_banco}}</td>
                        <td>{{car.codigo_banco}}</td>
                        <td>{{car.num_cuenta}}</td>
                         <td>{{car.nombre_pais}}</td>
            
                        <td  @click.prevent="deleteCuenta(car)" class="btn btn-danger"> 
                        <i class="fas fa-trash-alt"></i>
                        </td>
                        </tr>
                    </tbody>
                </table>

                      <div class="modal-footer">
                        
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                        </div>

                    </div>
                    </div>
























  





        ...
     


      </div>
      
    </div>
  </div>
</div>

       
             
    </div>
    
</template>

<script>

    export default {
     mounted() {
            console.log('Component mounted.')
           this.allCliente();
             this.getPais();
           //  this.getCodigo();
            // this.allCuenta();
            
             
        },
        data(){
            return {
               co_banco: '',
               con: [],
               pais: [],
                state: 0,
                states: [],
                codigo_banco: '',
                model: '',
                   hasError: true,
        Cliente: {'id_cliente': '','cedula': '', 'nombres': '', 'apellidos': '', 'direccion': '', 'correo': '', 'telefono': '', 'country': '', 'ci_cliente': '', 'cod_banco': '','state': ''},
        car: {'id_cliente': '','cedula': '', 'nombres': '', 'apellidos': '', 'direccion': '', 'correo': '', 'telefono': '', 'country': '', 'ci_cliente': '', 'cod_banco': '',id_banco:'', nombre_banco:'', codigo_banco:'', id_pais_banco:'', 'cedula_cliente': '', 'codigo_banco': '','state': ''},
         car1: {'id_cliente': '','cedula': '', 'nombres': '', 'apellidos': '', 'direccion': '', 'correo': '', 'telefono': '', 'country': '', 'ci_cliente': '', 'cod_banco': '',id_banco:'', nombre_banco:'', codigo_banco:'', id_pais_banco:'', 'cedula_cliente': '', 'codigo_banco': '','state': ''},




                newCar: {'cedula': '', 'nombres': '', 'apellidos': '', 'direccion': '', 'correo': '', 'telefono': '', 'country': '', 'ci_cliente': '', 'cod_banco': ''},
         
        hasError: true,
        cars: [],
         cars1: [],
        e_id_cliente: '',
        e_cedula: '',
        e_nombres: '',
        e_apellidos: '',
        e_direccion: '',
        e_correo: '',
        e_telefono: '',
       edit: false,
            }
        },
        methods:{             
           
















           getPais: function(){
                axios.post('http://localhost/blog79/public/get_pais')
                    .then(function (response) {
                        this.pais = response.data;
                    }.bind(this));
          
                  
            // this.getCodigo();

            },
            getNombre: function() {

                var input = this.car;
            var _this = this;
           

                  axios.post('http://localhost/blog79/public/get_nombre/' + input['id_pais_banco']).then(function(response){
                    this.states  = response.data;
                }.bind(this));
                 this.getCodigo();

            },

               getCodigo: function() {
                var _this = this;

                var input = this.state;
 
            var ci = document.getElementById('cedula').value;

       
                
                  axios.post('http://localhost/blog79/public/get_codigo/' + input).then(function(response){
                    _this.codigo_banco  = response.data;
                    _this.Validacion();
                    
                }.bind(this));
            },





            Validacion: function() {
                var _this = this;

                var input = this.state;
 
            var ci = document.getElementById('cedula').value;
            var nom = document.getElementById('nombres').value;
            var ape = document.getElementById('apellidos').value;

        
                
                  axios.post('http://localhost/blog79/public/Validacion/' + input+'/'+ci).then(function(response){

                  console.log(response);
                  this.con  = response.data;
                  if(this.con==1){
             
                  swal.fire({
                    icon: 'error',
                    title: 'Oops... El Cliente '+nom +' '+ape,
                    text: 'Ya posee cuenta en este Banco..!',
                    footer: '<a href></a>'
                  })}

              
                }.bind(this));

            },





             allCliente: function allCliente(){
            var _this = this;
            axios.post('http://localhost/blog79/public/allCliente').then(function(response){
                _this.Cliente = response.data;
            }).catch(error=>{
                console.log("Get All: "+error);
            });
        },

        allCuenta: function allCuenta(){
            
             var input = this.car;
            var _this = this;
            var ci = _this.car.cedula;
            
           
            axios.post('http://localhost/blog79/public/allCuenta/' + ci).then(function(response){
                _this.car1 = response.data;
            }).catch(error=>{
                console.log("Get All: "+error);
            });
        },




        createCuenta: function createCuenta() {

            var inp = this.state;
            var input = this.car;
            var _this = this;
            var cod = document.getElementById('codigo_banco').value;
            var ci = document.getElementById('cedula').value;
             var co = document.getElementById('co_banco').value;

           
            if(input['cedula'] == '' || input['nombres'] == '') {
                this.hasError = false;
            }
            else {
                this.hasError= true;
                
                axios.post('http://localhost/blog79/public/crearclientebanco/'+ cod +'/'+co, input).then(function(response){
                    





                    swal.fire({
                          title: 'La Informacion se Guardo con Exito',
                          showClass: {
                            popup: 'animate__animated animate__fadeInDown'
                          },
                          hideClass: {
                            popup: 'animate__animated animate__fadeOutUp'
                          }
                        })

                  
                    _this.allCuenta();
                   //  _this.borrar();
                }).catch(error=>{
                    console.log("Insert: "+error);
                });
            }
        },





        CrearCliente: function CrearCliente() {

            var input = this.car;
            var _this = this;

            if(input['cedula'] == '' || input['nombres'] == '') {
                this.hasError = false;
            }
            else {
                this.hasError= true;
                
                axios.post('http://localhost/blog79/public/CrearCliente', input).then(function(response){
                    _this.car = {'cedula': '', 'nombres': '', 'apellidos': '', 'direccion': '', 'correo': '', 'telefono': ''}

                    swal.fire({
                          title: 'La Informacion se Guardo con Exito',
                          showClass: {
                            popup: 'animate__animated animate__fadeInDown'
                          },
                          hideClass: {
                            popup: 'animate__animated animate__fadeOutUp'
                          }
                        })

                    $('#myModalcarga').modal('hide');
                    _this.allCliente();
                }).catch(error=>{
                    console.log("Insert: "+error);
                });
            }
        },
        deleteCliente: function deleteCliente(car) {
            var _this = this;
            



                    const swalWithBootstrapButtons = swal.mixin({
                      customClass: {
                        confirmButton: 'btn btn-success',
                        cancelButton: 'btn btn-danger'
                      },
                      buttonsStyling: false
                    })

                    swalWithBootstrapButtons.fire({
                      title: 'Seguro que desea eliminar la Información?',
                      text: "Este Proceso no puede ser revertido!",
                      icon: 'warning',
                      showCancelButton: true,
                      confirmButtonText: 'Eliminar!',
                      cancelButtonText: 'Cancelar             !',
                      reverseButtons: true
                    }).then((result) => {
                      if (result.isConfirmed) {
                        swalWithBootstrapButtons.fire(
                          'Eliminado!',
                          'La información ha sido Eliminada.',
                          'success'
                        )
                          axios.post('http://localhost/blog79/public/deleteCliente/' + car.id_cliente).then(function(response){
                _this.allCliente();
            }).catch(error=>{
                console.log("Delete car: "+error);
            });
                      } else if (
                        /* Read more about handling dismissals below */
                        result.dismiss === swal.DismissReason.cancel
                      ) {
                        swalWithBootstrapButtons.fire(
                          'Cancelled',
                          'Your imaginary file is safe :)',
                          'error'
                        )
                      }
                    })


       
        },
    





deleteCuenta: function deleteCliente(car) {
            var _this = this;
            

                    const swalWithBootstrapButtons = swal.mixin({
                      customClass: {
                        confirmButton: 'btn btn-success',
                        cancelButton: 'btn btn-danger'
                      },
                      buttonsStyling: false
                    })

                    swalWithBootstrapButtons.fire({
                      title: 'Seguro que desea eliminar la Información?',
                      text: "Este Proceso no puede ser revertido!",
                      icon: 'warning',
                      showCancelButton: true,
                      confirmButtonText: 'Eliminar!',
                      cancelButtonText: 'Cancelar             !',
                      reverseButtons: true
                    }).then((result) => {
                      if (result.isConfirmed) {
                        swalWithBootstrapButtons.fire(
                          'Eliminado!',
                          'La información ha sido Eliminada.',
                          'success'
                        )
                          axios.post('http://localhost/blog79/public/deleteCuenta/' + car.id_cliente_banco).then(function(response){
                _this.allCuenta();
            }).catch(error=>{
                console.log("Delete car: "+error);
            });
                      } else if (
                        /* Read more about handling dismissals below */
                        result.dismiss === swal.DismissReason.cancel
                      ) {
                        swalWithBootstrapButtons.fire(
                          'Cancelled',
                          'Your imaginary file is safe :)',
                          'error'
                        )
                      }
                    })


       
        },










editcliente: function editcliente(car){

  this.car=car
  this.edit= true
},




cuenta_cliente: function cuenta_cliente(car){

  this.car=car
  var _this = this;
   _this.allCuenta();
  
},



        updateCliente: function(){
        

        


            swal.fire({
                      title: 'Seguro desea actualizar la Información?',
                      text: " ",
                      icon: 'warning',
                      showCancelButton: true,
                      confirmButtonColor: '#3085d6',
                      cancelButtonColor: '#d33',
                      confirmButtonText: 'Actualizar'
                    }).then((result) => {
                      if (result.isConfirmed) {

                       

                        swal.fire(
                          '',
                          'Los Datos fueron Actualizados.',
                          'success'
                        )
                        axios.post('http://localhost/blog79/public/updateCliente/' + this.car.id_cliente, this.car)
                       .then(response => {
                        $('#myModalcarga').modal('hide');
                         _this.allCliente();
                       });
                      }
                    })


            
     }


        },
        created: function(){
            
        }
    }
</script>