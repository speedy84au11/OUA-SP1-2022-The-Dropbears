<?php   include("./inc/header.php"); ?>  

<div class="report-wrapper">
    <section class="report-top">
        <ul class="breadcrumb">
            <li><a href="index.php">Home/</a></li>
            <li><a href="report.php">Report</a></li>
        </ul>
    </section>
</div>


<?php
if(isset($_POST['report-submit'])) {
    $country = $_POST['country'];
    $state = $_POST['state'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $genderOrientation = $_POST['gender-orientation'];
}

if($age == "01-18") {
    $minAge = 1;
    $maxAge = 18;
} elseif ($age == "19-29") {
    $minAge = 19;
    $maxAge = 29;
} elseif ($age == "30-39") {
    $minAge = 30;
    $maxAge = 39;
} elseif ($age == "40-49") {
    $minAge = 40;
    $maxAge = 49;
} elseif ($age == "50-59") {
    $minAge = 50;
    $maxAge = 59;
} elseif ($age == "60-69") {
    $minAge = 60;
    $maxAge = 69;
} elseif ($age == "70-99") {
    $minAge = 70;
    $maxAge = 99;
} 

//   Get number of rows
$sql = "SELECT * FROM users";
//Prepare the SQL statement.
$stmt = $conn->prepare($sql);
//Execute the statement.
$stmt->execute();
$count = $stmt->rowCount();

// Age
$sql = "SELECT dob FROM users";
// Prepare the SQL statement.
$stmt = $conn->prepare($sql);
//Execute the statement.
$stmt->execute();
$dobs = $stmt->fetchAll();
$ageCounter = 0;
foreach($dobs as $dob) {
    $dateOfBirth = $dob["dob"];
    $today = date("Y-m-d");
    $diff = date_diff(date_create($dateOfBirth), date_create($today));
    $diff = $diff->format("%y");

    if(($diff >= $minAge) && ($diff <= $maxAge)) {
        $ageCounter = $ageCounter + 1;
    }  
}

// Country
$sql = "SELECT * FROM users WHERE country='$country'";
//Prepare the SQL statement.
$stmt = $conn->prepare($sql);
//Execute the statement.
$stmt->execute();
$countryCount = $stmt->rowCount();


// State
$sql = "SELECT * FROM users WHERE state='$state'";
//Prepare the SQL statement.
$stmt = $conn->prepare($sql);
//Execute the statement.
$stmt->execute();
$stateCount = $stmt->rowCount();


// Gender 
$sql = "SELECT * FROM users WHERE gender='$gender'";
//Prepare the SQL statement.
$stmt = $conn->prepare($sql);
//Execute the statement.
$stmt->execute();
$genderCount = $stmt->rowCount();

// Gender orientation
$sql = "SELECT * FROM users WHERE gender_orientation='$genderOrientation'";
//Prepare the SQL statement.
$stmt = $conn->prepare($sql);
//Execute the statement.
$stmt->execute();
$genderOrientationCount = $stmt->rowCount();
?>

<div class="report-data">
<h1>Report Data</h1>
</div>

<div class="report-display-wrapper">
    <div class="report-display-content">   
        <p> <?php echo "<span>" . $countryCount . " of " . $count . "</span> registered users are from <span>" . $country . "<span>"; ?></p>
        <p><?php echo "<span>" . $stateCount . " of " . $count . "</span> registered users are from <span>" . $state . "<span>"; ?></p>
        <p><?php echo "<span>" . $genderCount . " of " . $count . "</span> registered users are <span>" . $gender . "<span>"; ?></p>
        <p><?php echo "<span>" . $genderOrientationCount . " of " . $count . "</span> registered users are <span>" . $genderOrientation . "<span>"; ?></p>
        <p><?php echo "<span>" . $ageCounter . " of " . $count . "</span> registered users are between <span>" . $age . "<span>"; ?></p>
        <button>Save As CSV file</button>
    </div>
</div>


























<?php   include("./inc/footer.php");  ?>