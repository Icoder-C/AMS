function showTime() {
    const date = new Date(); // Create a new Date object

    // Specify options for displaying the date as day month name, year (e.g., 27 April 2024)
    const dateOptions = { year: 'numeric', month: 'long', day: 'numeric' };
    let currentDate = date.toLocaleDateString('en-US', dateOptions);

    // Specify options for displaying the time as hour and minute
    const timeOptions = { hour: '2-digit', minute: '2-digit',second:'2-digit' };
    let currentTime = date.toLocaleTimeString('en-US', timeOptions);

    // Display the date and time in the HTML element
    document.getElementById('time').innerHTML = `${currentTime}`;
    document.getElementById('date').innerHTML = `${currentDate}`;

    // Call showTime every 60000 milliseconds (every minute) to update the time
    setTimeout(showTime, 1000);
}

// Initialize the function to start showing the time
showTime();