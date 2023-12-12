<?php
class Tarefa {
    private $conn;


    function __construct($conn) {
        $this->conn = $conn;
    }

    public function read()
    {
        $query = "SELECT * FROM  tbtarefa";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        
        return $stmt;
    }

    public function readEdits($id)
    {
        $query = "SELECT id FROM tbtarefa WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt;
    }

    public function update($id, $tarefa, $data )
    {
        $query = "UPDATE tbtarefa SET tarefa = ?, data = ? WHERE id = ?";
      
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$tarefa, $data, $id]);
        return $stmt;
    }

    public function delete($id) {
        $query = "DELETE FROM tbtarefa WHERE id = ?"; 
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
        return $stmt;
    }

}