<?php require APPROOT . '/views/common/header.php'; ?>
<div>
    <h1>Check</h1>
    <form action="<?php echo URLROOT . '/check/imageCheck';?>" method="post" class="facecheck-form">
        <div style="display: flex;">
            <div>
                <div id="my_camera"></div>
                <br/>
                <input type="hidden" name="image" class="image-tag">
            </div>
            <div>
                <div id="results">Your captured image will appear here...</div>
            </div>
        </div>
        <input type=button value="Take Snapshot" onClick="take_snapshot()" style="margin-left: 50%; margin-right: 50%">
    </form>
    <h1>Result: </h1><h1 id="facecheck-result"></h1>
</div>

<script language="JavaScript">
    Webcam.set({
        width: 320,
        height: 240,
        image_format: 'jpeg',
        jpeg_quality: 90
    });
    Webcam.attach( '#my_camera' );
  
    function take_snapshot() {
        Webcam.snap( function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';

            const url = $(".facecheck-form").attr('action');
            const data = {
                class_id: 1, 
                image_uri: data_uri.replace(/^data\:image\/\w+\;base64\,/, '')
            };
            $.ajax({
                url: url,
                type: 'post',
                dataType: "json",
                data: data,
                success: (response, textStatus, jqXHR) =>  {
                    const facechekcResult = document.getElementById('facecheck-result');
                    if(response.code == 200) {
                        const { result } = response;
                        facechekcResult.innerHTML = result[0];
                    }
                    else if(response.code == 400) {
                        facechekcResult.innerHTML = response.messages;
                    }
                },
                error: (jqXHR, textStatus, errorThrown) => {
                    console.log({errorThrown});
                }
            });
        } );
    }
</script>
<?php require APPROOT . '/views/common/footer.php'; ?>