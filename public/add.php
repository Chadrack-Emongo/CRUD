<?php
require_once __DIR__ . '/vendor/autolaod.php';

use App\FileHandler;
use App\ContactManager;
use App\Contact;
use App\Form;
use App\Request;

$fileHandler = new FileHandler(__DIR__ . '/contacts.json');
$contactManager = new ContactManager($fileHandler);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = Request::post('name');
    $email = Request::post('email');
    $phone = Request::post('phone');

    $id = uniqid();
    $contact = new Contact($id, $name, $email, $phone);
    $contactManager->addContact($contact);
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>CRUD</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h2 class="mt-4">Ajouter un Contact</h2>
    <form method="post">
        <div class="form-group">
            <label>Nom:</label>
            <?= Form::input('text', 'name', '', 'form-control') ?>
        </div>
        <div class="form-group">
            <label>Email:</label>
            <?= Form::input('email', 'email', '', 'form-control') ?>
        </div>
        <div class="form-group">
            <label>Téléphone:</label>
            <?= Form::input('text', 'phone', '', 'form-control') ?>
        </div>
        <?= Form::submit('Ajouter', 'btn btn-primary') ?>
    </form>
</div>
</body>
</html>