<h1 id="judulsearch">Daftar Penyanyi!</h1>

<div>
<table id='list-lagu' class="col-8 col-s-6" style="font-size:20px; color:black; font-weight:bold; padding:30px">
  <thead>  
    <tr >
    <th style="font-size:20px;padding-left:10px"> Penyanyi </th>
    <th style="font-size:20px"> Status </th>
    <th style="font-size:20px"> Aksi </th>
    </tr>
  </thead>

  <?foreach($data["penyanyi"]["data"] as $penyanyi){?>
      <tr class="list-lagu-item">
      <td class="penyanyi" style=" padding:20px 0px; padding-left:10px; border-bottom: 1px groove #ddd;"> <?=$penyanyi["name"]?> </td>
      <?if(isset($data["status"][$penyanyi['user_id']])){?>
        <?if($data["status"][$penyanyi['user_id']]=="ACCEPTED"){?>
          <td style=" padding:20px 0px;border-bottom: 1px groove #ddd;">Accepted</td>
        <?}elseif($data["status"][$penyanyi['user_id']]=="REJECTED"){?>
          <td style=" padding:20px 0px;border-bottom: 1px groove #ddd;">Rejected</td>
        <?}elseif($data["status"][$penyanyi['user_id']]=="PENDING"){?>
          <td style=" padding:20px 0px;border-bottom: 1px groove #ddd;">Waiting Approval...</td>
      <?}} else { ?>
        <td style=" padding:20px 0px;border-bottom: 1px groove #ddd;">Not requested</td>
      <? } if(!isset($data["status"][$penyanyi['user_id']])){?>
      <td  style="border-bottom: 1px groove #ddd;"><button id="subsbutton" style="background-color: RGBA(150,20,20,0.25);border: 1px solid green; border-radius:5px;" onclick="location.href='<?=BASEURL?>/subscribe/add/<?=$penyanyi['user_id']?>/<?=$_SESSION['user_id']?>'" type="button"> SUBSCRIBE </button></td>
  <?}else{?>
    <?if($data["status"][$penyanyi['user_id']]=="ACCEPTED"){?>
          <td style="border-bottom: 1px groove #ddd;"><a style ="font-size:13px;margin:0px; border: 1px solid green;background-color: RGBA(20,150,20,0.25);border-radius:5px;" href='<?=BASEURL?>/lagupremium/detail/<?=$penyanyi['user_id']?>'>Listen Songs</a></td>
        <?}else{?>
          <td  style="border-bottom: 1px groove #ddd;"><button id="subsbutton" style="background-color: RGBA(20,20,20,0.7);border: 1px solid green; border-radius:5px;" onclick="location.href='<?=BASEURL?>/subscribe/add/<?=$penyanyi['user_id']?>/<?=$_SESSION['user_id']?>'" type="button" disabled> Listen Songs </button></td>  <? }}}?>
</table>


