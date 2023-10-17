<!-- user.details.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <style>
    .card {
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 20px;
        width: 300px;
        margin: 20px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    }

    .card h2 {
        margin-bottom: 10px;
    }

    .card p {
        margin: 5px 0;
    }
    </style>
</head>

<body>
    <div class="card">
        <h2>User Details</h2>
        <p><strong>Name:</strong>
            <?php echo $user->getName(); ?>
        </p>
        <p><strong>Email:</strong>
            <?php echo $user->getEmail(); ?>
        </p>
        <p><strong>Password:</strong>
            <?php echo $user->getPassword(); ?>
        </p>
    </div>
    <button onclick="javascript:history.back()">Volver</button>
</body>

</html>