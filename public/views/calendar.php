<?php
echo '
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
'
?>