<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="aitana.css">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
</head>
<body>

<header>
    <a href="http://aitanahierro.atwebpages.com/resume/aitana.html"><img src="home_icon.png" alt="Home" class=homeicon width="120"></a>
    <nav>
        <a href="http://aitanahierro.atwebpages.com/resume/about.html">About me</a>
        <a href="http://aitanahierro.atwebpages.com/resume/projects.php">Projects</a>
        <a href="http://aitanahierro.atwebpages.com/resume/contact.php">Contact</a>
    </nav>
</header>
<div class=contact>
<h2>Contact 💬 </h2>
<form action="contact.php" method="post">
    <label for="name">Full name: </label><input type="text" id="name" name="name" required><br>
    <label for="subject">Subject: </label><input type="text" id="subject" name="subject" required><br>
    <label for="email">Email: </label><input type="email" id="email" name="email" required><br>
    <label for="message">Message: </label><textarea id="message" name="message" rows="4" required></textarea><br>
    <input type="submit" value="Send">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    
    // Create the content to be written to the file
    $content = "Name: $name\n";
    $content .= "Subject: $subject\n";
    $content .= "Email: $email\n";
    $content .= "Message:\n$message\n\n";
    
    // File path
    $file = 'connection.txt';
    
    // Write the content to the file
    if (file_put_contents($file, $content, FILE_APPEND | LOCK_EX) !== false) {
        echo "<p>Thank you for leaving a message. I'll get back to you shortly, have a nice day!</p>";
    } else {
        echo "<p>Oops! Something went wrong. Please try again later.</p>";
    }
}
?>

        
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


