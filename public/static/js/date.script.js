class SuperDate extends Date {
  static shortDaysOfWeek = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];
  static longDaysOfWeek = [
    "Sunday",
    "Monday",
    "Tuesday",
    "Wednesday",
    "Thursday",
    "Friday",
    "Saturday",
  ];

  static shortMonths = [
    "Jan",
    "Feb",
    "Mar",
    "Apr",
    "May",
    "Jun",
    "Jul",
    "Aug",
    "Sep",
    "Oct",
    "Nov",
    "Dec",
  ];
  static longMonths = [
    "January",
    "February",
    "March",
    "April",
    "May",
    "June",
    "July",
    "August",
    "September",
    "October",
    "November",
    "December",
  ];

  getMonth() {
    return super.getMonth() + 1;
  }

  daysInMonth(year = this.getFullYear(), month = this.getMonth()) {
    return new Date(year, month, 0).getDate();
  }

  getDaysOfMonth() {
    const numberOfDays = this.daysInMonth();
    return Array.from({ length: numberOfDays }, (_, i) => i + 1);
  }

  getDayOfWeek(date, format) {
    const day = new Date(
      this.getFullYear(),
      this.getMonth() - 1,
      date ?? this.getDate()
    ).getDay();

    return format === "short"
      ? SuperDate.shortDaysOfWeek[day]
      : SuperDate.longDaysOfWeek[day];
  }

  getStartingDayOfMonth() {
    const date = new Date(this.getFullYear(), this.getMonth() - 1, 1);
    return date.getDay();
  }

  getMonthName(month = this.getMonth(), format) {
    return format === "short"
      ? SuperDate.shortMonths[month - 1]
      : SuperDate.longMonths[month - 1];
  }
}

class DatePicker {
  constructor(element, options = {}) {
    this.element = element;

    this.options = {};
    this.dateInputEl = this._createElement("input");
    this.dateInputEl.style.display = "none";
    this._setOptions(options);
    this.date = new SuperDate(this.options.value);
  }

  _setOptions(options) {
    const weekdays = [
      this.element.dataset.weekdays?.split(",").map((day) => day.trim()),
      ["Mon", "Tue", "Wed", "Thu", "Fri"],
    ].find(Boolean);

    const weekends = [
      this.element.dataset.weekends?.split(",").map((day) => day.trim()),
      ["Saturday", "Sunday"],
    ].find(Boolean);
    const startingYear = 2000;
    const endingYear = 2100;

    const optionFromDatePickerEl = {
      value:
        this.element.dataset.value ||
        new SuperDate().toISOString().slice(0, 10),
      datePreview: (this.element.dataset.datePreview || "true") === "true",
      monthsFormat: this.element.dataset.monthsFormat || "long",
      daysOfWeekFormat: this.element.dataset.daysOfWeekFormat || "short",
      shouldShowDaysOfWeek:
        (this.element.dataset.shouldShowDaysOfWeek || "true") === "true",
      weekdays,
      weekends,
      startingYear: Number(this.element.dataset.startingYear) || startingYear,
      startingMonth: Number(this.element.dataset.startingMonth) || 1,
      endingYear: Number(this.element.dataset.endingYear) || endingYear,
      endingMonth: Number(this.element.dataset.endingMonth) || 12,
      dateFormat: this.element.dataset.dateFormat,
      name: this.element.dataset.name || "date-picker",
      weekDaysFormat: this.element.dataset.weekDaysFormat || "short",
    };

    Object.assign(this.options, optionFromDatePickerEl, options);
    this.dateInputEl.setAttribute("type", "date");
    this.dateInputEl.setAttribute("value", this.options.value);
    this.dateInputEl.setAttribute("name", this.options.name);
  }

  _createDateButtons() {
    const numberOfDays = this.date.daysInMonth();
    const selectedDate = this.dateInputEl.value;
    const dateButtons = Array.from({ length: numberOfDays }, (_, i) => {
      const date = i + 1;
      const fullDate = `${this.date.getFullYear()}-${this.date
        .getMonth()
        .toString()
        .padStart(2, "0")}-${date.toString().padStart(2, "0")}`;
      const dayOfWeek = this.date.getDayOfWeek(date, "long");
      const isWeekend = this._isWeekend(dayOfWeek);
      const button = this._createElement("button", [
        "date",
        dayOfWeek,
        isWeekend
          ? "weekend"
          : this._isWeekday(dayOfWeek)
          ? "weekday"
          : "other-day",
        selectedDate === fullDate ? "selected-date" : "non-selected-date",
      ]);
      button.textContent =
        this.options.dateFormat === "2-digit"
          ? String(date).padStart(2, "0")
          : String(date);

      button.setAttribute("type", "button");
      button.dataset.fullDate = fullDate;
      button.dataset.date = date.toString();
      return button;
    });

    const createDisabledButtons = (length) =>
      Array.from({ length }, () => {
        const button = this._createElement("button");
        button.setAttribute("disabled", "true");
        button.setAttribute("type", "button");
        return button;
      });

    const startingDisabled = createDisabledButtons(
      this.date.getStartingDayOfMonth()
    );

    const totalLength = startingDisabled.length + dateButtons.length;
    const NUMBER_OF_DAYS_IN_WEEK = 7;
    const remainder = totalLength % NUMBER_OF_DAYS_IN_WEEK;
    const endingDisabledButtonLength =
      remainder === 0 ? 0 : NUMBER_OF_DAYS_IN_WEEK - remainder;

    const endingDisabledButtons = createDisabledButtons(
      endingDisabledButtonLength
    );

    return startingDisabled.concat(dateButtons).concat(endingDisabledButtons);
  }

  _isWeekend(dayOfWeek) {
    return this.options.weekends.some((weekend) =>
      dayOfWeek.toLowerCase().startsWith(weekend.toLowerCase())
    );
  }

  _isWeekday(dayOfWeek) {
    return this.options.weekdays.some((weekday) =>
      dayOfWeek.toLowerCase().startsWith(weekday.toLowerCase())
    );
  }

  _createElement(tagName, classList = []) {
    const element = document.createElement(tagName);
    if (classList.length > 0) element.classList.add(...classList);
    return element;
  }

  _createYearSelectOptions() {
    const startingYear = Math.min(
      this.options.startingYear,
      this.options.endingYear
    );

    const endingYear = Math.max(
      this.options.startingYear,
      this.options.endingYear
    );

    const length = endingYear - startingYear + 1;
    const year = this.date.getFullYear().toString();

    const options = Array.from({ length }, (_, i) => {
      const option = this._createElement("option");
      const value = (startingYear + i).toString();
      option.setAttribute("value", value);
      option.textContent = value;
      if (value === year) option.setAttribute("selected", "true");

      return option;
    });

    return options;
  }

  _createMonthSelectOptions() {
    const startingMonth = Math.min(
      this.options.startingMonth,
      this.options.endingMonth
    );
    const endingMonth = Math.max(
      this.options.startingMonth,
      this.options.endingMonth
    );

    const length = endingMonth - startingMonth + 1;
    const month = this.date.getMonth().toString();
    const map = {
      "2-digit": (value) => value.padStart(2, "0"),
      long: (value) => this.date.getMonthName(Number(value), "long"),
      short: (value) => this.date.getMonthName(Number(value), "short"),
      numeric: (value) => value,
    };

    const options = Array.from({ length }, (_, i) => {
      const option = this._createElement("option");
      const value = (startingMonth + i).toString();
      option.setAttribute("value", value);
      option.textContent = map[this.options.monthsFormat]?.(value) ?? value;
      if (value === month) option.setAttribute("selected", "true");

      return option;
    });

    return options;
  }

  _renderYearSelect(parent) {
    const select = this._createElement("select");
    select.dataset.name = "year";
    select.append(...this._createYearSelectOptions());
    parent.append(select);
  }

  _renderMonthSelect(parent) {
    const select = this._createElement("select");
    select.dataset.name = "month";
    select.append(...this._createMonthSelectOptions());
    parent.append(select);
  }

  _renderDates(parent) {
    parent.innerHTML = "";
    parent.append(...this._createDateButtons());
  }

  _renderDatePreview() {
    if (!this.options.datePreview) return;

    let datePreviewEl = this.element.querySelector(".date-privew");
    if (!datePreviewEl) {
      datePreviewEl = this._createElement("div", ["date-privew"]);
      this.element.append(datePreviewEl);
    }

    datePreviewEl.innerHTML = ``;
    const span = this._createElement("span");
    span.textContent = this.dateInputEl.value;
    datePreviewEl.append(span);
  }

  _onDateSelect(event) {
    const target = event.target;
    const currentTarget = event.currentTarget;
    if (!target.matches("button") || !target.hasAttribute("data-date")) return;
    const date = Number(target.dataset.date);
    if (!date) return;
    const previouslySelectedEl = currentTarget.querySelector(".selected-date");
    previouslySelectedEl?.classList.add("non-selected-date");
    previouslySelectedEl?.classList.remove("selected-date");
    target.classList.add("selected-date");
    target.classList.remove("non-selected-date");

    this.date.setDate(date);
    this.dateInputEl.setAttribute(
      "value",
      this.date.toISOString().slice(0, 10)
    );

    this._renderDatePreview();
  }

  _createWeekDays() {
    const weekdays =
      this.options.weekDaysFormat === "long"
        ? SuperDate.longDaysOfWeek
        : SuperDate.shortDaysOfWeek;

    return weekdays.map((dayOfWeek, i) => {
      const longDayOfWeek = SuperDate.longDaysOfWeek[i];

      const isWeekend = this._isWeekend(longDayOfWeek);
      const span = this._createElement("span", [
        "day-of-week",
        longDayOfWeek,
        isWeekend
          ? "weekend"
          : this._isWeekday(longDayOfWeek)
          ? "weekday"
          : "other-day",
      ]);
      span.textContent = dayOfWeek;
      return span;
    });
  }

  _onInput(buttonParent, event) {
    const target = event.target;

    if (target.matches("select[data-name='year']")) {
      this.date.setFullYear(Number(target.value));
    }

    if (target.matches("select[data-name='month']")) {
      this.date.setMonth(Number(target.value) - 1);
    }

    this._renderDates(buttonParent);
  }

  _addGridStyle(el, col) {
    el.style.display = "grid";
    el.style.gridTemplateColumns = `repeat(${col}, minmax(0, 1fr))`;
  }

  render() {
    this._renderDatePreview();
    const selectParent = this._createElement("div");
    this.element.append(this.dateInputEl);

    this._renderYearSelect(selectParent);
    this._renderMonthSelect(selectParent);
    this.element.append(selectParent);
    const buttonParent = this._createElement("div");

    selectParent.addEventListener(
      "input",
      this._onInput.bind(this, buttonParent)
    );

    buttonParent.addEventListener("click", this._onDateSelect.bind(this));
    this._addGridStyle(selectParent, 2);
    this._addGridStyle(buttonParent, 7);

    if (this.options.shouldShowDaysOfWeek) {
      const daysOfWeekEl = this._createElement("div");
      this._addGridStyle(daysOfWeekEl, 7);
      daysOfWeekEl.style.display = "grid";
      daysOfWeekEl.append(...this._createWeekDays());
      this.element.append(daysOfWeekEl);
    }

    this._renderDates(buttonParent);
    this.element.append(buttonParent);
  }
}

function onLoad(fn) {
  if (document.readyState !== "loading") fn();
  else document.addEventListener("DOMContentLoaded", fn);
}

function init() {
  document.querySelectorAll("[data-date-picker]").forEach((datePicker) => {
    new DatePicker(datePicker).render();
  });
}

onLoad(init);