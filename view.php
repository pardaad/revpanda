<?php
    // Include the header template
    include 'templates/header.php';

    // Print the page title
    echo '<h1 class="title">View Inserted Data</h1>';

    // Get the ID of the view to display from the URL query string
    $id = $_GET['id'];

    // Set the description for the view based on the ID
    switch($id) {
        case 1:
            $description = 'Display "A" table values';
            break;
        case 2:
            $description = 'Display "A", "B," "C" table values, in that order';
            break;
        case 3:
            $description = 'Display "C" and "B" table values, in that order';
            break;
        case 4:
            $description = 'Display "B" table values in Ascending order';
            break;
        case 5:
            $description = 'Display "B" table values in Descending order';
            break;
    }

    // Set up an array of view IDs
    $views = array("1", "2","3","4","5");

    // Loop through the views and set the active class on the button for the current view
    foreach ($views as $view){
        $active[$view] = ($id == $view)? "active":"";
    }
    // Display the buttons for each view
    echo '<div class="buttons">';
    echo '<a href="view.php?id=1" class="btn ' . $active['1'] . '">View #1</a>';
    echo '<a href="view.php?id=2" class="btn ' . $active['2'] . '">View #2</a>';
    echo '<a href="view.php?id=3" class="btn ' . $active['3'] . '">View #3</a>';
    echo '<a href="view.php?id=4" class="btn ' . $active['4'] . '">View #4</a>';
    echo '<a href="view.php?id=5" class="btn ' . $active['5'] . '">View #5</a>';
    echo '</div>';

    // Display the description for the current view
    echo '<p>' . $description . '</p>';

    // Display the table for the data
    echo '<table class="dataTable"><tr><th>Table Name</th><th>Value</th></tr>';

    // Initialize the application and start it
    $app = new Application();
    $app->start();

    // Retrieve and display the records
    $viewRecords = new viewRecords($id);
    $viewRecords->returnViews();

    // End the table of data
    echo '</table>';

    // Add a link to go back to the index page
    echo '<a href="./" class="btn back">Go Back</a>';

    // Include the footer template
    include 'templates/footer.php'; 