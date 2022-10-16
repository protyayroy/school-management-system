<h4 class="text-center dash_h">Dashboard</h4>
<nav class="navbar navbar-expand-lg px-0">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav flex-column s_nav">
            <li class="nav-item active">
                <a class="nav-link 
                <?php if ( $active  == "profile") { echo "active_nav"; } ?>
                " href="t_dash.php">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link
                <?php if ( $active  == "handled_class") { echo "active_nav"; } ?>
                " href="handled-class.php">Handled Class</a>
            </li>
            <li class="nav-item">
                <a class="nav-link
                <?php if ( $active  == "student") { echo "active_nav"; } ?>
                " href="student.php">Students</a>
            </li>
            <li class="nav-item">
                <a class="nav-link
                <?php if ( $active  == "view_student") { echo "active_nav"; } ?>
                " href="view-student.php" target="_blank">View Student</a>
            </li>
            <li class="nav-item">
                <a class="nav-link
                <?php if ( $active  == "view_exam") { echo "active_nav"; } ?>
                " href="view-exam-time.php">View Exam</a>
            </li>
            <li class="nav-item">
                <a class="nav-link
                <?php if ( $active  == "add_mark") { echo "active_nav"; } ?>
                " href="add-mark.php">Add Marks</a>
            </li>
            <li class="nav-item">
                <a class="nav-link
                <?php if ( $active  == "view_mark") { echo "active_nav"; } ?>
                " href="view-mark.php">View Marks</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="t_logout.php">Logout</a>
            </li>
        </ul>
    </div>
</nav>
