const currentUserRole = "viewer"; // Change to "admin", "supervisor", or "viewer" to test behavior

// Check permissions and toggle edit functionality
function setupPage() {
  if (currentUserRole === "admin" || currentUserRole === "supervisor") {
    document.getElementById("add-roster-btn").style.display = "block";
    document.getElementById("roster-form").style.display = "block";
  } else {
    document.getElementById("add-roster-btn").style.display = "none";
    document.getElementById("roster-form").style.display = "none";
    alert("You are in view-only mode.");
  }
}

// Fetch the latest roster data 
function fetchRoster() {
  // Simulating fetching from the server (replace this with an actual API call)
  const rosterData = [
     
  ];

  updateRosterTable(rosterData);
}

// Update the roster table dynamically
function updateRosterTable(data) {
  const table = document.getElementById("roster-table").getElementsByTagName("tbody")[0];
  table.innerHTML = ""; // Clear existing rows

  data.forEach((row) => {
    const newRow = table.insertRow();

    newRow.insertCell(0).innerText = row.supervisor;
    newRow.insertCell(1).innerText = row.doctor;
    newRow.insertCell(2).innerText = row.caregiver1;
    newRow.insertCell(3).innerText = row.patientGroup1;
    newRow.insertCell(4).innerText = row.caregiver2;
    newRow.insertCell(5).innerText = row.patientGroup2;
  });
}

// Add new roster entry
function addRoster() {
  const table = document.getElementById("roster-table").getElementsByTagName("tbody")[0];
  const newRow = table.insertRow();

  const supervisorCell = newRow.insertCell(0);
  const doctorCell = newRow.insertCell(1);
  const caregiver1Cell = newRow.insertCell(2);
  const patientGroup1Cell = newRow.insertCell(3);
  const caregiver2Cell = newRow.insertCell(4);
  const patientGroup2Cell = newRow.insertCell(5);

  supervisorCell.innerText = document.getElementById("supervisor").value;
  doctorCell.innerText = document.getElementById("doctor").value;
  caregiver1Cell.innerText = document.getElementById("caregiver1").value;
  patientGroup1Cell.innerText = document.getElementById("patientGroup1").value;
  caregiver2Cell.innerText = document.getElementById("caregiver2").value;
  patientGroup2Cell.innerText = document.getElementById("patientGroup2").value;

  // Simulate saving data to the server here (API call)
  clearForm();
}

// Clear form after adding roster entry
function clearForm() {
  document.getElementById("roster-form").reset();
}


// Initialize the page on load
document.addEventListener("DOMContentLoaded", () => {
  setupPage();
  fetchRoster();

  const addButton = document.getElementById("add-roster-btn");
  if (addButton) {
    addButton.addEventListener("click", addRoster);
  }
});