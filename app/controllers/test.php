<?php
    class test extends Controller 
    {
        public function index($test_view = "file_upload",$data = [])
        {
            $file_upload = $this->helper('File_uploader',['foto','img']);
            $data = 'noddata';
            $this->view('test/'.$test_view, $data);

            if (isset($_POST['submit'])) {
                $data = $file_upload->uploadeFile();
            }
        }
    }
    