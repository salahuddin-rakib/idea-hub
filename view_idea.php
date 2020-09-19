<!doctype html>
<html>
<?php include 'head.php'; ?>
<body>
<div class="container">
    <div class="row">
        <div class="col-12">
            <?php include 'header.php'; ?>
            <?php include 'model.php'; ?>

            <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $sql = "SELECT i.`title`, LEFT(i.`details`, 800) as `details`, u.`id` user_id, u.`name` FROM `idea` i JOIN `user` u ON (i.`writer_id` = u.`id`) WHERE i.id = '$id'";
                $ret = $conn->query($sql);
            }
            ?>
            <?php if (isset($ret) && $ret && $ret->rowCount() > 0): $row = $ret->fetch(); ?>
                <div class="row mx-2">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12">
                                <h5><?php echo $row['title']; ?></h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label>
                                    Written by
                                    <a href=<?php echo "profile.php?id=" . $row['user_id']; ?>> <?php echo $row['name']; ?></a>
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <p><?php echo $row['details']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php include 'footer.php'; ?>
            <?php include 'scripts.php'; ?>
        </div>
    </div>
</div>
</body>
</html>