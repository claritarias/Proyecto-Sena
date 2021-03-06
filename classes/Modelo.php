<?php

class Modelo {

  protected $mysqli;

  public function __construct($fields) {
    // Crear la conexion a la BD
    $this->mysqli = new mysqli("localhost", "root", "", "evaluacion_de_instructores");

    // Verifica la conexion
    if ($this->mysqli->connect_errno) {
      $mensaje = "Connect failed: " . $this->mysqli->connect_error;
    }
  }

  public function create($data) {
    $array_fields = array();
    foreach($data as $field => $value) {
      $data[$field] = "'" . $value . "'";
      $array_fields[] = "`" . $field . "`";
    }
    $fields = implode(",",$array_fields);
    $values = implode(",", $data);

    $query = "INSERT INTO `persona` ($fields) VALUES ($values)";

    if ($this->mysqli->query($query) === TRUE) {
      return "Usuario creado";
    }
  }

  public function read($id) {
    $query = "SELECT * FROM `persona` WHERE `idpersona`=$id";

    if ($results = $this->mysqli->query($query)) {
      return $results->fetch_assoc();
    }

    return false;
  }

  public function update($data) {
    $id = $data['idpersona'];
    unset($data['idpersona']);
    $array_values = array();

    foreach($data as $field => $value) {
      array_push($array_values, "`" . $field . "`='" . $value . "'");
    }
    $values = implode(",", $array_values);

    $query = "UPDATE `persona` SET $values WHERE `idpersona`=$id";

    if ($this->mysqli->query($query) === TRUE) {
      $usuario = $this->read($id);
      return "Usuario " . $usuario['nombre'] . " actualizado";
    }

    return false;
  }

  public function delete($id) {
    $usuario = $this->read($id);

    $query = "DELETE FROM `persona` WHERE `idpersona`=$id";

    if ($results = $this->mysqli->query($query)) {
      return "Usuario " . $usuario['nombre'] . " ha sido eliminado de manera exitosa!";
    }

    return false;
  }

  public function obtenerTodos() {
    $query = "SELECT `idpersona`, `nombre`, `correoElectronico` FROM `persona`";

    if ($results = $this->mysqli->query($query)) {
      return $results;
    }

    return false;
  }
}