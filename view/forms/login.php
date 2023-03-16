<section class="w-50 m-auto" id='login'>
   
    <form action="index.php" method="post" class='m-5 shadow p-4'>
        <h2>Content De Te Revoir</h2>
        <?php
            if(isset($_SESSION['feedback'])) {
        ?>
            <div class="alert alert-warning alert-dismissible fade show " role="alert">
                <strong>
                <?php
                    echo $_SESSION['feedback'];
                ?>
                </strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
            }
        ?>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="mb-3">
            <label for="pass" class="form-label">Password</label>
            <input type="password" class="form-control" id="pass" name="pass">
        </div>

        <button type="submit" class="btn btn-dark" name="login_btn">login</button>
    </form>
</section>

<?php
    unset($_SESSION['feedback']);
