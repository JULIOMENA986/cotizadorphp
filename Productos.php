<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="scss/style.scss">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">


</head>
<body>
<nav2/><br><br>
    <div class="container">
      <h1 id = "title">Registre Sus Productos</h1>
      <hr>
      <form v-on:submit.prevent ="Productos">
      <input type="text" id="password" class="fadeIn third" name="login" placeholder="Producto" v-model="name"> 
      <input type="text" id="password" class="fadeIn third" name="login" placeholder="Sku" v-model="sku">
      <input type="text" id="password" class="fadeIn third"  name="login" placeholder="Descripcion" v-model="descripcion">   
      <input type="text" id="login" class="fadeIn second"  name="login" placeholder="Cantidad" v-model="cantidad">  
      <input type="text" id="password" class="fadeIn third"  name="login" placeholder="Precio Compra" v-model="precio_compra">
      <input type="text" id="login" class="fadeIn second"  name="login" placeholder="Precio Venta" v-model="precio_venta">
      <input type="text" id="login" class="fadeIn second"  name="login" placeholder="Divisa" v-model="divisa">
      <input type="text" id="login" class="fadeIn second"  name="login" placeholder="Descuento" v-model="descuento">
      <input type="text" id="login" class="fadeIn second"  name="login" placeholder="Impuesto" v-model="impuesto">
      <input type="text" id="login" class="fadeIn second"  name="login" placeholder="Unidad" v-model="unidad">
      <input type="text" id="login" class="fadeIn second"  name="login" placeholder="Marca" v-model="marca">
      <input type="text" id="login" class="fadeIn second"  name="login" placeholder="Imagen" v-model="imagen">
      <input type="text" id="login" class="fadeIn second"  name="login" placeholder="Notas" v-model="notas">
      <input type="text" id="login" class="fadeIn second"  name="login" placeholder="business" v-model="business_id">
   
      <input id="breg"  type="submit" class="fadeIn fourth" value="Al to que rey">
    <router-view/>
    </form>
      <hr>
      <div class="container-sm">
          <p id="biografia"> tu registro esta en proceso siuuuu.....</p> 
           <router-link to="/Listaproductos"><a class="dropdown-item" href="#" >Lista Productos</a></router-link>
       </div>
      </div>
      <br>

    <script>
  import axios from 'axios'
  export default{
      name:"Productos",
      components:{
      data: function(){
        return{
    name:"",
    sku:"",
    descripcion:"",
    cantidad:"",
    precio_Compra:"",
    precio_venta:"",
    divisa:"",
    descuento:"",
    impuesto:"",
    unidad:"",
    marca:"",
    imagen:"",
    notas:"",
    business_id:"",
        error: false,
        error_msg: "" ,
        }
      }
    },
    methods:{
    Productos(){
        let json = {
        "name":this.name,
        "sku":this.sku,
        "descripcion":this.descripcion,
        "cantidad":this.cantidad,
        "precio_compra":this.precio_compra,
        "precio_venta":this.precio_venta,
        "divisa":this.divisa,
        "descuento":this.descuento,
        "impuesto":this.impuesto,
        "unidad":this.unidad,
        "marca":this.marca,
        "imagen":this.imagen,
        "notas":this.notas,
        "business_id":this.business_id,
      };
      axios.post('http://10.232.169.141:80/api/auth/products/CreateProduct', json)
        .then(data =>{
          console.log(data);
          this.$router.push('Inicio')
        }
        )
      }
    },
    methodsq:{
      jspdf(){
      
        const doc = new jsPDF();
  
  doc.text("Hello world!", 10, 10);
  doc.save("a4.pdf");
  
  
        }
      }
    }
  
  </script>
</body>
</html>


  
  <style>
  #title{
      color:black;
  }
  
  #biografia{
      font-family: Arial, Helvetica, sans-serif;
      text-align: justify;
      color:black;
      font-size: 40;
      
  }
  
  </style>