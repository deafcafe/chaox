<?php

class QueryBuilder {

	protected $pdo;
	protected $query;
	protected $values = [];

	public function __construct(PDO $pdo) {

		$this->pdo = $pdo;

	}

	public function select($table) {

		$this->query = "select %s from {$table}";
		return $this;

	}

	public function values(...$values) {

		$this->query = sprintf($this->query, implode(', ', $values));
		return $this;

	}

	public function where($selector, $op, $value) {

		$this->values[] = $value;
		$this->query .= " where {$selector} {$op} ?";
		return $this;

	}

	public function orWhere($selector, $op, $value) {

		$this->values[] = $value;
		$this->query .= " OR {$selector} {$op} ?";
		return $this;

	}

	public function andWhere($selector, $op, $value) {

		$this->values[] = $value;
		$this->query .= " AND {$selector} {$op} ?";
		return $this;

	}

	public function get() {
		try {
			$statement = $this->pdo->prepare($this->query);
			$statement->execute($this->values);
			$this->values = array();
			return $statement->fetch(PDO::FETCH_ASSOC);
		}
		catch(PDOException $e) {
			die($e->getMessage());
		}

	}

	public function getAll() {
		try {
			$statement = $this->pdo->prepare($this->query);
			$statement->execute($this->values);
			$this->values = array();
			return $statement->fetchAll(PDO::FETCH_ASSOC);
		}
		catch(PDOException $e) {
			die($e->getMessage());
		}
	}

	public function selectAll($table) {

		$this->query = "select * from {$table}";
		return $this;

	}

	public function join($table, $on, $lside, $op, $rside) {
		$this->query .= " JOIN {$table} {$on} {$lside} {$op} {$rside}";
		return $this;
	}

	public function orderBy($field) {
		$this->query .= " ORDER BY {$field}";
		return $this;
	}


	public function insert($table, $parameters) {

		$query = sprintf('insert into %s (%s) values (%s)', $table, implode(', ', array_keys($parameters)), ':' . implode(', :', array_keys($parameters))
		);
		try {
			$statement = $this->pdo->prepare($query);
			$statement->execute($parameters);
			return true;
		}
		catch(PDOException $e) {
			die('Something Went Wrong!');
		}

	}


	function update($table) {
		$this->query = "update {$table}";
		return $this;
	}

	function set(...$values) {
		$value = implode('', $values);
		$this->query .= " set {$value}";
		return $this;
	}

	function run() {
		try {
			$statement = $this->pdo->prepare($this->query);
			$statement->execute($this->values);
			$this->values = array();
			return true;
		}
		catch(PDOException $e) {
			die($e->getMessage());
		}

	}

	function count($sym, $table) {
		$this->query = "select count({$sym}) from {$table}";
		return $this;
	}

}