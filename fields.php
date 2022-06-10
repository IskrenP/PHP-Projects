
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<?php
$connection = new PDO('mysql:host=localhost;dbname=cars', "root", "");

$brands = $connection->query('SELECT * FROM brands');
$models = $connection->query('SELECT * FROM models');

?>

<script>
function changeModels( brand_id ) {
	
	$(".models").hide();
	$(".brand-" + brand_id ).show();
}
</script>


<select name="brand" onchange="changeModels( this.value );">
  <option value="">- изберете марка -</option>
<?php
foreach( $brands as $row ) {
?>
  <option value="<?= $row['id'] ?>"><?= $row['brand'] ?></option>
<?php
}
?>
</select>


<select name="model">
  <option value="">- изберете модел -</option>
<?php
foreach( $models as $row ) {
?>
  <option value="<?= $row['id'] ?>" class="models brand-<?= $row['brands_id'] ?>"><?= $row['model'] ?></option>
<?php
}
?>
</select>

<script>
$(".models").hide();
</script>

