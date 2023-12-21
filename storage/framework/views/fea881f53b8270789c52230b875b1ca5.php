<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
        <title>Laravel</title>
    </head>
    <body class="antialiased">
        <div class="filters">
            <label for="from">From:</label>
            <input type="date" id="from">

            <label for="to">To:</label>
            <input type="date" id="to">

            <label for="patient">Patient:</label>
            <select id="patient">
                <option value="">All Patients</option>
            </select>

            <label for="apointment_status">Apoiment Status:</label>
            <select id="apointment_status">
                <option value="">All Statuses</option>
            </select>

            <label for="doctor">Doctors:</label>
            <select id="doctor">
                <option value="">All Doctors</option>
            </select>

            <button id="apply_filters_button">Apply Filters</button>
        </div>
        <table id="appointments-table">
            <thead>
            <tr>
                <th>Apoiment Time</th>
                <th>Patient</th>
                <th>Appoint Type</th>
                <th>Doctor</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody id="appointments-body">
            <!-- Appointments will be displayed here -->
            </tbody>
        </table>


        <?php echo $data->appends(Input::except('page'))->render(); ?>


        <script src="<?php echo e(asset('js/app.js')); ?>"></script>
    </body>
</html>
<?php /**PATH /var/www/html/resources/views/reports.blade.php ENDPATH**/ ?>