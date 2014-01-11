<html>
<?php 
include "head.php"; 
include_once('config.php');
include_once('BibleDAO.php');

$books = BibleDAO::getBooks();
$defaultChapters = BibleDAO::getChapterNumbers(1);
$defaultVerses = BibleDAO::getVerseNumbers(1, 1);
$defaultVerseText = BibleDAO::getVerseText(1, 1, 1);
?>
<head><link tpye="text" rel="stylesheet" href="css/bootstrap.css">
  <link type = "text/css" rel="stylesheet" href="style.css">
  <script src = "bible.js"></script>
  </head>
  <body style = "background:url('img/yen4.jpg')">
     <center>
            <font color="Black" face="Century Gothic">
           <h2>King James Version</h2></font></center>
            </b><br><br><br>
            <div class = "thumbnail" style = "height:400px">
                <div class="span12">
                    <b style='margin-left:750px'><input type = "searchbox" id = "key" placeholder = "Search ..." style = "margin-top:20px" class = "search-query">
                    <div class = "span6 pull-left">
                  	 	<form method = "POST" name = "frm">
                            <table class="table table-bordered span8" align = "center" style = "margin-left:0px">
                                <thead>
                                    <tr>
                                        <th class = "len">Book Title</th>
                                        <th class = "len">Chapter</th>
                                        <th class = "len">Verse</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <select name="books" id="books">
                                                <?php foreach($books as $id => $book): ?>
                                                    <option value="<?= $id ?>"><?= $book ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </td>
                                        <td>
                                            <select name="chapters" id="chapters">
                                                <?php for($i = 1; $i <= $defaultChapters; $i++): ?>
                                                    <option value="<?= $i ?>"><?= $i ?></option>
                                                <?php endfor ?>
                                            </select>
                                        </td>
                                        <td>
                                            <select name="verses" id="verses">
                                                <?php for($i = 1; $i <= $defaultVerses; $i++): ?>
                                                    <option value="<?= $i ?>"><?= $i ?></option>
                                                <?php endfor ?>
                                            </select>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                        <div id="verse_text" class = "offset1 yen">
                            <?= $defaultVerseText ?>
                        </div>
                    </div>
                    <div class="span3 pull-right">
                        <textarea class = "result" id = "result" style = "margin-left:30px"></textarea>
                        <div class = "loading" id = "load">
                    </div>
                </div>
            </div>
<script type="text/javascript" src="js/jquery.1.10.2.js"></script>
<script type="text/javascript">

</script>
    </body>
</html>