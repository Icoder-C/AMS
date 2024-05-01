<form action="" method="get">
  <!-- <div class="con" 
             data-date-picker data-name="birthDate" 
             data-ending-year="2050" 
             data-months-format="short" 
             data-date-format="2-digit" 
             data-weekends="Sat">
    </div> -->
    <div style="width: 100%; height:100%;" data-date-picker="" data-name="birthDate" data-ending-year="2050" data-months-format="short" data-date-format="2-digit" data-weekends="Sat"></div>
</form>
<script src="<?= js("date")?>"></script>



<!-- </?php

use Core\Calendar;


$calendar = new Calendar($_GET['month'] ?? null, $_GET['year'] ?? null);
$weeks = $calendar->createCalendar();
?>
<form action="" method="get">
    <div>
        <h2></?= $calendar->getMonthName() ?> </?= $calendar->year ?></h2>
        <table>
            <tr>
                <th>Sun</th><th>Mon</th><th>Tue</th><th>Wed</th>
                <th>Thu</th><th>Fri</th><th>Sat</th>
            </tr>
            </?php foreach ($weeks as $week): ?>
                <tr>
                    </?php foreach ($week as $day): ?>
                        <td></?= $day ?></td>
                    </?php endforeach; ?>
                </tr>
            </?php endforeach; ?>
        </table>
    </div>
</form> -->
