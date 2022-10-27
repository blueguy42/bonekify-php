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
            <? if (isset($_SESSION["username"]) and $_SESSION["username"] == $user["username"])  { ?>
                <td class="id bold"><b><?echo $user["user_id"]?></b></td>
                <td class="username bold"><b><?echo $user["username"]?></b></td>
                <td class="email bold"><b><?echo $user["email"]?></b></td>
                <td class="admin bold"><b><?echo ($user["isAdmin"] == 1 ? "Admin" : "User")?></b></td>
                <td class="playcount bold"><b><?echo $user["playCount"]?></b></td>
            <? } else { ?>
                <td class="id"><?echo $user["user_id"]?></td>
                <td class="username"><?echo $user["username"]?></td>
                <td class="email"><?echo $user["email"]?></td>
                <td class="admin"><?echo ($user["isAdmin"] == 1 ? "Admin" : "User")?></td>
                <td class="playcount"><?echo $user["playCount"]?></td>
            <? }
            ?>

        </tr>
    <?php    } ?>
</table>