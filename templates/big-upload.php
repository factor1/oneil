<?php
// Template Name: BigUpload
get_header();
?>

<script type="text/javascript">
   oneil.BigUpload.serviceUrl = "https://bigupload.oneilprint.com:446";
   oneil.BigUpload.salesRepUrl = "//oneil-bigupload.s3.amazonaws.com/email_rcv_distribution.json";
   oneil.BigUpload.bucket = "oneil-bigupload-received";
</script>

<?php
// get template parts
get_template_part('parts/standard-hero');
get_template_part('parts/breadcrumbs');
get_template_part('parts/intro-content');
?>

<div class="container bigUpload--container">
  <div class="row">
    <div class="col-8 col-centered">
      <div class="bigUpload">
        <div id="UploadPanel">
          <form id="UploadFileForm" method="POST" autocomplete="on">
            <div>
              <div class="formLine">
                <div class="formLabel">*Your Name:</div>
                <div class="formField">
                  <input id="name" class="formInput" type="text" />
                </div>
              </div>
              <div class="formLine">
                <div class="formLabel">*Company:</div>
                <div class="formField">
                  <input id="organization" class="formInput" type="text" />
                </div>
              </div>
              <div class="formLine">
                <div class="formLabel">Phone Number:</div>
                <div class="formField">
                  <input id="tel" class="formInput" type="text" />
                </div>
              </div>
              <div class="formLine">
                <div class="formLabel">*Email Address:</div>
                <div class="formField">
                  <input id="email" class="formInput" type="text" />
                </div>
              </div>
              <div class="formLine">
                <div class="formLabel">Your Sales Rep:</div>
                <div class="formField">
                  <select id="SalesRepList" class="formSelect" ></select>
                </div>
              </div>
              <div class="formLine">
                <div class="formLabel">*Job Name / Description:</div>
                <div class="formField">
                  <input id="JobNumber" class="formInput" type="text" />
                </div>
              </div>
              <div class="formLine">
                <div class="formLabel">Comments:</div>
                <div class="formField">
                  <textarea id="Comments" class="formInput" ></textarea>
                </div>
              </div>
            </div>

            <?php // Empty Div? <div></div> ?>

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
                * Fields are required.
                <br>
                <br>
              </div>
              <div class="uploadResult">
                <div id="UploadResult">There was a problem sending email to your sales rep.  Please notify them that you uploaded a file.</div>
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
            We received your files and those applicable have been notified.<br />
            If you forgot to note anything, please feel free to <a href="http://www.oneilprint.com/contact" target="_blank">contact us.</a>
          </div>
          <div class="clear fileSelectWrapper">
            <div class="fileSelect">
              <input type="button" class="uploadButton" value="SEND MORE FILES" />
              <input type="button" class="moreButton" value="GO BACK" />
            </div>
          </div>
          <div class="clear"></div>
        </div>
      </div>
    </div>
  </div>
</div>


<?php
get_footer();
