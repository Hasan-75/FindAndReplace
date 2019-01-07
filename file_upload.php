<?php
/**
 * Created by PhpStorm.
 * User: Hasan
 * Date: 05-01-19
 * Time: 22.42
 */

    $file_exists = false;
    $status = array(-1=>'<span style="color: red">Failed to upload</span>',
        -2=>'<span style="color: red">File size exceeded</span>',
        -3=>'<span style="color: red">Not a text file</span>',
        -4=>'<span style="color: red">File cannot be empty</span>',
        1=>'<span style="color: forestgreen">Uploading successful</span>',
        ""=>""

    );

    $file_name = "";
    $ext = "";
    $size = 0;
    $temp_file = "";
    $max_size = 26214400;
    $upload_dir = "";

    function uploadFile(){
        global $file_name,$file_exists, $ext, $size, $temp_file, $max_size, $upload_dir;
        if(isset($_FILES['file'])){
            $file = $_FILES['file'];
            $file_name = $file['name'];
            $ext = $file['type'];
            $size = $file['size'];
            $temp_file = $file['tmp_name'];
            $max_size = 26214400;
            $upload_dir = "./";

            if(!empty($file_name)){
                if($ext == "text/plain"){
                    if($size <= $max_size){
                        if(move_uploaded_file($temp_file, $upload_dir.$file_name)){
                            $file_exists = true;
                            return 1;
                        }
                        else{
                            return -1;
                        }
                    }
                    else{
                        //echo "File size exceeded. Max 25 mb<br><br>";
                        return -2;
                    }

                }
                else{
                    //echo "Not a text file<br><br>";
                    return -3;
                }

            }
            else{
                //echo "Select a file<br>";
                return -4;
            }
        }
        else{

        }
    }

    function readTxtFromFile(){
        global $file_exists, $upload_dir, $file_name;
        if($file_exists){
            $text_file = file($upload_dir.$file_name);
            $text = "";
            foreach ($text_file as $line){
                $text = $text.$line;
            }
            $deleted = unlink($upload_dir.$file_name);
            return $text;
        }else{

        }
    }
?>