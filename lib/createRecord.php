<?php
// Class to insert records in the database
class createRecord extends Application {

    // This function saves data to three different tables in the database
    public function saveData($a, $b, $c) {
        // Connect to the database using the `connect` function from the `Application` class
        $connection = $this->connect();
    
        // Begin a transaction
        $connection->beginTransaction();
    
        // Insert value into table_a
        $table_a = "INSERT INTO table_a(value) VALUE(?)";
        $statement_1 = $connection->prepare($table_a);
        $result_1 = $statement_1->execute([$a]);
        
        // Insert value into table_b
        $table_b = "INSERT INTO table_b(value) VALUE(?)";
        $statement_2 = $connection->prepare($table_b);
        $result_2 = $statement_2->execute([$b]);
    
        // Insert value into table_c
        $table_c = "INSERT INTO table_c(value) VALUE(?)";
        $statement_3 = $connection->prepare($table_c);
        $result_3 = $statement_3->execute([$c]);
    
        // If all three insert statements are successful, commit the transaction and show success message and add new item button
        if($result_1 == true && $result_2 == true && $result_3 == true) {
            $connection->commit();
            echo '<p class="alert green">Successfully saved data to database</p>';
            echo '<a href="./" class="btn back">Add New Item</a>';
        }
        // If any of the insert statements fail, rollback the transaction and show error message
        else {
            $connection->rollBack();
            echo '<p class="alert red">There was an error while trying to save a data to database</p>';
            echo '<a href="./" class="btn back">Try Again</a>';
        }
    }

}
