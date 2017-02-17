//Copyright 2014 O'Neil Printing.  All rights reserved.

// namespace:
this.oneil = this.oneil || {};

(function () {
   //------------------------------------------------------------------------------------
   // BigDownload
   //------------------------------------------------------------------------------------
   var BigDownload = {

      init: function () {

         this.serviceUrl = this.serviceUrl || '';
         this.salesRepUrl = this.salesRepUrl || '';

         this.routes = {
            complete: '/picker/send'
         }

         //Register the API key for the file picker
         filepicker.setKey('Am2o1bkgzSAmThV3fSfi2z');

         //Listen for button clicks on the upload button
         $('.uploadButton').on('click', function () {
            BigDownload.pickFiles();
         });

         //Listen for button clicks on the more button
         $('.moreButton').on('click', function () {
            $('#UploadPanel').show();
            $('#WaitPanel').hide();
            $('#ConfirmPanel').hide();
            $('.uploadResult').hide();
         });

         //Listen for button clicks on the more button
         $('#ToList').on('change', function () {
            if ($('#ToList').val().toLowerCase() == 'external') {
               $('#ToEmailLine').show();
            }
            else {
               $('#ToEmailLine').hide();
            }
         });

         //Populate the TO sales reps
         BigDownload.populateSalesReps('#ToList', BigDownload.salesRepUrlTo);

         //Populate the FROM sales reps
         BigDownload.populateSalesReps('#FromList', BigDownload.salesRepUrlFrom);
      },

      populateSalesReps: function (id, url) {

         $.support.cors = true;

         //Pull the sales rep list from S3
         $.ajax({
            url: url,
            type: "GET",
            dataType: "json",
            crossDomain: true
         }).done(function (data, textStatus, jqXHR) {

            if (data && data.list) {
               var selectEl = $(id);

               var groups = data.list;
               for (var g = 0; g < groups.length; g++) {

                  var group = groups[g];
                  var optGroup = $("<optgroup label='" + group.displayName + "' />");
                  selectEl.append(optGroup);

                  var contacts = group.contacts;

                  //Populate the sales rep list html dropdown 
                  for (var i = 0; i < contacts.length; i++) {
                     var rep = contacts[i];
                     optGroup.append($("<option value='" + rep.id + "'>" + rep.external + "</option>"));
                  }
               }
            }

         })
         .fail(function (jqXHR, textStatus, errorThrown) {
            //alert("fail");
         })
         .always(function (data_jqXHR, textStatus, jqXHR_errorThrown) { });
      },

      pickFiles: function () {

         //Serialize the form
         var formData = BigDownload.jsonForm();

         //Validate the form
         if (BigDownload.validateForm(formData)) {

            //Sanatize the filename so that we know it's safe for S3
            //var fileSafeName = formData.company.toLowerCase();
            //fileSafeName = fileSafeName.replace(/[^a-z0-9_\-]/gi, '_');

            //Sanatize the rep name so that we know it's safe for S3
            //var repSafeName = formData.salesRepID.toLowerCase();
            //repSafeName = repSafeName.replace(/[^a-z0-9_\-]/gi, '_');


            //Set the file picker options
            var pickerOptions = {
               multiple: true,
               folders: false,
               service: 'COMPUTER'
            };

            //Set the file picker storage options
            var storeOptions = {
               location: 'S3',
               container: BigDownload.bucket,
               //path: '/' + repSafeName + '/' + fileSafeName + '/'
            };

            //Launch the file picker
            filepicker.pickAndStore(pickerOptions, storeOptions, function (inkBlobs) {
               //console.log(JSON.stringify(inkBlobs));

               var fileList = new Array();
               for (var i = 0; i < inkBlobs.length; i++) {
                  fileList[i] = {
                     filename: inkBlobs[i].filename,
                     key: inkBlobs[i].key
                  };
               }

               BigDownload.onUploadComplete(fileList);
            },
            function (FPError) {
               //console.log(FPError);
            }
            );
         }
      },

      jsonForm: function () {

         var form = $('#UploadFileForm');

         return {
            fromID: $('#FromList', form).val(),
            toID: $('#ToList', form).val(),
            email: $('#ToEmail', form).val(),
            comments: $('#Comments', form).val(),
         };
      },

      validateForm: function (formData) {

         var result = true;

         $('.errorFile').hide();
         $('.errorName').hide();
         $('.errorCompany').hide();
         $('.errorEmail').hide();
         $('.errorJob').hide();
         $('.uploadResult').hide();

         if ($('#ToList').val().toLowerCase() == 'external') {
            if (formData.email.length <= 0 || !BigDownload.isValidEmail(formData.email)) {
               $('.errorEmail').show();
               result = false;
            }
         }

         return result;
      },

      isValidEmail: function (email) {

         var trimmed = email.replace(/\s/g, '');
         var emails = trimmed.split(';');
         for (var i = 0; i < emails.length; i++) {
            var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            if (!re.test(emails[i])) {
               return false;
            }
         }

         return true;
      },

      onUploadComplete: function (fileList) {

         $('#UploadPanel').hide();
         $('#WaitPanel').show();
         $('#ConfirmPanel').hide();
         $('.uploadResult').hide();

         //Serialize the form
         var formData = BigDownload.jsonForm();
         formData.fileList = fileList;

         //Make the ajax call to the server
         $.ajax(BigDownload.serviceUrl + BigDownload.routes.complete, {
            type: "POST",
            dataType: "json",
            data: formData
         })
         .done(function (data) {
            if (data && data.opStatus == 200) {
               $('#UploadPanel').hide();
               $('#WaitPanel').hide();
               $('#ConfirmPanel').show();
            }
            else {
               $('#UploadPanel').show();
               $('#WaitPanel').hide();
               $('#ConfirmPanel').hide();
               $('.uploadResult').show();
            }
         })
         .fail(function (jqXHR, textStatus) {
            $('#UploadPanel').show();
            $('#WaitPanel').hide();
            $('#ConfirmPanel').hide();
            $('.uploadResult').show();
         })
         .always(function () { });

      }
   };

   oneil.BigDownload = BigDownload;

   $(document).ready(function () {
      BigDownload.init();
   });

}());


