<?php

namespace Core;

class Calendar {
    private $month;
    public $year;

    public function __construct($month = null, $year = null) {
        $this->month = $month ?? date('m');
        $this->year = $year ?? date('Y');
    }

    public function getMonthName() {
        return date('F', mktime(0, 0, 0, $this->month, 1, $this->year));
    }

    public function getDaysInMonth() {
        return date('t', mktime(0, 0, 0, $this->month, 1, $this->year));
    }

    public function getFirstDayOfWeek() {
        return date('w', mktime(0, 0, 0, $this->month, 1, $this->year));
    }

    public function createCalendar() {
        $daysInMonth = $this->getDaysInMonth();
        $firstDayOfWeek = $this->getFirstDayOfWeek();
        $days = array_fill(1, $daysInMonth, range(1, $daysInMonth));

        // Adjust array to match the starting day of the week
        $offset = $firstDayOfWeek;
        $paddedDays = array_merge(array_fill(0, $offset, ''), $days[1]);
        
        // Split into weeks
        $weeks = array_chunk($paddedDays, 7);
        return $weeks;
    }
}