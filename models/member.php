<?php

class Member {
  public $id;
  public $name;
  public $surname;

  function __construct($id, $name, $surname) {
    $this->id = $id;
    $this->name = $name;
    $this->surname = $surname;
  }
  function get_id() {
    return $this->id;
  }
  function get_name() {
    return $this->name;
  }
  function get_surname() {
    return $this->surname;
  }
}

?> 