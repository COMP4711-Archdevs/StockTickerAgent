<h3>Stocks</h3>

<table align="center" style="width:25%" class="table table-bordered">
    <tr style="font-weight: bold">
        <td>Name</td>
        <td>Code</td>
        <td>Value</td>
    </tr>
    {stocks}
        <tr>
            <td><a href="/History/display/{Code}">{Name}</a></td>
            <td>{Code}</td>
            <td>{Value}</td>
        </tr>
    {/stocks}
</table>

<h3>Players</h3>

<table align="center" style="width:25%" class="table table-bordered">
    <tr style="font-weight: bold">
        <td>Player</td>
        <td>Cash</td>
    </tr>
    {players}
        <tr>
            <td><a href="/Portfolio/detail/{Player}">{Player}</a></td>
            <td>{Cash}</td>
        </tr>
    {/players}
</table>




