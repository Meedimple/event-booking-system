<html>
    <title></title>
    <head>

    </head>
    <body>
<table>
        <tr>
            <th>Participation ID</th>
            <th>Employee Name</th>
            <th>Employee Mail</th>
            <th>Event ID</th>
            <th>Event Name</th>
            <th>Participation Fee</th>
            <th>Event Date</th>
            <th>Version</th>
        </tr>
        <?php

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "booking_system";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $employee_name = $_GET['employee_name'];
        $event_name = $_GET['event_name'];
        $event_date = $_GET['event_date'];

        $sql = "SELECT * FROM bookings WHERE 1=1";
        if (!empty($employee_name)) {
            $sql .= " AND employee_name = '$employee_name'";
        }
        if (!empty($event_name)) {
            $sql .= " AND event_name = '$event_name'";
        }
        if (!empty($event_date)) {
            $sql .= " AND event_date = '$event_date'";
        }

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['participation_id'] . "</td>";
                echo "<td>" . $row['employee_name'] . "</td>";
                echo "<td>" . $row['employee_mail'] . "</td>";
                echo "<td>" . $row['event_id'] . "</td>";
                echo "<td>" . $row['event_name'] . "</td>";
                echo "<td>" . $row['participation_fee'] . "</td>";
                echo "<td>" . $row['event_date'] . "</td>";
                echo "<td>" . $row['version'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='8'>No results found</td></tr>";
        }

        $conn->close();

        ?>
    </table>
    <?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "booking_system";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$employee_name = $_GET['employee_name'];
$event_name = $_GET['event_name'];
$event_date = $_GET['event_date'];

$sql = "SELECT SUM(participation_fee) AS total_price FROM bookings WHERE 1=1";
if (!empty($employee_name)) {
    $sql .= " AND employee_name = '$employee_name'";
}
if (!empty($event_name)) {
    $sql .= " AND event_name = '$event_name'";
}
if (!empty($event_date)) {
    $sql .= " AND event_date = '$event_date'";
}

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo "<p>Total Price: " . $row['total_price'] . "</p>";
}

$conn->close();

?>
      
</body>
</html>