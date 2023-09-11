<?php
// Ensure this file is being accessed from a WordPress context
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

// Check if courseId is set in the GET request
if (isset($_GET['courseId']) && !empty($_GET['courseId'])) {
    global $wpdb; // WordPress database object

    $courseId = intval($_GET['courseId']); // Sanitize input

    // SQL DELETE query
    $result = $wpdb->delete(
        'wpou_mscm_course', // Table name
        array('courseId' => $courseId), // WHERE clause
        array('%d') // Data format
    );

    // Check result and provide feedback
    if ($result !== false) {
        // Redirect back with a success message (you can customize the message as needed)
        wp_redirect(admin_url('admin.php?page=fdq-ms-courses.php&message=success'));
    } else {
        // Redirect back with an error message (you can customize the message as needed)
        wp_redirect(admin_url('admin.php?page=fdq-ms-courses.php&message=error'));
    }
} else {
    // Redirect back with an error message if courseId is not provided
    wp_redirect(admin_url('admin.php?page=fdq-ms-courses.php&message=missing_id'));
}
exit;
?>
