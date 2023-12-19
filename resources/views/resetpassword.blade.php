<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .forget-password-form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }

        .forget-password-form h2 {
            color: #333;
        }

        .forget-password-form label {
            display: block;
            margin: 10px 0 5px;
            color: #555;
        }

        .forget-password-form input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }
        .sendbtns{
            display: flex;
            padding: 10px;
        }

        .forget-password-form button {
            background-color: #4caf50;
            color: #fff;
            padding: 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100px;
        }
        #whatsup #e-mail {
            padding-right: 10px;
        }
        .forget-password-form button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="forget-password-form">
        <h2>Forget Password</h2>
        <form action="{{ route('forgot-password_send-link') }}" method="post">
            @csrf
    <label for="email">Email:</label>
    <input type="email" name="email" required>

    <label for="channel">Communication Channel:</label>
    <select name="channel" required>
        <option value="email">Email</option>
        <option value="sms">SMS</option>
        <option value="whatsapp">WhatsApp</option>
    </select>

    <button type="submit">Send Reset Link</button>
            
        </form>
    </div>
</body>
</html>
