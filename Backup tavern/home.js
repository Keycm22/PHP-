document.addEventListener('DOMContentLoaded', () => {
    const reservationForm = document.getElementById('reservationForm');

    if (reservationForm) {
        reservationForm.addEventListener('submit', function(event) {
            // Client-side validation before native form submission
            const date = document.getElementById('date').value;
            const time = document.getElementById('time').value;
            const guests = document.getElementById('guests').value;
            const name = document.getElementById('name').value;
            const phone = document.getElementById('phone').value;
            const email = document.getElementById('email').value;

            // These basic checks are now largely handled by 'required' attribute,
            // but you might keep custom validation logic here if more complex.
            // Note: The 'required' attribute handles empty fields.

            // Simple email validation regex
            const emailRegex = /^[^\\s@]+@[^\\s@]+\\.[^\\s@]+$/;
            if (!emailRegex.test(email)) {
                alert('Please enter a valid email address.');
                event.preventDefault(); // Stop form submission
                return;
            }

            // Phone number validation (basic check for numbers)
            const phoneRegex = /^\\d[\\d\\s\\-()]*\\d$/;
            if (!phoneRegex.test(phone)) {
                alert('Please enter a valid phone number.');
                event.preventDefault(); // Stop form submission
                return;
            }

            // No need for `fetch` here anymore, form will submit directly
            // alert('Submitting reservation...'); // Optional: for debugging
        });
    }

    // Optional: Dynamic year for "EST 2024" if you want it current
    // const estYearSpan = document.querySelector('.est-year');
    // if (estYearSpan) {
    //     estYearSpan.textContent = `EST ${new Date().getFullYear()}`;
    // }
});