<table>
  <th>
    <td>Judul</td>
    <td></td>
  </th>
  <?foreach($data['lagupremium'] as $id => $lagu){?>
    <tr>
      <td><?=$lagu['Judul']?></td>
      <td> <audio><source src= <?=$lagu['Audio_path']?> > </audio> </td>
  </tr>
  <?}?>
</table>