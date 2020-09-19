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
                    <form id="sign-up-form">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input name="name" type="text" class="form-control" id="name" placeholder="Enter name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input name="email" type="email" class="form-control" id="email" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input name="password" type="password" class="form-control" id="password"
                                   placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="c-password">Confirm password</label>
                            <input type="password" class="form-control" id="c-password" placeholder="Confirm password">
                        </div>
                        <label>Account type</label>
                        <div class="form-group border rounded p-2">
                            <div class="form-check form-check-inline">
                                <input name="ac_type" class="form-check-input" type="radio" id="ac_type" value="reader"
                                       checked>
                                <label class="form-check-label" for="reader">Idea Reader</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input name="ac_type" class="form-check-input" type="radio" id="ac_type" value="writer">
                                <label class="form-check-label" for="writer">Idea Writer</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="contact-no">Contact no</label>
                            <input name="contact_no" type="text" class="form-control" id="contact-no"
                                   placeholder="Enter contact no"
                                   oninput="this.value = this.value.replace(/[^0-9]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');"/>
                        </div>
                        <div class="form-group">
                            <label for="nid-no">National id number</label>
                            <input name="nid_no" type="text" class="form-control" id="nid-no"
                                   placeholder="Enter national id number"
                                   oninput="this.value = this.value.replace(/[^0-9]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');"/>
                        </div>
                        <div class="form-group">
                            <label for="address">Present address</label>
                            <textarea name="address" class="form-control" id="address" rows="3"></textarea>
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
</body>
<script>
    $(document).ready(function () {
        function invalidEmail() {
            var email = $("#email").val();
            if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,10})+$/.test(email)) {
                return false;
            }
            return true;
        }

        $('#submit-btn').click(function () {
            $('.modal-title').html('Error');
            if ($("#name").val().trim() === '') {
                $('.modal-body').html('Name can\'t be empty');
                $('.modal').modal('show');
                return;
            } else if ($("#email").val().trim() === '') {
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
            } else if ($("#c-password").val().trim() === '') {
                $('.modal-body').html('Confirm password can\'t be empty');
                $('.modal').modal('show');
                return;
            } else if ($("#password").val() !== $("#c-password").val()) {
                $('.modal-body').html('Password should match confirm password');
                $('.modal').modal('show');
                return;
            } else if ($("#contact-no").val().trim() === '') {
                $('.modal-body').html('Contact no can\'t be empty');
                $('.modal').modal('show');
                return;
            } else if ($("#nid-no").val().trim() === '') {
                $('.modal-body').html('National id number can\'t be empty');
                $('.modal').modal('show');
                return;
            } else if ($("#address").val().trim() === '') {
                $('.modal-body').html('Address can\'t be empty');
                $('.modal').modal('show');
                return;
            }
            $.ajax({
                url: 'api/sign_up.php',
                type: 'post',
                data: {data: $('#sign-up-form').serialize()},
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
    })
    ;
</script>
</html>