var satchel=["images/satchel.jpg", "images/satchel2.jpg", "images/satchel3.jpg"];
var shoes=["images/shoes.jpg", "images/shoes2.jpg", "images/shoes3.jpg"];
var watch=["images/watch.jpg", "images/watch2.jpg", "images/watch3.jpg"];

function changeImage(dvX,dvZ,dvY){ 
	var dvi=document.getElementById(dvX);
    var dvj=document.getElementById(dvZ);
    var dvk=document.getElementById(dvY);
	
    if(!dvi.count || dvi.count == satchel.length ){
		dvi.count=0;	  
	}
	if(!dvj.count || dvj.count == shoes.length ){
		dvj.count=0;	  
	}
	if(!dvk.count || dvk.count == watch.length ){
		dvk.count=0;	  
	}
	
    dvi.src=satchel[dvi.count];
    dvi.alt=satchel[dvi.count];
    dvi.count++;
	
    dvj.src=shoes[dvj.count];
    dvj.alt=shoes[dvj.count];
    dvj.count++;  
	
    dvk.src=watch[dvk.count];
    dvk.alt=watch[dvk.count];
    dvk.count++;   
	
    timeout=setTimeout('changeImage("'+dvX+'","'+dvZ+'","'+dvY+'")',4000);
}

$(document).ready(function(){
	about_toggle=false;
    team_toggle=false;
	
	$("#contact_x").click(function(){
		$("#contact_panel").slideUp("slow");
    });
	$("#contact").click(function(){
		if(team_toggle || about_toggle)
		document.getElementById('contact_panel').style.top="1232px";
		else
		document.getElementById('contact_panel').style.top="910px";
        $("#contact_panel").slideToggle("slow");
    });	
	
    $("#about_x").click(function(){
    	$("#about_panel").slideUp("slow");
		$("#footer").fadeOut("slow");
		document.getElementById('footer').style.top="910px";
		document.getElementById('contact_panel').style.top="910px";
		$("#footer").fadeIn("slow");
		about_toggle=false;
    });
  

    $("#about").click(function(){
    	$("#about_panel").slideToggle("slow");
		if(!about_toggle){
			if(team_toggle){
				$("#team_panel").fadeOut();
				team_toggle=false;
			}
			$("#footer").fadeOut("slow");
			document.getElementById('footer').style.top="1232px";
			document.getElementById('contact_panel').style.top="1232px";
			$("#footer").fadeIn("slow");
			about_toggle=true;
		}
		else{		
			about_toggle=false;
			$("#footer").fadeOut("slow");
			document.getElementById('footer').style.top="910px";
			document.getElementById('contact_panel').style.top="910px";
			$("#footer").fadeIn("slow");
		}
    });
	
	$("#team_x").click(function(){
    	$("#team_panel").slideUp("slow");
		$("#footer").fadeOut("slow");
		document.getElementById('footer').style.top="910px";
		document.getElementById('contact_panel').style.top="910px";
		$("#footer").fadeIn("slow");
		team_toggle=false;
    });
  

    $("#team").click(function(){
    	$("#team_panel").slideToggle("slow");
		if(about_toggle){
			$("#about_panel").fadeOut();
			about_toggle=false;
		}
		if(!team_toggle){
			$("#footer").fadeOut("slow");
			document.getElementById('footer').style.top="1232px";
			document.getElementById('contact_panel').style.top="1232px";
			$("#footer").fadeIn("slow");
			team_toggle=true;
		}
		else{		
			team_toggle=false;
			$("#footer").fadeOut("slow");
			document.getElementById('footer').style.top="910px";
			document.getElementById('contact_panel').style.top="910px";
			$("#footer").fadeIn("slow");
		}
    });
});
function check_input(inp,def){
if (inp.value == def || inp.value == null){
inp.style.borderColor='red';
return false;
}
inp.style.borderColor='green';
return true;
}

function check_reg(){
var username=document.getElementById('reg_username');
var password=document.getElementById('reg_password');
var firstname=document.getElementById('firstname');
var surname=document.getElementById('surname');
var city=document.getElementById('city');
var address=document.getElementById('address');
var nmb=document.getElementById('nmb');
if (check_input(username,'Username')!=false && check_input(password,'Password')!=false && check_input(firstname,'First name')!=false && check_input(surname,'Surname')!=false && check_input(city,'City')!=false && check_input(address,'Address')!=false && check_input(nmb,'nmb')!=false){
document.getElementById('reg_send').style.backgroundColor="rgb(50,150,50)";
var xmlhttp;
		
		if (window.XMLHttpRequest)// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
			
		else// code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			
		xmlhttp.onreadystatechange=function(){
			if (xmlhttp.readyState==4 && xmlhttp.status==200){
				if(xmlhttp.responseText==1)
				{
		        reg_reset();
				alert('SUCCESFULL REGISTRATION');
				}
				if(xmlhttp.responseText==0){
				document.getElementById("reg_send").style.backgroundColor="rgb(150,50,50)";
				alert('USER ALREADY EXISTS');
				username.value='Username';
				username.style.borderColor = "red";
				username.style.color = "silver";
				}
				
			}
		}
	xmlhttp.open("POST","reg.php",true);
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send("username="+username.value+"&password="+password.value+"&first="+firstname.value+"&sur="+surname.value+"&city="+city.value+"&address="+address.value+"&nmb="+nmb.value);
}
}

function reg_reset(){
document.getElementById("registration_panel").style.display="none";
document.getElementById("reg_send").style.backgroundColor="rgb(150,50,50)";
document.getElementById("reg_password").type='text';
document.getElementById("MyForm").reset();
var form = document.getElementById("MyForm");
var inp_list = form.getElementsByTagName("input");
for (var i = 0; i < inp_list.length; i++) {
  inp_list[i].style.borderColor = "silver";
  inp_list[i].style.color="silver";
}
}
firstTime=false;
function login(){
var username1=document.getElementById('username');
var password1=document.getElementById('password');
if((username1.value!='Username' && password1.value!='Password') || firstTime==false){

var xmlhttp;
		
		if (window.XMLHttpRequest)// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
			
		else// code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			
		xmlhttp.onreadystatechange=function(){
			if (xmlhttp.readyState==4 && xmlhttp.status==200){
				if(xmlhttp.responseText==1 || xmlhttp.responseText==2){
				document.getElementById('log_panel').style.display="none";
				document.getElementById('login_button').style.display="none";
				document.getElementById('logout_button').style.display="block";
				document.getElementById('pur_button').style.display="block";
				}
				if(xmlhttp.responseText==0 && firstTime==true)
				alert("Username or Pass is invalid");
			firstTime=true;
			}
		}
	xmlhttp.open("POST","login.php",true);
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send("username="+username1.value+"&password="+password1.value);

}
}

function logout(){
var xmlhttp;
		
		if (window.XMLHttpRequest)// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
			
		else// code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			
		xmlhttp.onreadystatechange=function(){
			if (xmlhttp.readyState==4 && xmlhttp.status==200){
				if(xmlhttp.responseText==1){
				document.getElementById('login_button').style.display="block";
				document.getElementById('logout_button').style.display="none";
				document.getElementById('pur_button').style.display="none";
								 document.getElementById('pur_panel').innerHTML='';
				 document.getElementById('pur_panel').style.display='none';
				try{
				document.getElementById('panel_background').style.display="block";
                 document.getElementById('panel').innerHTML="";
				 }
                catch(err) {}
				
				}
			}
		}
	xmlhttp.open("GET","logout.php",true);
    xmlhttp.send();
}
on=true;
function purchases()
{
    
    var xmlhttp;
    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function()
    {
        //alert(xmlhttp.readyState);
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
		if(on==true){
		on=false;
		document.getElementById('pur_panel').style.display='block';
         document.getElementById('pur_panel').innerHTML=xmlhttp.responseText;
		 }
		 else
		{
		on=true;
		document.getElementById('pur_panel').style.display='none';
		}
        }
    }
    xmlhttp.open("GET","purchases.php",true);
    xmlhttp.send();
}