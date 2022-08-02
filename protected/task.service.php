<?php

    class TaskService
    {

        private $conn;
        private $task;

        public function __construct( Connection $conn, Task $task )
        {
            $this->conn = $conn->connecte();
            $this->task = $task;
        }

        public function insert()
        {
            $query = 'INSERT INTO tb_task(task) VALUES(:task)';
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(':task', $this->task->__get('task'));
            $stmt->execute();
        }

        public function select()
        {
            $query = 'SELECT t.id, s.status, t.task FROM tb_task as t LEFT JOIN tb_status as s on (t.id_status = s.id)';
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function update()
        {
            $query = 'UPDATE tb_task SET task = ? WHERE id = ?';
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(1, $this->task->__get('value_task'));
            $stmt->bindValue(2, $this->task->__get('id'));
            return $stmt->execute();
        }

        public function delete()
        {
            $query = 'DELETE FROM tb_task WHERE id = :id';
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(':id', $this->task->__get('id'));
            $stmt->execute();
        }

        public function check_task()
        {
            $query = 'UPDATE tb_task SET id_status = ? WHERE id = ?';
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(1, $this->task->__get('id_status'));
            $stmt->bindValue(2, $this->task->__get('id'));
            return $stmt->execute();
        }

        public function pend()
        {
            $query = 'SELECT t.id, s.status, t.task FROM tb_task as t LEFT JOIN tb_status as s on (t.id_status = s.id) WHERE id_status = :id_status';
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(':id_status', $this->task->__get('id_status'));
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }
    }

?>