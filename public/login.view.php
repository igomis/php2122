<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body>

<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <form method="POST" action="login.php" >
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input name="email" type="email" class="form-control <?= isValidClass('email',$errors) ?>" id="email"  placeholder="Enter email" value="<?= $old_email??'' ?>">
                    <?= showError('email',$errors) ?>
                </div>
                <div class="form-group">
                    <input name="password" type="password" class="form-control" id="password"  placeholder="Enter password">
                </div>
                <div class="form-group">
                    <label for="forgot">He oblidat la contrasenya:</label>
                    <input name="forgot" type="checkbox"  id="forgot">
                </div>
                <a href="register.php" class="btn btn-dark">Register</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</section>
</body>
