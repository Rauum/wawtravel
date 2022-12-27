<?php

namespace Plugo\Manager;

require dirname(__DIR__, 2) . '/config/database.php';

class AbstractManager {

  private function connect(): \PDO {
    $db = new \PDO(
      'mysql:host=' . DB_INFOS['host'] . ';port=' . DB_INFOS['port'] . ';dbname=' . DB_INFOS['dbname'],
      DB_INFOS['username'],
      DB_INFOS['password']
    );
    $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    $db->exec("SET NAMES utf8");
    return $db;
  }

  private function executeQuery(string $query, array $params = []): \PDOStatement {
    $db = $this->connect();
    $stmt = $db->prepare($query);
    foreach($params as $key => $val) $stmt->bindValue($key, $val);
    $stmt->execute();
    return $stmt;
  }

  private function classToTable(string $class): string {
    $tmp = explode('\\', $class);
    return strtolower(end($tmp));
  }

    protected function readOne(string $class, int $id=null, array $criteria = []){
        $query = "SELECT * FROM " . $this->classToTable($class);
        if($id){
            $query .= " WHERE id= $id";
        }
        if($criteria){
            $query .= " WHERE ";
            $count = 0;
            foreach ($criteria as $key => $value) {
                $count = $count+1;
                $query .= "$key = '$value'";
                if ($count != count($criteria)){
                    $query .= " AND ";
                }
            }
        }
        if ($stmt = $this->executeQuery($query)) {
            $stmt->setFetchMode(\PDO::FETCH_CLASS, $class);
            return $stmt->fetch();
        }
    }

    protected function readMany(string $class, array $criteria = [], array $order = []) {
        $query = "SELECT * FROM " . $this->classToTable($class);
        if($criteria){
            $query .= " WHERE ";
            $count = 0;
            foreach ($criteria as $key => $value) {
                $count = $count+1;
                $query .= "$key = $value";
                if ($count != count($criteria)){
                    $query .= " AND ";
                }
            }
        }
        if($order){
            $query .= " ORDER BY ";
            $count = 0;
            foreach ($order as $key => $value) {
                $count = $count+1;
                $query .= "$key $value";
                if ($count != count($order)){
                    $query .= " AND ";
                }
            }
        }
        if ($stmt = $this->executeQuery($query)) {
            $stmt->setFetchMode(\PDO::FETCH_CLASS, $class);
            return $stmt->fetchAll();
        }
    }

  protected function create(string $class, array $fields): \PDOStatement {
    $query = "INSERT INTO " . $this->classToTable($class) . " (";
    foreach (array_keys($fields) as $field) {
      $query .= $field;
      if ($field != array_key_last($fields)) $query .= ', ';
    }
    $query .= ') VALUES (';
    foreach (array_keys($fields) as $field) {
      $query .= ':' . $field;
      if ($field != array_key_last($fields)) $query .= ', ';
    }
    $query .= ')';
    return $this->executeQuery($query, $fields);
  }

  protected function update(string $class, array $fields, int $id): \PDOStatement {
    $query = "UPDATE " . $this->classToTable($class) . " SET ";
    foreach (array_keys($fields) as $field) {
      $query .= $field . " = :" . $field;
      if ($field != array_key_last($fields)) $query .= ', ';
    }
    $query .= ' WHERE id = :id';
    $fields['id'] = $id;
    return $this->executeQuery($query, $fields);
  }

  protected function delete(string $class, int $id): \PDOStatement {
    $query = "DELETE FROM " . $this->classToTable($class) . " WHERE id = :id";
    return $this->executeQuery($query, ['id' => $id]);
  }

}