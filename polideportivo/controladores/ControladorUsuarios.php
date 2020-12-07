<?php

    include_once("./modelos/reserva.php");
    include_once("./modelos/usuario.php");
    include_once("./vista.php");
    include_once("./modelos/seguridad.php");

    class ControladorUsuarios
    {
        private $usuario, $vista, $reserva;
        /**
         * Constructor. Crea las variables de los modelos y la vista
         */
        public function __construct()
        {
            $this->usuario = new Usuario();
            $this->vista = new Vista();
            $this->seguridad = new Seguridad();
            $this->reserva = new Reserva();
        }

        /**
         * Pagina de inicio del administrador 
         */
        public function inicio()
        {
            if ($this->seguridad->haySesionIniciada()) {
                $this->vista->mostrar("inicio");
            } else {
                $this->vista->mostrar("login");
            }
        
        }

        public function comprobarEmail()
        {
            $email = $_REQUEST['email'];
            $result = $this->usuario->existeUsuario($email);
            if($result != null)
            {
                echo '1';
            }
            else
            {
                echo '0';
            }
        }

        /**
         * Mostrar login 
         */
        public function mostrarLogin()
        {
            $this->vista->mostrar("login");
        }

        /**
         * Comprobar si el login es correcto 
         */
        public function procesarLogin()
        {

            if($this->seguridad->haySesionIniciada())/* && $_SESSION["type"] == "admin"*/
            {
                $usuario = $_REQUEST["usuario"];
                $password = $_REQUEST["password"];
    
                $existe = $this->usuario->buscarUsuario($usuario, $password);
    
                if ($existe) {
                    
                    $data['msjInfo'] = "Sesión iniciada correctamente";
                    $this->seguridad->abrirSesion($existe);
                    $this->vista->mostrar("inicio", $data);
                } else {
                    // Error al iniciar la sesión
                    $data['msjError'] = "Nombre de usuario o contraseña incorrectos";
                    $this->vista->mostrar("login", $data);
                }
            }
            else
            {
                $data['msjError'] = "No tienes permisos para esto";
                $this->vista->mostrar("login", $data);
            }
        }

        /**
         * Cierra la sesión
         */
        public function cerrarSesion()
        {
            $data['msjInfo'] = "Sesión cerrada correctamente";
            $this->seguridad->cerrarSesion();
            $this->vista->mostrar("login", $data);
        }

        /**
         * Mostrar la tabla con la lista de usuarios
         */
        public function mostrarUsuarios()
        {
            if($this->seguridad->haySesionIniciada())
            {
                $data['mostrarUsuario'] = $this->usuario->getAll();
                $this->vista->mostrar("usuarios/listaUsuarios", $data);
            }
            else
            {
                $data['msjError'] = "No tienes permisos para esto";
                $this->vista->mostrar("login", $data);
            }
        }

        /**
         * Borrar un usuario 
         */
        public function borrarUsuarios()
        {

            if($this->seguridad->haySesionIniciada())/* && $_SESSION["type"] == "admin"*/
            {
                $idUser = $_REQUEST['id'];
                $fecha =  date('Y-m-d');
                $reservas = $this->reserva->getReservasUsuario($idUser, $fecha);
                
                $resProx = $this->reserva->getReservasProximas($idUser, $fecha);
                if($resProx)
                {
                    $borrado = $this->reserva->borrarReservasUsuario($idUser, $fecha);
                }
    
    
                if($reservas)
                {
                    $resultado = $this->usuario->marcarBorrado($idUser);
                    if($resultado)
                    {
                        $data['mostrarUsuario'] = $this->usuario->getAll();
                        $data['msjInfo'] = "Usuario marcado como borrado";
                        $this->vista->mostrar("usuarios/listaUsuarios", $data);
                    }
                    else
                    {
                        $data['mostrarUsuario'] = $this->usuario->getAll();
                        $data['msjError'] = "Error al marcar como borrado al usuario";
                        $this->vista->mostrar("usuarios/listaUsuarios", $data);
                    }
                }
                else
                {
                    $result = $this->usuario->borrarUsuario($idUser);
                    if($result)
                    {
                        unlink('./imagenes/usuarios/'.$idUser);
                        $data['mostrarUsuario'] = $this->usuario->getAll();
                        $data['msjInfo'] = "Usuario borrado con exito";
                        $this->vista->mostrar("usuarios/listaUsuarios", $data);
                    }
                    else
                    {
                        $data['mostrarUsuario'] = $this->usuario->getAll();
                        $data['msjError'] = "Error al borrar el usuario";
                        $this->vista->mostrar("usuarios/listaUsuarios", $data);
                    }
                }
    
                $vacio = $this->reserva->getVacio($idUser);
                if($vacio)
                {
                    unlink('./imagenes/usuarios/'.$idUser);
                    $data['mostrarUsuario'] = $this->usuario->getAll();
                    $data['msjInfo'] = "Usuario borrado con exito";
                    $this->vista->mostrar("usuarios/listaUsuarios", $data);
                }
            }
            else
            {
                $data['msjError'] = "No tienes permisos para esto";
                $this->vista->mostrar("login", $data);
            }
        }

        /**
         * Mostrar el formulario de creacion de usuarios 
         */
        public function crearUsuarios()
        {
            if($this->seguridad->haySesionIniciada())/* && $_SESSION["type"] == "admin"*/
            {
                $this->vista->mostrar("usuarios/formularioUsuarios");
            }
            else
            {
                $data['msjError'] = "No tienes permisos para esto";
                $this->vista->mostrar("login", $data);
            }
        }

        /**
         * Recoger los datos del formulario y enviarlos a la base de datos 
         */
        public function insertarUsuarios()
        {
            if($this->seguridad->haySesionIniciada())/* && $_SESSION["type"] == "admin"*/
            {
                $name = $_REQUEST['name'];
                $lastname1 = $_REQUEST['lastname1'];
                $lastname2 = $_REQUEST['lastname2'];
                $dni = $_REQUEST['dni'];
                $password = $_REQUEST['password'];
                $email = $_REQUEST['email'];
                $type = $_REQUEST['type'];

                $result = $this->usuario->crearUsuario($name, $lastname1, $lastname2, $dni, $password, $email, $type);

                if($result)
                {
                    $id['usuario'] = $this->usuario->getId($email);
                    foreach($id['usuario'] as $idUsuario) 
                    {
                        $idUs = $idUsuario->idUser;
                        $result = $this->usuario->indicarImagen($idUs);
                        if($result)
                        {
                            copy('./imagenes/usuarios/default', 'imagenes/usuarios/'.$idUs);
                            $data['msjInfo'] = "Usuario creado con exito";
                            $data['mostrarUsuario'] = $this->usuario->getAll();
                            $this->vista->mostrar("usuarios/listaUsuarios", $data);
                        }
                        else
                        {
                            $data['msjError'] = "Error en la creación del usuario";
                            $data['mostrarUsuario'] = $this->usuario->getAll();
                            $this->vista->mostrar("usuarios/listaUsuarios", $data);
                        }
                    }
                }
            }
            else
            {
                $data['msjError'] = "No tienes permisos para esto";
                $this->vista->mostrar("login", $data);
            }
        }

        /**
         * Mostrar el formulario de modificacion de usuarios
         */
        public function modificarUsuarios()
        {
            if($this->seguridad->haySesionIniciada())/* && $_SESSION["type"] == "admin"*/
            {
                $idUser = $_REQUEST['id'];
                $data['usuario'] = $this->usuario->getUser($idUser);
                $this->vista->mostrar("usuarios/formularioUsuarios", $data);
            }
            else
            {
                $data['msjError'] = "No tienes permisos para esto";
                $this->vista->mostrar("login", $data);
            }
        }

        /**
         * Recoger los datos del formulario y enviarlos 
         */
        public function modificacionUsuario()
        {

            if($this->seguridad->haySesionIniciada())/* && $_SESSION["type"] == "admin"*/
            {
                $idUser = $_REQUEST['idUser'];
                $name = $_REQUEST['name'];
                $lastname1 = $_REQUEST['lastname1'];
                $lastname2 = $_REQUEST['lastname2'];
                $dni = $_REQUEST['dni'];
                $password = $_REQUEST['password'];
                $email = $_REQUEST['email'];
                $type = $_REQUEST['type'];
                $state = $_REQUEST['state'];
                
                $image = $_FILES['image']['name'];
                //Si el archivo contiene algo y es diferente de vacio
                if (isset($image) && $image != "") {
                   //Obtenemos algunos datos necesarios sobre el archivo
                   $tipo = $_FILES['image']['type'];
                   $tamano = $_FILES['image']['size'];
                   $temp = $_FILES['image']['tmp_name'];
                   //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
                  if (!strpos($tipo, "png") && ($tamano < 2000000)) {
                     $data['msjError'] = "<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
                     - Se permiten archivos .png y de 200 kb como máximo.</b></div>";
                     $this->vista->mostrar("inicio", $data);
                  }
                    else {
                        //Si la imagen es correcta en tamaño y tipo
                        //Se intenta subir al servidor
                        $image = $idUser;// $image = 'imagenes/usuarios/'.$idUsuario;
                        
                        if (move_uploaded_file($temp, './imagenes/usuarios/'.$image)) 
                        {
                            //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
                            chmod('./imagenes/usuarios/'.$image, 0777);
                        }
                        else
                        {
                            //Si no se ha podido subir la imagen, mostramos un mensaje de error
                            $data['msjError'] = "<div><b>Ocurrió algún error al subir el fichero. No pudo guardarse.</b></div>";
                            $this->vista->mostrar("inicio", $data);
                        }
                    }
                }
            
    
                $result = $this->usuario->modificarUsuario($idUser, $name, $lastname1, $lastname2, $dni, $password, $email, $type, $state);
    
                if($result)
                {
                    $data['mostrarUsuario'] = "Usuario modificado con exito";
                    $data['mostrarUsuario'] = $this->usuario->getAll();
                    $this->vista->mostrar("usuarios/listaUsuarios", $data);
                }
                else
                {
                    $data['mostrarUsuario'] = "Error en la modificacion";
                    $data['mostrarUsuario'] = $this->usuario->getAll();
                    $this->vista->mostrar("usuarios/listaUsuarios", $data);
                }
            }
            else
            {
                $data['msjError'] = "No tienes permisos para esto";
                $this->vista->mostrar("login", $data);
            }

        }
         
        /**
         * Buscar un formulario mediante el texto de busqueda
         */
        public function buscarUsuario()
        {
            if($this->seguridad->haySesionIniciada())/* && $_SESSION["type"] == "admin"*/
            {
                $textoBusqueda = $_REQUEST["textoBusqueda"];
                $seleccion = $_REQUEST["seleccion"];
                
                if($textoBusqueda == "" || $textoBusqueda == null)
                {
                    $data['mostrarUsuario'] = $this->usuario->getAll();
                }
                else
                {
                    $data['msjInfo'] = "<p>Resultados de la búsqueda: \"$textoBusqueda\"</p>";
                    $data['mostrarUsuario'] = $this->usuario->busquedaAproximada($textoBusqueda, $seleccion);
                }
                $this->vista->mostrar("usuarios/listaUsuarios", $data);
            }
            else
            {
                $data['msjError'] = "No tienes permisos para esto";
                $this->vista->mostrar("login", $data);
            }
        }
        /**
         * Formulario de cambio de imagen 
         */
        public function cambiarImagen()
        {
            if($this->seguridad->haySesionIniciada())/* && $_SESSION["type"] == "admin"*/
            {
                $this->vista->mostrar("usuarios/formularioImagen");
            }
            else
            {
                $data['msjError'] = "No tienes permisos para esto";
                $this->vista->mostrar("login", $data);
            }
        }

        /**
         * Subir la imagen seleccionada 
         */
        public function subirImagen()
        {

            if($this->seguridad->haySesionIniciada())/* && $_SESSION["type"] == "admin"*/
            {
                if (isset($_POST['subir'])) 
                {
                    //Recogemos el archivo enviado por el formulario
                    $archivo = $_FILES['archivo']['name'];
                    //Si el archivo contiene algo y es diferente de vacio
                    if (isset($archivo) && $archivo != "") 
                    {
                       //Obtenemos algunos datos necesarios sobre el archivo
                       $tipo = $_FILES['archivo']['type'];
                       $tamano = $_FILES['archivo']['size'];
                       $temp = $_FILES['archivo']['tmp_name'];
                       //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
                        if (!strpos($tipo, "png") && ($tamano < 2000000)) 
                        {
                            $data['msjError'] = "<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
                            - Se permiten archivos .png y de 200 kb como máximo.</b></div>";
                            $this->vista->mostrar("inicio", $data);
                        }
                        else 
                        {
                            //Si la imagen es correcta en tamaño y tipo
                            //Se intenta subir al servidor
                            $archivo = $_REQUEST['idUser'];
                            
                            if (move_uploaded_file($temp, './imagenes/usuarios/'.$archivo)) 
                            {
                                $_SESSION['image'] = $archivo;
                                //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
                                chmod('./imagenes/usuarios/'.$archivo, 0777);
                                //Mostramos el mensaje de que se ha subido co éxito
                                $data['msjInfo'] = "<div><b>Se ha subido correctamente la imagen.</b></div>";
                                $this->vista->mostrar("inicio", $data);
                            }
                            else
                            {
                                //Si no se ha podido subir la imagen, mostramos un mensaje de error
                                $data['msjError'] = "<div><b>Ocurrió algún error al subir el fichero. No pudo guardarse.</b></div>";
                                $this->vista->mostrar("inicio", $data);
                            }
                        }
                    }
                }
            }
            else
            {
                $data['msjError'] = "No tienes permisos para esto";
                $this->vista->mostrar("login", $data);
            }

        }

        /**
         * Borrar la imagen 
         */
        public function borrarImagen()
        {   

            if($this->seguridad->haySesionIniciada())/* && $_SESSION["type"] == "admin"*/
            {
                $idUser = $_REQUEST['idUser'];

                if(copy('./imagenes/usuarios/default', 'imagenes/usuarios/'.$idUser))
                {
                    //$_SESSION['image'] = $idUser;
                    $data['msjInfo'] = "<div><b>Se ha borrado correctamente la imagen.</b></div>";
                    $this->vista->mostrar("inicio", $data);
                }
                else
                {
                    $data['msjError'] = "<div><b>Ocurrió algún error al borrar el fichero. No pudo guardarse.</b></div>";
                    $this->vista->mostrar("inicio", $data);
                }
            }
            else
            {
                $data['msjError'] = "No tienes permisos para esto";
                $this->vista->mostrar("login", $data);
            }
            
        }

    }