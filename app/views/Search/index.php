<script src="<?echo BASEURL;?>/js/search.js"></script>

<br><br>
<h1 id="judulsearch">Search results!</h1>
<input <?php if (isset($data["search"])){echo "value='" . $data["search"] . "'"; } ?> class="search" id="search" type="text" placeholder="Integrated livesearch feature" onkeyup="livesearch()">

<br><br>
<!-- FILTER -->
<div id='buatfilter'>
<div id='labelfilter'><h1>Filter your choice(s)</h1></div>
<div class="hiddenCB">
  <div>
<?php 
foreach($data["genres"] as $id => $genre){ 
echo "<input name ='choice' onclick=\"livesearch()\" class=\"checkbox\" type=\"checkbox\" id=\"" . $genre["GENRE"] ."\">";
echo "<label for=\"" . $genre["GENRE"] . "\">" . $genre["GENRE"] . "</label>";
}?>
</div>
</div>
</div>
<br><br>

<div id='sorts'>
<label for="sort1">Sort by:</label>
<select id="sort1" name="sort1" onchange="livesearch()">
  <option value="Judul">Judul</option>
  <option value="Penyanyi">Tahun</option>
  <option value="Tanggal_terbit">Tanggal terbit</option>
</select>
<select id="sort2" name="sort2" onchange="livesearch()">
  <option value="asc">asc</option>
  <option value="desc">desc</option>
</select>
</div>

