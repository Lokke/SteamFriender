<?php
include 'includes/config.php';
include 'includes/sessions.php';
include 'includes/functions.php';
include 'includes/header.php';
include('simple_html_dom.php');

if (!(@$_GET['appID']))
	header("location:gamelist.php");
else
	$game = sql("SELECT * FROM games WHERE appID='$_GET[appID]'");

$game_background = 'http://cdn.steampowered.com/v/gfx/apps/' . $game['appID'] . '/page_bg_generated_v6.jpg';
$game_image = 'http://cdn.steampowered.com/v/gfx/apps/' . $game['appID'] . '/header_292x136.jpg';

echo '<div id="game_background" style="background-image: url(' . $game_background . '); "/>';
echo "<div id='view_game'>";
echo "<h1 id=game_txt style='position:absolute;top:-50px;' align='center'>" . $game['name'] . "</h1>";
echo "<img id='view_game_logo' align='center' src=" . $game_image . " />";
echo "<center><a id=playnow href='steam://run/" . $game['appID'] . "'>Play Now</a></center>";
echo "</div>";
echo "<div id=search_result align=center>";
include_once 'search.php';
echo "</div>";
include 'includes/footer.php';
exit();
