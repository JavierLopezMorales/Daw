<?php

    include_once("./modelos/instalacion.php");
    include_once("./modelos/usuario.php");
    include_once("./vista.php");
    include_once("./modelos/seguridad.php");

    class ControladorInstalaciones
    {
        private $instalacion, $vista;
        /**
         * Constructor. Crea las variables de los modelos y la vista
         */
        public function __construct()
        {
            $this->instalacion = new Instalacion();
            $this->vista = new Vista();
            $this->seguridad = new Seguridad();
        }

        // Mostrar la tabla de instalaciones
        public function mostrarInstalaciones()
        {
            if($this->seguridad->haySesionIniciada() && $_SESSION['type'] == 'admin')
            {
                $data['listaInstalaciones'] = $this->instalacion->getAll();
                $this->vista->mostrar("instalaciones/listaInstalaciones", $data);
            }
            else
            {
                $data['msjError'] = "No tienes permisos para esto";
                $this->vista->mostrar("login", $data);
            }
        }

        // Buscar instalaciones dependiendo del texto de busqueda
        public function buscarInstalacion()
        {
            if($this->seguridad->haySesionIniciada() && $_SESSION['type'] == 'admin')/* && $_SESSION["type"] == "admin"*/
            {
                $textoBusqueda = $_REQUEST["textoBusqueda"];
                $seleccion = $_REQUEST["seleccion"];
                
                if($textoBusqueda == "" || $textoBusqueda == null)
                {
                    $data['listaInstalaciones'] = $this->instalacion->getAll();
                }
                else
                {
                    $data['msjInfo'] = "Resultados de la búsqueda: $textoBusqueda";
                    $data['listaInstalaciones'] = $this->instalacion->busquedaAproximada($textoBusqueda, $seleccion);
                }
                $this->vista->mostrar("instalaciones/listaInstalaciones", $data);
            }
            else
            {
                $data['msjError'] = "No tienes permisos para esto";
                $this->vista->mostrar("login", $data);
            }
        }

        // Mostrar el formulario de creacion de instalaciones
        public function crearInstalaciones()
        {
            if($this->seguridad->haySesionIniciada() && $_SESSION['type'] == 'admin')/* && $_SESSION["type"] == "admin"*/
            {
                $this->vista->mostrar("instalaciones/formularioInstalacion");
            }
            else
            {
                $data['msjError'] = "No tienes permisos para esto";
                $this->vista->mostrar("login", $data);
            }
        }

        // Recoger los datos del formulario y se insertan en la base de datos
        public function insertarInstalaciones()
        {
            if($this->seguridad->haySesionIniciada() && $_SESSION['type'] == 'admin')
            {
                $name = $_REQUEST['name'];
                $description = $_REQUEST['description'];
                $price = $_REQUEST['price'];
    
                $result = $this->instalacion->crearInstalacion($name, $description, $price);
    
                if($result)
                {
                    $id['instalacion'] = $this->instalacion->getId($name);
                    foreach($id['instalacion'] as $idInstalacion) 
                    {
                        $idIns = $idInstalacion->idFacility;
                        $result = $this->instalacion->indicarImagen($idIns);
                        if($result)
                        {
                            copy('./imagenes/instalaciones/default', 'imagenes/instalaciones/'.$idIns);
                            $data['msjInfo'] = "Instalacion creada con exito";
                            $data['listaInstalaciones'] = $this->instalacion->getAll();
                            $this->vista->mostrar("instalaciones/listaInstalaciones", $data);
                        }
                        else
                        {
                            $data['msjError'] = "Error en la creación del usuario";
                            $data['listaInstalaciones'] = $this->instalacion->getAll();
                            $this->vista->mostrar("instalaciones/listaInstalaciones", $data);
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

        // Borrar una instalacion
        public function borrarInstalaciones()
        {
            if($this->seguridad->haySesionIniciada() && $_SESSION['type'] == 'admin')
            {
                $idFacility = $_REQUEST['id'];
                $result = $this->instalacion->borrarInstalacion($idFacility);
                if($result)
                {
                    unlink('./imagenes/instalaciones/'.$idFacility);
                    $data['listaInstalaciones'] = $this->instalacion->getAll();
                    $data['msjInfo'] = "Instalacion borrada con exito";
                    $this->vista->mostrar("instalaciones/listaInstalaciones", $data);
                }
                else
                {
                    $data['msjError'] = "Error en el borrado";
                    $this->vista->mostrar("instalaciones/listaInstalaciones", $data);
                }
            }
            else
            {
                $data['msjError'] = "No tienes permisos para esto";
                $this->vista->mostrar("login", $data);
            }
        }

        // Mostrar el formulario de modificacion de instalaciones
        public function modificarInstalaciones()
        {
            if($this->seguridad->haySesionIniciada() && $_SESSION['type'] == 'admin')/* && $_SESSION["type"] == "admin"*/
            {
                $idFacility = $_REQUEST['id'];
                $data['instalacion'] = $this->instalacion->getInstalacion($idFacility);
                $this->vista->mostrar("instalaciones/formularioInstalacion", $data);
            }
            else
            {
                $data['msjError'] = "No tienes permisos para esto";
                $this->vista->mostrar("login", $data);
            }
        }

        // Recoger los datos del formulario y se insertan en la base de datos
        public function modificacionInstalaciones()
        {

            if($this->seguridad->haySesionIniciada() && $_SESSION['type'] == 'admin')/* && $_SESSION["type"] == "admin"*/
            {

                $idFacility = $_REQUEST['idFacility'];
                $name = $_REQUEST['name'];
                $description = $_REQUEST['description'];
                $price = $_REQUEST['price'];
                
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
                        $image = $idFacility;
                        
                        if (move_uploaded_file($temp, './imagenes/instalaciones/'.$image)) 
                        {
                            //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
                            chmod('./imagenes/instalaciones/'.$image, 0777);
                        }
                        else
                        {
                            //Si no se ha podido subir la imagen, mostramos un mensaje de error
                            $data['msjError'] = "<div><b>Ocurrió algún error al subir el fichero. No pudo guardarse.</b></div>";
                            $this->vista->mostrar("inicio", $data);
                        }
                    }
                }
    
                $result = $this->instalacion->modificarInstalacion($idFacility, $name, $description, $price);
    
                if($result)
                {
                    $data['msjInfo'] = "Instalacion modificada con exito";
                    $data['listaInstalaciones'] = $this->instalacion->getAll();
                    $this->vista->mostrar("instalaciones/listaInstalaciones", $data);
                }
                else
                {
                    $data['msjError'] = "Error en la modificacion";
                    $data['listaInstalaciones'] = $this->instalacion->getAll();
                    $this->vista->mostrar("instalaciones/listaInstalaciones", $data);
                }
    
            }
            else
            {
                $data['msjError'] = "No tienes permisos para esto";
                $this->vista->mostrar("login", $data);
            }

        }

    }