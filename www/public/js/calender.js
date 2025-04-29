document.addEventListener('DOMContentLoaded', () => {
    const root = document.querySelector('.container'); // You can replace this with any container element

    // Create calendar structure dynamically
    function createCalendar() {
        // Calendar container
        const calendar = document.createElement('div');
        calendar.classList.add('calendar');

        // Header section
        const header = document.createElement('div');
        header.classList.add('calendar-header');

        const prevButton = document.createElement('button');
        prevButton.id = 'prev-month';
        prevButton.textContent = '<';
        
        const monthYear = document.createElement('h2');
        monthYear.id = 'month-year';

        const nextButton = document.createElement('button');
        nextButton.id = 'next-month';
        nextButton.textContent = '>';

        header.appendChild(prevButton);
        header.appendChild(monthYear);
        header.appendChild(nextButton);

        // Grid section
        const grid = document.createElement('div');
        grid.classList.add('calendar-grid');
        const daysGrid = document.createElement('div');
        daysGrid.classList.add('d');
        const days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
        days.forEach(day => {
            const dayName = document.createElement('div');
            dayName.classList.add('day-name');
            dayName.textContent = day;
           daysGrid.appendChild(dayName);
        });
        grid.appendChild(daysGrid);
        const daysContainer = document.createElement('div');
        daysContainer.id = 'calendar-days';
        grid.appendChild(daysContainer);

        // Append everything to the calendar container
        calendar.appendChild(header);
        calendar.appendChild(grid);
        root.appendChild(calendar);
    }

    // Render the days dynamically
    function renderCalendar() {
        const calendarDays = document.getElementById('calendar-days');
        const monthYear = document.getElementById('month-year');

        const year = currentDate.getFullYear();
        const month = currentDate.getMonth();

        // Set the month and year in the header
        monthYear.textContent = `${currentDate.toLocaleString('default', { month: 'long' })} ${year}`;

        // Get the first and last days of the month
        const firstDay = new Date(year, month, 1).getDay();
        const lastDate = new Date(year, month + 1, 0).getDate();

        // Clear the previous days
        calendarDays.innerHTML = '';

        // Add blank days for the first week
        for (let i = 0; i < firstDay; i++) {
            const emptyDiv = document.createElement('div');
            calendarDays.appendChild(emptyDiv);
        }

        // Add the days of the current month
        for (let day = 1; day <= lastDate; day++) {
            const dayDiv = document.createElement('div');
            dayDiv.textContent = day;

            // Highlight today's date
            if (
                day === new Date().getDate() &&
                year === new Date().getFullYear() &&
                month === new Date().getMonth()
            ) {
                dayDiv.classList.add('today');
            }

            calendarDays.appendChild(dayDiv);
        }
    }

    // Event listeners for navigation
    function addNavigation() {
        const prevMonth = document.getElementById('prev-month');
        const nextMonth = document.getElementById('next-month');

        prevMonth.addEventListener('click', () => {
            currentDate.setMonth(currentDate.getMonth() - 1);
            renderCalendar();
        });

        nextMonth.addEventListener('click', () => {
            currentDate.setMonth(currentDate.getMonth() + 1);
            renderCalendar();
        });
    }

    // Initialize the calendar
    let currentDate = new Date();
    createCalendar();
    renderCalendar();
    addNavigation();
});