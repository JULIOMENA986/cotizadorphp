<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <title>Register</title>
</head>
<body>

<!------ Include the above in your HEAD tag ---------->

<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->
    <!-- Icon -->
    <br><br><br>
    <h1>Registrarse</h1>
    <div class="fadeIn first">
      <img src="@/assets/logoS.png" id="icon" alt="User Icon" />
    </div>
    <!-- Login Form -->
    <form v-on:submit.prevent ="register">
      <input type="text" id="login" class="fadeIn second" name="login" placeholder="Correo Electronico" v-model="email">
      <input type="text" id="password" class="fadeIn third" name="login" placeholder="Contraseña" v-model="password">
      <input type="text" id="login" class="fadeIn second" name="login" placeholder="password confirmation" v-model="password_confirmation">
      <input type="text" id="password" class="fadeIn third" name="login" placeholder="nombre" v-model="name">
      <input id="breg"  type="submit" class="fadeIn fourth" value="Registrarse">
    <router-view/>
    </form>
  </div>
</div>


<script>
import axios from 'axios'
export default{
  name: 'Home',
  components:{
    data: function(){
      return{
      email: "",
      password: "",
      password_confirmation: "",
      name:"",
      error: false,
      error_msg: "" ,
      
      }
    }
  },
  methods:{
    register(){
      let json = {
      "email":this.email,
      "password":this.password,
      "password_confirmation": this.password_confirmation,
      "name": this.name
      };
      axios.post('http://10.232.169.141:80/api/register', json)
      .then(data =>{
        console.log(data);
        this.$router.push('Login')
      }
      )
    }
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