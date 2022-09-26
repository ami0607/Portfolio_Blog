 <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand text-white" href="#">BLOGEN</a>

        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link text-white" href="dashboard.php">Dashboard</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link text-white" href="users.php">Users</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link text-white" href="posts.php">Posts</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link text-white" href="categories.php">Categories</a>
            </li>
        </ul>

        <ul class="navbar-nav ms-auto pe-4">
            <li class="nav-item">
                <a class="nav-link text-white" href="profile.php"><i class="fa-solid fa-user"></i> Welcome <?= $_SESSION['username'] ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="logout.php"><i class="fa-solid fa-user"></i> Logout</a>
            </li>
        </ul>

    </nav>    