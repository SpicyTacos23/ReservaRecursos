<html>
    <head>
       <?php require('../lib/librerias.php'); ?>
    </head>
    <body>
        <script>
            
        $( document ).ready(function() {
            // valida el campo nombre al quitarle el focus //formulario LOGIN
            $('#nombreFormLogin').blur(function(){
                var nombre = $('#nombreFormLogin').val().toLowerCase();
                console.log(nombre);
                if (nombre == null || nombre.length == 0 || /^\s+$/.test(nombre) || !isNaN(nombre)) {
                    //alert("introduce bien el Nombre!");
                    document.getElementById("nombreFormLogin").style.border='solid 2px red';
                    document.getElementById("hiddenErrorName").style.display='block';
                     return false;
		}
            });
            // valida la contraseña al quitarle el focus // formulario LOGIN
            $('#passwdFormLogin').blur(function(){
                var password = $('#passwdFormLogin').val();
                console.log(password);
                if (password == null || password.length == 0 || /^\s+$/.test(password) || !isNaN(password)) {
                    //alert("introduce la contraseña!");
                    document.getElementById("passwdFormLogin").style.border='solid 2px red';
                    document.getElementById("hiddenErrorPswd").style.display='block';
                    return false;
		}
            });
            
            // valida el nombre del formulario CREAR usuario
            $('#nombreFormCreate').blur(function(){
                var nombre = $('#nombreFormCreate').val().toLowerCase();
                console.log(nombre);
                if (nombre == null || nombre.length == 0 || /^\s+$/.test(nombre) || !isNaN(nombre)) {
                    //alert("introduce bien el Nombre!");
                    document.getElementById("nombreFormCreate").style.border='solid 2px red';
                    return false;
		}
            });
            //pass 1
            $('#pass1FormCreate').blur(function(){
                var password = $('#pass1FormCreate').val();
                console.log(password);
                if (password == null || password.length == 0 || /^\s+$/.test(password) || !isNaN(password)) {
                    //alert("introduce la contraseña!");
                    document.getElementById("pass1FormCreate").style.border='solid 2px red';
                    return false;
		}
            });
            //pass2
             $('#pass2formCreate').blur(function(){
                var password2 = $('#pass2formCreate').val();
                console.log(password2);
                if (password2 == null || password2.length == 0 || /^\s+$/.test(password2) || !isNaN(password2)) {
                    //alert("introduce la contraseña!");
                    document.getElementById("pass2formCreate").style.border='solid 2px red';
                    return false;
		}
            });
         
            $('#btnEnviarformCrear').click(function(){
                var password = $('#pass1FormCreate').val();
                var password2 = $('#pass2formCreate').val();
                //alert(password, password2);
                document.getElementById("pass1FormCreate").style.border='solid 2px red';
                document.getElementById("pass2formCreate").style.border='solid 2px red';
                
                if(password === password2){
                    $('#formCrearUser').submit();
                }else{
                    alert("Las contraseñas no coinciden");
                    return false;
                }
            });
            
            $('#btnEnviarformModificar').click(function(){
                $('#formModificarUser').submit();
                
            });
            
            // FUNCIONES DE CENTRO RECURSOS
            $('#passwdFormLogin').click(function(){
                $('#hiddenErrorPswd').hide();
            });
            
             $('#nombreFormLogin').click(function(){
                $('#hiddenErrorName').hide();
            });
            
            $('.prueba div').mouseenter(function(){
                $( this ).fadeOut( 100 );
                $( this ).fadeIn( 100 );
            });
           
            // captura el intro del buscador para filtrar por recurso
            $('#filtrarRecurso').keydown(function(event) {
                if (event.which == 13) {
                    this.form.submit();
                    event.preventDefault();
                 }
            });
            
        });

        </script>
    </body>
</html>
