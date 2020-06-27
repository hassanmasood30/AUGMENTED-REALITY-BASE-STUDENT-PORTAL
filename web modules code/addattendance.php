<?php
session_start();
if(!isset($_SESSION['isLogin'])){
	
        	header('location:index.php');

}elseif($_SESSION['isLogin'] == 'FALSE'){
    header('location:index.php');
}

?>
<!DOCTYPE html>
<html>
<head>
  <title>ADD ATTENDANCE</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">




</head>

<style type="text/css">

body {
    font-family: 'Poppins', sans-serif;
    background: #fafafa;
}

p {
    font-family: 'Poppins', sans-serif;
    font-size: 1.1em;
    font-weight: 300;
    line-height: 1.7em;
    color: #999;
}

a,
a:hover,
a:focus {
    color: inherit;
    text-decoration: none;
    transition: all 0.3s;
}

.navbar {
    padding: 15px 10px;
    background: #fff;
    border: none;
    border-radius: 0;
    margin-bottom: 40px;
    box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
}

.navbar-btn {
    box-shadow: none;
    outline: none !important;
    border: none;
}

.line {
    width: 100%;
    height: 1px;
    border-bottom: 1px dashed #ddd;
    margin: 40px 0;
}

/* ---------------------------------------------------
    SIDEBAR STYLE
----------------------------------------------------- */

.wrapper {
    display: flex;
    width: 100%;
    align-items: stretch;
}

#sidebar {
    min-width: 250px;
    max-width: 250px;
    background: #7386D5;
    color: #fff;
    transition: all 0.3s;
}

#sidebar.active {
    margin-left: -250px;
}

#sidebar .sidebar-header {
    padding: 20px;
    background: #6d7fcc;
}

#sidebar ul.components {
    padding: 20px 0;
    border-bottom: 1px solid #47748b;
}

#sidebar ul p {
    color: #fff;
    padding: 10px;
}

#sidebar ul li a {
    padding: 10px;
    font-size: 1.1em;
    display: block;
}

#sidebar ul li a:hover {
    color: #7386D5;
    background: #fff;
}

#sidebar ul li.active>a,
a[aria-expanded="true"] {
    color: #fff;
    background: #6d7fcc;
}

a[data-toggle="collapse"] {
    position: relative;
}

.dropdown-toggle::after {
    display: block;
    position: absolute;
    top: 50%;
    right: 20px;
    transform: translateY(-50%);
}

ul ul a {
    font-size: 0.9em !important;
    padding-left: 30px !important;
    background: #6d7fcc;
}

ul.CTAs {
    padding: 20px;
}

ul.CTAs a {
    text-align: center;
    font-size: 0.9em !important;
    display: block;
    border-radius: 5px;
    margin-bottom: 5px;
}

a.download {
    background: #fff;
    color: #7386D5;
}

a.article,
a.article:hover {
    background: #6d7fcc !important;
    color: #fff !important;
}

/* ---------------------------------------------------
    CONTENT STYLE
----------------------------------------------------- */

#content {
    width: 100%;
    padding: 20px;
    min-height: 100vh;
    transition: all 0.3s;
}

/* ---------------------------------------------------
    MEDIAQUERIES
----------------------------------------------------- */

@media (max-width: 768px) {
    #sidebar {
        margin-left: -250px;
    }
    #sidebar.active {
        margin-left: 0;
    }
    #sidebarCollapse span {
        display: none;
    }
}


.footer {

   left: 0;
   bottom: 0;
   width: 100%;
   background-color: rgb(56, 55, 55);
   color: white;

}
.footercolor{
  color: antiquewhite;
}

</style>


<body>


        <div class="wrapper">
                <!-- Sidebar  -->
                <nav id="sidebar">
                    <div class="sidebar-header">
                        <h3>Admin Page</h3>
                    </div>

                    <ul class="list-unstyled components">
                    <li>

<a href="HOMEPAGE.php">Home</a>
 </li>

                    <li>

                      <a href="homeregstd.php">Register Student</a>
                    </li>

                    <li>
                            <a href="#ageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Manage Timetable</a>
                            <ul class="collapse list-unstyled" id="ageSubmenu">
                                <li>
                                    <a href="timetable.php">Add Timetable</a>
                                </li>
                               
                                <li>
                                    <a href="updatetimetable.php">Update Timetable</a>
                                </li>

                            </ul>
                        </li>
                        <li>
                            <a href="#Submenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Manage Marks</a>
                            <ul class="collapse list-unstyled" id="Submenu">
                            <li>
                                    <a href="addmarks.php">Add Marks</a>
                                </li>
                               
                                <li>
                                    <a href="updatemarks.php">Update Marks</a>
                                </li>

                            </ul>
                           </li>
            
                        <li>
                            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Manage Attendence</a>
                            <ul class="collapse list-unstyled" id="pageSubmenu">
                            <li>
                                    <a href="addattendance.php">Add Attendence</a>
                                </li>
                               
                                <li>
                                    <a href="updateattendance.php">Update Attendence</a>
                                </li>

                            </ul>
                        </li>

                        <li>
                            <a href="courseregister.php">Course Registration</a>
                        </li>
                        <li>
                            <a href="logout_logic.php">Logout</a>
                        </li>
                    </ul>


                </nav>

                <!-- Page Content  -->
                <div id="content">

                    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
                        <div class="container-fluid">




                            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                                <ul class="nav navbar-nav ml-auto">
                                    <li class="nav-item active">
                                       <h3 style="margin-left:-2% ;color: white">AUGMENTED REALITY BASED STUDENT PORTAL INFORMATION SYSTEM</h3>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </nav>
                    <div class="container">

                    <div class="line"></div>

                    <h3>&nbsp;&nbsp;ADD ATTENDANCE</h3><br>

                    <div class="container" >
                    <form method="POST" action="addattendance_logic.php">

                    <div class="form-group"  style="width:50%">
					<span class="label-input100">Session:</span>
					<div>
						<select class="form-control" name ="aname" id="select_catalog" required>
							<option value="">Select Session</option>
                 <?php
                         $con = mysqli_connect("localhost","root","","test");
                         $sql = "SELECT DISTINCT session_id from student";
			             $result = mysqli_query($con,$sql);	
                        if(mysqli_num_rows($result) > 0)
                         {
                         while ($row = mysqli_fetch_array($result))
                         {
                       
                          echo  "<option>" .$row['session_id']."</option>";
                        
                        }
						    
                        }
						
                       else
                       {
                       echo "No Data Found";
                       } 
                ?>
						</select><br>
					
                </div>
                  </div>   

                     <div class="form-group"  style="width:50%">
					<span class="label-input100">Program:</span>
					<div>
						<select class="form-control" name ="bname" id="select_catalog" required>
							<option value="">Select program</option>
                 <?php
                         $con = mysqli_connect("localhost","root","","test");
                         $sql = "SELECT DISTINCT program_id from student";
			             $result = mysqli_query($con,$sql);	
                        if(mysqli_num_rows($result) > 0)
                         {
                         while ($row = mysqli_fetch_array($result))
                         {
                       
                          echo  "<option>" .$row['program_id']."</option>";
                        
                        }
						    
                        }
						
                       else
                       {
                       echo "No Data Found";
                       } 
                ?>
						</select><br>
					
                </div>
                </div>
                
                <div class="form-group"  style="width:50%">
					<span class="label-input100">Registered Student:</span>
					<div>
						<select class="form-control" id="select_catalog4" onchange="myFun()" required>
							<option value="">Select Student</option>
                 <?php
                         $con = mysqli_connect("localhost","root","","test");
                         $sql = "SELECT DISTINCT student.session_id,student.program_id,student_involve.student_id,student.student_name from student RIGHT JOIN student_involve ON student.student_id = student_involve.student_id";
			             $result = mysqli_query($con,$sql);	
                        if(mysqli_num_rows($result) > 0)
                         {
                         while ($row = mysqli_fetch_array($result))
                         {
                       
                          echo  "<option>" .$row['student_id']." :: ".$row['session_id']." - ".$row['program_id']." - " .$row['student_id']." : " .$row['student_name']."</option>";
                        
                        }
						    
                        }
						
                       else
                       {
                       echo "No Data Found";
                       } 
                ?>
						</select><br>
					
                </div>
                  </div> 
                  <div class="form-group" style="width:50%">
                                <label >Student Reg:</label>

                                <input type="text" class="form-control"  placeholder="Registration No"  name="cname" id="SID2">
                              </div><br>


                
                       
                  <div class="form-group"  style="width:50%">
					<span class="label-input100">Course:</span>
					<div>
						<select class="form-control" id="select_catalog1" onchange="myFunction()" required>
							<option value="">Select course</option>
                 <?php
                         $con = mysqli_connect("localhost","root","","test");
                         $sql =  "SELECT DISTINCT student_involve.course_id ,course.course_name from course RIGHT JOIN student_involve ON course.course_id = student_involve.course_id ";
			             $result = mysqli_query($con,$sql);	
                        if(mysqli_num_rows($result) > 0)
                         {
                         while ($row = mysqli_fetch_array($result))
                         {
                       
                          echo  "<option>" .$row['course_id']." : ".$row['course_name']."</option>";
                        
                        }
						    
                        }
						
                       else
                       {
                       echo "No Data Found";
                       } 
                ?>
						</select><br>
					
                </div>
                  </div> 
                  <div class="form-group" style="width:50%">
                                <label >Program Code:</label>

                                <input type="text" class="form-control"  placeholder="Course code" name="dname" id="SID">
                              </div><br>
                              
                              <div class="form-group" style="width:50%">
                                <label >Select Date:</label>

                                <input type="date" class="form-control"  placeholder="Select date" name="ename">
                              </div><br>
                              
                              <div class="form-check">
    <input type="checkbox" class="form-check-input"value="Present" id="exampleCheck1" name="fname[]">
    <label class="form-check-label" for="exampleCheck1">Present</label>
  </div> <br>
  <div class="form-check">
    <input type="checkbox" class="form-check-input" value="Absent" id="exampleCheck1" name="fname[]">
    <label class="form-check-label" for="exampleCheck1">Absent</label>
  </div><br>
                       
                 <button type="submit" class="btn btn-dark">MARK ATTENDANCE</button>

                 </form>
                    </div>
                    </div>

                    <div class="line"></div>

                    <script>
function myFunction() {
  var x = document.getElementById("select_catalog1").value;
  var x1 = x.split(" ");
  document.getElementById("SID").value = x1[0];
}

function myFun() {
  var x = document.getElementById("select_catalog4").value;
  var x1 = x.split(" ");
  document.getElementById("SID2").value = x1[0];
}
</script>

</body>
</html>
