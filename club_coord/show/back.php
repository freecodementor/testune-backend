<?php 
include_once "../../assets/Users.php";
$database = new Database();
$conn = $database->getConnection();
$page = pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);
$id=$_GET['id'];

if(isset($_SESSION['club_id'])){
    $club_id= $_SESSION["club_id"];}
else{
    echo 'No Club';
    die;
    }

switch ($id) {
    case 'article':
        $display= "CALL `show_summary`('$club_id');";
        break;
    case 'course':
    $display= "CALL `show_courses`('$club_id');";
        break;
    case 'ebook':
    $display= "CALL `show_ebooks`('$club_id');";
        break;
    case 'online_test':
    $display= "CALL `show_online_tests`('$club_id');";
        break;
    case 'video':
    $display= "CALL `show_videos`('$club_id');";
        break;
    case 'webinar':
    $display= "CALL `show_webinars`('$club_id');";
        break;
    case 'workshop':
    $display= "CALL `show_workshops`('$club_id');";
        break;
    default:
        echo 'error';
}

$result = $conn->query($display);
if (mysqli_num_rows($result)>0)
{
echo '<br>';
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
}
    else {
        echo "<table><tr><th>$id details</th></tr><tr><td>NO DATA</td></tr>";
    }

echo("</table>");
$conn->close();
?>
<style>
    table{border-collapse: collapse;
        min-width:50em;}
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
