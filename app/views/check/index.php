<?php require APPROOT . '/views/common/header.php'; ?>
<div>
    <h1>Check</h1>
    <form action="<?php echo URLROOT . '/check/imageCheck';?>" method="post">
        <div>
            <div>
                <div id="my_camera"></div>
                <br/>
                <input type=button value="Take Snapshot" onClick="take_snapshot()">
                <input type="hidden" name="image" class="image-tag">
            </div>
            <div>
                <div id="results">Your captured image will appear here...</div>
            </div>
        </div>
    </form>
</div>

<script language="JavaScript">
    Webcam.set({
        width: 490,
        height: 390,
        image_format: 'jpeg',
        jpeg_quality: 90
    });
    Webcam.attach( '#my_camera' );
  
    function take_snapshot() {
        Webcam.snap( function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';

            const url = $(this).attr('action');
            const data = {
                class_id: 1, 
                image_uri: data_uri.replace(/^data\:image\/\w+\;base64\,/, '')
            };
            $.ajax({
                url: 'http://localhost/project2/check/imageCheck',
                type: 'post',
                data: data,
                success: (response, textStatus, jqXHR) =>  {
                    console.log({response});
                },
                error: (jqXHR, textStatus, errorThrown) => {
                    console.log({errorThrown});
                }
            });
        } );
    }
</script>
<?php require APPROOT . '/views/common/footer.php'; ?>