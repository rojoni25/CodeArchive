

<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript">
		
		function clrpost(){

			document.getElementById('recentPost').style.display='none';
			document.getElementById('RecentProblem').style.display='none';
			document.getElementById('PostForm').style.display='none';
			document.getElementById('PostProblem').style.display='none';
			document.getElementById('postbyC').style.display='none';
			document.getElementById('postbyCpp').style.display='none';
			document.getElementById('postbyJava').style.display='none';
			document.getElementById('postbyPy').style.display='none';
			document.getElementById('postbyPhp').style.display='none';
			document.getElementById('postbyAsm').style.display='none';
			window.scrollTo(0, 0);
		}

	</script>
</head>
<body>
<!--Navigation Bar-->
	<nav class="navbar navbar-expand-xl bg-dark navbar-dark justify-content-between fixed-top">
        <a class="navbar-brand btn" style="color: orange;" href="#">Code Archive</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li ><a class="nav-link btn active" href="http://localhost/codearchive/" onclick=" clrpost(); document.getElementById('recentPost').style.display='block'; window.scrollTo(0, 0);" >Home</a></li>

        <li ><a class="nav-link btn" href="http://localhost/codearchive/" onclick="clrpost();document.getElementById('recentPost').style.display='block'; window.scrollTo(0, 0);" >Recent Posts</a></li>

        <li><a class="nav-link btn" href="http://localhost/codearchive/problems" onclick="clrpost(); document.getElementById('RecentProblem').style.display='block'; window.scrollTo(0, 0); document.getElementById('PostProblem').style.display='none';" >Recent Problems</a></li>

        <li><a class="nav-link btn" href="http://localhost/codearchive/ProblemForm.php" onclick="clrpost(); document.getElementById('PostProblem').style.display='block'; window.scrollTo(0, 0);">Ask a Question</a></li>

        <li><a class="nav-link btn" href="http://localhost/codearchive/posts" onclick="clrpost(); document.getElementById('PostForm').style.display='block'; window.scrollTo(0, 0);">Submit a Solution</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link btn dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        Codes
                    </a>
                    <ul class="dropdown-menu bg-dark navbar-dark">
                        <li class="btn nav-item d-flex justify-content-between align-items-center" onclick=" clrpost(); document.getElementById('postbyC').style.display='block';">
					<a class="linkcolor btn" href="#C" onclick=" clrpost(); document.getElementById('postbyC').style.display='block';">C</a>
					<span class="badge badge-primary badge-pill"><?php countbycat('C');?></span>
				</li>
				<li class="btn nav-item d-flex justify-content-between align-items-center" onclick=" clrpost(); document.getElementById('postbyCpp').style.display='block';">
					<a class="linkcolor btn" href="#CPP" onclick=" clrpost(); document.getElementById('postbyCpp').style.display='block';">C++</a>
					<span class="badge badge-primary badge-pill"><?php countbycat('CPP');?></span>
				</li>
				<li class="btn nav-item d-flex justify-content-between align-items-center" onclick=" clrpost(); document.getElementById('postbyJava').style.display='block';">
					<a class="linkcolor btn" href="#Java" onclick=" clrpost(); document.getElementById('postbyJava').style.display='block';">Java</a>
					<span class="badge badge-primary badge-pill"><?php countbycat('Java');?></span>
				</li>
				<li class="btn nav-item d-flex justify-content-between align-items-center" onclick=" clrpost(); document.getElementById('postbyPy').style.display='block';">
					<a class="linkcolor btn" href="#Python" onclick=" clrpost(); document.getElementById('postbyPy').style.display='block';">Python</a>
					<span class="badge badge-primary badge-pill"><?php countbycat('Py');?></span>
				</li>
				<li class="btn nav-item d-flex justify-content-between align-items-center" onclick=" clrpost();document.getElementById('postbyPhp').style.display='block';">
					<a class="linkcolor btn" href="#PHP" onclick=" clrpost();document.getElementById('postbyPhp').style.display='block';">PHP</a>
					<span class="badge badge-primary badge-pill"><?php countbycat('PHP');?></span>
				</li>
				<li class="btn nav-item d-flex justify-content-between align-items-center" onclick="  clrpost(); document.getElementById('postbyAsm').style.display='block';">
					<a class="linkcolor btn" href="#Assembly" onclick="  clrpost(); document.getElementById('postbyAsm').style.display='block';">Assembly</a>
					<span class="badge badge-primary badge-pill"><?php countbycat('Asm');?></span>
				</li>
                    </ul>
                </li>

                <li class="nav-item"><form class="navbar-form form-inline" action="#" method="post">
			<input class="form-control mr-sm-2" type="text" name="Searchqry" id="Searchqry" placeholder="Type to Search">
			<input class="btn btn-success" type="submit" name="Searchbtn" id="Searchbtn" value="Search">
		</form>
            </li>
            

                    
<?php 
if (isset($_SESSION['caemail'])|| isset($_POST['login'])){echo '
				<li class="nav-item">
					<a class="linkcolor btn" href="#" data-toggle="modal" data-target="#User">'; echo $Dname;echo'</a>
				</li>

			';}

else{
            echo '
			<li class="nav-item">
				<a class="linkcolor btn" href="#" data-toggle="modal" data-target="#Login">Login</a>
			</li>
				<li class="nav-item">
					<a class="linkcolor btn" href="#" data-toggle="modal" data-target="#Register">Register</a>
				</li>
			</ul>';}
?>
        </div>
    </nav>
		<!--Navigation Bar end-->
	

</body>
</html>