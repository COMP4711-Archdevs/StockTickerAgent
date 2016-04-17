<!-- <form action="Player" method="post">
    {playerdropdown}
</form>
 -->
<div class="row">
    <div class="col-xs-10 col-xs-offset-1">
        <select onchange="location = this.options[this.selectedIndex].value;" class="center input-sm">
                <option value="#">Select player</option>
            {players}
                <option value="/Portfolio/detail/{Player}">{Player}</option>
            {/players}
        </select>
    </div>
</div>


<h3 align="center">Players transactions</h3>

<table align="center" style="width:70%" class="table table-bordered">
    <tr style="font-weight: bold">
        <td>Player</td>
        <td>Date Time</td>
        <td>Stock</td>
        <td>Transactions</td>
        <td>Quantity</td>
    </tr>
    {details}
        <tr>
            <td>{Player}</td>
            <td>{DateTime}</td>
            <td>{Stock}</td>
            <td>{Trans}</td>
            <td>{Quantity}</td>
        </tr>
    {/details}
</table>