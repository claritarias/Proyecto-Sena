<?php

class Modelo {

  protected $mysqli;
  public $fields = [];

  public function __construct($fields) {
    // Create DB connection
    $this->fields = $fields;


    $this->mysqli = new mysqli("dockerlamp_db_1", "root", "root", "evaluacion_de_instructores");
    //$this->mysqli = new mysqli("localhost", "root", "", "evaluacion_de_instructores");

    /* check connection */
    if ($this->mysqli->connect_errno) {
      printf("Connect failed: %s\n", $this->mysqli->connect_error);
      //exit();
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
      return $results;
    }

    return false;
  }

  public function update($id) {
    // UPDATE
  }

  public function delete($id) {
    $query = "DELETE FROM `persona` WHERE `idpersona`=$id";

    if ($results = $this->mysqli->query($query)) {
      return $results;
    }

    return false;
  }

  public function obtenerTodos() {
    $query = "SELECT * FROM `persona`";

    if ($results = $this->mysqli->query($query)) {
      return $results;
    }

    return false;
  }
}