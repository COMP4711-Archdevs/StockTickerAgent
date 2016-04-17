<form action="History" method="post">
    {historydropdown}
</form>
<div class = "row">
        <h3 align="left">Movement</h3>

        <table align="left" style="width:35%" class="table table-bordered">
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

        <h3 align="right">Transactions</h3>

        <table align="right" style="width:35%" class="table table-bordered">
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
</div>