<?php include 'api/connection.php'; ?>

<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom">
    <h3 class="my-0 mr-md-auto font-weight-normal"><a href="index.php">IndeaHub</a></h3>
    <nav class="my-2 my-md-0 mr-md-3">
        <?php if (isset($_SESSION['ac_type'])): ?>
            <a class="p-2 text-dark" href="read_idea.php">Read Idea</a>
            <?php if ($_SESSION['ac_type'] === 'writer' || $_SESSION['ac_type'] === 'admin'): ?>
                <a class="p-2 text-dark" href="write_idea.php">Write Idea</a>
            <?php endif; ?>
            <?php if ($_SESSION['ac_type'] === 'admin'): ?>
                <a class="p-2 text-dark" href="ideas.php">Ideas</a>
            <?php endif; ?>
        <?php endif; ?>
        <a class="p-2 text-dark" href="about_us.php">About Us</a>
        <a class="p-2 text-dark" href="contact_us.php">Contact Us</a>
    </nav>
    <div class="d-flex">
        <?php if (isset($_SESSION['ac_type'])): ?>
            <div class="btn-group">
                <a class="mr-2 btn btn-outline-primary rounded" href="#" data-toggle="dropdown">
                    <?php echo strtoupper($_SESSION['name']); ?>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="profile.php">Profile</a>
                    <a class="dropdown-item" href="logout.php">Log out</a>
                </div>
            </div>

        <?php else: ?>
            <a class="mr-2 btn btn-outline-primary" href="sign_in.php">Sign In</a>
            <a class="btn btn-outline-primary" href="sign_up.php">Sign Up</a>
        <?php endif; ?>
    </div>
</div>
