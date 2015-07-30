<!DOCTYPE html>
<html>
<head>
    <title>BrainfuckPHP</title>
</head>
<body>
    <h1>BrainfuckPHP</h1>

    <form action="" method="post">
        <h3><label for="program">Program</label></h3>
        <input name="program" id="program" value="<?= $program ?>">
        <h3><label for="input">Input String</label></h3>
        <input name="input" id="input" value="<?= $input ?>">
        <button type="submit">Submit</button>
    </form>
    <h3>Output string</h3>
    <pre><?= $output ?></pre>
    <h3>Memory</h3>
    <pre><?= print_r($memory, true) ?></pre>
</body>
</html>
