<h4 class="text-center dash_h">Dashboard</h4>
<nav class="navbar navbar-expand-lg px-0">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav flex-column s_nav">
            <li class="nav-item active">
                <a class="nav-link 

                <?php if (isset($_GET["page"]) && $_GET["page"] == "school_info") {
                    echo "active_nav";
                } else {
                    echo "";
                } ?> " href="a_dash.php?page=school_info">School Information</a>
            </li>
            <li class="nav-item">
                <a class="nav-link

                <?php if (isset($_GET["page"]) && $_GET["page"] == "class") {
                    echo "active_nav";
                } else {
                    echo "";
                } ?> " href="a_dash.php?page=class">Class</a>
            </li>
            <li class="nav-item">
                <a class="nav-link

                <?php if (isset($_GET["page"]) && $_GET["page"] == "subject") {
                    echo "active_nav";
                } else {
                    echo "";
                } ?> " 

                href="a_dash.php?page=subject">Subject</a>
            </li>
            <li class="nav-item">
                <a class="nav-link

                <?php if (isset($_GET["page"]) && $_GET["page"] == "add_staff") {
                    echo "active_nav";
                } else {
                    echo "";
                } ?> " 
 
                href="a_dash.php?page=add_staff">Staff</a>
            </li>
            <li class="nav-item">
                <a class="nav-link

                <?php if (isset($_GET["page"]) && $_GET["page"] == "view_staff") {
                    echo "active_nav";
                } else {
                    echo "";
                } ?> " 
                
                href="a_dash.php?page=view_staff">View Staff</a>
            </li>
            <li class="nav-item">
                <a class="nav-link

                <?php if (isset($_GET["page"]) && $_GET["page"] == "set_exam") {
                    echo "active_nav";
                } else {
                    echo "";
                } ?>"  

                href="a_dash.php?page=set_exam">Set Exam</a>
            </li>
            <li class="nav-item">
                <a class="nav-link

                <?php if (isset($_GET["page"]) && $_GET["page"] == "view_exam") {
                    echo "active_nav";
                } else {
                    echo "";
                } ?> " 
                
                href="a_dash.php?page=view_exam">View Exam</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="student-details.php" target="_blank">View Student</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="a_logout.php">Logout</a>
            </li>
        </ul>
    </div>
</nav>
