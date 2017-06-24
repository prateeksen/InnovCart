function comment(e)
{
	if(e.keyCode == 13)
	{
		document.getElementById('showsuccess').innerHTML="<div class='alert alert-success' align='center'> Adding Comment..Please Wait.</div>";
		var comment=document.getElementById('commentbox').value;
		var commenter=document.getElementById('commenter').value;
		var vid=document.getElementById('vid').value;
		url="addcomment.php?comment="+comment+"&commenter="+commenter+"&vid="+vid;
		id="showsuccess";


		xhr=new XMLHttpRequest();


		xhr.open("GET", url , true);
		xhr.send();

		function lwdata()
		{
			if(xhr.readyState==4)
			{
			data=xhr.responseText;
			document.getElementById(id).innerHTML=data;
			}
		}
		xhr.onreadystatechange=lwdata;
	}

	
}
function count(){
	url="adscount.php?ad=60090";
	
		xhr=new XMLHttpRequest();


		xhr.open("GET", url , true);
		xhr.send();

		function lwdata()
		{
			if(xhr.readyState==4)
			{
			data=xhr.responseText;
			}
		}
		xhr.onreadystatechange=lwdata;
}

function count1(){
	url="adscount.php?ad=250250";
	
		xhr=new XMLHttpRequest();


		xhr.open("GET", url , true);
		xhr.send();

		function lwdata()
		{
			if(xhr.readyState==4)
			{
			data=xhr.responseText;
			}
		}
		xhr.onreadystatechange=lwdata;
}

function count2(){
	url="adscount.php?ad=72890";
	
		xhr=new XMLHttpRequest();


		xhr.open("GET", url , true);
		xhr.send();

		function lwdata()
		{
			if(xhr.readyState==4)
			{
			data=xhr.responseText;
			}
		}
		xhr.onreadystatechange=lwdata;
}
function check()
{
	var email=document.getElementById('uemail').value;
	var pass=document.getElementById('upass').value;
		
		url="checklogin.php?email="+email+"&pass="+pass;
		id="successshow";


		xhr=new XMLHttpRequest();


		xhr.open("GET", url , true);
		xhr.send();

		function lwdata()
		{
			if(xhr.readyState==4)
			{
			data=xhr.responseText;
			document.getElementById(id).innerHTML=data;
			}
		}
		xhr.onreadystatechange=lwdata;
		if(data=="")
		location.reload();
}

function likeme(e){
		document.getElementById('likers').innerHTML="<span class='badge' align='center'><span class='glyphicon glyphicon-refresh glyphicon-spin'></span> Processing</span>";
		url="videoliker.php?id="+e;
		id="likers";
		xhr=new XMLHttpRequest();


		xhr.open("GET", url , true);
		xhr.send();

		function lwdata()
		{
			if(xhr.readyState==4)
			{
			data=xhr.responseText;
			document.getElementById(id).innerHTML=data;
			}
		}
		xhr.onreadystatechange=lwdata;
}

function checklogin2()
{
	var email=document.getElementById('temail').value;
	var pass=document.getElementById('tpwd').value;
		
		url="checklogin.php?email="+email+"&pass="+pass;
		id="showmy";


		xhr=new XMLHttpRequest();


		xhr.open("GET", url , true);
		xhr.send();

		function lwdata()
		{
			if(xhr.readyState==4)
			{
			data=xhr.responseText;
			document.getElementById(id).innerHTML=data;
			}
		}
		xhr.onreadystatechange=lwdata;
		if(data=="")
		location.reload();
}
function isavailuser()
{

		document.getElementById('isavailuser').innerHTML="<span class='badge' align='center'><span class='glyphicon glyphicon-refresh glyphicon-spin'></span> Checking for availability.</span>";
		var user=document.getElementById('username').value;
		url="dynamiccheck.php?user="+user;
		id="isavailuser";


		xhr=new XMLHttpRequest();


		xhr.open("GET", url , true);
		xhr.send();

		function lwdata()
		{
			if(xhr.readyState==4)
			{
			data=xhr.responseText;
			document.getElementById(id).innerHTML=data;
			}
		}
		xhr.onreadystatechange=lwdata;	
}
function isavailemail()
{

		document.getElementById('isavailemail').innerHTML="<span class='badge' align='center'><span class='glyphicon glyphicon-refresh glyphicon-spin'></span> Checking for availability.</span>";
		var email=document.getElementById('email').value;
		url="dynamiccheck.php?email="+email;
		id="isavailemail";


		xhr=new XMLHttpRequest();


		xhr.open("GET", url , true);
		xhr.send();

		function lwdata()
		{
			if(xhr.readyState==4)
			{
			data=xhr.responseText;
			document.getElementById(id).innerHTML=data;
			}
		}
		xhr.onreadystatechange=lwdata;	
}
function isexistemail()
{

		document.getElementById('isexistemail').innerHTML="<span class='badge' align='center'><span class='glyphicon glyphicon-refresh glyphicon-spin'></span> Checking for existence.</span>";
		var email=document.getElementById('email').value;
		url="dynamiccheck.php?exemail="+email;
		id="isexistemail";


		xhr=new XMLHttpRequest();


		xhr.open("GET", url , true);
		xhr.send();

		function lwdata()
		{
			if(xhr.readyState==4)
			{
			data=xhr.responseText;
			document.getElementById(id).innerHTML=data;
			}
		}
		xhr.onreadystatechange=lwdata;	
}