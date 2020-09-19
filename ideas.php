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
                    $sql = "SELECT i.`id`, i.`title`, LEFT(i.`details`, 200) as `details`, u.`id` user_id, u.`name` FROM `idea` i JOIN `user` u ON (i.`writer_id` = u.`id`) WHERE i.`status` = 'pending'";
                    $ret = $conn->query($sql);
                    ?>
                    <?php while ($row = $ret->fetch()): ?>
                        <div class="row mt-3">
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
                                        <p>
                                            <?php echo $row['details']; ?>&nbsp
                                            <a style="color: blue;" href='view_idea.php?id=<?php echo $row['id']; ?>'>Read more</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <a style="color: green;"
                                   href='api/idea_accept.php?id=<?php echo $row['id']; ?>'>Accept</a>&nbsp&nbsp
                                <a style="color: red;"
                                   href='api/idea_reject.php?id=<?php echo $row['id']; ?>'>Reject</a>&nbsp&nbsp
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