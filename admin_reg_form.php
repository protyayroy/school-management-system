<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration Form</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 ad_heading text-center mt-4">
                <h2>Admin Registration Form</h2>
                <hr>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis pariatur quos quasi aperiam eveniet repellendus distinctio quam quis quidem. Quibusdam.
                    <span class="d-block"><i><b>To know more about our school,Please register this form.</b></i></span>
                </p>
            </div>
            <div class="col-md-6 offset-3 mt-5 bg-success py-3">
                <form id="admin_form">
                    <div class="form-group">
                        <label for="name">Enter Your Name</label>
                        <input type="text" class="form-control" id="nam">
                    </div>
                    <div class="form-group">
                        <label for="name">Enter Your Password</label>
                        <input type="text" class="form-control" id="pass">
                    </div>
                    <div class="form-group mt-5 clearfix">
                        <input type="submit" class="btn btn-primary" value="Register Here" id="reg">
                        <span class="float-right">
                            If you have an account ? <a class="text-white" href="admin_login.php">login here</a>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="js/jquery-1.12.4.min.js"></script>
    <script src="js/popper.min.js"></script>

    <script src="js/script.js"></script>
    <script>
        $(document).ready(function() {
            $("#reg").on("click", function(e) {
                e.preventDefault();
                var nam = $("#nam").val();
                var password = $("#pass").val();
                $.post(
                    "admin-data-insert.php", {
                        name: nam,
                        pass: password
                    },
                    function(data) {
                        if (data == 1) {
                            alert("Registration Successful");
                            // $("#admin_form").trigger("reset");
                            // header("location:admin_login.php");
                            window.open('admin_login.php','_self');
                        } else {
                            alert("wrong")
                        }
                    }
                );
            });
        });
    </script>
</body>

</html>