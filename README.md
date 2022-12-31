# Revpanda Practical Test Task

This is a simple PHP application that allows users to input data into three different tables in a database, and view the data stored in the tables in various formats.

- [Getting Started](#getting-started)
  * [Prerequisites](#prerequisites)
  * [Installing](#installing)
- [Features](#features)
- [Future Features and Enhancements](#future-features-and-enhancements)
- [Built With](#built-with)
- [Acknowledgments](#acknowledgments)
- [Detailed explanation of the function of each file](#detailed-explanation-of-the-function-of-each-file)
  * [index.html](#indexhtml)
  * [/inc/autoload.php](#-inc-autoloadphp)
  * [/lib/Application.php](#-lib-applicationphp)
    + [The class has four private properties:](#the-class-has-four-private-properties-)
    + [The class has two public methods:](#the-class-has-two-public-methods-)
      - [connect()](#connect--)
      - [start()](#start--)
  * [/lib/createRecord.php](#-lib-createrecordphp)
  * [/lib/viewRecords.php](#-lib-viewrecordsphp)
  * [view.php](#viewphp)
  * [insert.php](#insertphp)


# Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

## Prerequisites

To run this application, you will need to have the following software installed on your system:

 - Apache web server
 - MySQL database server
 - PHP 7.2 or higher
 - You will also need to have a MySQL user with `root` as the username and no password.

## Installing

 1. Clone or download the project to your local machine.
 2. Place the project files in the document root of your Apache web server.
 3. Start the Apache web server and MySQL database server.
 4. Open the index.html file in your web browser.

# Features

Form on index.html page allows users to input data into three different tables in the database.

Five buttons on index.html page allow users to view the data stored in the tables in different formats.

Automatic creation of the database and tables if they do not exist.

# Future Features and Enhancements

- [ ] **User authentication and authorization**: It could add a user system to the application, allowing users to create accounts and log in. It could also implement role-based permissions, allowing certain users to access certain features or data.

- [ ] **Data validation and sanitization**: It could add additional checks to ensure that the data being entered into the database is valid and sanitized. This could include verifying that data is of the correct type, has the correct format, or is not malicious.

- [ ] **Improved error handling**: It could add more robust error handling to the application, including displaying more detailed error messages to the user and logging errors for debugging purposes.

- [ ] **Improved performance**: It could optimize the application's performance by using caching, optimizing database queries, or using a more efficient data storage solution.

- [ ] **Improved user interface**: It could improve the user interface of the application by adding more visually appealing design elements, making the application more mobile-friendly, or adding additional features such as searching or sorting data.

- [ ] **Additional data storage options**: it could expand the data storage options for the application by adding support for additional database systems or using a different data storage solution such as a NoSQL database.

- [ ] **Improved security**: It could improve the security of the application by implementing additional measures such as using .env file to store the database information, encryption, two-factor authentication, or security testing.

# Built With
 - PHP 7.2
 - MySQL

# Acknowledgments

Thank you to the Revpanda team for the opportunity to complete this task.

# Detailed explanation of the function of each file

## index.html

This file is an HTML document tht includes a form with three input fields and a submit button, and five buttons linking to view.php with different query string parameters in the URL.

The form in the webpage allows users to enter data into the input fields, which are named "a", "b", and "c". When the user clicks the submit button, the form submits the data to insert.php using the POST method.

The five buttons on the webpage link to view.php with different query string parameters in the URL. Clicking on a button will take the user to a new webpage that displays the data stored in the database in a specific format, depending on the query string parameter in the URL. For example, clicking on the "View #1" button will take the user to a webpage that displays the data from table A.

## /inc/autoload.php

This PHP script uses the spl_autoload_register function to automatically include a PHP class file when it is needed. The script defines a function named autoload that takes a class name as an argument, and includes a file with the same name as the class in the lib directory. The script then registers this function using the spl_autoload_register function, passing autoload as the argument.

## /lib/Application.php

The Application class is a PHP class that provides methods for connecting to and starting a database for this application.

### The class has four private properties:

 - `$dbServer`: a string that stores the address of the database server.
 - `$dbName`: a string that stores the name of the database to connect to.
 - `$dbUsername`: a string that stores the username for the database.
 - `$dbPassword`: a string that stores the password for the database.

### The class has two public methods:

#### connect()

This method creates and returns a PDO (PHP Data Objects) connection to the database using the PDO class. It takes no arguments. The method first tries to connect to the database using the PDO constructor, passing in the server address, database name, username, and password stored in the class properties as arguments.

If the connection is successful, the method sets the default fetch mode for the connection to be an associative array using the setAttribute method, and then returns the connection. If there is an error connecting, the method ends the script using the die function.

#### start()

This method starts the application by connecting to the database. It takes no arguments. The method first tries to connect to the database using the PDO constructor, passing in the server address, database name, username, and password stored in the class properties as arguments. If the connection is unsuccessful, the method checks if the error code is 1049, which indicates that the database doesn't exist. If this is the case, the method creates the database and its tables. If the error code is 1045, which indicates that the database information is incorrect, the method displays an error message.

## /lib/createRecord.php

The createRecord class extends the Application class and contains a method called saveData that takes in three arguments: $a, $b, and $c. The saveData method inserts these values into three different tables in the database: table_a, table_b, and table_c.

The saveData method first creates a connection to the database using the connect method inherited from the Application class. It then begins a transaction, which allows multiple SQL statements to be executed as a single unit. If any of the statements fail, the transaction can be rolled back and none of the statements will be committed to the database.

The saveData method then prepares and executes three separate SQL insert statements, each inserting a value into one of the tables. If all three insert statements are successful, the transaction is committed and a success message is displayed. If any of the insert statements fail, the transaction is rolled back and an error message is displayed.

## /lib/viewRecords.php

The viewRecords class is used to display records from a database based on an ID passed to it. It has a private member variable $id which is used to determine which view to display, and a private member variable $connection which is a PDO connection to the database. The class has a constructor that takes an ID as an argument and sets it as the value for $id, and also creates a PDO connection to the database.

The class has several private methods for displaying records from different tables in the database:

 - dbDataFirstView displays records from Table A
 - dbDataSecondView displays records from Tables A, B, and C in that order
 - dbDataThirdView displays records from Tables B and C in that order
 - dbDataFourthView displays records from Table B in ascending order
 - dbDataFifthView displays records from Table B in descending order

The returnViews method uses a switch statement to determine which of these private methods to call based on the value of $id. It then calls the appropriate method to display the records.



## view.php

The file view.php is a PHP script that displays a table of data stored in a MySQL database. The data is retrieved based on the ID passed in the URL query string. The script does the following:

 - Retrieves the ID of the view to display from the URL query string.
 - Sets the description for the view based on the ID.
 - Displays a set of buttons that allow the user to switch between different views of the data.
 - The active class is added to the button corresponding to the current view.
 - Displays the description for the current view.
 - Displays the table for the data.
 - Initializes the Application class and starts the application.
 - Initializes the viewRecords class with the current ID and calls the returnViews method to retrieve and display the data for the current view.

## insert.php

This PHP script is responsible for inserting data into the application database.

The script creates a new Application object and calls the start method on it. This method is likely responsible for starting the application, possibly by establishing a connection to the database.

The script then creates a new createRecord object and calls the saveData method on it, passing in three variables `$_POST['a']`, `$_POST['b']`, and `$_POST['c']` as arguments.

These variables likely represent data that has been submitted by the user through a form. The saveData method is responsible for saving this data to the database.