<?php require APPROOT . '/views/common/header.php'; ?>
<div class="w3-container">
    <h1>Class check</h1>
    <form action="<?php echo URLROOT . '/teachers/finishCheck';?>" method="post">
      <input type="text" name="class_id" style="display: none" value="<?php echo $data['class_id'];?>">
      <input type="submit" value="finish" class="w3-button w3-hover-black w3-dark-grey">
    </form>
    <form action="<?php echo URLROOT . '/teachers/faceIdentify';?>" method="post" class="facecheck-form">
        <div style="display: flex; justify-content: center; margin-bottom: 20px">
            <div style="margin-right: 10px; border: 1px solid rgba(0, 0, 0, 0.2)">
                <div id="my_camera"></div>
                <br/>
                <input type="hidden" name="image" class="image-tag">
            </div>
            <div style="min-width: 320px; border: 1px solid rgba(0, 0, 0, 0.2)">
                <div id="results"></div>
            </div>
        </div>
        <div style="width: 100%; display: flex; jusify-content: center; align-items: center;">
            <input id="take-snapshot" type=button value="Take Snapshot" onClick="take_snapshot()" class="w3-button w3-hover-black w3-dark-grey" style="margin-left: auto; margin-right: auto">
        </div>
    </form>
    <div style="text-align: center">
        <h1>Result</h1>
        <h1 id="facecheck-result"></h1>
        <div id="loading">Checking&#8230;</div>
    </div>
</div>

<script language="JavaScript">
    Webcam.set({
        width: 320,
        height: 240,
        image_format: 'jpeg',
        jpeg_quality: 90
    });
    Webcam.attach('#my_camera');
    
    $("#loading").hide();
    
    function take_snapshot() {
        $("#loading").show();
        $("#take-snapshot").hide();
        Webcam.snap( function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
            const url = $(".facecheck-form").attr('action');
            const data = {
                class_id: 1, 
                image_blob: data_uri.replace(/^data\:image\/\w+\;base64\,/, '')
            };
            $.ajax({
                url: url,
                type: 'post',
                dataType: "json",
                data: data,
                success: (response, textStatus, jqXHR) =>  {
                    $("#loading").hide();
                    $("#take-snapshot").show();
                    const facechekcResult = document.getElementById('facecheck-result');
                    if(response.code == 200) {
                        const { student_id, first_name, last_name } = response.result;
                        facechekcResult.innerHTML = `${student_id} - ${first_name} ${last_name}`;
                    }
                    else if(response.code == 400) {
                        facechekcResult.innerHTML = response.messages;
                    }
                },
                error: (jqXHR, textStatus, errorThrown) => {
                    $("#loading").hide();
                    $("#take-snapshot").show();
                    console.log({errorThrown});
                }
            });
        } );
    }
</script>
<style>
/* Absolute Center Spinner */
#loading {
  position: fixed;
  z-index: 999;
  height: 2em;
  width: 2em;
  overflow: visible;
  margin: auto;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
}

/* Transparent Overlay */
#loading:before {
  content: '';
  display: block;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0,0,0,0.3);
}

/* :not(:required) hides these rules from IE9 and below */
#loading:not(:required) {
  /* hide "loading..." text */
  font: 0/0 a;
  color: transparent;
  text-shadow: none;
  background-color: transparent;
  border: 0;
}

#loading:not(:required):after {
  content: '';
  display: block;
  font-size: 10px;
  width: 1em;
  height: 1em;
  margin-top: -0.5em;
  -webkit-animation: spinner 1500ms infinite linear;
  -moz-animation: spinner 1500ms infinite linear;
  -ms-animation: spinner 1500ms infinite linear;
  -o-animation: spinner 1500ms infinite linear;
  animation: spinner 1500ms infinite linear;
  border-radius: 0.5em;
  -webkit-box-shadow: rgba(0, 0, 0, 0.75) 1.5em 0 0 0, rgba(0, 0, 0, 0.75) 1.1em 1.1em 0 0, rgba(0, 0, 0, 0.75) 0 1.5em 0 0, rgba(0, 0, 0, 0.75) -1.1em 1.1em 0 0, rgba(0, 0, 0, 0.5) -1.5em 0 0 0, rgba(0, 0, 0, 0.5) -1.1em -1.1em 0 0, rgba(0, 0, 0, 0.75) 0 -1.5em 0 0, rgba(0, 0, 0, 0.75) 1.1em -1.1em 0 0;
  box-shadow: rgba(0, 0, 0, 0.75) 1.5em 0 0 0, rgba(0, 0, 0, 0.75) 1.1em 1.1em 0 0, rgba(0, 0, 0, 0.75) 0 1.5em 0 0, rgba(0, 0, 0, 0.75) -1.1em 1.1em 0 0, rgba(0, 0, 0, 0.75) -1.5em 0 0 0, rgba(0, 0, 0, 0.75) -1.1em -1.1em 0 0, rgba(0, 0, 0, 0.75) 0 -1.5em 0 0, rgba(0, 0, 0, 0.75) 1.1em -1.1em 0 0;
}

/* Animation */

@-webkit-keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@-moz-keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@-o-keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
</style>
<?php require APPROOT . '/views/common/footer.php'; ?>