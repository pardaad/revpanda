<?php
    // Include the header template
    include 'templates/header.php';

    // Print the page title
    echo '<h1 class="title">Practical Test Task</h1>';

    // Initialize the application and start it
    $app = new Application();
    $app->start();


    // Saving the information that the user has sent in the form in the database
    $createRecord = new createRecord();
    $createRecord->saveData($_POST['a'], $_POST['b'], $_POST['c']);

    // Include the footer template
    include 'templates/footer.php'; 