<?php

    include_once("modelos/usuario.php");
    include_once("vista.php");
    include_once("modelos/seguridad.php");

    class Controlador
    {
        private $usuario, $vista;
        /**
         * Constructor. Crea las variables de los modelos y la vista
         */
        public function __construct()
        {
            $this->usuario = new Usuario();
            $this->vista = new Vista();
            $this->seguridad = new Seguridad();
        }

        public function inicio()
        {
            if ($this->seguridad->haySesionIniciada()) {
                // Primero, accedemos al modelo de personas para obtener la lista de autores
                $this->vista->mostrar("inicio");
            } else {
                $data['msjError'] = "Nombre de usuario o contraseña incorrectos";
                $this->vista->mostrar("login", $data);
            }
        
        }

        public function mostrarLogin()
        {
            $this->vista->mostrar("login");
        }

        public function procesarLogin()
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

        /**
         * Cierra la sesión
         */
        public function cerrarSesion()
        {
            $data['msjInfo'] = "Sesión cerrada correctamente";
            $this->seguridad->cerrarSesion();
            $this->vista->mostrar("login", $data);
        }

        public function mostrarUsuarios()
        {
            $data['mostrarUsuario'] = $this->usuario->getAll();
            $this->vista->mostrar("usuarios/listaUsuarios", $data);
        }

        public function borrarUsuarios()
        {
            $idUser = $_REQUEST['id'];
            $result = $this->usuario->borrarUsuario($idUser);
            if($result)
            {
                $data['mostrarUsuario'] = "Usuario borrado con exito";
                $this->vista->mostrar("usuarios/listaUsuarios", $data);
            }
            else
            {
                $data['mostrarUsuario'] = "Error en el borrado";
                $this->vista->mostrar("usuarios/listaUsuarios", $data);
            }
        }

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

        public function insertarUsuarios()
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

        public function modificacionUsuario()
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

    }