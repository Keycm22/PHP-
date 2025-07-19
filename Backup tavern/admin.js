// admin.js

document.addEventListener('DOMContentLoaded', () => {
    // --- Modal Functionality ---
    const reservationModal = document.getElementById('reservationModal');
    const closeButton = document.querySelector('.modal .close-button');
    const modalDetails = document.getElementById('modalDetails');
    const modalConfirmBtn = document.querySelector('.modal-confirm-btn');
    const modalDeleteBtn = document.querySelector('.modal-delete-btn');
    const modalDeclineBtn = document.querySelector('.modal-decline-btn');

    let currentReservationId = null;

    // Open Modal
    function openModal(reservationData) {
        // Log when the modal is attempting to open
        console.log("Attempting to open modal with data:", reservationData);

        // Defensive check: only open if reservationData is valid and not empty
        if (!reservationData || Object.keys(reservationData).length === 0) {
            console.warn("openModal called with no valid reservation data. Modal not opened.");
            return;
        }

        modalDetails.innerHTML = ''; // Clear previous content

        // Extract reservation ID and store it
        currentReservationId = reservationData['Reservation ID'];

        for (const key in reservationData) {
            if (Object.hasOwnProperty.call(reservationData, key)) {
                const p = document.createElement('p');
                p.innerHTML = `<strong>${key}:</strong> ${reservationData[key]}`;
                modalDetails.appendChild(p);
            }
        }
        reservationModal.style.display = 'block';
    }

    // Close Modal
    if (closeButton) {
        closeButton.addEventListener('click', () => {
            reservationModal.style.display = 'none';
            currentReservationId = null;
        });
    }

    window.addEventListener('click', (event) => {
        if (event.target === reservationModal) {
            reservationModal.style.display = 'none';
            currentReservationId = null;
        }
    });

    // --- Action Buttons Functionality (View, Confirm, Delete, Decline) ---
    const reservationTableBody = document.querySelector('table tbody');

    reservationTableBody.addEventListener('click', async (event) => {
        const target = event.target;

        // Ensure a button inside actions cell was clicked
        if (target.tagName === 'BUTTON' && target.closest('.actions')) {
            const row = target.closest('tr');
            if (!row) return;

            const reservationId = row.dataset.reservationId;
            const fullReservationJson = row.dataset.fullReservation;
            let fullReservationData = {};
            try {
                fullReservationData = JSON.parse(fullReservationJson);
            } catch (e) {
                console.error("Error parsing reservation data:", e);
                alert("Error loading reservation details.");
                return;
            }

            if (target.classList.contains('view-btn')) {
                // This is the ONLY place openModal should be called from user interaction
                openModal(fullReservationData);
            } else if (target.classList.contains('confirm-btn')) {
                await updateReservationStatus(reservationId, 'Confirmed', 'update', row);
            } else if (target.classList.contains('delete-btn')) {
                if (confirm('Are you sure you want to delete this reservation?')) {
                    await updateReservationStatus(reservationId, null, 'delete', row);
                }
            }
        }
    });

    // Event listeners for buttons INSIDE the modal
    if (modalConfirmBtn) {
        modalConfirmBtn.addEventListener('click', async () => {
            if (currentReservationId) {
                const row = document.querySelector(`tr[data-reservation-id="${currentReservationId}"]`);
                await updateReservationStatus(currentReservationId, 'Confirmed', 'update', row);
                reservationModal.style.display = 'none';
            } else {
                alert('No reservation selected for update.');
            }
        });
    }

    if (modalDeclineBtn) {
        modalDeclineBtn.addEventListener('click', async () => {
            if (currentReservationId) {
                const row = document.querySelector(`tr[data-reservation-id="${currentReservationId}"]`);
                await updateReservationStatus(currentReservationId, 'Declined', 'update', row);
                reservationModal.style.display = 'none';
            } else {
                alert('No reservation selected for update.');
            }
        });
    }

    if (modalDeleteBtn) {
        modalDeleteBtn.addEventListener('click', async () => {
            if (currentReservationId && confirm('Are you sure you want to delete this reservation permanently?')) {
                const row = document.querySelector(`tr[data-reservation-id="${currentReservationId}"]`);
                await updateReservationStatus(currentReservationId, null, 'delete', row);
                reservationModal.style.display = 'none';
            } else {
                alert('No reservation selected for deletion.');
            }
        });
    }

    // --- Function to send status update/delete request ---
    async function updateReservationStatus(reservationId, newStatus, actionType, rowElement) {
        const formData = new URLSearchParams();
        formData.append('reservation_id', reservationId);
        formData.append('action', actionType);

        if (actionType === 'update') {
            formData.append('status', newStatus);
        }

        try {
            const response = await fetch('update_reservation_status.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: formData
            });

            const result = await response.json();

            if (result.success) {
                if (actionType === 'delete') {
                    if (rowElement) {
                        rowElement.remove();
                        alert('Reservation deleted successfully!');
                    }
                } else if (actionType === 'update') {
                    const statusSpan = rowElement.querySelector('.status-badge');
                    if (statusSpan) {
                        statusSpan.textContent = newStatus;
                        statusSpan.className = `status-badge ${newStatus.toLowerCase()}`;
                    }
                    alert('Reservation status updated to ' + newStatus + ' successfully!');
                }
            } else {
                alert('Error processing reservation: ' + result.message);
            }
        } catch (error) {
            console.error('Error:', error);
            alert('An error occurred while communicating with the server.');
        }
    }

    // --- Calendar Widget Functionality ---
    const calendarElement = document.getElementById('calendar');

    function renderCalendar(year, month) {
        calendarElement.innerHTML = ''; // Clear existing content

        const monthNames = ["January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"
        ];

        const date = new Date(year, month);
        const firstDay = new Date(year, month, 1).getDay();
        const daysInMonth = new Date(year, month + 1, 0).getDate();

        const calendarHeader = document.createElement('div');
        calendarHeader.className = 'calendar-header';
        calendarHeader.innerHTML = `
            <button id="prevMonth" class="calendar-nav-btn">&laquo;</button>
            <h4 class="calendar-month-year">${monthNames[month]} ${year}</h4>
            <button id="nextMonth" class="calendar-nav-btn">&raquo;</button>
        `;
        calendarElement.appendChild(calendarHeader);

        const calendarGrid = document.createElement('div');
        calendarGrid.className = 'calendar-grid';

        const dayNames = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
        dayNames.forEach(day => {
            const dayName = document.createElement('div');
            dayName.className = 'calendar-day-name';
            dayName.textContent = day;
            calendarGrid.appendChild(dayName);
        });

        // Fill leading empty days
        for (let i = 0; i < firstDay; i++) {
            const emptyCell = document.createElement('div');
            emptyCell.className = 'calendar-day empty';
            calendarGrid.appendChild(emptyCell);
        }

        // Fill days of the month
        for (let day = 1; day <= daysInMonth; day++) {
            const dayCell = document.createElement('div');
            dayCell.className = 'calendar-day';
            dayCell.textContent = day;
            if (day === new Date().getDate() && month === new Date().getMonth() && year === new Date().getFullYear()) {
                dayCell.classList.add('current-day');
            }
            calendarGrid.appendChild(dayCell);
        }

        calendarElement.appendChild(calendarGrid);

        // Navigation buttons
        document.getElementById('prevMonth').addEventListener('click', () => {
            currentMonth--;
            if (currentMonth < 0) {
                currentMonth = 11;
                currentYear--;
            }
            renderCalendar(currentYear, currentMonth);
        });

        document.getElementById('nextMonth').addEventListener('click', () => {
            currentMonth++;
            if (currentMonth > 11) {
                currentMonth = 0;
                currentYear++;
            }
            renderCalendar(currentYear, currentMonth);
        });
    }

    // Initialize calendar to current month/year
    let currentYear = new Date().getFullYear();
    let currentMonth = new Date().getMonth();
    renderCalendar(currentYear, currentMonth);

    // --- Search and Filter Placeholders ---
    const searchInput = document.getElementById('reservationSearch');
    const searchButton = document.querySelector('.search-btn');
    const filterSelect = document.getElementById('filterDate');
    const searchInputTop = document.getElementById('reservationSearchTop');

    if (searchButton) {
        searchButton.addEventListener('click', () => {
            alert('Search functionality (placeholder): Searching for \"' + searchInput.value + '\"');
        });
    }

    if (searchInput) {
        searchInput.addEventListener('keypress', (e) => {
            if (e.key === 'Enter') {
                alert('Search functionality (placeholder): Searching for \"' + searchInput.value + '\"');
            }
        });
    }

    if (searchInputTop) {
        searchInputTop.addEventListener('keypress', (e) => {
            if (e.key === 'Enter') {
                alert('Search functionality (placeholder): Searching for \"' + searchInputTop.value + '\"');
            }
        });
    }

    if (filterSelect) {
        filterSelect.addEventListener('change', () => {
            alert('Filter functionality (placeholder): Filtering by \"' + filterSelect.value + '\"');
        });
    }
});

