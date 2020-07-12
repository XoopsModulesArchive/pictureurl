<script language="JavaScript">
<!--
function resizePopUp(monImage, monTitre)
    {
	w = window.open('','chargement','width=10,height=10');
	w.document.write( "<html><head><title>"+monTitre+"</title>\n" );
	w.document.write( "<script language='JavaScript'>\n");
	w.document.write( "IE5=NN4=NN6=false;\n");
	w.document.write( "if(document.all)IE5=true;\n");
	w.document.write( "else if(document.getElementById)NN6=true;\n");
	w.document.write( "else if(document.layers)NN4=true;\n");
	w.document.write( "function autoSize() {\n");
	w.document.write( "if(IE5) self.resizeTo(document.images[0].width+10,document.images[0].height+31);\n");
	w.document.write( "else if(NN6) self.sizeToContent();\n");
	w.document.write( "else window.resizeTo(document.images[0].width,document.images[0].height+20);\n");
	w.document.write( "self.focus();\n");
	w.document.write( "}\n</scri");
	w.document.write( "pt>\n");
	w.document.write( "</head><body leftmargin=0 topmargin=0 marginwidth=0 marginheight=0 onLoad='javascript:autoSize();'>" );
	w.document.write( "<a href='javascript:window.close();'><img src='"+monImage+"' border=0 alt='"+monTitre+"'></a>" );
	w.document.write( "</body></html>" );
	w.document.close();
	}
-->
</script>