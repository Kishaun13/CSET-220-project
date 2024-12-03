const user = {
    roleName: "Admin", 
    accessLevel: 5     // Replace with actual access level if needed
  };
  
  // Allowed roles and access levels
  const allowedRoles = ["Admin", "Supervisor"];
  const minAccessLevel = 4; // Supervisors and Admins have access
  
  // Function to check access to the New Roster page
  function checkAccess() {
    if (allowedRoles.includes(user.roleName) && user.accessLevel >= minAccessLevel) {
      console.log("Access granted. Redirecting to the New Roster page...");
      // Enable access to the New Roster page
      document.getElementById("new-roster-page").style.display = "block";
    } else {
      console.log("Access denied. Redirecting to the homepage...");
      // Redirect to homepage or show an error message
      window.location.href = "home.html";//change based on what name of home is
    }
  }
  
  // Call the function on page load
  document.addEventListener("DOMContentLoaded", checkAccess);
  
  // Function to allow editing data on the New Roster page
  function enableDataEditing() {
    if (allowedRoles.includes(user.roleName)) {
      console.log("Editing enabled for the New Roster data.");
      
      const editableFields = document.querySelectorAll(".editable");
      editableFields.forEach((field) => {
        field.disabled = false; // Enable editing
      });
    } else {
      console.log("Editing disabled for your role.");
      // Disable form fields for non-authorized users
      const editableFields = document.querySelectorAll(".editable");
      editableFields.forEach((field) => {
        field.disabled = true; // Disable editing
      });
    }
  }
  
  // Call the editing function after DOM is loaded
  document.addEventListener("DOMContentLoaded", enableDataEditing);