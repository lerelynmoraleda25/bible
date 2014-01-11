;<?php
include('dbconfig.php');
$count= 0;
$key =  $_POST['key'];
$key = addslashes($key);
$sql = mysql_query("SELECT DISTINCT book_name, chapter_number,verse_number,verse_text, boo_id FROM kjv_english c INNER JOIN book_name s ON c.book_id = s.boo_id WHERE verse_text LIKE '%$key%'") or die(mysql_error());

while($row = mysql_fetch_array($sql)) {
$count++;
$bookname = $row['book_name'];
$bookchapter = $row['chapter_number'];
$bookverse = $row['verse_number'];
$words = $row['verse_text'];

if($count < 50){
?>
  	<?php echo "$bookname $bookchapter : $bookverse \n $words \n\n" ?>

<?php }}
	if($count==""){
		echo "<p class = 'Error'>No Word/s or Phrase/s Found!</p>";
	}else{
	
	?>
<?php } ?>
