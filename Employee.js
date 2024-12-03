const currentUserRole = "admin"; // Change to "admin" or "supervisor" to test functionality

const employees = [
  { id: 1, name: "Spongebob", role: "Developer", salary: 10000 },
  { id: 2, name: "Patrick", role: "Designer", salary: 55000 },
  { id: 3, name: "Mr.Krabs", role: "Manager", salary: 60000 },
  { id: 4, name: "Squidward", role: "HR Specialist", salary: 45000 }, // New employee
  { id: 5, name: "Gary", role: "Team Lead", salary: 70000 },   // New employee
];

// Populate Employee Table
function populateTable() {
  const tbody = document.getElementById("employee-table").getElementsByTagName("tbody")[0];
  tbody.innerHTML = ""; // Clear existing rows

  employees.forEach((employee) => {
    const row = tbody.insertRow();

    row.insertCell(0).innerText = employee.id;
    row.insertCell(1).innerText = employee.name;
    row.insertCell(2).innerText = employee.role;
    row.insertCell(3).innerText = `$${employee.salary}`;

    const actionsCell = row.insertCell(4);

    if (currentUserRole === "admin") {
      const editBtn = document.createElement("button");
      editBtn.innerText = "Edit Salary";
      editBtn.className = "btn";
      editBtn.onclick = () => openSalaryForm(employee);
      actionsCell.appendChild(editBtn);
    }
  });
}

// Open Salary Form (Admin only)
function openSalaryForm(employee) {
  if (currentUserRole !== "admin") return;

  document.getElementById("salary-form").style.display = "block";
  document.getElementById("emp-id").value = employee.id;
  document.getElementById("new-salary").value = employee.salary;
}

// Update Employee Salary
document.getElementById("update-salary-btn").addEventListener("click", () => {
  const empId = parseInt(document.getElementById("emp-id").value);
  const newSalary = parseFloat(document.getElementById("new-salary").value);

  const employee = employees.find((emp) => emp.id === empId);
  if (employee) {
    employee.salary = newSalary;
    alert("Salary updated successfully!");
    populateTable();
    document.getElementById("salary-form").style.display = "none";
  }
});

// Cancel Salary Update
document.getElementById("cancel-btn").addEventListener("click", () => {
  document.getElementById("salary-form").style.display = "none";
});

// Filter/Search Employees
document.getElementById("search-btn").addEventListener("click", () => {
  const id = document.getElementById("search-id").value;
  const name = document.getElementById("search-name").value.toLowerCase();
  const role = document.getElementById("search-role").value.toLowerCase();

  const filteredEmployees = employees.filter((employee) =>
    (!id || employee.id == id) &&
    (!name || employee.name.toLowerCase().includes(name)) &&
    (!role || employee.role.toLowerCase().includes(role))
  );

  populateTable(filteredEmployees);
});

// Initialize Page
document.addEventListener("DOMContentLoaded", () => {
  if (currentUserRole !== "admin") {
    document.getElementById("salary-form").style.display = "none";
  }
  populateTable(employees);
});