<?php
require_once('admin/config/connect.php');
$search = "";
if( !empty($_GET['Search'])){
  $search = $_GET['Search'];
}
?>
 <h3 class="title"></h3>
<div class="container" style="margin-top: 20px">
<div class="row">
    <?php
    if( !empty($search)) {
      $rs = mysqli_query( $conn ,"SELECT * FROM song,singer,genre WHERE song.song_name LIKE '%{$search}%' and song.singer_id=singer.singer_id and song.genre_id=genre.genre_id");
      while($row = mysqli_fetch_assoc($rs)){
    ?>
    <div class="card" style="background-color: white;margin-top: 20px;margin-left: 35px;overflow: auto;width: 270px; 
          border: 2px solid #F8ABAB;border-radius: 1px;border-bottom: 6px solid #FCA5A5; float: left;">
              <a href="single.php?id=<?php echo $row['song_id']?>" style=" text-decoration: none; 
            text-align: center;">
            <div style="height:80px">
              <h2><?php echo $row['song_name'] ?></h2>
              </div>
              <div><img src="img/<?php echo $row['song_img']?>" style="width: 247px;height: 200px;padding: 7px"></div>
              <audio id="audio_1" style="width: 247px"controls controlsList="nodownload" ><source src="Music/<?php echo $row['song_mp3']?>" type="audio/mpeg">
              </audio>
              <p style="color: red"><?php echo $row['song_price']." $"; ?></p>
              <h4 style="color: #3BA33D"><?php echo $row['singer_name'] ?></h4>
            <h5>Genre: <?php echo $row['genre_name'] ?></h5>
            </a>
          </div>
         <?php
     }
    }
    ?>
  </div>
  </div>
  <a href="index.php">Exit</a>