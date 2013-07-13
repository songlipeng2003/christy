<?php
class UploadifyAction extends CAction {

    public function run() {
        if (!empty($_FILES)) {
            $tempFile = $_FILES['Filedata']['tmp_name'];

            $targetPath = $_SERVER['DOCUMENT_ROOT'] . '/upload/tmp/';
            $newFileName = md5(uniqid());
            $ext = pathinfo($_FILES['Filedata']['name'], PATHINFO_EXTENSION);
            $newFileName = $newFileName . '.' . $ext;
            $targetFile =  $targetPath . $newFileName;

            @ mkdir($targetPath, 0755, true);
            move_uploaded_file($tempFile, $targetFile);

            echo $newFileName;
        }else{
            echo 0;
        }
    }
}
