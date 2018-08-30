<?php 
include_once "../../assets/Users.php";
$database = new Database();
$conn = $database->getConnection();

if(isset($_SESSION['club'])){
    $club = $_SESSION["club"];}
else{
    echo 'No Club';
    die;
    }

switch ($page) {
    case 'article':
        $display= "CALL `show_articles`('$club');";
        break;
    case 'course':
    $display= "CALL `show_courses`('$club');";
        break;
    case 'ebook':
    $display= "CALL `show_ebooks`('$club');";
        break;
    case 'online_test':
    $display= "CALL `show_online_tests`('$club');";
        break;
    case 'video':
    $display= "CALL `show_videos`('$club');";
        break;
    case 'webinar':
    $display= "CALL `show_webinars`('$club');";
        break;
    case 'workshop':
    $display= "CALL `show_workshops`('$club');";
        break;
    default:
        echo 'error';
}

$result = $conn->query($display);
echo("<table>");
$first_row = true;
while ($row = mysqli_fetch_assoc($result)) {
    if ($first_row) {
        $first_row = false;
        // Output header row from keys.
        echo '<tr>';
        foreach($row as $key => $field) {
            echo '<th>' . htmlspecialchars($key) . '</th>';
        } 
        echo '</tr>';
    }
    echo '<tr>';
    foreach($row as $key => $field) {
        echo '<td>' . strip_tags($field) . '</td>';
    }
    echo '</tr>';
}
echo("</table>");
$conn->close();
?>
<style>
    table{border-collapse: collapse;}
    td,th{
        border: 1px solid #ddd;
        padding: 8px;
    }
    tr:nth-child(even){background-color: #f2f2f2;}
    tr:hover {background-color: #ddd;}
    th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
}
</style>
