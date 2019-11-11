<html>
    <body>
        <h2>Hey, please shorten your link here!</h2>
        <?php echo validation_errors(); ?>
        <form method="post" accept-charset="utf-8" action="">

            <label for="link">Link</label>
            <textarea name="link"></textarea><br/>

            <input type="submit" name="submit" value="Create link" />

        </form>
    <body>
</html>