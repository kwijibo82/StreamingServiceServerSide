<?php

if (!session_id()) session_start();
if (!$_SESSION['logon'])
{
    header("Location: index.html");
    die();
}   

function bytesToSize1024($bytes, $precision = 2) {
    $unit = array('B','KB','MB');
    return @round($bytes / pow(1024, ($i = floor(log($bytes, 1024)))), $precision).' '.$unit[$i];
}

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["image_file"]["name"]);


file_put_contents("videos.txt", $_FILES["image_file"]["name"].';', FILE_APPEND);

echo "La ruta es: \n" . $target_file;

$sFileName = $_FILES['image_file']['name'];
$sFileType = $_FILES['image_file']['type'];
$sFileSize = bytesToSize1024($_FILES['image_file']['size'], 1);


echo "El fichero es: \n" . $sFileName;
echo "El tipo de fichero es: \n" . $sFileType;
echo "El tamaño del fichero es: \n" . $_FILES['image_file']['size'];


echo "La extensión es: " . $extension . "\n";

//controla tipo de archivos
if (($_FILES['image_file']['type'] == 'video/mp4')
        || ($_FILES['image_file']['type'] == 'audio/mp3')
        || ($_FILES['image_file']['type'] == 'audio/wma')
        || ($_FILES['image_file']['type'] == 'image/png')
        || ($_FILES['image_file']['type'] == 'image/jpg')
        || ($_FILES['image_file']['type'] == 'image/gif')
        || ($_FILES['image_file']['type'] == 'image/jpeg')
        || ($_FILES['image_file']['type'] == 'video/avi')
        || ($_FILES['image_file']['type'] == 'video/3gpp')
        || ($_FILES['image_file']['type'] == 'video/3gpp'))

{

    if ($_FILES['image_file']['error'] > 0)
    {
        echo "Return Code: " . $_FILES['image_file']['error'] . "<br />";
    }
    else
    {
        echo "Upload: " . $_FILES['image_file']['name'] . "<br />";
        echo "Type: " . $_FILES['image_file']['type'] . "<br />";
        echo "Size: " . ($_FILES['image_file']['size'] / 1024) . " Kb<br />";
        echo "Temp file: " . $_FILES['image_file']['tmp_name'] . "<br />";

        if (file_exists("upload/" . $_FILES['image_file']['name']))
        {
            echo $_FILES['image_file']['name'] . " already exists. ";
        }
        else
        {
            move_uploaded_file($_FILES['image_file']['tmp_name'],
                "upload/" . $_FILES['image_file']['name']);
            echo "Stored in: " . "upload/" . $_FILES['image_file']['name'];

            echo <<<EOF
            <p>Your file: {$sFileName} has been successfully received.</p>
            <p>Type: {$sFileType}</p>
            <p>Size: {$sFileSize}</p>
EOF;

        }
    }
}
else
{
    echo "Invalid file";
}



