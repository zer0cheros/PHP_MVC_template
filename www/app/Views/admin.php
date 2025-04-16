<head>
    <link rel="stylesheet" href="/public/css/booking.css">
</head>   
   <h1><?php echo $data['title']; ?></h1>
    <p>Username: <?php echo $data['user']['username'] ?></p>
    <p>Role: <?php echo $data['user']['role'] ?></p>

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
        <?php foreach ($data['bookings'] as $booking): ?>
            <tr>
                <td><?php echo $booking['id']; ?></td>
                <td><?php echo $booking['booking_date']; ?></td>
                <td><?php echo $booking['booking_time']; ?></td>
                <td>
                    <?php
                    // match service name from the service list
                    foreach ($data['services'] as $service) {
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
    <table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>User ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Role</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data['users'] as $users): ?>
            <tr>
                <td><?php echo $users['id']; ?></td>
                <td><?php echo $users['username']; ?></td>
                <td><?php echo $users['email']; ?></td>
                <td onclick="handleRole(<?php echo $users['id']; ?>)"><?php echo $users['role']; ?></td> 
                
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<script src="/public/js/admin.js"></script>