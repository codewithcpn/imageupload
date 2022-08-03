<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

include 'db.php';
if(isset($_POST['signup']))
{
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $degree = mysqli_real_escape_string($conn, $_POST['degree']);
    $language = mysqli_real_escape_string($conn, $_POST['language']);
    $pic = $_FILES['pic'];

    $filename = $pic['name'];
    $filepath = $pic['tmp_name'];
    $fileerror = $pic['error'];

    if($fileerror == 0)
    {
        $destfile = 'upload/'.$filename; 
        move_uploaded_file($filepath, $destfile);
        
        $insertquery = "INSERT INTO registration(username, email, degree, language, pic) VALUES ('$username', '$email', '$degree', '$language','$destfile')";

        $result = mysqli_query($conn, $insertquery);
        if($result)
        {
            echo "Success";
        }
        else
        {
            echo "Failed";
        }
    }
    
   
   
}
?>

</body>

</html>
