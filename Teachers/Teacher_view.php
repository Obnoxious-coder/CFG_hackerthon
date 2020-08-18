
<?php  
$link = mysqli_connect("localhost", "root", "Jonathan@123","cfg");
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
else 
{
  echo "";
}
session_start();
echo "";


$id=$_SESSION['id']
?>
  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="TeacherView.css">
</head>
<body>
   <div class="container-fluid mt-1 w-100">
    <div class="row">
<!--   SideNav    -->
        <nav class="col-md-3 col-lg-2 d-md-blockbg-light sidebar-collapse border-right">
            <div class="sidebar-sticky pt-3">

        <h4 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span><?php echo $_SESSION["name"] ?></span>
          <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
            <span data-feather="plus-circle"></span>
          </a>
        </h4>
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-1 mb-1 text-muted">
          <span><?php echo $_SESSION["id"] ?></span>
          <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
            <span data-feather="plus-circle"></span>
          </a>
        </h6>
      </div>
        </nav>
<!--   SideNav    -->
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        <a href="../Logout.php"><button class="align-self-end btn blue-bg mb-1 text-white">Logout</button></a>
      </div>
       <!--    Basic Stats     -->
          <div class="row">
             <div class="col">
              <div class="card bg-secondary text-center">
                <h4>Total Students</h4>
                <p><?php 
                $connect =  mysqli_connect('localhost', 'root' , 'Jonathan@123', 'cfg');
                $query = "SELECT count(name) as count FROM `users` where classid='$id' and job='0'";
                $result = mysqli_query($connect , $query);
                $row=mysqli_fetch_assoc($result);
                echo $row['count'];
                ?></p>
              </div>
              </div>
              <div class="col">
              <div class="card bg-secondary text-center">
                <h4>Assignments</h4>
                <p>NO_OF_STUDENTS</p>
              </div>
              </div>
              <div class="col">
              <div class="card bg-secondary text-center">
                <h4>View Submissions</h4>
                <p><a href="../viewSubmissionTeachers.php">Click Here</a></p>
              </div>
              </div>
          </div>
    <!--    Basic Stats     -->
    <hr>
    <!--   Scrollable Text View    -->

    <!--     Dynamically Generated list of cards         -->
    <?php
$connect =  mysqli_connect('localhost', 'root' , 'Jonathan@123', 'cfg');
$query = "SELECT min(marks) as min,max(marks) as max,avg(marks) as avg FROM `scores` where assign='1'";
$result = mysqli_query($connect , $query);

//$resultCount=$result->num_rows;

$color = ['#dc7877','#9cbb73','#9ee2d9','#9f9ee2','#e29eba'];
$scores = ['min','max','avg'];
$test1 = array();
$test2 = array();
$row = mysqli_fetch_assoc($result);
//for($i=0;$i<5;$i++)
 {
    $test1[0] = $row["min"];
    $test1[1]= $row["max"];
    $test1[2]=$row["avg"];
    

}
$query1 = "SELECT min(marks) as min,max(marks) as max,avg(marks) as avg FROM `scores` where assign='2'";
$result = mysqli_query($connect , $query1);
$row = mysqli_fetch_assoc($result);
$test2[0] = $row["min"];
    $test2[1]= $row["max"];
    $test2[2]=$row["avg"];
    

?>

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['scores','test1','test2'],
        <?php
        for($i=0;$i<3;$i++){
          ?>[<?php 
    
    echo "'".$scores[$i]."',".$test1[$i].", ".$test2[$i]." "
 ?>],  <?php } 
        ?>


          //['scores', 'TEST1', 'TEST2'],
         // ['min',  600,      400],
         // ['average',  900,      700],
          //['max',  1000,       1120]
        ]);

        var options = {
          title: 'Class Performance in previous tests',
          hAxis: {title: 'Scores',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0}
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="chart_div" style="width: 100%; height: 300px;"></div>
  </body>
</html>


               
        <!--     Dynamically Generated list of cards         -->
           </div>
<!--
           <div class="card w-25" >
              <form-group class="p-1" id="Assignment-form">
                 <div class="card-title">
                  <input type="text" name="title" id="" class="w-100" placeholder="Title">
                  <textarea name="details" id="" cols="30" rows="10" placeholder="Details" ></textarea>
                 </div>
              </form-group>
          </div>
-->
           <button class="btn btn-primary" id="add_button"><span id="add_plus">+</span></button>
    <!--   Scrollable Text View    -->
      
       <hr>
        <!--   File upload   -->
        <form action="teacheruploadsfile.php" method="POST">
       <form-gorup class=" p-1">
         <h2>Upload link here</h2>
         <textarea name="title" id="" cols="4" rows="1" placeholder="Title" class="form-control mt-4"></textarea>
          <textarea name="link" id="" cols="4" rows="1" placeholder="Enter link" class="form-control mt-4"></textarea>
            <input type="submit" value="Submit" onclick="submit()" class="btn btn-success mt-2">
       </form-gorup>
       </form>
       <!--   File upload   -->
       <hr>
    <!--   SMS Text Area    -->
          <form action="../sms.php" method=POST>
             <label for="SMS message"><h3 class="m-0 p-0">Send SMS</h3></label>
              <textarea name="mes" id="" cols="30" rows="10" placeholder="Type the SMS message here" class="form-control mt-4"></textarea>
              <input type="submit" value="Send" class="btn btn-success mt-2">
          </form>
          <hr>
      <!--   SMS Text Area    -->

        </main>
    </div>
      </div>

      
       
</body>
</html>




<!--
 <article class='container  h-100 bg-secondary'  id="side_nav">
        <div class="container">
            <h1>Teacher</h1>
            <h3>NAME_OF_TEACHER</h3>
        </div>
    </article>
    <main>
        
    </main>-->
