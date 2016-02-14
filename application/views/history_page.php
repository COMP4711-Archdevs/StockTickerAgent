<form action="History" method="post">
    {historydropdown}
</form>

<h3>Movement</h3>

<table align="center" style="width:25%" class="table table-bordered">
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

<h3>Transactions</h3>

<table align="center" style="width:25%" class="table table-bordered">
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