const DAILY_FEE = 10;          // $10 for every day
const APPOINTMENT_FEE = 50;    // $50 for every appointment
const MEDICINE_FEE = 5;        // $5 for every medicine/month


function getPreviousUpdateDate() {
    return localStorage.getItem("previousUpdateDate") || null;
}

// Store the current update date (replace this with actual database update in production)
function saveUpdateDate(currentDate) {
    localStorage.setItem("previousUpdateDate", currentDate);
}


// Calculate the bill
function calculateBill(startDate, endDate, patientData) {
    const daysDiff = Math.ceil((endDate - startDate) / (1000 * 60 * 60 * 24)); // Convert milliseconds to days
    const dailyCharge = daysDiff * DAILY_FEE;
    const appointmentCharge = patientData.appointments * APPOINTMENT_FEE;
    const medicineCharge = patientData.medicines * MEDICINE_FEE;
    return dailyCharge + appointmentCharge + medicineCharge;
}

// Handle the Update button click
function updatePayment() {
    const currentDate = new Date();
    const previousUpdateDateStr = getPreviousUpdateDate();
    const patients = getPatientsData();

    if (!previousUpdateDateStr) {
        alert("No previous update date found. Setting the current date as the update date.");
        saveUpdateDate(currentDate.toISOString());
        return;
    }

    const previousUpdateDate = new Date(previousUpdateDateStr);
    if (currentDate.toDateString() === previousUpdateDate.toDateString()) {
        alert("The system has already been updated today.");
        return;
    }

    // Calculate bills for each patient
    const bills = patients.map((patient) => {
        const bill = calculateBill(previousUpdateDate, currentDate, patient);
        return `Patient ID: ${patient.id}, Bill: $${bill}`;
    });

    // Display the result
    alert(`Payments updated successfully!\n\n${bills.join("\n")}`);

    // Update the last update date
    saveUpdateDate(currentDate.toISOString());
}