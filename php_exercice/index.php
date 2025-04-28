<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "phpex";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
    $editUser = null;
    if (isset($_GET['edit'])) {
        $stmt = $conn->prepare("SELECT * FROM form WHERE id = :id");
        $stmt->bindParam(':id', $_GET['edit']);
        $stmt->execute();
        $editUser = $stmt->fetch(PDO::FETCH_ASSOC);
    }
} catch (PDOException $e) {
    die("Database error: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color:rgb(37, 37, 37);
            margin: 0;
            padding: 20px;
            min-height: 100vh;
        }
        
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            
        }
        
        .registration-form {
            background-color: rgb(174, 174, 174);
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
            margin-bottom: 30px;
        }
        
        h2 {
            color: #2c3e50;
            text-align: center;
            margin-bottom: 25px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #34495e;
        }
        
        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="number"],
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
            box-sizing: border-box;
        }
        
        input:focus,
        select:focus {
            outline: none;
            border-color: #3498db;
            box-shadow: 0 0 5px rgba(52, 152, 219, 0.5);
        }
        
        .submit-btn {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 12px 20px;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s;
        }
        
        .submit-btn:hover {
            background-color: #2980b9;
        }
        
        .required-field::after {
            content: " *";
            color: red;
        }
        
        .gender-options {
            display: flex;
            gap: 15px;
        }
        
        .gender-option {
            display: flex;
            align-items: center;
        }
        
        .gender-option input {
            margin-right: 5px;
        }
        
        /* Users table styles */
        .users-table {
            width: 100%;
            max-width: 1000px;
            background-color: rgb(174, 174, 174);
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow-x: auto;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        
        th {
            background-color:rgb(0, 0, 0);
            color: white;
        }
        
        tr:hover {
            background-color: #f5f5f5;
        }
        
        .action-btn {
            padding: 5px 10px;
            border-radius: 4px;
            text-decoration: none;
            color: white;
            margin-right: 5px;
        }
        
        .edit-btn {
            background-color: #2ecc71;
        }
        
        .delete-btn {
            background-color: #e74c3c;
        }
        
       
    </style>
</head>
<body>
    <div class="container">
        <div class="registration-form"  >
            <h2><?php echo isset($_GET['edit']) ? 'Edit User' : 'Create Your Account'; ?></h2>
            <form action="cible.php" method="post" enctype="multipart/form-data">
                <?php if (isset($_GET['edit'])): ?>
                    <input type="hidden" name="id" value="<?php echo $_GET['edit']; ?>">
                <?php endif; ?>
                
                <div class="form-group">
                    <label for="name" class="required-field">Full Name</label>
                    <input type="text" name="name" id="name" required 
                           value="<?php echo isset($editUser['fullname']) ? $editUser['fullname'] : ''; ?>">
                </div>
                
                <div class="form-group">
                    <label for="email" class="required-field">Email Address</label>
                    <input type="email" name="email" id="email" required
                           value="<?php echo isset($editUser['email']) ? $editUser['email'] : ''; ?>">
                </div>
                
                <div class="form-group">
                    <label for="password" class="required-field">Password</label>
                    <input type="password" name="password" id="password" 
                    value="<?php echo isset($editUser['password']) ? $editUser['password'] : ''; ?>">
                          
                </div>
                
                <div class="form-group">
                    <label for="age">Age</label>
                    <input type="number" name="age" id="age" min="13" max="120"
                           value="<?php echo isset($editUser['age']) ? $editUser['age'] : ''; ?>">
                </div>
                
                <div class="form-group">
                    <label>Gender</label>
                    <div class="gender-options">
                        <div class="gender-option">
                            <input type="radio" name="gender" id="male" value="male"
                                   <?php echo (isset($editUser['gender']) && $editUser['gender'] == 'male') ? 'checked' : ''; ?>>
                            <label for="male">Male</label>
                        </div>
                        <div class="gender-option">
                            <input type="radio" name="gender" id="female" value="female"
                                   <?php echo (isset($editUser['gender']) && $editUser['gender'] == 'female') ? 'checked' : ''; ?>>
                            <label for="female">Female</label>
                        </div>
                    </div>
                </div>
                   

                
                <button type="submit" class="submit-btn"><?php echo isset($_GET['edit']) ? 'Update User' : 'Register'; ?></button>
                
                <?php if (isset($_GET['edit'])): ?>
                    <a href="index.php" style="display: block; text-align: center; margin-top: 10px;">Cancel</a>
                <?php endif; ?>
            </form>
        </div>
        
        <div class="users-table">
            <h2>Registered Users</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Profile</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Country</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Database connection
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "phpex";
                    
                    try {
                        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        
                        
                        // Fetch all form
                        $stmt = $conn->query("SELECT * FROM form");
                        while ($user = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo "<tr>";
                            echo "<td>" . $user['id'] . "</td>";
                            echo "<td>";
                            if (!empty($user['profile'])) {
                                echo "<img src='uploads/" . htmlspecialchars($user['profile']) . "' class='profile-pic'>";
                            }
                            echo "</td>";
                            echo "<td>" . htmlspecialchars($user['fullname']) . "</td>";
                            echo "<td>" . htmlspecialchars($user['email']) . "</td>";
                            echo "<td>" . htmlspecialchars($user['age']) . "</td>";
                            echo "<td>" . ucfirst($user['gender']) . "</td>";
                            echo "<td>" . htmlspecialchars($user['country'] ?? '') . "</td>";
                            echo "<td>";
                            echo "<a href='index.php?edit=" . $user['id'] . "' class='action-btn edit-btn'>Edit</a>";
                            echo "<a href='cible.php?delete=" . $user['id'] . "' class='action-btn delete-btn' onclick='return confirm(\"Are you sure you want to delete this user?\")'>Delete</a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    }catch(PDOException $e) {
                        echo "<tr><td colspan='8'>Error fetching users: " . $e->getMessage() . "</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>