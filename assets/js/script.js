function updateDateTime() {
  const now = new Date();
  const time = now.toLocaleTimeString();
  const date = now.toLocaleDateString();
  document.getElementById('currentTime').textContent = "Time: " + time;
  document.getElementById('currentDate').textContent = "Date: " + date;
}

updateDateTime(); // initial call
setInterval(updateDateTime, 1000); // update every second


