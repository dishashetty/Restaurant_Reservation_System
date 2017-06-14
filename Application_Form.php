<html>
<head>
<title color="white">Application Form</title>
<script src="form_validation.js"></script>
<style>
body{background-repeat:no-repeat;
background-size:100%}
#form{width: 15em;height: 3sem;}
#left{line-height:30px;width:250px;float:left;padding:15px; }
#right{line-height:30px;width:250px;float:right;padding:15px; }

label {color: white;}
</style>
</head><font color="white">
<body onload="document.registration.empid.focus();" background="EmpFORM.jpg">


<center><h1>Employee Form:</h1><HR>
<p>**Every detail in the form below should be filled accordingly**</p><HR>
<form method="post" name="registration" onsubmit="return formvalidation();" action= "Application_Form_Redirect.php">
<table border=5 width=50% bordercolor="white">



<tr>
<td align=center><label >First Name:</label></td>
<td align=left><input type="text" name="fname" size="12"/></td>
</tr>

<tr>
<td align=center><label >Last Name:</label></td>
<td align=left><input type="text" name="lname" size="12"/></td>
</tr>



<tr>
<td align=center><label >Date of Birth:</label></td>
<td align=left><input type="date" name="dob" id="o">
</td>
</tr>

<tr>
<td align=center><label >Address Line-1:</label></td>
<td align=left><input type="text" name="add1" size="50"/></td>
</tr> 

<tr>
<td align=center><label >Address Line-2:</label></td>
<td align=left><input type="text" name="add2" size="50"/></td>
</tr> 

<tr>
<td align=center><label >City:</label></td>
<td align=left><input type="text" name="city"/></td>
</tr> 

<tr>
<td align=center><label >State:</label></td>
<td align=left><input type="text" name="state"/></td>
</tr> 

<tr>
<td align=center><label >Zip code:</label></td>
<td align=left><input type="text" name="zip"/></td>
</tr> 

<tr>
<td align=center><label >Email-id:</label></td>
<td align=left><input type="text" name="email" size="50"/></td>
</tr> 

<tr>
<td align=center><label >Contact:</label></td>
<td align=left><input type="text" name="contact" size="10"/></td>
</tr> 

<tr>
<td align=center><label >Social Security#(ssn):</label></td>
<td align=left><input type="text" name="ssn" size="50"/></td>
</tr> 

<tr>
<td align=center><label >Type:</label></td>
<td align=left>
<input type="radio" name="type" value="Manager"/>
<label><span>Manager</span>
<input type="radio" name="type" value="Full Time"/>
<span>Full-Time</span>
<input type="radio" name="type" value="Part Time"/>
<span>Part-Time</span></label>
</td>
</tr> 


<tr>
<td align=center><label >Qualification/Experience:</label></td>
<td align=left><textarea name="desc" id="desc"></textarea></td>
</tr> 


<tr>
<td align=center><label >Date of Application:</label></td>
<td align=left><input type="date" name="date" id="o">
</td>
</tr>


<tr>
<td colspan=2 align=center><input type="submit" name="submit" value="Submit"/>
&nbsp&nbsp&nbsp<input type="reset" name="clear" value="Clear"/></td>
</tr> 
<tr>
<td colspan=2 align=center>

</td></tr>
</table>
</center>
</body>
</html>