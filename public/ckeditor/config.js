/**
 * @license Copyright (c) 2003-2020, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function(config) {
    // Define changes to default configuration here. For example:  
    // config.language = 'fr';  
    // config.uiColor = '#AADC6E';  
    config.filebrowserBrowseUrl = '/editor/ckfinder/browse.php?opener=ckeditor&type=files';
    config.filebrowserImageBrowseUrl = '/editor/ckfinder/browse.php?opener=ckeditor&type=images';
    config.filebrowserFlashBrowseUrl = '/editor/ckfinder/browse.php?opener=ckeditor&type=flash';
    config.filebrowserUploadUrl = '/editor/ckfinder/upload.php?opener=ckeditor&type=files';
    config.filebrowserImageUploadUrl = '/editor/ckfinder/upload.php?opener=ckeditor&type=images';
    config.filebrowserFlashUploadUrl = '/editor/ckfinder/upload.php?opener=ckeditor&type=flash';
};