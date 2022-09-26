
<nav class="navbar navbar-expand-lg navbar-info bg-info">
        <a class="navbar-brand text-white" href="#">BLOGEN</a>

        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link text-white" href="posts.php">My Posts</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link text-white" href="add-post.php">Add Posts</a>
            </li>
        </ul>

        <ul class="navbar-nav ms-auto pe-4">
            <li class="nav-item active">
                <a class="nav-link text-white" href="profile.php"><i class="fa-solid fa-user"></i> Welcome <?= $_SESSION['username']?></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link text-white" href="logout.php"><i class="fa-solid fa-user"></i> Logout</a>
            </li>
        </ul>
    </nav>