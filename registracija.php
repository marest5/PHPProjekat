<html>
<head>
	<title>Registracija</title> 
	<LINK REL="SHORTCUT ICON"
       HREF="slike/slika4.jpg">
       <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body onload="document.getElementById('fokus').focus()">
<div class="natpisi">        
        <p><MARQUEE BEHAVIOR=ALTERNATE direction=left>KAD PIJEM NE VOZIM!!!---KAD PIJEM NE VOZIM!!!---KAD PIJEM NE VOZIM!!!</MARQUEE>
    </div>
<form  name="registar" action='obradaregistracije.php' method='post'
    accept-charset='UTF-8'>
    <font size=3pt><b><i><h1 style e>Registracija:</h1></i></b></font>
    <font color="red"><b style e>* Potrebno je unete sve podatke</b></font>
<fieldset>
<legend><h3>Forma za popunjavanje</h3></legend>

<p align="center">
Username:
<input type='text' id='fokus' name="usernameregistar" />
</p>
<p align="center">
Password:
<input type='password' name="passwordregistar"  />
</p>
<p align="center">
Email:
<input type='email' id="email" name="emailregistar"/>
</p>

<div class="g-recaptcha" align="center" data-sitekey="6Lcx4Q4UAAAAAFeWII4xJAP0NvdZ6ytNDkWlQmla"></div>

<p align="center">
<input type='submit' name="submitregistar" value="Registracija" />
</p>
<p align="center">
<button id="submit1" formaction="index.php">Nazad</button>
</p>
</fieldset>
</form>
</body>
<style>
body {
  background-image: url('slike/slika3.jpg');
  color: #005216;
}
fieldset{
	font-family: 'Times New Roman', Times, serif;
	font-size: 20pt;
}
.natpisi {
    width: 100%;
    line-height: 10px;
        font-size: 15px;
        background-color: plum;
        color: rgb(25, 0, 47);
		overflow: hidden;
  }
  #submit1{
    transition-duration: 0.5s;
	border-radius: 50px;
    font-size: 15px;
    color:black;
  background-color: white;  
}

#submit1:hover{
    background-color: black;
		color: white;
}
</style>
</html>