let today = new Date();
let currentMonth = today.getMonth();
let currentYear = today.getFullYear();
let currentDay = today.getDate();
let allMonths = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
let yearNum = document.getElementById("yearNum");

function renderMonths() {
    allMonths.forEach(function (month, i) {
        let months = document.querySelector('.months')
        let monthSpan = document.createElement('span')

        console.log(`current month: ${currentMonth}, i+1 ${i+1}, conditional ${currentMonth === i + 1 ? 'selected-month' : 'each-month'}`)
        monthSpan.className = currentMonth + 1 === i + 1 ? 'selected-month' : 'each-month';
        monthSpan.id = i + 1
        monthSpan.innerHTML = ` ${month} `
        months.append(monthSpan)

        monthSpan.addEventListener('click', function (e) {
            const selectedMonth = document.querySelector('.selected-month');
            selectedMonth.classList.replace('selected-month', 'each-month');
            e.target.className = 'selected-month'
        })

        document.addEventListener('click', function (e) {
            if (e.target.className === 'selected-month') {
                e.preventDefault()
                currentMonth = e.target.id - 1
                currentYear = currentYear
                renderCalendar(currentMonth, currentYear)
            }
        })
    })
}

function renderCalendar(month, year) {
    let firstDayOfTheMonth = (new Date(year, month)).getDay();
    let daysInMonth = 32 - new Date(year, month, 32).getDate();

    let calendarTable = document.getElementById("calendar");
    if (calendarTable.getAttribute("selected") === null) {
        calendarTable.setAttribute("selected", yyyymmdd(currentYear, currentMonth, currentDay))
    }
    let calendarBody = document.getElementById("calendar-body");
    calendarBody.innerHTML = "";
    yearNum.innerHTML = `${year}`;

    let date = 1;
    for (let i = 0; i < 6; i++) {
        let week = document.createElement("tr");

        for (let j = 0; j < 7; j++) {
            if (i === 0 && j < firstDayOfTheMonth) {
                let day = document.createElement("td");
                let dateNum = document.createTextNode("");
                day.appendChild(dateNum);
                week.appendChild(day);
            } else if (date > daysInMonth) {
                break;
            } else {
                let day = document.createElement("td");
                let dateNum = document.createTextNode(date);
                if (date === today.getDate() && year === today.getFullYear() && month === today.getMonth()) {
                    day.title = "today";
                }
                day.appendChild(dateNum);
                week.appendChild(day);
                date++;
                day.id = yyyymmdd(year, month, dateNum.textContent)
                if (!day.classList.contains('selected-day')) day.classList.add('dates');
            }
        }
        calendarBody.appendChild(week);
    }

    const selectedDay = document.getElementById(calendarTable.getAttribute("selected"));
    if (selectedDay != null) selectedDay.className = 'selected-day';

    window.onmessage = (e) => {
        if (e.data.startsWith("20")) {
            console.log(e.data);
            if (calendarTable) calendarTable.setAttribute("selected", e.data)
        }
    };

    calendarBody.addEventListener('click', function (e) {
        if (e.target.id === null || e.target.id === '')   return;
        const selectedDay = document.querySelector('.selected-day');
        if (selectedDay != null) selectedDay.classList.replace('selected-day', 'dates');
        e.target.className = 'selected-day'
        calendarTable.setAttribute("selected", e.target.id)
        manageCreateTaskButtons();
        if (document.querySelector(".modal-content") !== null && document.querySelector(".modal-content").offsetParent) {
            window.top.postMessage(e.target.id, '*')
        }
    });
}

function nextYear() {
    document.addEventListener('click', function (e) {
        if (e.target.className.includes('triangle-right')) {
            e.preventDefault()
            currentYear = currentYear + 1
            currentMonth = currentMonth;
            renderCalendar(currentMonth, currentYear);
        }
    })
}

function previousYear() {
    document.addEventListener('click', function (e) {
        if (e.target.className.includes('triangle-left')) {
            e.preventDefault()
            currentYear = currentYear - 1;
            currentMonth = currentMonth;
            renderCalendar(currentMonth, currentYear);
        }
    })
}

function yyyymmdd(year, month, day) {
    return `${year}-${String(month + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`
}

function manageCreateTaskButtons() {
    if (Date.parse(document.getElementById('calendar').getAttribute('selected')) <
        Date.parse(yyyymmdd(today.getFullYear(), today.getMonth(), today.getDate()))) {
        createTaskButtons.forEach(button => {
            button.removeEventListener('click', openCreateTaskModal)
            button.setAttribute('disabled', '');
        })
    } else {
        createTaskButtons.forEach(button => {
            button.removeAttribute('disabled');
            button.addEventListener('click', openCreateTaskModal);
        })
    }
}

renderMonths()
renderCalendar(currentMonth, currentYear);
nextYear()
previousYear()
manageCreateTaskButtons()