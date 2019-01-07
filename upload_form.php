<?php
/**
 * Created by PhpStorm.
 * User: Hasan
 * Date: 04-01-19
 * Time: 19.02
 */

    require 'file_upload.php';

    $st = uploadFile();
?>
    <form action="index.php" method="post" enctype="multipart/form-data">
        upload a file(25mb max):<br>
        <div class="custom-file mb-3">
            <input type="file" class="custom-file-input" id="file" name="file">
            <label class="custom-file-label" for="file">Choose file</label>
        </div>
        <div class="col-12 justify-content-end d-flex p-0">
            <input type="submit" class="btn btn-success btn-sm" value="Upload">
        </div>

    </form>


<script type="application/javascript">
    $('#file').change(function(event){
        var fileName = event.target.files[0].name;
        if (event.target.nextElementSibling!=null){
            event.target.nextElementSibling.innerText=fileName;
        }
    });
</script>