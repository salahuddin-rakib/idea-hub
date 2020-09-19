<!doctype html>
<html>
<?php include 'head.php'; ?>
<body>
<div class="container">
    <div class="row">
        <div class="col-12">
            <?php include 'header.php'; ?>
            <?php include 'model.php'; ?>
            <div class="row justify-content-center">
                <div class="col-8">
                    <form id="sign-in-form">
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input name="email" type="email" class="form-control" id="email" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input name="password" type="password" class="form-control" id="password"
                                   placeholder="Password">
                        </div>
                        <button type="button" id="submit-btn" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
            <?php include 'footer.php'; ?>
            <?php include 'scripts.php'; ?>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        function invalidEmail() {
            var email = $("#email").val();
            if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{1,10})+$/.test(email)) {
                return false;
            }
            return true;
        }

        $('#submit-btn').click(function () {
            $('.modal-title').html('Error');
            if ($("#email").val().trim() === '') {
                $('.modal-body').html('Email can\'t be empty');
                $('.modal').modal('show');
                return;
            } else if (invalidEmail()) {
                $('.modal-body').html('Email is not valid');
                $('.modal').modal('show');
                return;
            } else if ($("#password").val().trim() === '') {
                $('.modal-body').html('Password can\'t be empty');
                $('.modal').modal('show');
                return;
            }
            $.ajax({
                url: 'api/sign_in.php',
                type: 'post',
                data: {data: $('#sign-in-form').serialize()},
                success: function (data) {
                    if (data === 's') {
                        window.location = "index.php";
                    } else {
                        $('.modal-title').html('Message');
                        $('.modal-body').html(data);
                        $('.modal').modal('show');
                    }
                },
                error: function (xhr, status, error) {
                    alert(error);
                }
            });
        });
    });
</script>
</body>
</html>