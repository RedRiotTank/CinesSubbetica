<?php

class Database {
    const SERVERNAME = "localhost";
    const USERNAME = "pwalbertoplaza";
    const PASSWORD = "22albertoplaza23";
    const DBNAME = "dbalbertoplaza_pw2223";
    private $conn;

    public function connect() {
        try {
            $this->conn = new PDO("mysql:host=" . self::SERVERNAME . ";dbname=" . self::DBNAME, self::USERNAME, self::PASSWORD);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
        }
    }

    public function insertUserData($nombre, $apellidos, $genero, $bdate, $fav_genres, $mail, $pass) {
        try {
            $randomPFP = rand(1, 7);    //imagen aleatoria
            $pass_hash = password_hash($pass, PASSWORD_DEFAULT); // Encriptar la contraseña
            $stmt = $this->conn->prepare("INSERT INTO usuarios (nombre, apellidos, genero, fecha_nacimiento, fav_genres, correo, pass, pfp, administrator) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([$nombre, $apellidos, $genero, $bdate, $fav_genres, $mail, $pass_hash, $randomPFP, 0]); // Utilizar la contraseña encriptada
            return true;
        } catch (PDOException $e) {
            echo "Error al insertar datos: " . $e->getMessage();
            return false;
        }
    }

    public function insertMovieData($nombre, $anio, $director, $interpretes, $tematicas, $valoracion, $sinopsis, $esEstreno, $trailer) {
        try {
            $stmt = $this->conn->prepare("INSERT INTO pelis (nombre, anio, director, interpretes, tematicas, valoracion, sinopsis, estreno, enlaces) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([$nombre, $anio, $director, $interpretes, $tematicas, $valoracion, $sinopsis, $esEstreno, $trailer]);
            return true;
        } catch (PDOException $e) {
            echo "Error al insertar datos: " . $e->getMessage();
            return false;
        }
    }

    public function getPFPNumber($email) {
        try {
            $stmt = $this->conn->prepare("SELECT pfp FROM usuarios WHERE correo = ?");
            $stmt->execute([$email]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row['pfp'];
        } catch (PDOException $e) {
            echo "Error al obtener el número PFP: " . $e->getMessage();
            return null;
        }
    }

    public function getAdmin($email) {
        try {
            $stmt = $this->conn->prepare("SELECT administrator FROM usuarios WHERE correo = ?");
            $stmt->execute([$email]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row['administrator'];
        } catch (PDOException $e) {
            echo "Error al obtener si el usuario es administrador: " . $e->getMessage();
            return null;
        }
    }

    public function getMoviesdisplay($estreno, $limit = null) {
        try {
            if ($limit != null)
                $stmt = $this->conn->prepare("SELECT id, nombre FROM pelis WHERE estreno = $estreno LIMIT $limit");
            else
                $stmt = $this->conn->prepare("SELECT id, nombre FROM pelis WHERE estreno = $estreno");

            $stmt->execute();
            $movies = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $movies;
        } catch (PDOException $e) {
            echo "Error al consultar las películas: " . $e->getMessage();
            return null;
        }
    }

    public function getMovieInfo($id) {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM pelis WHERE id = $id");
            $stmt->execute();
            $info = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $info;
        } catch (PDOException $e) {
            echo "Error al consultar la info de la peli: " . $e->getMessage();
            return null;
        }
    }

    public function checklogin($email, $password) {
        // Consultar la base de datos para verificar la autenticación
        $sql = "SELECT pass FROM usuarios WHERE correo = '$email'";
        $result = $this->conn->query($sql);

        if ($result->rowCount() == 1) {
            $row = $result->fetch(PDO::FETCH_ASSOC);
            $hashedPassword = $row['pass']; // Suponiendo que el campo de contraseña en la base de datos se llama 'pass'

            // Verificar la contraseña ingresada con la contraseña almacenada (cifrada)
            if (password_verify($password, $hashedPassword)) {
                // Autenticación exitosa

                $result = true;
                echo "¡Inicio de sesión exitoso! Bienvenido, " . $_SESSION['username'];
            } else {
                // Contraseña incorrecta
                echo "Contraseña incorrecta";
                $result = false;
            }
        } else {
            // Usuario no encontrado en la base de datos
            echo "Usuario no encontrado";
            $result = false;
        }

        // Cerrar la conexión a la base de datos
        $this->conn = null;
        return $result;
    }
}
?>
