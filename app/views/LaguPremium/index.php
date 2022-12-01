  <div>
    <div>Judul</div>
</div>
  <?foreach($data['lagupremium'] as $id => $lagu){?>
    <div>
      <span class='judullagupremium'><?=$lagu['Judul']?></span>
      <span> <audio controls controlsList="nodownload noplaybackrate" id="songplayer"><source src= '<?=REST.$lagu['Audio_path']?>' > </audio> </span>
  </div>
  <?}?>