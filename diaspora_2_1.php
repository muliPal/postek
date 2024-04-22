<?php
// Connect to the database
$servername = "localhost";  // Change if your database is hosted elsewhere
$username = "root";
$password = "";
$dbname = "pos";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query the database
$sql = "SELECT name, unit FROM product";  // Change this query according to your needs
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Database Query Results</title>
        <link rel="stylesheet" href="diaspora.css">
        <script>
        function save_qty(qty_element) {
            //
            // Get the quantity value from quantity element
            const qty = qty_element.value;
            //
            //Define a label for quqntity values
            const qty_label = [qty,'stock','qty'];
            //
            // Get the element that has the unit. 
            // This element is a previous sibling to the quantity element.
            const unit_element = qty_element.previousElementSibling;
            //
            // Get the unit value
            const unit = unit_element.value;
            //
            //Define a lebel for the unit
            const unit_label = [unit,'stock','unit'];
            //
            //Get the product element; it's the one just before the unit element
            const product_element = unit_element.previousElementSibling;
            //
            //Get the product value
            const product = product_element.value;
            //
            //Get the product name from the product element value
            const product_name = name_element.value;
            //
            //Define the label for name 
            const name = [name,'product','name'];
            //
            // Get the staff element by using the id 
            const staff_element = document.getElementById("staff_name");
            //
            // Get staff name from the staff element value
            const staff = staff_element.value;
            //
            //Define a label for staff
            const staff = [staff,'staff','name'];
            // Get the current date
            const current_date = document.getElementById("session_date").value;
            //
            //Show all the labels collected so far
            const ans = [unit_label,qty_label];
            //
            //Show the list in the console log of your debbuger
            console.log(ans);
}


   
    
 </script>
    </head>
    <body>
        <label>
            Staff Name<input  value="elizabeth" type="text" id="staff_name"/>
        </label>
        <label>
            Session Date<input type="date" id="session_date"/>
        </label>
        <div class="product-container">
            <?php
            // Display results
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<div >";
                    echo '<span>';
                         echo $row["name"];
                    echo '</span>';
                    echo "<input type='text' name='unit[]' value='" . $row["unit"] . "'>";
                    echo "<input type='text' onblur='save_qty(this)'>";
                echo "</div>"; // Change column names accordingly
            }
            // Close connection
            $conn->close();
            ?>
        </div>
    </body>
</html>
