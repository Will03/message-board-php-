<?php
mysql_connect("localhost", "root", "");
mysql_select_db("hahow");
mysql_query("SET NAMES UTF8");

//如果沒有登入的SESSION，就轉址
if (isset($_SESSION["email"])==FALSE) {
 header('Location: login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
 <title>Message Board</title>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
<br><br><br><br>
<div class="container">
 <h3 class="text-center">會員留言板</h3>
 <hr>

<?php
$re=mysql_query("SELECT * FROM message");
//檢査有沒有留言數（ message 資料表的資料筆數是否大於0）：參考
if(mysql_num_rows($re)>0){
 //如果有留言，一筆一筆印出留言
 //使用 while 迴圈從 message 資料表一筆一筆讀取留言的方法：參考
 while($row=mysql_fetch_array($re))
 {
 //mysql_query() 括弧裡面的指令，使用變數時，要用單引號包起來，參考
 $memberRe=mysql_query("SELECT * FROM member WHERE id='$row[guest_id]'");
 $memberRow=mysql_fetch_array($memberRe);

 echo "<div class=\"panel panel-default\">
 <div class=\"panel-heading\">$memberRow[name] 
 <span class=\"pull-right\">$row[date]
 //以更改網址的方式強制讀取GET表單資料
 //正常的流程：使用者在GET表單輸入資料→送出轉址→新網址裡面有使用者輸入的資料
 //轉址到有特定 GET 表單 id 的 msg-del.php
 <a href=\"msg-del.php?id=$row[id]\" class=\"btn btn-danger btn-xs\">
 DELETE
 </a>
 </span>
 </div>
 <div class=\"panel-body\"> $row[content]
 </div>
 </div>";
 }
}

else{
 //沒有留言的話
 echo "<p class=\"text-center\">沒有任何訊息！</p>";
}
?>
 <hr>
 <p class="pull-right">以 <?php echo $_SESSION["name"]; ?> 的身份留言</p>
 <h4>新增留言</h4>
 <form action="msg-add.php" method="post">
 <textarea name="msg" class="form-control"></textarea>
 <br>
 <input type="submit" name="submit" value="送出" class="btn btn-primary btn-sm pull-right">
 </form>
</div>
</body>
</html>
