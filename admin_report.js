const userRole = 'admin'; //you can change this from admin or supervisor

// Restrict access to the page based on role
document.addEventListener('DOMContentLoaded', () => {
  const inputs = document.querySelectorAll('input, textarea');
  const editButton = document.createElement('button');

  if (userRole === 'admin') {
    // Admin has full access to make changes
    inputs.forEach((input) => {
      input.disabled = false; 
    });

    // Add Save button for admin
    editButton.textContent = 'Save Changes';
    editButton.style.marginTop = '20px';
    editButton.addEventListener('click', () => {
      alert('Changes have been saved successfully.');
    });
    document.body.appendChild(editButton);
  } else if (userRole === 'supervisor') {
    // Supervisor can only view the page
    inputs.forEach((input) => {
      input.disabled = true; 
    });
  } else {
    // If the role is neither 'admin' nor 'supervisor', restrict access 
    alert('Access denied. You do not have permission to view this page.');
    document.body.innerHTML = ''; 
  }
});