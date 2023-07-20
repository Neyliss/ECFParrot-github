
        function submitComment() {
            const name = document.getElementById('name').value;
            const rating = document.getElementById('rating').value;
            const comment = document.getElementById('comment').value;

            // Create a new FormData object to send the comment data to the PHP file
            const formData = new FormData();
            formData.append("name", name);
            formData.append("rating", rating);
            formData.append("comment", comment);

            // Send the comment data to the PHP file using AJAX
            fetch("submit_comment.php", {
                method: "POST",
                body: formData
            })
            .then(response => response.text())
            .then(message => {
                alert(message);
                // You can redirect the user to a different page or do other actions here
            })
            .catch(error => {
                console.error("Votre commentaire n'a pas été transmis:", error);
            });
        }

        // Function to fetch and display approved comments
        function displayApprovedComments() {
            // This part can remain the same as in your original JavaScript code
        }

        // Call the displayApprovedComments function to show approved comments on page load
        displayApprovedComments();
    
