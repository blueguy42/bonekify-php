<script src="<?echo BASEURL;?>/js/search.js"></script>

<br><br>
<input <?php if (isset($data["search"])){echo "value='" . $data["search"] . "'"; } ?> class="search" id="search" type="text" placeholder="Disini juga bisa live search maszeh" onkeyup="livesearch()">

<br><br>
<!-- FILTER -->
<div id='labelfilter'><p>FILTERS:</p></div>
<div id='checkboxes'>

<label class="container">One
  <input type="checkbox">
  <span class="checkmark"></span>
</label>

<label class="container">Two
  <input type="checkbox">
  <span class="checkmark"></span>
</label>

<label class="container">Three
  <input type="checkbox">
  <span class="checkmark"></span>
</label>

<label class="container">Four
  <input type="checkbox">
  <span class="checkmark"></span>
</label>
</div>

<br><br>

<div id='sorts'>
<label for="sort1">Pilih cara sort</label>
<select id="sort1" name="sort1" onchange="livesearch()">
  <option value="Judul">Judul</option>
  <option value="Penyanyi">Tahun</option>
  <option value="Tanggal_terbit">Tanggal terbit</option>
</select>

<label for="sort2">Asc / Desc?</label>
<select id="sort2" name="sort2" onchange="livesearch()">
  <option value="asc">asc</option>
  <option value="desc">desc</option>
</select>
</div>

