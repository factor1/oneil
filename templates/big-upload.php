<?php
// Template Name: BigUpload
get_header();
?>

<link href="//oneil-bigupload.s3.amazonaws.com/css/bigupload.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="//oneil-bigupload.s3.amazonaws.com/js/jquery.xdomainrequest.min.js"></script>
<script type="text/javascript" src="//api.filepicker.io/v1/filepicker.js"></script>
<script type="text/javascript" src="//oneil-bigupload.s3.amazonaws.com/js/bigupload_v1.2.js"></script>
<!--<script type="text/javascript" src="js/bigupload.js"></script>-->
<script type="text/javascript">
   oneil.BigUpload.serviceUrl = "https://bigupload.oneilprint.com:446";
   oneil.BigUpload.salesRepUrl = "//oneil-bigupload.s3.amazonaws.com/email_rcv_distribution.json";
   oneil.BigUpload.bucket = "oneil-bigupload-received";
</script>
   <div class="bigUpload">
      <div id="UploadPanel">
		<!--
		<h1>
            We&#8217;ll take good care<br />of your files.
        </h1>
		 -->
		<br>
		<h1>
            O&#8217;Neil Printing BigUpload
        </h1>


         <div class="instruct">
            Please use the handy form below to upload your files.  If you have any questions
            along the way, feel free to <a href="http://www.oneilprint.com/contact" target="_blank">give us a call</a> or check out our <a href="http://www.oneilprint.com/all-about-you/client-resources/" target="_blank">FAQs</a> page.
			<!--<br><br> Please package files (zip, rar, etc) into a single file before uploading. If files are larger than 2GB, or there are compatibility issues - please utilize our <a target="_blank" href="http://www.oneilprint.com/images/docs/oneil_ftp_instructions.pdf">ftp server</a>. Thanks!-->
         </div>
		 <!--
		 <div class="reqField">
			* Fields are required.
         </div>
		 -->
         <form id="UploadFileForm" method="POST" autocomplete="on">
            <div>
                  <div class="formLine">
                     <div class="formLabel">*Your Name:</div>
                     <div class="formField">
                        <input id="name" class="formInput" type="text" style="width:445px; height:21px;" />
                     </div>
                  </div>
                  <div class="formLine">
                     <div class="formLabel">*Company:</div>
                     <div class="formField">
                        <input id="organization" class="formInput" type="text" style="width:445px; height:21px;"  />
                     </div>
                  </div>
                  <div class="formLine">
                     <div class="formLabel">Phone Number:</div>
                     <div class="formField">
                        <input id="tel" class="formInput" type="text" style="width:421px; height:21px;" />
                     </div>
                  </div>
                  <div class="formLine">
                     <div class="formLabel">*Email Address:</div>
                     <div class="formField">
                        <input id="email" class="formInput" type="text" style="width:421px; height:21px;"/>
                     </div>
                  </div>
                  <div class="formLine">
                     <div class="formLabel">Your Sales Rep:</div>
                     <div class="formField">
                        <select id="SalesRepList" class="formSelect" style="width:346px; height:21px;"></select>
                     </div>
                  </div>
                  <div class="formLine">
                     <div class="formLabel">*Job Name / Description:</div>
                     <div class="formField">
                        <input id="JobNumber" class="formInput" type="text" style="width:344px; height:21px;" />
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

				  Please collect multiple files into a single file before uploading. (zip, rar, etc) The time required to upload your file(s) is dependent on the speed of your internet connection. Upload size limit of 20 GB.<br><br>
				  * Fields are required.<br><br>
               </div>
               <div class="uploadResult">
                  <div id="UploadResult">There was a problem sending email to your sales rep.  Please notify them that you uploaded a file.</div>
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
            We received your files and those applicable have been notified.<br />
            If you forgot to note anything, please feel free to <a href="http://www.oneilprint.com/contact" target="_blank">contact us.</a>
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

<?php
get_footer();
