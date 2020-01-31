<?php
$vote = $_REQUEST['glas'];
if (!file_exists("anketicarez.txt")) {
  die ("Text fajl anketicarez.txt ne postoji na Vasem file sistemu!!!");   
}
$filename = "anketicarez.txt";
$sadrzaj = file($filename);

$niz = explode("-", $sadrzaj[0]);
$super = $niz[0];
$ok = $niz[1];
$dosadan=$niz[2];
$brisi=$niz[3];

if ($vote == 0) {
  $super = $super + 1;
}
if ($vote == 1) {
  $ok = $ok + 1;
}
if ($vote == 2) {
  $dosadan = $dosadan + 1;
}
if ($vote == 3) {
  $brisi = $brisi + 1;
}

$ubaciglas = $super."-".$ok."-".$dosadan."-".$brisi;
$fp = fopen($filename,"w");
fputs($fp,$ubaciglas);
fclose($fp);
?>

<h2>Rezultati:</h2>
<table style="color:rgb(200, 67, 67)">
<tr>
<td><b>Super:<b></td>
<td>

<?php echo(100*round($super/($ok+$super+$dosadan+$brisi),2)); ?>%
</td>
</tr>
<tr>
<td><b>Ok:<b></td>
<td>
<?php echo(100*round($ok/($ok+$super+$dosadan+$brisi),2)); ?>%
</td>
</tr>
<tr>
<td><b>Dosadan:<b></td>
<td>
<?php echo(100*round($dosadan/($ok+$super+$dosadan+$brisi),2)); ?>%
</td>
</tr>
<tr>
<td><b>Brisi:<b></td>
<td>
<?php echo(100*round($brisi/($ok+$super+$dosadan+$brisi),2)); ?>%
</td>
</tr>
</table>