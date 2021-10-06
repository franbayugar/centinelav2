{{-- CK Editor --}}
<script src="{{ asset('AdminLTE/js/plugins/ckeditor/ckeditor.js') }}" type="text/javascript"></script> 
{{-- <script src="//cdn.ckeditor.com/4.11.2/basic/ckeditor.js"></script> --}}

<script src="{{ asset('AdminLTE/plugins/ckeditor/ckeditor-config.min.js') }}" type="text/javascript"></script>

{{--
<script type="text/javascript">
    $(function() {
 CKEDITOR.replace("description", {
  toolbar: [{
   name: "document",
   groups: ["mode", "document", "doctools"],
   items: ["Source", "-", "Save", "NewPage", "Preview", "Print", "-", "Templates"]
  }, {
   name: "clipboard",
   groups: ["clipboard", "undo"],
   items: ["Cut", "Copy", "Paste", "PasteText", "PasteFromWord", "-", "Undo", "Redo"]
  }, {
   name: "editing",
   groups: ["find", "selection", "spellchecker"],
   items: ["Find", "Replace", "-", "SelectAll", "-", "Scayt"]
  }, {
   name: "forms",
   items: ["Form", "Checkbox", "Radio", "TextField", "Textarea", "Select", "Button", "ImageButton", "HiddenField"]
  }, "/", {
   name: "basicstyles",
   groups: ["basicstyles", "cleanup"],
   items: ["Bold", "Italic", "Underline", "Strike", "Subscript", "Superscript", "-", "RemoveFormat"]
  }, {
   name: "paragraph",
   groups: ["list", "indent", "blocks", "align", "bidi"],
   items: ["NumberedList", "BulletedList", "-", "Outdent", "Indent", "-", "Blockquote", "CreateDiv", "-", "JustifyLeft", "JustifyCenter", "JustifyRight", "JustifyBlock", "-", "BidiLtr", "BidiRtl", "Language"]
  }, {
   name: "links",
   items: ["Link", "Unlink", "Anchor"]
  }, {
   name: "insert",
   items: ["Image", "Flash", "Table", "HorizontalRule", "Smiley", "SpecialChar", "PageBreak", "Iframe"]
  }, "/", {
   name: "styles",
   items: ["Styles", "Format", "Font", "FontSize"]
  }, {
   name: "colors",
   items: ["TextColor", "BGColor"]
  }, {
   name: "tools",
   items: ["Maximize", "ShowBlocks"]
  }, {
   name: "others",
   items: ["-"]
  }]
 })
});
</script>
--}}