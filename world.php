<?php
$host = getenv('IP');
$username = 'lab7_user';
$password = 'Info2180-7';
$dbname = 'world';
$country=$_GET['country'];
$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%';");
$joiner=$conn->query("SELECT c.district,c.name as city, c.country_code, cs.name as country, c.population FROM cities c join countries cs on c.country_code = cs.code");
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
$result2 = $joiner->fetchAll(PDO::FETCH_ASSOC);
?>
<?php if(!(isset($_GET['context']))){?>
<table>
    <tr>
        <th>Name</th>
        <th>Continent</th>
        <th>Independence</th>
        <th>Head of State</th>
    </tr>
<?php foreach ($results as $row): ?>
  <tr><td><?= $row['name'] ?></td><td><?= $row['continent'] ?></td><td><?= $row['independence_year'] ?></td><td><?= $row['head_of_state'] ?></td></tr>
<?php endforeach;}?>
</table>
<?php if($_GET['context']=="cities"){?>
<table>
    <tr>
        <th>Name</th>
        <th>District</th>
        <th>Population</th>
    </tr>
<?php foreach ($result2 as $row): ?>
<?php if($row["country"]==$country && $country!=" "){?>
  <tr><td><?= $row['city'] ?></td><td><?= $row['district'] ?></td><td><?= $row['population'] ?></td><td><?= $row['head_of_state'] ?></td></tr>
<?php }endforeach;}?>
</table>