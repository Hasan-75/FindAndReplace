<?php
/**
 * Created by PhpStorm.
 * User: Hasan
 * Date: 06-01-19
 * Time: 12.41
 */
    $file_name = "file_replaced.txt";

    function download_file(){
        global $file_name;
        if(isset($_POST['text'])){
            if(!empty($_POST['text'])){
                $file_text = $_POST['text'];
                $file_replaced = fopen($file_name, 'w');

                if(fwrite($file_replaced, $file_text)){
                    fclose($file_replaced);
                    header('Content-Type: application/octet-stream');
                    header('Content-Disposition: attachment; filename='.basename($file_name));
                    header('Expires: 0');
                    header('Cache-Control: must-revalidate');
                    header('Pragma: public');
                    header('Content-Length: ' . filesize($file_name));
                    readfile($file_name);
                    unlink($file_name);
                    //header('Location: ./index.php');
                    exit;

                }
                else{
                    echo  "<br>Failed to create file<br>";
                }

            }
            else{
                //echo "No text found!<br>";
            }
        }
        else{

        }
    }

?>