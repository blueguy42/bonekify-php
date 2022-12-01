<table>
  <th>
    <tr> Penyanyi </tr>
    <tr> Aksi </tr>
  </th>
  <?foreach($data["penyanyi"]["data"] as $penyanyi){?>
      <tr>
      <td> <?=$penyanyi["name"]?> </td>
      <?if(isset($data["status"][$penyanyi['user_id']])){?>
        <?if($data["status"][$penyanyi['user_id']]=="ACCEPTED"){?>
          <td><a href='<?=BASEURL?>/lagupremium/detail/<?=$penyanyi['user_id']?>'>DENGARKAN</a></td>
        <?}elseif($data["status"][$penyanyi['user_id']]=="REJECTED"){?>
          <td>SUBSCRIBE DITOLAK</td>
        <?}elseif($data["status"][$penyanyi['user_id']]=="PENDING"){?>
          <td>MENUNGGU PERSETUJUAN</td>
      <?}}else{?>
        <td>
          <button onclick="location.href='<?=BASEURL?>/subscribe/add/<?=$penyanyi['user_id']?>/<?=$_SESSION['user_id']?>'" type="button"> SUBSCRIBE </button>
        </td>
      <?}?>
      <tr>
  <?}?>
</table>