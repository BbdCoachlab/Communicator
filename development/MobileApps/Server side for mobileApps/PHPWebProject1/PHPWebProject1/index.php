<!DOCTYPE html>
<html> <!-- Create Questionaire form events-->>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <form action="Notification.php" method="post"
              enctype="multipart/form-data">
            Are you coming? <input type="text" name="come"  /><br>
            Number people? <input type="text" name="number" /><br>
            Special diet? <input type="text" name="diet" /><br>
            <label for="file">Filename:</label>
            <input type="file" name="file" id="file"><br>
            <input type="submit" name="submit" value="Submit">
        </form>
    </body>
</html>
