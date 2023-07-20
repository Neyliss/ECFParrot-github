
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the submitted comment data
    $name = $_POST["name"];
    $rating = $_POST["rating"];
    $comment = $_POST["comment"];
    $timestamp = time(); // Generate a unique timestamp for the comment

    // Create a new comment object
    $newComment = [
        "id" => $timestamp,
        "name" => $name,
        "rating" => $rating,
        "comment" => $comment,
        "approved" => false // Set the 'approved' property to false by default
    ];

    // Save the comment to a file or database (you can customize this part)
    $comments = json_decode(file_get_contents("comments.json"), true) ?? [];
    $comments[] = $newComment;
    file_put_contents("comments.json", json_encode($comments));

    echo "Comment submitted successfully! It will be reviewed before publication.";
}


