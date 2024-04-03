<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projects</title>
    <link rel="stylesheet" href="aitana.css">
</head>
<body>

<header>
    <a href="http://aitanahierro.atwebpages.com/resume/aitana.html"><img src="home_icon.png" alt="Home" class="homeicon" width="120"></a>
    <nav>
        <a href="http://aitanahierro.atwebpages.com/resume/about.html">About me</a>
        <a href="http://aitanahierro.atwebpages.com/resume/projects.php">Projects</a>
        <a href="http://aitanahierro.atwebpages.com/resume/contact.php">Contact</a>
    </nav>
</header>
<div class= "projects">
<h1> Projects 💡 </h1>
<form id="projectForm" method="get"> 
    <select name="project">
        <option value="" selected disabled>Select a project</option>
        <option value="Customer Retention Product">Customer Retention Product</option>
        <option value="Employment Platform">Employment Platform</option>
        <option value="Chatbot for Fintech Startup: PayActiv">Chatbot for Fintech Startup</option>
    </select>
    <input type="submit" value="Send" style="background-color: #FF42A1; color: white;">
</form>
       
<?php
// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['project'])) {
    // Get the selected project
    $selectedProject = $_GET['project'];

    // Create connection
    $con = mysqli_connect("fdb1032.awardspace.net", "4446928_aitana", "t3w5YZdxc8@Ndn5", "4446928_aitana");

    // Check connection
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    // SQL query to retrieve details of the selected project
    $sql = "SELECT * FROM projects WHERE project_name = '$selectedProject'";
    $result = $con->query($sql);

    // Check if there are any results
    if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            // Check if the 'project_details' key exists in the row array
            if (array_key_exists('project_details', $row)) {
                // Output the project details
                echo "<p id='projectDetails'>" . $row["project_details"] . "</p>";
            } else {
                echo "No details found for the selected project.";
            }
        }
    } else {
        echo "No details found for the selected project.";
    }

    // Close connection
    $con->close();
}
?>

<script>
    // Format project details when the page loads
    window.onload = function() {
        var projectDetails = document.getElementById('projectDetails');
        if (projectDetails) {
            var detailsText = projectDetails.innerHTML;

            // Format headers
			detailsText = detailsText.replace(/(Project Title|Methodologies Used|Project Overview|Key Achievements|Product Conceptualization and Development|Successful Product Launch and Revenue Generation|Strategic Corporate Partnerships and Collaborations|Product Management Approach|Project Objective|Project Scope|Lessons Learned|Overview|Results Achieved|Project Description|Key Objectives|Project Skills|Deliverables|Impact):/g, '<strong>$1</strong>');
            // Format lists starting with "-"
			detailsText = detailsText.replace(/- (.+?)(?=\n|$)/g, '<li>$1</li>');
            detailsText = detailsText.replace(/<li>(Project Title|Methodologies Used|Project Overview|Key Achievements|Product Conceptualization and Development|Successful Product Launch and Revenue Generation|Strategic Corporate Partnerships and Collaborations|Product Management Approach|Project Objective|Project Scope|Lessons Learned|Overview|Results Achieved|Project Description|Key Objectives|Project Skills|Deliverables|Impact):<\/li>/g, '</ul><br><strong>$1</strong>:<ul>');
     
            // Insert <br> tags between paragraphs
            detailsText = detailsText.replace(/\n\s*\n/g, '<br><br>');

            // Close <ul> tags
            detailsText = detailsText.replace(/<\/li>\n/g, '</li>');
            detailsText = detailsText.replace(/<\/strong><br><br>/g, '</strong></ul><br><br>');

            // Update the project details with the formatted HTML
            projectDetails.innerHTML = detailsText;
        }
    };
</script>



        
</div>
<footer>
    <p>&copy; 2024 Aitana Hierro. All rights reserved.</p>
    
    <div class="logo-container2">
        <a href="https://www.linkedin.com/in/aitanahierrog/"><img src="linkedin.png" alt="Linkedin Logo"></a>
        <a href="https://github.com/aitanahierro"><img src="github.png" alt="Github Logo"></a>
        <a href="mailto:aitanahierro@gmail.com"><img src="email.png" alt="Email Logo"></a>
    </div>
</footer>
</body>
</html>
