<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <title>Document</title>
</head>
<body>
<div class="container">
<navbar/>
<nav class="classy-navbar justify-content-between" id="academyNav">

<!-- Navbar Toggler -->
<div class="classy-navbar-toggler">
    <span class="navbarToggler"><span></span><span></span><span></span></span>
</div>

<!-- Menu -->
<div class="classy-menu">

    <!-- close btn -->
    <div class="classycloseIcon">
        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
    </div>

    <!-- Nav Start -->
    <div class="classynav">
        <ul>
            <li class="log"><a href="Productos.php">productos</a></li>
        </ul>
    </div>
    <!-- Nav End -->
</div>

</nav>
<div class="dv">

</div>
<br>
<div class="container">
<button type="button" class="btn btn-dark fadeIn fourth" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Crear cotizacion
</button>
<br><br>






<button type="button" class="btn btn-primary fadeIn fourth " data-bs-toggle="modal12345" data-bs-target="#exampleModal2">
  Generar PDF
</button>
<br><br>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Crear Nueva Cotizacion</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form v-on:submit.prevent ="quotation">
            
            
            <!---<div>
            <select class="form-control" :id="id" :name="name" :disabled="disabled" :required="required"></select>
            </div>-->
           <!--- <v-select label="countryName" :options="countries"></v-select>--->
           <select class="form-select" aria-label="Default select example" v-model="business_id">
            <option selected >Selecciona una opcion</option>
            <option value="uno"></option>
            <option value="ultrasonico">saldra</option>
            <option value="temperatura">o nel</option>
        </select><br>
            <input type="text" id="password" class="fadeIn third" name="login" placeholder="referencia" v-model="referencia"> 
            <input type="text" id="password" class="fadeIn third" name="login" placeholder="Totales Impuestos" v-model="totales_impuestos">
            <input type="text" id="password" class="fadeIn third"  name="login" placeholder="Fecha" v-model="fecha">   
            <input type="text" id="login" class="fadeIn second"  name="login" placeholder="Resumen Cotizacion" v-model="resumen_cotizacion">  
            <input type="text" id="password" class="fadeIn third"  name="login" placeholder="Divisa" v-model="divisa">
            <input type="text" id="login" class="fadeIn second"  name="login" placeholder="Sucursal" v-model="sucursal">
            <div class="form-group">
             <select placeholder="Seleccion Su Producto" name="select" class="fadeIn third" v-model="Product_id" >
              <option value="value1">aqui ira tu Producto......</option>
             </select>
            </div>
            <input type="text" id="login" class="fadeIn second"  name="login" placeholder="Total Producto" v-model="total_producto">
            <div class="alert alert-danger" role="alert" v-if="error">
            {{error}}
            </div>
            <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Crear</button>
      </div>
        </form>
      </div>
    </div>
  </div>
</div><br><br>






<!---->
    
</div>
</div>

<script>
import axios from 'axios';

export default {
    name: "Inicio",
    components:{
        navbar,
        footer
    },
    data: function(){
        return {
            Nombre: null,
            nombre: null,
            telefono:null,
            direccion: null,
            horarios:null,
            descripcion: null,
            error:null,
            message:null,
            messages:null,
            business_id:"",
            empresar:[

            ],
      referencia: "",
      totales_impuesto: "",
      fecha: "",
      resumen_cotizacion:"",
      divisa:"",
      sucursal:"",
      product_id:"",
      total_producto:"",
      error: false,
      error_msg: "" ,
        }
    },
    methods:{
        mostrar(id){
            console.log(id)
            this.$router.push('/Principal/'+id)
        },
        create(){
            let json = {
                "nombre_queseria": this.nombre,
                "telefono":this.telefono,
                "direccion":this.direccion,
                "horarios":this.horarios,
                "descripcion":this.descripcion

            };
            axios.post('http://18.144.45.33:3333/api/v1/queseria/create', json,{
                 headers:{
                Authorization: 'Bearer ' + localStorage.getItem('token')
            }
            }).then (data =>{
                console.log(data)
                this.message=data.data.message

                Pusher.logToConsole = true;

                var pusher = new Pusher('321a5c897ce91d5d3023', {
                cluster: 'us2'
                });

                var channel = pusher.subscribe('my-channel');
                channel.bind('my-event', function(data) {
                app.messages.push(JSON.stringify(data));
                });
                // Vue application
                const app = new Vue({
                el: '#app',
                data: {
                    messages: [],
                },
                });
               
                if (data.data.status == 'ok'){
                  location.reload();
                }
                  this.error = data.data[0].message

            });
        }
        
        ,
        eliminar(id){
            var respuesta = confirm("Estas Seguro que quieres eliminar Esta queseria? No podras volver a restaurarla")
            if (respuesta == true){
                let direccion ="http://18.144.45.33:3333/api/v1/queseria/delete/"+id
            axios.delete(direccion, {
                headers:{
                Authorization: 'Bearer ' + localStorage.getItem('token')
            }
            }).then(data =>{
                console.log(data)

            });
            location.reload();
            }
            else{
                return false;
            }
        },
        Mandar(id){
            this.$router.push('/Act_Queseria/'+id);
        }
        
    },
    mounted:function(){
        let direccion = "http://18.144.45.33:3333/api/v1/queseria/index";
        axios.get(direccion,{
            headers:{
                Authorization: 'Bearer ' + localStorage.getItem('token')
            }
        }).then (data =>{
            this.Nombre = data.data;
            console.log(data.data)
        });
    },
    methods:{
    quotation(){
      let json = {
      "business_id":this.business_id,
      "referencia":this.referencia,
      "totales_impuesto":this.totales_impuesto,
      "fecha":this.fecha,
      "resumen_cotizacion":this.resumen_cotizacion,
      "divisa":this.divisa,
      "sucursal":this.sucursal,
      "product_id":this.product_id,
      "total_producto":this.total_producto
      };
      axios.post('http://10.232.169.141:80/api/auth/quotation/CreateQuotation', json)
      .then(data =>{
        console.log(data);
        this.$router.push('Inicio')
      },
      )
    }
  },
  mounted:function(){
    this.business_id = this.$route.params.id;
    let direccion ="http://10.232.169.141:80/api/auth/business"+this.business_id+"/get"
    axios.get(direccion,{
            headers:{
                Authorization: 'Bearer ' + localStorage.getItem('token')
            }
        }).then (data =>{ 
            this.name = data.data
            console.log(this.name)
        });
    }
}
</script>

<script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>
</body>
</html>



<style>
.cont{
    text-align: left;
}
.dv{
    text-align: left;
}

#ll{
    color:aqua;
}
#la{
color:red;
}
#le{
    color:yellow;

}
button{
  background:#eb94d0;
}
</style>