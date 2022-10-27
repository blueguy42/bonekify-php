<table id='list-user'>
    <tr>
        <th>ID USER</th>
        <th>USERNAME</th>
        <th>EMAIL</th>
        <th>JENIS USER</th>
        <th>JUMLAH PUTAR</th>
    </tr>
    <?php foreach($data["users"] as $id => $user){ ?>
        <tr>
            <td class="id"><?echo $user["user_id"]?></td>
            <td class="username"><?echo $user["username"]?></td>
            <td class="email"><?echo $user["email"]?></td>
            <td class="admin"><?echo ($user["isAdmin"] == 1 ? "Admin" : "User")?></td>
            <td class="playcount"><?echo $user["playCount"]?></td>
        </tr>
    <?php    } ?>
</table>