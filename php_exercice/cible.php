<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "phpex";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   
    if (isset($_GET['delete'])) {
    
        $stmt = $conn->prepare("DELETE FROM form WHERE id = :id");
        $stmt->bindParam(':id', $_GET['delete']);
        $stmt->execute();

        header("Location: index.php?message=User+deleted+successfully");
        exit();
    }

 
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $fullname = $_POST['name'];
        $email = $_POST['email'];
        $age = !empty($_POST['age']) ? $_POST['age'] : null;
        $gender = isset($_POST['gender']) ? $_POST['gender'] : null;
        $password = $_POST['password'];

        if (isset($_POST['id'])) {
           
            $id = $_POST['id'];

           
            $stmt = $conn->prepare("SELECT * FROM form WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $currentUser = $stmt->fetch(PDO::FETCH_ASSOC);

            $sql = "UPDATE form SET 
                        fullname = :fullname,
                        email = :email,
                        age = :age,
                        gender = :gender,
                        password = :password
                    WHERE id = :id";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':fullname', $fullname);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':age', $age);
            $stmt->bindParam(':gender', $gender);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':password', $password);

            $stmt->execute();

            header("Location: index.php?message=User+updated+successfully");
        } else {


            $stmt = $conn->prepare("INSERT INTO form (fullname, email, password, age, gender) 
                                   VALUES (:fullname, :email, :password, :age, :gender)");
            $stmt->bindParam(':fullname', $fullname);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':age', $age);
            $stmt->bindParam(':gender', $gender);

            $stmt->execute();

            header("Location: index.php?message=User+registered+successfully");
        }
        exit();
    }

    header("Location: index.php");
    exit();
} catch (PDOException $e) {
    header("Location: index.php?error=" . urlencode("Database error: " . $e->getMessage()));
    exit();
}
?>
