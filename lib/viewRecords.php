<?php
// Class to display records based on ID
class viewRecords extends Application {
    // ID to be used to determine which records to display
    public $id;

    // PDO connection to be used for all database queries
    private $connection;

    // Constructor to set the ID and create a PDO connection
    function __construct($id) {
        $this->id = $id;
        $this->connection = $this->connect();
    }

    // Method to display records from Table A
    private function dbDataFirstView() {
        // Retrieve data from Table A
        $dataTableA = $this->connection->query("SELECT * FROM table_a");
        // Loop through the data and display each record
        while($data = $dataTableA->fetch()) {
            echo '<tr><td>Table A</td><td>' . $data['value'] . '</td></tr>';
        }
    }

    // Method to display records from Tables A, B, and C
    private function dbDataSecondView() {
        // Retrieve data from Table A
        $dataTableA = $this->connection->query("SELECT * FROM table_a");
        // Loop through the data and display each record
        while($data = $dataTableA->fetch()) {
            echo '<tr><td>Table A</td><td>' . $data['value'] . '</td></tr>';
        }
        // Retrieve data from Table B
        $dataTableB = $this->connection->query("SELECT * FROM table_b");
        // Loop through the data and display each record
        while($data = $dataTableB->fetch()) {
            echo '<tr><td>Table B</td><td>' . $data['value'] . '</td></tr>';
        }
        // Retrieve data from Table C
        $dataTableC = $this->connection->query("SELECT * FROM table_c");
        // Loop through the data and display each record
        while($data = $dataTableC->fetch()) {
            echo '<tr><td>Table C</td><td>' . $data['value'] . '</td></tr>';
        }
    }

    // Method to display records from Tables B and C
    private function dbDataThirdView() {
        // Retrieve data from Table B
        $dataTableB = $this->connect()->query("SELECT * FROM table_b");
        // Loop through the data and display each record
        while($data = $dataTableB->fetch()) {
            echo '<tr><td>Table B</td><td>' . $data['value'] . '</td></tr>';
        }
        // Retrieve data from Table C
        $dataTableC = $this->connect()->query("SELECT * FROM table_c");
        // Loop through the data and display each record
        while($data = $dataTableC->fetch()) {
            echo '<tr><td>Table C</td><td>' . $data['value'] . '</td></tr>';
        }
    }

    // Retrieve data from Table B
    private function dbDataFourthView() {
        // Retrieve data from Table B in Ascending order
        $dataTableB = $this->connect()->query("SELECT * FROM table_b ORDER BY value");
        // Loop through the data and display each record
        while($data = $dataTableB->fetch()) {
            echo '<tr><td>Table B</td><td>' . $data['value'] . '</td></tr>';
        }
    }

    // Retrieve data from Table B
    private function dbDataFifthView() {
        // Retrieve data from Table B in Descending order
        $dataTableB = $this->connect()->query("SELECT * FROM table_b ORDER BY value DESC");
        // Loop through the data and display each record
        while($data = $dataTableB->fetch()) {
            echo '<tr><td>Table B</td><td>' . $data['value'] . '</td></tr>';
        }
    }

     // Method to return the appropriate view based on the ID
     public function returnViews() {
        // Use a switch statement to determine which method to call
        switch($this->id) {
            // If the ID is 1, call the dbDataFirstView method
            case 1:
                $this->dbDataFirstView();
                break;
            // If the ID is 2, call the dbDataSecondView method
            case 2:
                $this->dbDataSecondView();
                break;
            // If the ID is 3, call the dbDataThirdView method
            case 3:
                $this->dbDataThirdView();
                break;
            // If the ID is 4, call the dbDataFourthView method
            case 4:
                $this->dbDataFourthView();
                break;
            // If the ID is 5, call the dbDataFifthView method
            case 5:
                $this->dbDataFifthView();
                break;
        }
    }

}