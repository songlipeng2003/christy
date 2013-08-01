$(function(){
  $('#image_upload').uploadify({
        swf  : SITE_URL+'/flash/uploadify.swf',
        uploader    : SITE_URL+'/site/upload',
        buttonText : '上传',
        auto      : true,
        multi     : false,
        fileSizeLimit : '10MB',
        fileTypeExts   : '*.jpg;*.jpeg;*.gif;*.png',
        onUploadSuccess : function(file, response, data) {
            if(response!='0'){
                $('#Movie_image').val(response);
            }
        }
  });
});