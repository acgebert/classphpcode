<?php
$host ='itp460.usc.edu';
$dbname = 'music';
$user ='student';
$pass ='ttrojan';

$pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
$artist = $_GET['artist']; //$_REQUEST

$sql = "
SELECT title, price, artist_name
FROM songs
INNER JOIN artists
ON songs.artist_id=artists.id
";
$statement = $pdo->prepare($sql);
$like = '%'.$artist.'%';
//$statement->bindParam(1, $like); //stanitizes the info to be a ? prevents injection
    $statement->execute();
$songs = $statement->fetchAll(PDO::FETCH_OBJ);



var_dump($songs);
?>
<?php foreach ($songs as $song) : ?>
    <h3>
        <?php echo $song-> title?>
        by
        <?php echo $song->artist_name?>
    </h3>
    <p> Play Count: <?php echo $song->play_count ?></p>
    <p> <?php echo $song->price?></p>
<?php endforeach; ?>



/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 1/21/14
 * Time: 5:31 PM
 */ 