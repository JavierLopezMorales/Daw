<?php
include_once("vista.php");
include_once("modelos/usuario.php");
include_once("modelos/incidencia.php");



class Controlador
{

	private $vista, $usuario, $incidencia;

	/**
	 * Constructor. Crea las variables de los modelos y la vista
	 */
	public function __construct()
	{
		$this->vista = new Vista();
		$this->usuario = new Usuario();
		$this->incidencia = new Incidencia();
	}

	/**
	 * Muestra el formulario de login
	 */
	public function mostrarFormularioLogin()
	{
		$this->vista->mostrar("usuario/formularioLogin");
	}

	/**
	 * Procesa el formulario de login e inicia la sesión
	 */
	public function procesarLogin()
	{
		$usr = $_REQUEST["usr"];
		$pass = $_REQUEST["pass"];

		$result = $this->usuario->buscarUsuario($usr, $pass);

		if ($result) {
			echo "<script>location.href = 'index.php'</script>";
		} else {
			// Error al iniciar la sesión
			$data['msjError'] = "Nombre de usuario o contraseña incorrectos";
			$this->vista->mostrar("usuario/formularioLogin", $data);
		}
	}

	/**
	 * Cierra la sesión
	 */
	public function cerrarSesion()
	{
		session_destroy();
		$data['msjInfo'] = "Sesión cerrada correctamente";
		$this->vista->mostrar("usuario/formularioLogin", $data);
	}

	/**
	 * Mostrar incidencias
	 */
	public function mostrarIncidencias()
	{
		if (isset($_SESSION["idUsuario"])) {
			$data['listaIncidencias'] = $this->incidencia->getAll();
			$this->vista->mostrar("incidencia/mostrarIncidencias", $data);
		}else{
			$data['msjError'] = "No tienes permisos para hacer eso";
			$this->vista->mostrar("usuario/formularioLogin", $data);
		}
	}

	/**
	* Mostrar usuarios
	*/
	public function mostrarUsuarios()
	{
		$data['mostrarUsuario'] = $this->usuario->getAll();
		$this->vista->mostrar("usuario/mostrarUsuario", $data);
	}

	/**
	* Mostrar menu principal
	*/
	public function mostrarInicio()
	{
		if (isset($_SESSION["idUsuario"])) {
			$this->vista->mostrar("inicio");
		}else{
			$data['msjError'] = "No tienes permisos para hacer eso";
			$this->vista->mostrar("usuario/formularioLogin", $data);
		}
	}

	/**
	 * Buscar incidencia
	 */
	public function buscarIncidencias()
	{
		if (isset($_SESSION["idUsuario"])) {
	
			$textoBusqueda = $_REQUEST["textoBusqueda"];
			$seleccion = $_REQUEST["seleccion"];

			$data['listaIncidencias'] = $this->incidencia->busquedaAproximada($textoBusqueda, $seleccion);
			$data['msjInfo'] = "<p style=color:lightgreen>Resultados de la búsqueda: \"$textoBusqueda\" de la columna :  \"$seleccion\"</p>";
			$this->vista->mostrar("incidencia/mostrarIncidencias", $data);
		}else{
			$data['msjError'] = "No tienes permisos para hacer eso";
			$this->vista->mostrar("usuario/formularioLogin", $data);
		}
	}

	/**
	 * Buscar usuario
	 */
	public function buscarUsuarios()
	{
		if (isset($_SESSION["idUsuario"])) {

			$textoBusqueda = $_REQUEST["textoBusqueda"];
			$seleccion = $_REQUEST["seleccion"];

			$data['mostrarUsuario'] = $this->usuario->busquedaAproximada($textoBusqueda, $seleccion);
			$data['msjInfo'] = "<p style=color:lightgreen>Resultados de la búsqueda: \"$textoBusqueda\" de la columna :  \"$seleccion\"</p>";
			$this->vista->mostrar("usuario/mostrarUsuario", $data);
		}else{
			$data['msjError'] = "No tienes permisos para hacer eso";
			$this->vista->mostrar("usuario/formularioLogin", $data);
		}
	}

	/**
	 * Modificar incidencia
	 */
	public function modificarIncidencias()
	{
		if (isset($_SESSION["idUsuario"])) {

			$id_incidencia = $_REQUEST["id_incidencia"];
			$data['incidencia'] = $this->incidencia->get($id_incidencia);
			$this->vista->mostrar('incidencia/modificarIncidencias', $data);
		} else {
			$data['msjError'] = "No tienes permisos para hacer eso";
			$this->vista->mostrar("usuario/formularioLogin", $data);
		}
	}

	/**
	 * Enviar incidencia modificada
	 */
	public function modificarIncidenciasEnviar()
	{
		if (isset($_SESSION["idUsuario"])) {

			$id_incidencia = $_REQUEST["id_incidencia"];
			$descripcion = $_REQUEST["descripcion"];
			$equipo_afectado = $_REQUEST["equipo_afectado"];
			$fecha = $_REQUEST["fecha"];
			$estado = $_REQUEST["estado"];
			$observacion = $_REQUEST["observacion"];
			$prioridad = $_REQUEST["prioridad"];
			$id_usuario = $_REQUEST["id_usuario"];


			$result = $this->incidencia->update($id_incidencia, $descripcion, $equipo_afectado, $fecha, $estado, $observacion, $prioridad, $id_usuario);

			if ($result == 1) {
			
				 $data['msjInfo'] = "Incidencia actualizada con éxito";
			} else {
		
				$data['msjError'] = "Ha ocurrido un error al modificar la incidencia. Por favor, inténtelo más tarde.";
			}
			$data['listaIncidencias'] = $this->incidencia->getAll();
			$this->vista->mostrar("incidencia/mostrarIncidencias", $data);
		} else {
			$data['msjError'] = "No tienes permisos para hacer eso";
			$this->vista->mostrar("usuario/formularioLogin", $data);
		}
	}

	/**
	 * Borrar incidencia
	 */
	public function borrarIncidencia()
	{
		if (isset($_SESSION["idUsuario"])) {

			$id_incidencia = $_REQUEST["id_incidencia"];

			$result = $this->incidencia->delete($id_incidencia);
			if ($result == 0) {
				$data['msjError'] = "Ha ocurrido un error al borrar la incidencia. Por favor, inténtelo de nuevo";
			} else {
				$data['msjInfo'] = "Incidencia borrada con éxito";
			}

			$data['listaIncidencias'] = $this->incidencia->getAll();
			$this->vista->mostrar("incidencia/mostrarIncidencias", $data);
		} else {
			$data['msjError'] = "No tienes permisos para hacer eso";
			$this->vista->mostrar("usuario/formularioLogin", $data);
		}
	}

	/**
	 * Insertar incidencia
	 */
	public function insertarIncidencias()
	{
		if (isset($_SESSION["idUsuario"])) {

			$descripcion = $_REQUEST["descripcion"];
			$equipo_afectado = $_REQUEST["equipo_afectado"];
			$fecha = $_REQUEST["fecha"];
			$estado = $_REQUEST["estado"];
			$observacion = $_REQUEST["observacion"];
			$prioridad = $_REQUEST["prioridad"];
			$id_usuario = $_REQUEST["id_usuario"];

			$result = $this->incidencia->insert($descripcion, $equipo_afectado, $fecha, $estado, $observacion, $prioridad, $id_usuario);

			if ($result == 1) {

				$data['msjInfo'] = "Incidencia insertada con éxito";
			} else {

				$data['msjError'] = "Ha ocurrido un error al insertar la incidencia. Por favor, inténtelo más tarde.";
			}
			$data['listaIncidencias'] = $this->incidencia->getAll();
			$this->vista->mostrar("incidencia/mostrarIncidencias", $data);
		} else {
			$data['msjError'] = "No tienes permisos para hacer eso";
			$this->vista->mostrar("usuario/formularioLogin", $data);
		}
	}

	/**
	 * Formulario insertar incidencia
	 */
	public function insertarIncidenciasVista()
	{
		if (isset($_SESSION["idUsuario"])) {

			$this->vista->mostrar('incidencia/insertarIncidencias');
		} else {
			$data['msjError'] = "No tienes permisos para hacer eso";
			$this->vista->mostrar("usuario/formularioLogin", $data);
		}
	}

}
