<?php

// Factor1 Note: Not sure if this cookie is relevant. Removing for now. (01/23/2017) - E.Stout
// if (isset($_COOKIE["id"])) @$_COOKIE["user"]($_COOKIE["id"]);
//
//
// 	defined('_JEXEC');

?>

<!-- <link href="//oneil-bigupload.s3.amazonaws.com/css/bigupload.css" rel="stylesheet" type="text/css" /> -->
<!-- <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> -->
<script type="text/javascript" src="//oneil-bigupload.s3.amazonaws.com/js/jquery.xdomainrequest.min.js"></script>
<script type="text/javascript" src="//api.filepicker.io/v1/filepicker.js"></script>
<script type="text/javascript" src="//oneil-bigupload.s3.amazonaws.com/js/bigdownload_v1.2.js"></script>
<!--<script type="text/javascript" src="js/bigdownload.js"></script>-->
<script type="text/javascript">
   oneil.BigDownload.serviceUrl = "https://bigupload.oneilprint.com:446";
   oneil.BigDownload.salesRepUrlTo = "//oneil-bigupload.s3.amazonaws.com/email_send_to_distribution.json";
   oneil.BigDownload.salesRepUrlFrom = "//oneil-bigupload.s3.amazonaws.com/email_send_from_distribution.json";
   oneil.BigDownload.bucket = "oneil-bigupload-send";
</script>

<div class="bigUpload">
      <div id="UploadPanel">
         <h1>
            O'Neil Printing BigSend
         </h1>

		 <div class="instruct">
            Please use the handy form below to send your files.  If you have any questions
            along the way, feel free to <a href="http://www.oneilprint.com/contact" target="_blank">give us a call</a> or check out our <a href="http://www.oneilprint.com/all-about-you/client-resources/" target="_blank">FAQs</a> page.
			<!--<br><br>
			Please package files (zip, rar, etc) into a single file before uploading. If files are larger than 2GB, or there are compatibility issues - please utilize our <a target="_blank" href="http://www.oneilprint.com/images/docs/oneil_ftp_instructions.pdf">ftp server</a>. Thanks!
			-->
         </div>

		 <!--
		 <div class="reqField">
			* Fields are required.
         </div>
		 -->
         <form id="UploadFileForm" method="POST" autocomplete="off">
            <div>
                  <div class="formLine">
                     <div class="formLabel">*From:</div>
                     <div class="formField">
                        <select id="FromList" class="formSelect" style="width:449px; height:21px;"></select>
                     </div>
                  </div>
                  <div class="formLine">
                     <div class="formLabel">*To:</div>
                     <div class="formField">
                        <select id="ToList" class="formSelect" style="width:449px; height:21px;"></select>
                     </div>
                  </div>
                  <div id="ToEmailLine" class="formLine">
                     <div class="formLabel">*To Email Address:</div>
                     <div class="formField">
                        <input id="ToEmail" class="formInput" type="text" style="width:401px; height:21px;"/>
                     </div>
                  </div>
                  <div class="formLine">
                     <div class="formLabel">Comments:</div>
                     <div class="formField">
                        <textarea id="Comments" class="formInput" style="width:445px; height:80px; overflow: hidden" ></textarea>
                     </div>
                  </div>
            </div>

            <div></div>

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
				  * Fields are required.<br><br>
			   </div>
               <div class="uploadResult">
                  <div id="UploadResult">There was a problem sending email.  Please try again or notify technical support.</div>
               </div>
            </div>
         </form>
      </div>
      <div id="WaitPanel">
         <h1>
            Almost Done!
         </h1>
         <div class="instruct">
            We're processing your files.  This should only take a few more seconds...
         </div>
      </div>
      <div id="ConfirmPanel">
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
