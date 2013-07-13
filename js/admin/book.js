$(function(){
    $('#file_upload').uploadify({
        'swf'  : '/flash/uploadify.swf',
        'uploader'    : '/site/upload',
        'buttonText' : '上传',
        'auto'      : true,
        'multi'     : false,
        'sizeLimit' : 10240000,
        'fileTypeExts'   : '*.pdf',
        'onComplete': function(event, ID, fileObj, response, data) {
            if(response!='0'){
                $('#Book_document').val(response);
            }
        }
  });

  $('#image_upload').uploadify({
        'swf'  : '/flash/uploadify.swf',
        'uploader'    : '/site/upload',
        'buttonText' : '上传',
        'auto'      : true,
        'multi'     : false,
        'sizeLimit' : 10240000,
        'fileTypeExts'   : '*.jpg;*.jpeg;*.gif;*.png',
        'onComplete': function(event, ID, fileObj, response, data) {
            if(response!='0'){
                $('#Book_picture').val(response);
            }
        }
  });
});