document.addEventListener("DOMContentLoaded", function () {
    const timeSelect = document.getElementById("time");
    const dateInput = document.getElementById("date");

    dateInput.addEventListener("change", updateAvailableTimes);

    function updateAvailableTimes() {
        const selectedDate = new Date(dateInput.value);
        timeSelect.innerHTML = ""; // Clear previous options

        // In this example, we suggest time slots at hourly intervals from 9:00 AM to 5:00 PM
        const startHour = 9;
        const endHour = 17;

        for (let hour = startHour; hour <= endHour; hour++) {
            for (let minute = 0; minute < 60; minute += 15) {
                const formattedTime = formatTime(hour, minute);
                const option = document.createElement("option");
                option.text = formattedTime;
                option.value = formattedTime;
                timeSelect.add(option);
            }
        }
    }

    function formatTime(hour, minute) {
        return hour.toString().padStart(2, "0") + ":" + minute.toString().padStart(2, "0");
    }
});
