<div>
    <iframe name="upl" id="frame1" src="/upload.php" style="display:none"></iframe>
    <form action="/upload.php" method="post"
          enctype="multipart/form-data" target="upl">
        Select image to upload:
        <input type="file" name="file" id="file">
        <input type="submit" value="Upload Image" name="submit" >
    </form>

</div>