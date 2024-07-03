<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>PHP Dosya Çevirme</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 20px;
            padding: 0;
        }
        h2 {
            color: #333;
        }
        fieldset {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 20px;
            width: 300px;
            background-color: #fff;
        }
        legend {
            font-size: 1.2em;
            color: #666;
            margin-bottom: 10px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }
        input[type="file"] {
            margin-bottom: 10px;
        }
        input[type="submit"] {
            padding: 8px 16px;
            border: none;
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        input[type="reset"] {
            padding: 8px 16px;
            border: none;
            background-color: #f44336; /* Red color */
            color: white;
            cursor: pointer;
        }
        input[type="reset"]:hover {
            background-color: #d32f2f; /* Darker red on hover */
        }
    </style>
</head>
<body>
    <h2>PHP Dosya Çevirme</h2>
    <form action="macrocalistir.php" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend>Dosya Yükleme Yeri</legend>
            <label for="fileName">Dosya seç:</label><br>
            <input type="file" name="fileName" id="fileName"><br><br>
            <input type="submit" value="Yükle" title="Tıkladığınızda dosya yüklenecektir"> 
            <input type="reset" value="Sıfırla" title="Tıkladığınızda yüklediğiniz dosya silinecektir">
        </fieldset>
    </form>
</body>
</html>
