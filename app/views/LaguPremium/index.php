<h1 id="judulsearch">Dengarkan lagu premium!</h1>

<table id='list-lagu' class="col-7 col-s-5" style="font-size:20px; color:black; font-weight:bold; padding:30px">
<thead>
        <tr>
          <th style="font-size:20px;padding-left:10px">Judul</th>
          <th style="font-size:20px;text-align:center">Putar Lagu</th>
        </tr>
      </thead>
<?foreach($data['lagupremium'] as $id => $lagu){?>
    
<tr>
      <td style="font-size:20px;padding-left:10px;margin: 5px 5px 0px 0px" class='judullagupremium'><?=$lagu['Judul']?></td>
      <td align="center" > <audio class="putarpremium" controls controlsList="nodownload noplaybackrate" id="songplayer"><source src= '<?=REST.$lagu['Audio_path']?>' > </audio> </td>
      </tr>
  <?}?>

  </table>