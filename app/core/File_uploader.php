<?php
class File_uploader
{
    private $formName,
        $fileTmp,
        $fileName,
        $fileSize,
        $fileType,
        $fileExtension,
        $newFileName,
        $allowedFileExt = ['jpg', 'gif', 'png', 'jpeg'],
        $dest;

    public function __construct($fName, $dest)
    {
        $this->formName = $fName;
        $this->dest = $dest;
    }

    protected function getFileInfo()
    {
        $this->fileTmp = $_FILES[$this->formName]['tmp_name'];
        $this->fileName = $_FILES[$this->formName]['name'];
        $this->fileSize = $_FILES[$this->formName]['size'];
        $this->fileType = $_FILES[$this->formName]['type'];
        $tmpExt = explode('.', $this->fileName);
        $this->fileExtension = strtolower(end($tmpExt));
        $this->newFileName = uniqid(time() . $this->fileName) . '.' . $this->fileExtension;
    }
    public function uploadeFile()
    {
        $this->getFileInfo();
        if (move_uploaded_file($this->fileTmp, './App/user_file/'. rtrim($this->dest, '/') . '/' . $this->newFileName)) {
            return true;
        } else {
            return false;
        }
    }
}
