<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/public/css/landing_page.css">
    <link rel="stylesheet" type="text/css" href="/public/css/buttons.css">
    <link rel="stylesheet" type="text/css" href="/public/css/abc.css">
    <link rel="stylesheet" type="text/css" href="/public/css/calendar.css">
    <link rel="stylesheet" type="text/css" href="/public/css/modal.css">
    <script src="https://kit.fontawesome.com/1437dfc48d.js" crossorigin="anonymous"></script>

    <title>mindhabit - Landing page</title>
</head>
<body>
    <div class="modal-content">
        <div class="calendar-container">
            <div class="card">
                <div class="year">
                    <div class="triangle-left">
                        <i class="fa-solid fa-chevron-left triangle-left"></i>
                    </div>
                    <div class="big-year" id="yearNum">
                    </div>
                    <div class="triangle-right">
                        <i class="fa-solid fa-chevron-right triangle-right"></i>
                    </div>
                </div>
                <div class="months">
                </div>
                <hr class="month-line"/>
                <table class="calendar-table" id="calendar">
                    <thead>
                    <tr>
                        <th class="days-of-week">Sun</th>
                        <th class="days-of-week">Mon</th>
                        <th class="days-of-week">Tue</th>
                        <th class="days-of-week">Wed</th>
                        <th class="days-of-week">Thu</th>
                        <th class="days-of-week">Fri</th>
                        <th class="days-of-week">Sat</th>
                    </tr>
                    </thead>
                    <tbody id="calendar-body">
                    </tbody>
                </table>
                <i class="closeBtn fa-solid fa-circle-xmark"></i>
            </div>
        </div>
    </div>
<script>
    const closeBtn = document.getElementsByClassName('closeBtn')[0];
    const modalBody = document.getElementsByTagName('body')[0];
    closeBtn.addEventListener('click', closeModal);
    window.addEventListener('click', outsideClick);

    // Close modal
    function closeModal() {
        parent.closeIFrame();
    }

    // Click outside and close
    function outsideClick(e) {
        console.log("entered outside click")
        console.log(e.target)
        if (e.target === modalBody) {
            parent.closeIFrame();
        }
    }

    let today = new Date();
    let currentMonth = today.getMonth();
    let currentYear = today.getFullYear();
    let allMonths = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
    let yearNum = document.getElementById("yearNum");

    function renderMonths() {
        allMonths.forEach(function (month, i) {
            let months = document.querySelector('.months')
            let monthSpan = document.createElement('span')

            monthSpan.className = 'each-month'
            monthSpan.id = i + 1
            monthSpan.innerHTML = ` ${month} `
            months.append(monthSpan)

            monthSpan.addEventListener('click', function (e) {
                if (document.querySelector('.hidden-p')) {
                    let sel = document.querySelector('.selected-month')
                    sel.className = "each-month"
                }
                e.target.className = 'selected-month'
                let newp = document.createElement('p')
                newp.className = 'hidden-p'
                newp.hidden = true
                monthSpan.append(newp)
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

        let calendarTable = document.getElementById("calendar-body");
        calendarTable.innerHTML = "";
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
                    day.id = `${year}-${String(month + 1).padStart(2, '0')}-${String(dateNum.textContent).padStart(2, '0')}`
                    day.className = 'dates'
                }
            }
            calendarTable.appendChild(week);
        }
        calendarTable.addEventListener('click', function (e) {
            let hiddenTwo = document.querySelector('.hidden-p2')
            if (hiddenTwo) {
                let sel = document.querySelector('.selected-day')
                sel.className = "dates"
            }
            e.target.className = 'selected-day'
            let newpp = document.createElement('p')
            newpp.className = 'hidden-p2'
            newpp.hidden = true
            calendarTable.append(newpp)
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

    renderMonths()
    renderCalendar(currentMonth, currentYear);
    nextYear()
    previousYear()
</script>
</body>
</html>