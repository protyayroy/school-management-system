<div class="col-md-6 m-auto">
    <form id="search-form">
        Search Staff:
        <input type="text" id="txt" class="form-control" autocomplete="off">
    </form> <br>
    <div id="box">
        <table class="table table-striped table-bordered mb-5"></table>
    </div>
</div>
<script>
    $(document).ready(function() {
        $("#txt").on("keyup", function() {
            var search = $(this).val();
            if (search == "") {
                $("#box").hide();
            } else {
                $.post("search.php", {
                    s_name: search
                }, function(data) {
                    $("#box table").html(data);
                    $("#box").show();
                })
                // $.ajax({
                //     url: "search.php",
                //     type: "POST",
                //     data: {
                //         s_name: search
                //     },
                //     success: function(data) {
                //         $("#box").show();
                //         $("#box").html(data);
                //     }
                // });
            }
        });
        $(document).on("click", ".del", function() {
            // var idName = sessionStorage.getItem($_SESSION["staffname"]);alert(idName);system.exit();
            if (confirm("Do you want to delete")) {
                var deleteStaff = $(this).data("id");
                var element = this;
                $.post("staff_delete.php", {
                    id: deleteStaff
                }, function(data) {
                    if(data == 1){
                        // $(element).closest("tr").fadeOut();
                    }
                });
            }
        });
    });
</script>