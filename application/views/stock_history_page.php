<div class="dropdown">
  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
    Select Stock
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu">
  {options}
    <li><a href="/History/stock/{Code}">{Code}</a></li>
    {/options}
  </ul>
</div>

<h3>Stock Movement</h3>

<table align="center" style="width:25%" class="table table-bordered">
    <tr style="font-weight: bold">
        <td>Code</td>
        <td>Time</td>
        <td>Action</td>
        <td>Amount</td>
    </tr>
    {stockMovements}
        <tr>
            <td>{Code}</td>
            <td>{Datetime}</td>
            <td>{Action}</td>
            <td>{Amount}</td>
        </tr>
    {/stockMovements}
</table>

<h3>Transactions</h3>

<table align="center" style="width:25%" class="table table-bordered">
    <tr style="font-weight: bold">
        <td>Date time</td>
        <td>Agent</td>
        <td>Player</td>
        <td>Stock</td>
        <td>Transaction</td>
        <td>Quantity</td>
    </tr>
    {stockTransactions}
        <tr>
            <td>{Datetime}</td>
            <td>{Agent}</td>
            <td>{Player}</td>
            <td>{Stock}</td>
            <td>{Trans}</td>
            <td>{Quantity}</td>
        </tr>
    {/stockTransactions}
</table>