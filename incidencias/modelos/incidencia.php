<?php

/**
 * Clase libro. Es el modelo de libro
 */
class Incidencia
{
    private $db;
	/**
	 * Constructor. Crea la conexión con la base de datos
     * y la guarda en una variable de la clase
	 */
    public function __construct()
    {
        $this->db = new mysqli("localhost:3306", "root", "", "practica_incidencias");
    }

	/**
	 * Busca una Incidencia mediante el id_incidencia
     * @param id El id de la incidencia que se quiere buscar.
     * @return result Un objeto con la incidencia de la BD, o null si no lo encuentra.
	 */
    public function get($id)
    {
        if ($result = $this->db->query("SELECT * FROM incidencias
                                            WHERE id_incidencia = '$id'")) {
            $result = $result->fetch_object();
        } else {
            $result = null;
        }
        return $result;
    }

    /**
     * Busca todas las incidencias de la BD
     * @return arrayResult Todas las incidencias como objetos de un array o null en caso de error
     */
    public function getAll()
    {
        $arrayResult = array();
        if ($result = $this->db->query("SELECT * FROM incidencias
                                            ORDER BY id_incidencia")) {
            while ($fila = $result->fetch_object()) {
                $arrayResult[] = $fila;
            }
        } else {
            $arrayResult = null;
        }
        return $arrayResult;
    }

    /**
     * Inserta una incidencia en la BD
     * @param descripcion La descripcion de la incidencia
     * @param equipo_afectado El equipo afectado
     * @param fecha La fecha en la que publica la incidencia
     * @param estado El estado en la que esta la incidencia 
     * @param observacion Observaciones sobre la incidencia
     * @param prioridad La prioridad que tiene la incidencia
     * @param id_usuario El usuario que publica la incidencia
     * @return 1 si la inserción tiene éxito, 0 en otro caso
     */
    public function insert($descripcion, $equipo_afectado, $fecha, $estado, $observacion, $prioridad, $id_usuario)
    {
        $this->db->query("INSERT INTO incidencias (descripcion, equipo_afectado, fecha, estado, observacion, prioridad, id_usuario) 
                        VALUES ('$descripcion','$equipo_afectado', '$fecha', '$estado', '$observacion', '$prioridad', '$id_usuario')");
        return $this->db->affected_rows;
    }

    /**
     * Modifica una incidencia en la BD
     * @param id_incidencia La Id de la incidencia a actualizar
     * @param descripcion La descripcion de la incidencia
     * @param equipo_afectado El equipo afectado
     * @param fecha La fecha en la que publica la incidencia
     * @param estado El estado en la que esta la incidencia 
     * @param observacion Observaciones sobre la incidencia
     * @param prioridad La prioridad que tiene la incidencia
     * @param id_usuario El usuario que publica la incidencia
     * @return 1 si la modificacion tiene éxito, 0 en otro caso
     */
    public function update($id_incidencia, $descripcion, $equipo_afectado, $fecha, $estado, $observacion, $prioridad, $id_usuario)
    {

        if($estado == 'cerrada'){
            $prioridad = $estado;
        }

        $this->db->query("UPDATE incidencias SET
								id_incidencia = '$id_incidencia',
								descripcion = '$descripcion',
								equipo_afectado = '$equipo_afectado',
								fecha = '$fecha',
								estado = '$estado',
                                observacion = '$observacion',
                                prioridad = '$prioridad',
                                id_usuario = '$id_usuario'
                                WHERE id_incidencia = '$id_incidencia'");
        return $this->db->affected_rows;
    }


    /** 
     * Elimina una incidencia de la BD
     * @param id El id de la incidencia que se va a actualizar
     * @return 1 si el borrado tiene éxito, 0 en caso contrario
     */
    public function delete($id)
    {
        $this->db->query("DELETE FROM incidencias WHERE id_incidencia = '$id'");
        return $this->db->affected_rows;
    }

    /** 
     * Realiza una búsqueda aproximada de incidencias
     * @param textoBusqueda El texto de búsqueda
     * @param seleccion La selección de búsqueda
     * @return arrayResult Un array de objetos con los datos de las incidencias encontradas
     */
    public function busquedaAproximada($textoBusqueda, $seleccion)
    {
        $seleccionBusqueda = $seleccion;
        $arrayResult = array();
        // Buscamos las incidencias de la BD que coincidan con el texto de búsqueda
        if($seleccion == null || $seleccion = ""){
            if ($result = $this->db->query("SELECT * FROM incidencias
                WHERE id_incidencia LIKE '%$textoBusqueda%'
                OR descripcion LIKE '%$textoBusqueda%'
                OR equipo_afectado LIKE '%$textoBusqueda%'
                OR fecha LIKE '%$textoBusqueda%'
                OR estado LIKE '%$textoBusqueda%'
                OR observacion LIKE '%$textoBusqueda%'
                OR prioridad LIKE '%$textoBusqueda%'
                ORDER BY id_incidencia")) {
                    while ($fila = $result->fetch_object()) {
                        $arrayResult[] = $fila;
                    }
            } else {
                $arrayResult = null;
            }
        }else{
            if ($result = $this->db->query("SELECT * FROM incidencias
                WHERE $seleccionBusqueda LIKE '%$textoBusqueda%'")) {
                    while ($fila = $result->fetch_object()) {
                        $arrayResult[] = $fila;
                    }
            } else {
                $arrayResult = null;
            }

        }
        return $arrayResult;

    }
}