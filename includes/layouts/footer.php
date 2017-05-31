    <!-- <div id="footer">Copyright <?php echo date("Y"); ?>, Suraj Vadulas</div> -->
    <script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script>
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    <script type="text/javascript">
  // <![CDATA[
    bkLib.onDomLoaded(function() {
          // new nicEditor().panelInstance('post');
          // new nicEditor({fullPanel : true}).panelInstance('post');
  //         new nicEditor({iconsPath : '../nicEditorIcons.gif'}).panelInstance('area3');
  //         new nicEditor({buttonList : ['fontSize','bold','italic','underline','strikeThrough','subscript','superscript','html','image']}).panelInstance('area4');
          // new nicEditor({maxHeight : 100}).panelInstance('post');
    });
  //   ]]>
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/js/foundation.js"></script>
	</body>
</html>
<?php
  // Close database connection
	if (isset($connection)) {
	  mysqli_close($connection);
	}
?>
