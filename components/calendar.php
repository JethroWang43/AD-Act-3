<?php
$month = date('n');
$year = date('Y');
$today = date('j');
$currentMonth = date('n');
$currentYear = date('Y');

$firstDayOfMonth = mktime(0, 0, 0, $month, 1, $year);
$daysInMonth = date('t', $firstDayOfMonth);
$monthName = date('F', $firstDayOfMonth);
$startDay = date('w', $firstDayOfMonth);
?>

<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>

<div class="calendar-container">
    <div class="live-time">
        <span><strong>Time:</strong> <span id="live-clock"></span></span>
        <span><strong>Date:</strong> <span id="live-date"></span></span>
    </div>

    <h2><?php echo "$monthName $year"; ?></h2>
    <table class="calendar">
        <tr>
            <th>Sun</th><th>Mon</th><th>Tue</th><th>Wed</th>
            <th>Thu</th><th>Fri</th><th>Sat</th>
        </tr>
        <tr>
            <?php
            for ($i = 0; $i < $startDay; $i++) {
                echo "<td></td>";
            }

            for ($day = 1; $day <= $daysInMonth; $day++) {
                $isToday = ($day == $today && $month == $currentMonth && $year == $currentYear);
                $class = $isToday ? "today" : "";
                echo "<td class='$class'>$day</td>";

                if ((($day + $startDay) % 7) == 0) {
                    echo "</tr><tr>";
                }
            }

            while ((($day + $startDay) % 7) != 1) {
                echo "<td></td>";
                $day++;
            }
            ?>
        </tr>
    </table>
</div>

<script>
    function updateTime() {
        const now = new Date();
        const hours = String(now.getHours()).padStart(2, '0');
        const minutes = String(now.getMinutes()).padStart(2, '0');
        const seconds = String(now.getSeconds()).padStart(2, '0');
        const day = String(now.getDate()).padStart(2, '0');
        const month = String(now.getMonth() + 1).padStart(2, '0');
        const year = now.getFullYear();

        document.getElementById('live-clock').textContent =
            `${hours}:${minutes}:${seconds}`;
        document.getElementById('live-date').textContent =
            `${month}/${day}/${year}`;
    }

    setInterval(updateTime, 1000);
    updateTime();
</script>

</body>
</html>
