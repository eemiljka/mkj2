<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <p>Choose a color:</p>
    <input type="radio" name="color" value="red"> Red<br>
    <input type="radio" name="color" value="green"> Green<br>
    <input type="radio" name="color" value="blue"> Blue<br>

    <p>Choose a size:</p>
    <select name="size">
        <option value="small">Small</option>
        <option value="medium">Medium</option>
        <option value="large">Large</option>
    </select>

    <p>Choose a font style:</p>
    <input type="checkbox" name="fontStyle[]" value="bold"> Bold<br>
    <input type="checkbox" name="fontStyle[]" value="italic"> Italic<br>

    <input type="submit" name="submit" value="Submit">
</form>
<?php if (isset($_POST["submit"])) {
    $color = $_POST["color"];
    $size = $_POST["size"];
    $fontStyle = $_POST["fontStyle"];

    $style = "color: $color;";
    switch ($size) {
        case 'small':
            $style .= "font-size: 12px;";
            break;
        case 'medium':
            $style .= "font-size: 18px;";
            break;
        case 'large':
            $style .= "font-size: 24px;";
            break;
    }
    if (in_array('bold', $fontStyle)) {
        $style .= "font-weight: bold;";
    }
    if (in_array('italic', $fontStyle)) {
        $style .= "font-style: italic;";
    }

    echo "<p style=\"$style\">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>";
} ?>