<!DOCTYPE html>
<html>
<head>
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="screen">
    <link href="css/font-awesome.css" rel="stylesheet" type="text/css" media="screen">
    <link rel="stylesheet" type="text/css" href="style.css">
       
	<?php include('config.php'); ?>
</head>
<?php
function getBook(){
	include "config.php";
	$sel_sql="SELECT * FROM book_name";
	$sel_exe=mysql_query($sel_sql);

	while($sel_rows = mysql_fetch_array($sel_exe))
	{
		$id = $sel_rows['boo_id'];
		$bookname = $sel_rows['book_name'];
		?>
			<option value="<?php echo $id; ?>">
				<i class="icon-book"></i><?php echo $bookname; ?>
			</option>
	<?php  }
}
?>
<script type="text/javascript">
function getXMLHTTP() { //fuction to return the xml http object
		var xmlhttp=false;	
		try{
			xmlhttp=new XMLHttpRequest();
		}
		catch(e)	{		
			try{			
				xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e){
				try{
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch(e1){
					xmlhttp=false;
				}
			}
		}
		 	
		return xmlhttp;
    }
function getChapter(boo_id) {		
		
		var strURL="chapterList.php?chapter="+boo_id;
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					if (req.status == 200) {						
						document.getElementById('chapterdiv').innerHTML=req.responseText;						
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}		
	}
function getVerse(book_id,chapter_number) {		
		var strURL="verseList.php?book="+book_id+"&chapter="+chapter_number;
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					if (req.status == 200) {						
						document.getElementById('versediv').innerHTML=req.responseText;						
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}
				
	}
function getText(book_id,chapter_number,verse_number) {		
		var strURL="textList.php?book="+book_id+"&chapter="+chapter_number+"&verse="+verse_number;
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					if (req.status == 200) {						
						document.getElementById('textdiv').innerHTML=req.responseText;						
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}
				
	}
</script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/books.js" ></script>	
	
		