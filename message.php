<?php
//chatbot == db && bot == table
//Connect to db
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "chatbot";
$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName) or die("Database Error");


//Get user msg through ajax
$getMsg = mysqli_real_escape_string($conn, $_POST['text']);


//Check user query to db query
$check_data = "SELECT replies FROM bot WHERE queries LIKE '%$getMsg%'";
$run_query = mysqli_query($conn, $check_data) or die("Query Error");

//Check if user query matched to db queries we will get corresponding reply from db
if(mysqli_num_rows($run_query) > 0){
    //Fetch reply from the Database
    $fetch_data = mysqli_fetch_assoc($run_query);
    //Store reply to a variable
    $reply = $fetch_data['replies'];
    echo  $reply;
}else{
    echo "Sorry I am not able to clearly understand you, would you like to talk to one of our experts?";
}
?>