<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\FileHandler;
use App\ContactManager;


$fileHandler = new FileHandler(__DIR__ . '/contacts.json');
$ContactManager = new ContactManager($fileHandler);
$contacts = $contactManager->getAllContacts();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <h2 class="mt-4">Liste des Contacts</h2>
        <a href="add.php" class="btn btn-primary mb-3">Ajouter un Contact</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($contacts as $contact) : ?>
                    <tr>
                        <td><?= $contact['id'] ?></td>
                        <td><?= $contact['name'] ?></td>
                        <td><?= $contact['email'] ?></td>
                        <td><?= $contact['phone'] ?></td>
                        <td>
                            <a href="edit.php?id=<?= $contact['id'] ?>" class="btn btn-warning">Modifier</a>
                            <a href="delete.php?id=<?= $contact['id'] ?>" class="btn btn-danger">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>