<!doctype html>
<html>
<?php include 'head.php'; ?>
<body>
<div class="container">
    <div class="row">
        <div class="col-12">
            <?php include 'header.php'; ?>
            <?php include 'model.php'; ?>

            <div class="row mx-2">
                <div class="col">
                    <form id="write-idea-form">
                        <div class="form-group">
                            <input name="title" type="text" class="form-control" id="title"
                                   placeholder="Enter idea title">
                        </div>
                        <div class="form-group">
                            <textarea name="details" id="details" class="form-control"
                                      rows="15" placeholder="Enter details"></textarea>
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
        $('#submit-btn').click(function () {
            $('.modal-title').html('Error');
            if ($("#title").val().trim() === '') {
                $('.modal-body').html('Title can\'t be empty');
                $('.modal').modal('show');
                return;
            } else if ($("#details").val().trim() === '') {
                $('.modal-body').html('Details can\'t be empty');
                $('.modal').modal('show');
                return;
            }
            $.ajax({
                url: 'api/write_idea.php',
                type: 'post',
                data: {data: $('#write-idea-form').serialize()},
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