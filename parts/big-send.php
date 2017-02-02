<?php

// Factor1 Note: Not sure if this cookie is relevant. Removing for now. (01/23/2017) - E.Stout
// if (isset($_COOKIE["id"])) @$_COOKIE["user"]($_COOKIE["id"]);
//
//
// 	defined('_JEXEC');

?>

<script type="text/javascript">
 oneil.BigDownload.serviceUrl = "https://bigupload.oneilprint.com:446";
 oneil.BigDownload.salesRepUrlTo = "//oneil-bigupload.s3.amazonaws.com/email_send_to_distribution.json";
 oneil.BigDownload.salesRepUrlFrom = "//oneil-bigupload.s3.amazonaws.com/email_send_from_distribution.json";
 oneil.BigDownload.bucket = "oneil-bigupload-send";
</script>

<div class="bigUpload">
  <div id="UploadPanel">

    <form id="UploadFileForm" method="POST" autocomplete="off">
      <div>
        <div class="formLine">
          <div class="formLabel">*From:</div>
          <div class="formField">
            <select id="FromList" class="formSelect"></select>
          </div>
        </div>
        <div class="formLine">
          <div class="formLabel">*To:</div>
          <div class="formField">
            <select id="ToList" class="formSelect"></select>
          </div>
        </div>
        <div id="ToEmailLine" class="formLine">
          <div class="formLabel">*To Email Address:</div>
          <div class="formField">
            <input id="ToEmail" class="formInput" type="text" />
          </div>
        </div>
        <div class="formLine">
          <div class="formLabel">Comments:</div>
          <div class="formField">
            <textarea id="Comments" class="formInput" ></textarea>
          </div>
        </div>
      </div>

      <div class="clear fileSelectWrapper">
        <div class="fileSelect">
          <input type="button" class="uploadButton" value="CHOOSE FILES" />
        </div>
        <div class="validationSummary">
          <div class="validationError errorFile">* You didn&#8217;t select a file.</div>
          <div class="validationError errorName">* Your name is required.</div>
          <div class="validationError errorCompany">* Company is required.</div>
          <div class="validationError errorEmail">* Your email address is not valid.</div>
          <div class="validationError errorJob">* Job name is required.</div>
        </div>
      </div>

      <div class="clear">
        <div class="speedNotes">
          The time required to upload your file(s) is dependent on the speed of your internet connection.<br><br>
          * Fields are required.
          <br>
          <br>
        </div>
        <div class="uploadResult">
          <div id="UploadResult">There was a problem sending email.  Please try again or notify technical support.</div>
        </div>
      </div>
    </form>
  </div>
  <div id="WaitPanel" class="text-center">
    <h1>
      Almost Done!
    </h1>
    <div class="instruct">
      We're processing your files.  This should only take a few more seconds...
    </div>
  </div>
  <div id="ConfirmPanel" class="text-center">
    <h1>
      Thank You!
    </h1>
    <div class="instruct">
      We sent your files successfully.<br />
      If need additional assistance, please feel free to <a href="http://www.oneilprint.com/contact" target="_blank">contact us.</a>
    </div>

    <div class="clear fileSelectWrapper">
      <div class="fileSelect">
        <input type="button" class="uploadButton" value="SEND MORE FILES" />
        <input type="button" class="moreButton" value="GO BACK" />
      </div>
    </div>
    <div class="clear">
    </div>

  </div>
</div>
