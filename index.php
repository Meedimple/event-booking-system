<!DOCTYPE html>
<html>
<head>
    <title>Event Bookings</title>
</head>
<body>
    <h1>Event Bookings</h1>

    <form method="GET" action="filtered_results.php">
        <label for="employee_name">Employee Name:</label>
        <input type="text" name="employee_name" id="employee_name">

        <label for="event_name">Event Name:</label>
        <input type="text" name="event_name" id="event_name">

        <label for="event_date">Event Date:</label>
        <input type="date" name="event_date" id="event_date">

        <input type="submit" value="Filter">
    </form>


   
</body>
</html>
