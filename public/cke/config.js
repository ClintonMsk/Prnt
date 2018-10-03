/**
 * @license Copyright (c) 2003-2018, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {


    //config.contentsCss = 'font/font.css';

    pluginset = '';
    /*Basic*/
    pluginset += 'widgetselection,clipboard,widget,dialog,basewidget,richcombo,quicktable,balloonpanel,tableresize,,image2,image,';
    /*BootStrap*/
    pluginset += 'glyphicons,';
    /*codeview*/
    pluginset += 'codesnippet,';
    /*ViedoEmbled*/
    pluginset += 'youtube,';
    /*Button*/
    pluginset += 'simplebutton,';
    /*Font*/
    pluginset += 'font,';
    pluginset += 'dragresize';

    config.font_names = 'Quark-Light;' + config.font_names;
    config.extraPlugins = pluginset;
    config.skin = 'office2013';
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';

    config.filebrowserBrowseUrl = '/laravel-filemanager?type=Files';
    config.filebrowserImageBrowseUrl = '/laravel-filemanager?type=Images';
    config.filebrowserUploadUrl = '/laravel-filemanager/upload?type=Files&_token=';
    config.filebrowserImageUploadUrl = '/laravel-filemanager/upload?type=Images&_token=';

    //config.filebrowserUploadUrl = 'http://localhost/Pramaha/admin/UploadImage';
    config.image_removeLinkByEmptyURL= true;
    config.allowedContent = true;


};
