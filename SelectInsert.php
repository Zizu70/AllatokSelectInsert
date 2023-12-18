<?php 
class SelectInsert 
{
    private $connection;

    public function __construct() {
        $this->connection = new mysqli("localhost", "root", "", "php_elso_dolgozat");
    }

    function select() { 
        $sql = "SELECT * FROM allatok";
        $result = $this->connection->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    function insert() {
        $sql = "INSERT INTO allatok (name, kind_of, gender, born, age, meat_eating)
            VALUES (?,?,?,?,?,?) ";
        $stmt = $this->connection->prepare($sql);

        $username = $userdata['name'];
        $email = $userdata['kind_of'];
        $password = $userdata['gender'];
        $fullname = $userdata['born'];
        $birthdate = $userdata['age'];
        $address = $userdata['meat_eating'];

        // "ssssss" ahány oszlop annyi s, ha string!
        $stmt->bind_param("ssssis", $name, $kind_of, $gender, $born, $age, $meat_eating);       
        $stmt->execute();
    }   

    function checkNameExist($name) {
        $sql = "SELECT * FROM allatok WHERE name = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("s", $name);

        $stmt->execute();
        return $stmt->num_rows == 1; // ha van (azaz 1) akkor létezik!
    }
}

?>