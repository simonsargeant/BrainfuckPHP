<!DOCTYPE html>
<html>
<head>
    <title>BrainfuckPHP</title>
    <link type="text/css" rel="stylesheet" href="/web/assets/css/style.css">
    <meta charset="windows-1252">
</head>
<body>
<h1 id="Title">BrainfuckPHP</h1>

<div id="LeftColumn">
    <h2>Program</h2>

    <form action="" method="post">
        <h3><label for="Program">Program String</label></h3>
        <textarea name="program" id="Program"><?= $program ?></textarea>

        <h3><label for="Input">Input String</label></h3>
        <textarea name="input" id="Input"><?= $input ?></textarea>
        <button id="Submit" type="submit">Submit</button>
    </form>
    <?php if (!empty($output)): ?>
        <h3>Output string</h3>
        <p><?= $output ?></p>
    <?php endif ?>
    <?php if (!empty($memory)): ?>
        <h3>Memory</h3>
        <table id="Memory">
            <?php
            $i = 1;
            foreach ($memory as $index => $cell): ?>
                <?= $i % 6 === 1 ? '<tr>' : '' ?>
                <td><?= $index ?>: <?= str_pad($cell, 3, '0', STR_PAD_LEFT) ?></td>
                <?= $i++ % 6 === 0 || !isset($memory[$index + 1]) ? '</tr>' : '' ?>
            <?php endforeach ?>
        </table>
    <?php endif ?>

</div>
<div id="RightColumn">
    <h2>
        What is Brainfuck?
    </h2>

    <p>
        Brainfuck is a simple programming language where
        an array of bytes is traversed by a pointer, which allows the value at
        that point to be incremented and decremented. The memory can then be outputted as a character.
        The Brainfuck pointer is controlled via 8 commands:
    </p>
    <table class="CommandTable">
        <thead>
        <tr>
            <th>Command</th>
            <th>Explanation</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>+</td>
            <td>Increments the byte at the pointer by 1</td>
        </tr>
        <tr>
            <td>-</td>
            <td>Decrements the byte at the pointer by 1</td>
        </tr>
        <tr>
            <td>&gt;</td>
            <td>Increments the pointer by 1</td>
        </tr>
        <tr>
            <td>&lt;</td>
            <td>Decrements the pointer by 1</td>
        </tr>
        <tr>
            <td>[</td>
            <td>Jumps to the next ] unless the byte at the pointer is greater than 0</td>
        </tr>
        <tr>
            <td>]</td>
            <td>Returns to the last [ unless the byte at the pointer is equal to 0</td>
        </tr>
        <tr>
            <td>.</td>
            <td>Outputs the byte at the pointer</td>
        </tr>
        <tr>
            <td>,</td>
            <td>Reads a byte of input to the byte at the pointer</td>
        </tr>
        </tbody>
    </table>
</div>
</body>
</html>
