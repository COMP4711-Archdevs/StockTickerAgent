<h2>Stocks</h2>

<table style="width:25%">
<?php
    foreach($stocks as $stock){
        
        echo "<tr><td>Stock: </td><td>" . $stock->Code . "</td><td>Value: </td><td>" . $stock->Value . "</td></tr>";
    }
?>
</table>

<h2>Players</h2>

<table style="width:25%">
<?php
    foreach($players as $player){
        
        echo "<tr><td>Name: </td><td>" . $player->Player . "</td><td>Cash: </td><td>" . $player->Cash . "</td></tr>";
    }
?>
</table>
