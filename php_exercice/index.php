<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        
        .registration-form {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
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
    </style>
</head>
<body>
    <div class="registration-form">
        <h2>Create Your Account</h2>
        <form action="cible.php" method="post">
            <div class="form-group">
                <label for="name" class="required-field">Full Name</label>
                <input type="text" name="name" id="name" required>
            </div>
            
            <div class="form-group">
                <label for="email" class="required-field">Email Address</label>
                <input type="email" name="email" id="email" required>
            </div>
            
            <div class="form-group">
                <label for="password" class="required-field">Password</label>
                <input type="password" name="password" id="password" required minlength="8">
            </div>
            
            <div class="form-group">
                <label for="age">Age</label>
                <input type="number" name="age" id="age" min="13" max="120">
            </div>
            
            <div class="form-group">
                <label>Gender</label>
                <div class="gender-options">
                    <div class="gender-option">
                        <input type="radio" name="gender" id="male" value="male">
                        <label for="male">Male</label>
                    </div>
                    <div class="gender-option">
                        <input type="radio" name="gender" id="female" value="female">
                        <label for="female">Female</label>
                    </div>
                   
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <label for="country">Country</label>
                <select name="country" id="country">
                    <option value="">Select Country</option>
                    <option value="ma" selected>Morroco</option>
                    <option value="us">United States</option>
                    <option value="ca">Canada</option>
                    <option value="uk">United Kingdom</option>
                    <option value="fr">France</option>
                    <option value="de">Germany</option>
                    <option value="other">Other</option>
                </select>
            </div>
            
            <button type="submit" class="submit-btn">Register</button>
        </form>
    </div>
</body>
</html>