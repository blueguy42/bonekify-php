<script src="<?echo BASEURL;?>/js/search.js"></script>

<br><br>
<input <?php if (isset($data["search"])){echo "value='" . $data["search"] . "'"; } ?> class="search" id="search" type="text" placeholder="Disini juga bisa live search maszeh" onkeyup="livesearch()">

<br><br>
<!-- FILTER -->
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

