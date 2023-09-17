<?php
// Set your Active Directory server details
$ldap_server = "ldap://your-vpn-server"; // Update with your VPN server's address
$ldap_domain = "your-domain.com";

// Get the username and password from the login form
$username = $_POST['username'];
$password = $_POST['password'];

// Attempt to bind to the Active Directory server
$ldap_conn = ldap_connect($ldap_server);

if (!$ldap_conn) {
    die("LDAP connection failed.");
}

// Attempt to bind using the provided username and password
$ldap_bind = ldap_bind($ldap_conn, "$username@$ldap_domain", $password);

if ($ldap_bind) {
    // Authentication successful

    // Use LDAP queries or other methods to determine the user's department
    $user_department = "IT"; // Replace this with actual department information

    // Redirect based on the user's department
    switch ($user_department) {
        case "IT":
            header("Location: departments/adminView.html");
            break;
        case "HR":
            header("Location: departments/hrOfficer.html");
            break;
        case "insurance":
            header("Location: departments/insuranceinvestigations.html");
            break;
        case "geography":
            header("Location: departments/Geographic.html");
            break;
        case "health":
            header("Location: departments/Health.html");
            break;
        case "financial":
            header("Location: departments/Financial.html");
            break;
        case "legal":
            header("Location: departments/Legal.html");
            break;
        case "cybersecurity":
            header("Location: departments/cybersecurity.html");
            break;
        case "claims":
            header("Location: departments/claims.html");
            break;
        case "carinsurance":
            header("Location: departments/carinsurance.html");
            break;
        case "business":
            header("Location: departments/Business.html");
            break;
        default:
            // Redirect to a generic error page or handle accordingly
            header("Location: departments/error.html");
            break;
    }
    exit(); // Ensure the script exits after the redirect
} else {
    // Authentication failed
    echo "Authentication failed. Please check your username and password.";
}

// Close the LDAP connection
ldap_close($ldap_conn);
?>
