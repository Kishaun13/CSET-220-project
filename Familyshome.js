function accessDetails() {
    // Get values from input fields
    const familyCode = document.getElementById("familyCode").value.trim();
    const patientId = document.getElementById("patientId").value.trim();

    // Validate family code
    if (!familyData[familyCode]) {
        alert("Invalid Family Code. Access denied.");
        return;
    }

    // Find the patient details
    const patient = familyData[familyCode].find(p => p.patientId === patientId);

    if (!patient) {
        alert("Invalid Patient ID. No details found.");
        return;
    }

    // Display patient details
    const detailsDiv = document.getElementById("patientDetails");
    detailsDiv.innerHTML = `
        <h3>Patient Details</h3>
        <p><strong>Name:</strong> ${patient.name}</p>
        <p><strong>Doctor:</strong> ${patient.doctor}</p>
        <p><strong>Medications:</strong> ${patient.medications.join(", ")}</p>
    `;
    detailsDiv.style.display = "block";
}
