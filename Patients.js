let patients = [
    { id: 1, name: "Olivia Brown", age: 35, contact: "555-123-4567", contactName: "Emma Brown", date: "2024-12-03" },
    { id: 2, name: "John Smith", age: 42, contact: "555-987-6543", contactName: "Noah Smith", date: "2024-11-29" },
];

if (localStorage.getItem('patients')) {
    patients = JSON.parse(localStorage.getItem('patients'));
} else {
    localStorage.setItem('patients', JSON.stringify(patients));
}

function renderPatients() {
    const tbody = document.querySelector('#patientTable tbody');
    tbody.innerHTML = '';
    patients.forEach(patient => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${patient.id}</td>
            <td>${patient.name}</td>
            <td>${patient.age}</td>
            <td>${patient.contact}</td>
            <td>${patient.contactName}</td>
            <td>${patient.date}</td>
        `;
        tbody.appendChild(row);
    });
}

function filterPatients() {
    const query = document.getElementById('search').value.toLowerCase();
    const attribute = document.getElementById('attributeSelect').value;

    const filteredPatients = patients.filter(patient =>
        patient[attribute].toString().toLowerCase().includes(query)
    );

    const tbody = document.querySelector('#patientTable tbody');
    tbody.innerHTML = '';
    filteredPatients.forEach(patient => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${patient.id}</td>
            <td>${patient.name}</td>
            <td>${patient.age}</td>
            <td>${patient.contact}</td>
            <td>${patient.contactName}</td>
            <td>${patient.date}</td>
        `;
        tbody.appendChild(row);
    });
}

renderPatients();