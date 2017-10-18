<!DOCTYPE html>
<html>
<head>
	<link type="text/css" rel="stylesheet" href="Style.css">
	<title>WillBe Board</title>
</head>
<body>
<!-- header('refresh: 5;url="http://127.0.0.1/message%20board/index.php"') ?> -->
	
<header class="contain site-header">
	<div class="contain site-header-inner">
		
	</div>
</header>

<style>
    input {padding:5px 15px; background:#ccc; border:0 none;
cursor:pointer;
-webkit-border-radius: 5px;
border-radius: 5px; }
</style>

<div class="site-main">
	<div class="contain site-main-inner">
		<div class = "site-content">

				<?php 	require("Mysqlconnect.php");
					$link = connect_mySQL();?>
				
			<div class = "Clientmessage">
				<?php 
					if($x = mysqli_query($link,"SELECT `Clientmessage` FROM `ClientData` WHERE 1"))
					{
 						// printf("%d\<br>",mysqli_num_rows($x)) ;
 						while($gear = mysqli_fetch_array($x,MYSQLI_NUM))
	 					{
	 	 					printf(" %s<br> ",$gear[0]);
	 	 				}
					}
					else printf( "select test Fall\n") ;
				?>
				

			</div>
			<div class = "ClientNickname">
				<?php 
					if($x = mysqli_query($link,"SELECT `ClientNickname` FROM `ClientData` WHERE 1"))
					{
 						//printf("%d\<br>",mysqli_num_rows($x)) ;
 						while($gear = mysqli_fetch_array($x,MYSQLI_NUM))
	 					{
	 	 					printf(" %s<br> ",$gear[0]);
	 	 				}
					}
					else printf( "select test Fall\n") ;
				?>
			</div>
			<div class = "ClientEmail">
				<?php 
					if($x = mysqli_query($link,"SELECT `ClientEmail` FROM `ClientData` WHERE 1"))
					{
 						//printf("%d\<br>",mysqli_num_rows($x)) ;
 						while($gear = mysqli_fetch_array($x,MYSQLI_NUM))
	 					{
	 	 					printf(" %s<br> ",$gear[0]);
	 	 				}
					}
					else printf( "select test Fall\n") ;
				?>
			</div>
			<div class = "MessageTime">
				<?php 
					if($x = mysqli_query($link,"SELECT `MessageTime` FROM `ClientData` WHERE 1"))
					{
 						//printf("%d\<br>",mysqli_num_rows($x)) ;
 						while($gear = mysqli_fetch_array($x,MYSQLI_NUM))
	 					{
	 	 					printf(" %s<br> ",$gear[0]);
	 	 				}
					}
					else printf( "select test Fall\n") ;
				?>
			</div>
			
		</div>

	



		<div class="sidebar">
			<div class="sidebar-inner">
			<form method="GET" action="index.php">
				<dt><l2>Your nickname</dt>
				<input type="text" name="Nickname" id="Nickname" class="profile" style="width:200px" placeholder="Enter nickname">
				<br><br>
				<dt><l2>Your email</dt>
				<input type="text" name="Email" id="Email" class="profile" style="width:200px" placeholder="Enter Email">
				<br><br>
				<dt><l2>message</dt>
				<textarea  type="text" name="messagetest" id="messagetest" >

				</textarea>
				<input type="submit" name="Enter" id="Enter" value="Enter">
			</form>
		<?php
		
		$Nickname = $_GET["Nickname"];
		$Email = $_GET["Email"];
		$Message = $_GET["messagetest"];
		if($Nickname != "")
		{
			
			
			print("Nickname = $Nickname<br>Email = $Email<br>message = $Message<br>");
			$times =  date("Y/m/d-h:i:a"); 
			if(mysqli_query($link,"INSERT INTO `ClientData` (`ClientmessageID`, `ClientNickname`, `ClientEmail`, `Clientmessage`, `MessageTime`, `other`) VALUES ('w', '$Nickname', '$Email','$Message',  '$times', 'w')")){
 	 			printf("insert test succès\n") ;
 			}
			else printf( "insert test Fall\n") ;
			
		}
		?>
		</div>
		</div>
	</div>	
</div>
<footer class="contain site-footer">
	<div class="contain site-footer-inner">
	</div>
</footer>
</div>
</body>
</html>