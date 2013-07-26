$(function(){
    $('#file_upload').uploadify({
        swf  : SITE_URL+'/flash/uploadify.swf',
        uploader    : SITE_URL+'/site/upload',
        buttonText : '上传',
        auto      : true,
        multi     : false,
        sizeLimit : 10240000,
        fileTypeExts   : '*.pdf',
        onUploadSuccess: function(file, response, data) {
            if(response!='0'){
                $('#Book_file').val(response);
            }
        }
  });

  $('#image_upload').uploadify({
        swf  : SITE_URL+'/flash/uploadify.swf',
        uploader    : SITE_URL+'/site/upload',
        buttonText : '上传',
        auto      : true,
        multi     : false,
        sizeLimit : 10240000,
        fileTypeExts   : '*.jpg;*.jpeg;*.gif;*.png',
        onUploadSuccess : function(file, response, data) {
            if(response!='0'){
                $('#Book_image').val(response);
            }
        }
  });
});