<?php
// Fetch pending comments
$query = $conn->prepare("SELECT * FROM comments WHERE status = 'pending'");
$query->execute();
$result = $query->get_result();
while ($comment = $result->fetch_assoc()) {
    echo "<p>{$comment['comment']}</p>";
    echo "<a href='?approve_id={$comment['id']}'>Approve</a>";
    echo "<a href='?reject_id={$comment['id']}'>Reject</a>";
    echo "<a href='?delete_id={$comment['id']}'>Delete</a>";
}

// Handle actions
if (isset($_GET['approve_id'])) {
    $id = $_GET['approve_id'];
    $query = $conn->prepare("UPDATE comments SET status = 'approved' WHERE id = ?");
    $query->bind_param('i', $id);
    $query->execute();
}
?>
