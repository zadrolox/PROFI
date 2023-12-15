<?php
class User
{
    private $conn;

    function __construct($conn)
    {
        $this->conn = $conn;
    }


    public function register($username, $password, $confirm_password, $sexo)
    {
        // Verifique se as senhas coincidem
        if ($password !== $confirm_password) {
            echo "As senhas não coincidem. Tente novamente.";
            return;
        }
        try {
            // Hash da senha (substitua esta linha pela sua lógica de hash)
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);


            // Insira no banco de dados
            $stmt = $this->conn->prepare("INSERT INTO tbuser (username, password, sexo) VALUES (:username, :password, :sexo)");
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $hashed_password);
            $stmt->bindParam(':sexo', $sexo);
            $stmt->execute();


            echo "Registro bem-sucedido!";
        } catch (PDOException $e) {
            echo "Erro no registro: " . $e->getMessage();
        }
    }

    public function registerAdm($username, $password, $confirm_password, $sexo, $adm)
    {
        // Verifique se as senhas coincidem
        if ($password !== $confirm_password) {
            echo "As senhas não coincidem. Tente novamente.";
            return;
        }
        try {
            // Hash da senha (substitua esta linha pela sua lógica de hash)
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);


            // Insira no banco de dados
            $stmt = $this->conn->prepare("INSERT INTO tbuser (username, password, sexo, adm) VALUES (:username, :password, :sexo, :adm)");
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $hashed_password);
            $stmt->bindParam(':sexo', $sexo);
            $stmt->bindParam(':adm', $adm);
            $stmt->execute();


            echo "Registro bem-sucedido!";
        } catch (PDOException $e) {
            echo "Erro no registro: " . $e->getMessage();
        }
    }

    public function login($username, $password)
    {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM tbuser WHERE username = :username");
            $stmt->bindParam(':username', $username);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);


            if ($user && password_verify($password, $user['password'])) {
                // Login bem-sucedido
                session_start();
                $_SESSION['username'] = $user['username'];
                $_SESSION['id'] = $user['id'];
                $_SESSION['adm'] = $user['adm'];
                return true;
            } else {
                // Credenciais inválidas
                return false;
            }
        } catch (PDOException $e) {
            echo "Erro no login: " . $e->getMessage();
        }
    }

    public function delete($id)
    {
        $query = "DELETE FROM tbuser WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
        return $stmt;
    }

    public function update($id, $username, $sexo)
    {
        $query = "UPDATE tbuser SET username = ?, sexo = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$username, $sexo, $id]);
        return $stmt;
    }

    public function read()
    {
        $query = "SELECT * FROM  tbuser";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    public function readEdits($id)
    {
        $query = "SELECT id FROM tbuser WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt;
    }
}
?>