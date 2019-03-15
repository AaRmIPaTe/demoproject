<?php
session_start();
include("header.php");
include("connection.php");
?>
<script type="text/javascript">
	function validation()
	{
		var re= /^[a-z,A-Z ]+$/;
		if(form1.txtname.value=="")
		{
			alert("Please Enter Your Name..");
			form1.txtname.focus();
			return false;
		}else{
			if(!re.test(form1.txtname.value))
			{
				alert("Dont Used Number or Symbols in Name Textbox");
				form1.txtname.focus();
				return false;
			}
		}
		
		
		if(form1.txtadd.value=="")
		{
			alert("Please Enter Your Address..");
			form1.txtadd.focus();
			return false;
		}

	
		if(form1.txtcity.value=="")
		{
			alert("Please Enter Your City..");
			form1.txtcity.focus();
			return false;
		}else{
			if(!re.test(form1.txtcity.value))
			{
				alert("Dont Used Number or Symbols in City Textbox");
				form1.txtcity.focus();
				return false;
			}
		}		
		
		
		
		var a= form1.txtmno.value;
		if(form1.txtmno.value=="")
		{
			alert("Please Enter Your Mobile No..");
			form1.txtmno.focus();
			return false;
		}else if(a.length!=10)
		{
			alert("Please Enter Your Mobile number 10 Digit long");
			form1.txtmno.focus();
			return false;
		}
		else
		{
			for(i=0;i<=a.length-1;i++)
			{
				if(isNaN(a.charAt(i)))
				{
					alert("Dont Used Character in Mobile Number");
					return false;
					break;
				}
			}
		}
		
		var re=/^[a-zA-Z0-9.-_]+@[a-zA-Z0-9.-_]+\.([a-zA-Z]{2,4})$/;
		if(form1.txtemail.value=="")
		{
			alert("Please Enter Your Email ID");
			form1.txtemail.focus();
			return false;
		}else{
			if(!re.test(form1.txtemail.value))
			{
				alert("Enter proper Email id");
				form1.txtemail.focus();
				return false;
			}
		}
		
		var p=form1.txtpwd.value;
		if(form1.txtpwd.value=="")
		{
			alert("Please Enter Password");
			form1.txtpwd.focus();
			return false;
		}
		else if(p.length<6)
		{
			alert("Enter More than 6 Characters in Password");
			form1.txtpwd.focus();
			return false;
		}
		else if(p.length>10)
		{
			alert("Enter Less than 10 Characters in Password");
			form1.txtpwd.focus();
			return false;
		}
		
		
	}
</script>

<?php
	if(isset($_POST['btnregister']))
	{
		$name=$_POST['txtname'];
		$add=$_POST['txtadd'];
		$city=$_POST['txtcity'];
		$mno=$_POST['txtmno'];
		$email=$_POST['txtemail'];
		$pwd=$_POST['txtpwd'];
		
		$res=mysql_query("select * from registration where email_id='$email'");
		if(mysql_num_rows($res)>0)
		{
			echo "<script type='text/javascript'>";
			echo "alert('Email Id Already Used');";
			echo "</script>";
		}else{
			//auto number code started...
			
			$res1=mysql_query("select max(cust_id) from registration");
			$cid=0;
			while($r1=mysql_fetch_row($res1))
			{
				$cid=$r1[0];
			}
			$cid++;
			//auto number code finish...
			
			$ans=mysql_query("insert into registration values('$cid','$name','$add','$city','$mno','$email','$pwd')");
			if($ans=="1")
			{
				echo "<script type='text/javascript'>";
				echo "alert('Customer Registration Done');";
				echo "window.location.href='login.php';";
				echo "</script>";
			}
		}
	}
?>
<div class="content">
    <div class="container_12">
      <div class="grid_5">
<br><br><br>
<h2><center><marquee width="100%" direction="right" behaviour="alternate">REGISTRATION  FORM</marquee></h2>
      
     <br><img src="images/is16.jpg"  width=500 height=300 alt="" class="img_inner">
       </div>
      <div class="grid_5 prefix_2">
        <h2></h2>
        <ul class="carousel2">
          <li>
<center><img src="images/log.jpg" width=150 height=100>
               <div class="clear"></div>
	 
        <br><form id="form" name="form1" method="post" >
          
          <fieldset>
            <label class="name">
              <input type="text" name="txtname" placeholder="Name">
              <br class="clear">
       <br>
	<label class="message">
              <textarea name="txtadd" placeholder="Address"></textarea>
              <br class="clear">
          <br>
	 <label class="name">
              <input type="text" name="txtcity" placeholder="City">
              <br class="clear">
       <br>
	   
	   <label class="name">
              <input type="text" name="txtmno" placeholder="Mobile No">
              <br class="clear">
       <br>
            <label class="email">
              <input type="text" name="txtemail" placeholder="E-mail">
              <br class="clear">
         <br>
            <label class="email">
              <input type="password" name="txtpwd" placeholder="Password">
              <br class="clear">   
         
          
           
            <div class="clear"></div>
            <div class="btns"><input type="submit" value="REGISTER" onclick="return validation();" name="btnregister" class="btn"></a></a>
              <div class="clear"></div>
            </div>
          </fieldset>
        </form>
          </li>
         
        </ul>
        </div>
      <div class="clear"></div>
      <div class="grid_12">
       
      </div>
      <div class="clear"></div>
      
      <div class="clear"></div>
      <div class="bottom_block">
        
        
      </div>
      <div class="clear"></div>
    </div>
  </div>
</div>
<?php
include("footer.php");
?>