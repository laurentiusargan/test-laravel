document.addEventListener("DOMContentLoaded", function () {
    applyFilters(); // Call the function on page load
    document.getElementById('apply_filters_button').addEventListener('click', applyFilters);

    function applyFilters() {
        const from = document.getElementById('from').value;
        const to = document.getElementById('to').value;
        const selectedPatientId = document.getElementById('patient').value;
        const apointmentStatus = document.getElementById('apointment_status').value;
        const selectedDoctorId = document.getElementById('doctor').value;

        fetch('/reports/filter', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                from: from,
                to: to,
                patient_id: selectedPatientId,
                status: apointmentStatus,
                doctor_id: selectedDoctorId,
            }),
        })
            .then(response => response.json())
            .then(data => {
                const tableBody = document.getElementById('appointments-body');
                tableBody.innerHTML = ''; // Clear current table content

                data['data'].forEach(appointment => {
                    const row = document.createElement('tr');
                    const dateCell = document.createElement('td');
                    dateCell.textContent = appointment.start_at + ' - ' + appointment.end_at;
                    const patientCell = document.createElement('td');
                    patientCell.textContent = appointment.patient.first_name + ' ' + appointment.patient.last_name;
                    const apptType = document.createElement('td');
                    apptType.textContent = appointment.patient.type;
                    const doctor = document.createElement('td');
                    doctor.textContent = appointment.user.first_name + ' ' + appointment.user.last_name;
                    const statusCell = document.createElement('td');
                    statusCell.textContent = appointment.status;

                    row.appendChild(dateCell);
                    row.appendChild(patientCell);
                    row.appendChild(apptType);
                    row.appendChild(doctor);
                    row.appendChild(statusCell);

                    tableBody.appendChild(row);
                });
            })
            .catch(error => {
                console.error('Error fetching data:', error);
            });

        fetch('/patients')
            .then(response => response.json())
            .then(data => {
                const patientDropdown = document.getElementById('patient');
                data.forEach(patient => {
                    const option = document.createElement('option');
                    option.value = patient.id;
                    option.textContent = `${patient.first_name} ${patient.last_name}`;
                    patientDropdown.appendChild(option);
                });
            })
            .catch(error => {
                console.error('Error fetching patient names:', error);
            });

        fetch('/apointment-statuses')
            .then(response => response.json())
            .then(statuses => {
                const apointmentStatusDropdown = document.getElementById('apointment_status');
                statuses.forEach(status => {
                    const option = document.createElement('option');
                    option.value = status;
                    option.textContent = status;
                    apointmentStatusDropdown.appendChild(option);
                });
            })
            .catch(error => {
                console.error('Error fetching patient statuses:', error);
            });

        fetch('/doctors')
            .then(response => response.json())
            .then(data => {
                const patientDropdown = document.getElementById('doctor');
                data.forEach(doctor => {
                    const option = document.createElement('option');
                    option.value = doctor.id;
                    option.textContent = `${doctor.first_name} ${doctor.last_name}`;
                    patientDropdown.appendChild(option);
                });
            })
            .catch(error => {
                console.error('Error fetching patient names:', error);
            });
    }
});