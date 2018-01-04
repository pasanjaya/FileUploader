<!DOCTYPE html>

<?php
    if(isset($_FILES['upfile'])){
        
        $fileName = $_FILES['upfile']['name'];
        $fileTmp = $_FILES['upfile']['tmp_name'];
        
        
        if($_FILES['upfile']['error'] > 0){
            echo "
                <script>
                    alert('Error occurred!');
                    window.location.href='index.php';
                </script>";
        }
       
       if(file_exists('uploads/'.$fileName)){
           echo "
                <script>
                    alert('File already exists!');
                    window.location.href='index.php';
                </script>";
       }
       
       if(!move_uploaded_file($fileTmp, 'uploads/'.$fileName)){
           echo ""
            .   "<script>
                    alert('Error occurred - Destination error!');
                    window.location.href='index.php';
                </script>";
       }
    }
    
    
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>FileUploader</title>
        <link href="style.css" rel="stylesheet">
    </head>
    <body>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="info">
                <img src="unnamed.png" />
                <?php
                if(isset($_FILES['upfile'])){
                    $fileName = $_FILES['upfile']['name'];
                    $fileType = $_FILES['upfile']['type'];
                    $fileSize = $_FILES['upfile']['size'];
                
                    echo ""
                    . " <p>File Name: $fileName</p>
                        <p>File Type: $fileType</p>
                        <p>File Size: $fileSize</p>";
                }
                ?>
            </div>
            
            <div class="uploadbtn">
                <button class="btn">Choose File</button>
                <input type="file" name="upfile"/>
            </div>
            
            <div class="uploadbtn">
                <button type="submit" class="btnsubmit">Submit</button>
            </div>
        </form>
                
    </body>
</html>
