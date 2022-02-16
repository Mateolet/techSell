<?php  

	include 'includes/header.html';  
	include 'includes/nav.php';  
?>

    <main class="container">
        <h1>Alta de un Usuario</h1>


    <div class='alert bg-light p-4 col-8 mx-auto border shadow-sm'>
        <form  method="post" id="form">
                <div class='form-group'>
                <label for="nombreUsu">Nombre</label>
                <input type="text"  class='form-oontrol' id="nombreUsu" >
                <br>
                <label for="surname">Apellido</label>
                <input type="text"  class='form-oontrol' id="surname" >
                <br>
                <label for="instagram">instagram</label>
                <input type="text" class='form-oontrol' id="instagram" >
                <br>
                <label for="facebook">Facebook</label>
                <input type="text" class='form-oontrol' id="facebook" >
                <br>
                <label for="telefono">Telefono</label>
                <input type="tel" class='form-oontrol' id="telefono" >
                <br>
              
              
            
            </div>
            <button class='btn btn-success my-3 mr-3 px-4' id="btnAdd">Agregar usuario</button>
            <a href="adminUsuarios.php" class='btn btn-outline-secondary'>
            Volver a panel de usuarios
            </a>
        </form>

    </div>


    

    </main>

    <script>
        
            // let btnAdd = document.getElementById('btnAdd');
            let formBtn = document.querySelector('#form');

            console.log(formBtn);



            formBtn.addEventListener('submit',(e)=>{
                e.preventDefault();
                let formulario = new FormData();

                let inputName = document.getElementById('nombreUsu').value
                let inputSurname = document.getElementById('surname').value
                let inputInstagram = document.getElementById('instagram').value
                let inputFacebook = document.getElementById('facebook').value
                let inputTelefono = document.getElementById('telefono').value
                
               
                console.log(inputTelefono)
                formulario.append('name',inputName)
                formulario.append('surname',inputSurname)
                formulario.append('instagram',inputInstagram)
                formulario.append('facebook',inputFacebook)
                formulario.append('telefono',inputTelefono)

                
                fetch('agregarUsuario.php',{
                    method:'POST',
                    body: formulario
                })
                .then(res => res.json())
                .then(datos => {
                    if(datos == true){
                      setInterval(() => {
                          location.href = 'adminUsuarios.php'
                      }, 1000);
                }
            })
                
            })

    </script> 

<?php  include 'includes/footer.php';  ?>

