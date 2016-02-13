<select name="stocks">
    {Code}
</select>

<h2>Movement</h2>

<table align="center" style="width:25%">
    <tr style="font-weight: bold">
        <td>Action</td>
        <td>Amount</td>
    </tr>
    {movements}
        <tr>
            <td>{Action}</td>
            <td>{Amount}</td>
        </tr>
    {/movements}
</table>

<h2>Transactions</h2>

<table align="center" style="width:25%">
    <tr style="font-weight: bold">
        <td>Transaction</td>
        <td>Quantity</td>
    </tr>
    {transactions}
        <tr>
            <td>{Trans}</td>
            <td>{Quantity}</td>
        </tr>
    {/transactions}
</table>