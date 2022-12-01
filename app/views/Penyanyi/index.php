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
          <td>SUDAH SUBSCRIBE</td>
        <?}elseif($data["status"][$penyanyi['user_id']]=="REJECTED"){?>
          <td>SUBSCRIBE DITOLAK</td>
        <?}elseif($data["status"][$penyanyi['user_id']]=="PENDING"){?>
          <td>MENUNGGU PERSETUJUAN</td>
      <?}}else{?>
        <td>
          <button> SUBSCRIBE </button>
        </td>
      <?}?>
      <tr>
  <?}?>
</table>