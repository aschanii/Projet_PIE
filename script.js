async function fetchDashboardData() {
  try {
    const response = await fetch("api.php", { method: 'GET' });

    if (!response.ok) {
      throw new Error(`HTTP error! Status: ${response.status}`);
    }

    const data = await response.json();

    // Update student statistics
    document.getElementById("studentCount").textContent = data.students.count;
    document.getElementById("studentTotal").textContent = `out of ${data.students.total} students`;
    document.getElementById("studentStatus").textContent = `${data.students.count}/${data.students.total}`;
    document.getElementById("studentProgress").style.width = `${(data.students.count / data.students.total) * 100}%`;

    // Update question statistics
    document.getElementById("questionCount").textContent = data.questions.count;
    document.getElementById("questionTotal").textContent = `out of ${data.questions.total} questions`;
    document.getElementById("questionStatus").textContent = `${data.questions.count}/${data.questions.total}`;
    document.getElementById("questionProgress").style.width = `${(data.questions.count / data.questions.total) * 100}%`;

    // Update response statistics
    document.getElementById("responseRate").textContent = data.responses.rate;
    document.getElementById("responseCount").textContent = `${data.responses.count} responses recorded`;
    document.getElementById("responseStatus").textContent = `${data.responses.rate}%`;
    document.getElementById("responseProgress").style.width = `${data.responses.rate}%`;

  } catch (error) {
    console.error("Error fetching dashboard data:", error);
  }
}

// Fetch data when page loads
document.addEventListener("DOMContentLoaded", fetchDashboardData);

// Refresh data every 30 seconds
setInterval(fetchDashboardData, 30000);

