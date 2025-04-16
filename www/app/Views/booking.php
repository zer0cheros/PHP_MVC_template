    <head>
        <link rel="stylesheet" href="/public/css/booking.css">
    </head>

<h1 class="page-title"><?php echo $data['title']; ?></h1>
<p class="subtext">Below you can see your bookings</p>
<div class="booking_container">
<div class="booking-form-container">
    <h2 class="form-heading">Add Booking</h2>
    <p class="form-subtext">Fill in the form below to add a new booking.</p>

    <form action="/booking/add" method="post" class="booking-form">
        <label for="date" class="form-label">Date:</label>
        <input type="date" id="date" name="booking_date" class="form-input">

        <label for="time" class="form-label">Time:</label>
        <input type="time" id="time" name="booking_time" class="form-input">

        <label for="service_id" class="form-label">Service:</label>
        <select name="service_id" id="service_id" class="form-input">
            <option value="">Select Service</option>
            <?php foreach ($data['services'] as $service): ?>
                <option value="<?php echo $service['id']; ?>"><?php echo $service['service_name']; ?></option>
            <?php endforeach; ?>
        </select>

        <button type="submit" class="form-button">Add Booking</button>
    </form>
</div>
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
</div>