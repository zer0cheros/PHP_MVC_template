<head>
    <link rel="stylesheet" href="/public/css/booking.css">
</head>
<h1>Edit bookings</h1>
<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>Booking ID</th>
            <th>Booking Date</th>
            <th>Booking Time</th>
            <th>Service</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data['booking'] as $booking): ?>
            <tr>
                <td><?php echo $booking['id']; ?></td>
                <td><?php echo $booking['booking_date']; ?></td>
                <td><?php echo $booking['booking_time']; ?></td>
                <td>
                    <?php
                    // match service name from the service list
                    foreach ($data['service'] as $service) {
                        if ($service['id'] == $booking['service_id']) {
                            echo $service['service_name'];
                            break;
                        }
                    }
                    ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>