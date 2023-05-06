<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP FORM</title>
    <style>
        .error{
            color:red;
        }
    </style>
</head>
<body>
    <?php
    $name = $website = $position = $experience = $estatus = $comments = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"])) {
            echo "<span class=\"error\">Error: First Name Required</span>";
        } elseif (!preg_match("/^[a-zA-Z]*$/", $_POST["name"])) {
            echo "<span class=\"error\">Error: Name can only contain letters</span>";
        } elseif (empty($_POST["Website"])) {
            echo "<strong>Error:Website Required</strong>";
        } elseif (
            !preg_match(
                "/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&\/%?~_|!:,.;]*[-a-z0-9+&\/%?~_|!:,.;]/i",
                $_POST["website"]
            )
        ) {
            echo "<strong>Error:Website is in wrong format</strong> ";
        } else {
            $name = val($_POST["name"]);
            $website = val($_POST["website"]);
            $position = val($_POST["position"]);
            $experience = val($_POST["experience"]);
            $comments = val($_POST["comments"]);
        }
    }

    function val($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

    <form name="employment" action="post">
        <table width="600" border="0" ceilspacing="1" ceilpadding="1">
            <tr>
                <td><h2>Employment Application</h2></td><td></td>
            </tr>
            <tr>
                <td>Name</td>
                <td><input type="text" name="name"  maxlength="30"></td>
            </tr>
            <tr>
                <td>Website</td>
                <td><input type="text" name="website"  maxlength="30"></td>
            </tr>
            <tr>
                <td>Position</td>
                <td>
                    <select name="position">
                        <option value="Accountant">Accountant</option>
                        <option value="Receptionaist">Receptionaist</option>
                        <option value="Administrator">Administrator</option>
                        <option value="Supervisor">Supervisor</option>
                    </select>
                </td></tr>
                <tr>
                    <td>Experience Level</td>
                    <td>
                        <select name="experience">
                            <option value="Entry Level">Entry Level</option>
                            <option value="Some Experience">Some Experience</option>
                            <option value="Very Experienced">Very Experienced</option>
                            
                        </select>
                    </td></tr>
                    <tr>
                        <td>Employment Status</td>
                        <td>
                            <input type="radio" name="estatus" value="Employed" checked/>Employed
                            <input type="radio" name="estatus" value="Employed" />Unemployed
                            <input type="radio" name="estatus" value="Employed" />Student
                        </td></tr>
                        <tr>
                            <td>Additional Comments</td>
                            <td>
                                <textarea name="comments" cols="45" rows="5"></textarea></td></tr>
                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" value="submit"/>
                                <input type="reset" name="reset" value="reset"/>  </td></tr></table></form>
                                
                                <?php
                                echo "<h2>User Input:</h2>";
                                echo "Name: " . $name;
                                echo "<br>";
                                echo "Website: " . $website;
                                echo "<br>";
                                echo "Position: " . $position;
                                echo "<br>";

                                echo "Experience: " . $experience;
                                echo "<br>";

                                echo "Employment Status: " . $estatus;
                                echo "<br>";
                                echo "Comments: " . $comments;
                                ?>
</body>
</html>