<!DOCTYPE html>
<html>
<head>
  <title>
    Logovanje
  </title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="Content-language" content="sr">
  <LINK REL="SHORTCUT ICON"
       HREF="slike/slika4.jpg">
</head>

<body>
<div class="natpisi">        
        <p><MARQUEE BEHAVIOR=ALTERNATE direction=left>KAD PIJEM NE VOZIM!!!---KAD PIJEM NE VOZIM!!!---KAD PIJEM NE VOZIM!!!</MARQUEE>
    </div>
       
  <h1 align="center" style="color:#005216;font-size:70px">BREWERIANA COLLECTORS</h1>    
      <div align = "center">
         <div style = "width:300px;background-color:#005216; border: solid 20px #eb391a; " align = "left">
            <div style = "background-color:#FFFFFF; color:#FFFFFF; padding:5px;"></div>
        
            <div align="center" style = "margin:30px;background-color:#FFFFFF;color:#eb391a;">
               
               <form action = "obradalogovanja.php" method = "post">
              <b> <i> Username </i></b> :<input type = "text" name = "username" /><br /><br />
              <b> <i>  Password </i></b> :<input type = "password" name = "password"  /><br/><br />
                  <input type = "submit" value = " Logovanje" name="submit"/><br />
               </form>
               <br>
              <a href="registracija.php">Registruj se!!!</a> 

          
            </div>
        
         </div>       
</div>
</body>
<style>
body {
  background-image: url('slike/slika1.jpg');
}
h1{
  background-color: rgb(231, 217, 155);
  outline: 2px dashed blue;
}
.natpisi {
    width: 100%;
    line-height: 10px;
        font-size: 15px;
        background-color: plum;
        color: rgb(25, 0, 47);
		overflow: hidden;
	}
</style>
</html>