<?php

class Workday {
  public $id;
  public $date;
  public $revenue;
  public $costs;

  function __construct($id, $date, $revenue, $costs) {
    $this->id = $id;
    $this->date = $date;
    $this->revenue = $revenue;
    $this->costs = $costs;
  }
  function get_id() {
    return $this->id;
  }
  function get_date() {
    return $this->date;
  }
  function get_revenue() {
    return $this->revenue;
  }
  function get_costs() {
    return $this->costs;
  }

  function get_day_profit() {
    return ($this->revenue - $this->costs);
  }

}

?> 