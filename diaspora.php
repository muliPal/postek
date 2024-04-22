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
                   window.onload=()=>{
                let inputDate= document.getElementById("session_date"); 
                //
                // Create a new Date object with the current date.
                var currentDate = new Date();
                //
                // Format the date as "yyyy-MM-dd"
                let formattedDate =
                  currentDate.getFullYear() +
                  '-' +
                  ('0' + (currentDate.getMonth() + 1)).slice(-2) +
                  '-' +
                  ('0' + currentDate.getDate()).slice(-2);
              inputDate.value = formattedDate;
            };
        //save the qty entered by the user to the database
        function save_qty(qty_element){
            //
            //Get the quantity value directly from the input
           const qty=qty_element.value;
           //
           //Get the element that has the unit.This element is a previous
           // sibling to the quantity element.
           const unit_element= qty_element.previousElementSibling;
           //
           //Get the unit value
           const unit=unit_element.value;
            alert("qty.value= "+qty+ " qty.unit="+ unit);
        }
    </script>
    </head>
    <body>
        <label>
            Staff Name<input type="text" id="staff_name"/>
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
                    echo $row["name"];
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
