const userRole = "Supervisor"; // Change this to test (e.g., "User", "Admin", "Supervisor")

        // Check access permissions
        window.onload = function () {
            if (userRole === "Admin" || userRole === "Supervisor") {
                document.getElementById("approval-container").style.display = "block";
            } else {
                alert("Access Denied: Only Admin and Supervisor can access this page.");
                document.body.innerHTML = "<h1 style='text-align: center; color: red;'>Access Denied</h1>";
            }
        };

        // Handle form submission
        document.getElementById("approval-form").addEventListener("submit", function (event) {
            event.preventDefault(); // Prevent form reload
            const name = document.getElementById("name").value;
            const role = document.getElementById("role").value;
            const approval = document.querySelector('input[name="approval"]:checked').value;

            // Simulate a database update
            const data = { name, role, approval };
            console.log("Submitting data to the database:", data);

            // AJAX request simulation (replace this with a real API/database call)
            fakeDatabaseUpdate(data)
                .then(response => {
                    alert("Approval updated successfully in the database!");
                    resetForm();
                })
                .catch(error => {
                    alert("Error updating the database.");
                });
        });

        // Simulate database update
        function fakeDatabaseUpdate(data) {
            return new Promise((resolve, reject) => {
                setTimeout(() => {
                    console.log("Data saved:", data);
                    resolve("Success");
                }, 1000);
            });
        }

        // Reset form
        function resetForm() {
            document.getElementById("approval-form").reset();
        }