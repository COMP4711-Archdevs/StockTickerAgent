<form action="Player" method="post">
    {playerdropdown}
</form>

<h2>Players transactions</h2>

<table align="center" style="width:25%">
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