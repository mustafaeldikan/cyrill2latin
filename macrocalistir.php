<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['fileName'])) {
    $target_dir = "uploads/";
    // Check if the directory exists, if not, create it
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $target_file = $target_dir . basename($_FILES["fileName"]["name"]);

    $uploadOk = 1;

    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if file is a DOCX file
    if ($fileType != "docx") {
        echo "Üzgünüz, sadece DOCX dosyaları yüklenebilir.";
        $uploadOk = 0;
        return;
    }

    if (move_uploaded_file($_FILES["fileName"]["tmp_name"], $target_file)) {
        $word = new COM("Word.Application") or die("Unable to instantiate Word");

        // Make Word visible (for debugging, can be set to false)
        $word->Visible = true;

        // Open the document
        $document = $word->Documents->Open(realpath($target_file));

        // Run your VBA script (macro)
        $word->Run("Convert");

        // Save the document after conversion
        $document->Save();

        // Close the document
        $document->Close(false);

        // Quit Word application
        $word->Quit();

        // Release the COM object
        unset($word);

        header('Content-Description: File Transfer');
        header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
        header('Content-Disposition: attachment; filename="' . basename($target_file) . '"');
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($target_file));
        readfile($target_file);

    } else {
        echo "Üzgünüz, dosyanız yüklenirken bir hata oluştu.";
    }
} else {
    echo "Lütfen bir dosya yükleyin.";
}
?>