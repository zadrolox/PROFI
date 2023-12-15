<?php
class Tarefa {
    private $conn;

    function __construct($conn) {
        $this->conn = $conn;
    }

    public function readEdits($id)
    {
        $query = "SELECT id FROM tbtarefa WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt;
    }

    public function readEd()
    {
        $query = "SELECT * FROM tbuser INNER JOIN tbtarefa ON tbtarefa.fk_idusu = tbuser.id;";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function readEdes($id)
    {
        $query = "SELECT * FROM tbtarefa WHERE fk_idusu = :fk_idusu";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":fk_idusu", $id);
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

    public function create($tarefa, $data, $fk_idusu)
    {
        $query = "INSERT INTO  tbtarefa (tarefa,  data , fk_idusu) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$tarefa, $data, $fk_idusu]);
        return $stmt;
    }

}