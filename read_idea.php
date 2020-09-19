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
                    <?php
                    $sql = "SELECT i.`id`, i.`title`, LEFT(i.`details`, 800) as `details`, u.`id` user_id, u.`name` FROM `idea` i JOIN `user` u ON (i.`writer_id` = u.`id`) WHERE i.`status` = 'accepted'";
                    $ret = $conn->query($sql);
                    ?>
                    <?php while ($row = $ret->fetch()): ?>
                        <div class="row mb-3">
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
                        <div class="row">
                            <div class="col">
                                <a href='view_idea.php?id=<?php echo $row['id']; ?>'>Read more</a>
                            </div>
                        </div>
                        <br>
                    <?php endwhile; ?>
                </div>
            </div>

            <?php include 'footer.php'; ?>
            <?php include 'scripts.php'; ?>
        </div>
    </div>
</div>
</body>
</html>