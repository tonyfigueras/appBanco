<template>
    <div class="container">
        
      

         <button class="btn btn-primary"  data-toggle="modal" @click.prevent="promesa()" data-target="#myModalcarga"><i class="fas fa-money-check-alt"></i>
                        Ingresar Nuevo Banco
                    </button>
        <table class="table table-striped" id="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre del Banco</th>
                        <th scope="col">Codigo del banco</th>
                        <th scope="col">Pais</th>
                        <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                     <tbody>
                        <tr v-for ="car in cars">
                        <th scope="row">{{car.id_banco}}</th>
                        <td>{{car.nombre_banco}}</td>
                        <td>{{car.codigo_banco}}</td>
                         <td>{{car.id_pais_banco}}</td>

                        <td @click="editBanco(car)"   class="btn btn-info " data-toggle="modal" data-target="#myModalcarga"><i class="far fa-edit"></i>
                        </td>
                        <td  @click.prevent="deleteBanco(car)" class="btn btn-danger"> 
                        <i class="fas fa-trash-alt"></i>
                        </td>
                        </tr>
                    </tbody>
                </table>



                <!-- Modal carga de datos-->
                    <div id="myModalcarga" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                        <div class="modal-header">
                <h5 v-if="edit" class="modal-title" id="Cargar Bancos">Actualizar Información del Banco</h5>        
                <h5 v-else class="modal-title" id="Cargar Bancos">Cargar Información del Banco</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
                        <div class="modal-body">
                            
                        <div class="form-group">
                        <label for="make">Nombre del Banco</label>
                        <input type="text" class="form-control" id="nombre_banco" required placeholder="Nombre del Banco" name="nombre_banco" v-model="car.nombre_banco">
                    </div>
                      
                     <div class="form-group">
                            <label>Pais donde reside el Banco</label>
                            <select class='form-control' v-model='car.id_pais_banco'>
                                <option value='0' >Seleccion el Pais</option>
                                <option v-for='data in pais' :value='data.id_pais'>{{ data.nombre_pais }}</option>
                            </select>
                        </div>



                    <div class="form-group">
                        <label for="model">Codigo del Banco</label>
                        <input type="text" class="form-control" id="code" required placeholder="Codigo del Banco" name="code" v-model="car.codigo_banco">
                    </div>



                   
                        </div>
                        <div class="modal-footer">
                           
                     <button v-if="edit"class="btn btn-primary" @click.prevent="updateBanco()">
                       Actualizar Información
                    </button>
                    <button v-else class="btn btn-primary" @click.prevent="createbanco()">
                       Guardar Información
                    </button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
            this.allBancos();



$('#myModalcarga').on('hidden.bs.modal', function (e) { $(this) .find("input,textarea,select") .val('') .end() .find("input[type=checkbox], input[type=radio]") .prop("checked", "") .end();
 })




        },
        data(){
            return {
               
                pais: [],
                state: 0,
                states: [],
                   hasError: true,
        newCar: {'nombre_banco': '', 'code': '', 'pais':'pais'},
        hasError: true,
        cars: [],
        car:{id_banco:'', nombre_banco:'', codigo_banco:'', id_pais_banco:''},

        e_id: '',
        e_nombre_banco: '',
        e_code: '',
        e_pais: '',
        edit:false,
       
            }
        },
        methods:{ 


        promesa: function promesa(){
       var _this = this;
  _this.edit= false
  $('#myModalcarga').on('hidden.bs.modal', function (e) { $(this) .find("input,textarea,select") .val('') .end() .find("input[type=checkbox], input[type=radio]") .prop("checked", "") .end();
 })

        
       
        },          
            getPais: function(){
                axios.post('http://localhost/blog79/public/get_pais')
                    .then(function (response) {
                        this.pais = response.data;
                    }.bind(this));
            },
            getStates: function() {
                axios.get('88/get_state',{
                    params: {
                        country_id: this.country
                    }
                }).then(function(response){
                    this.states = response.data;
                }.bind(this));
            },



             allBancos: function allBancos(){
            var _this = this;
            axios.post('http://localhost/blog79/public/allBancos').then(function(response){
                _this.cars = response.data;
            }).catch(error=>{
                console.log("Get All: "+error);
            });

        },
        createbanco: function createbanco() {


            var input = this.car;
            var _this = this;
            if(input['nombre_banco'] == '' || input['code'] == '') {
                this.hasError = false;
            }
            else {
                this.hasError= true;
                axios.post('http://localhost/blog79/public/createbanco', input).then(function(response){
                    _this.car = {id_banco:'', nombre_banco:'', codigo_banco:'', id_pais_banco:''}

                   

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

                    _this.allBancos();
                }).catch(error=>{
                    console.log("Insert: "+error);
                });
            }
        },
        deleteBanco: function deleteBanco(car) {
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
                          axios.post('http://localhost/blog79/public/deleteBanco/' + car.id_banco).then(function(response){
                _this.allBancos();
            }).catch(error=>{
                console.log("Delete car: "+error);
            });
                      } else if (
                        /* Read more about handling dismissals below */
                        result.dismiss === Swal.DismissReason.cancel
                      ) {
                        swalWithBootstrapButtons.fire(
                          'Cancelled',
                          'Your imaginary file is safe :)',
                          'error'
                        )
                      }
                    })



          
        },
        



editBanco: function editBanco(car){

  this.car=car
  this.edit= true
},


        updateBanco: function(){
            


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
                        axios.put('http://localhost/blog79/public/editBanco/' + this.car.id_banco, this.car)
                       .then(response => {
                        $('#myModalcarga').modal('hide');
                         _this.allBancos();
                       });
                      }
                    })


            
     }


        },
        created: function(){
            this.getPais()
        }
    }
</script>