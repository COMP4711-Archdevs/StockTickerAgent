<div class = "row">    
        <h3 align="left">Stocks</h3>

        <table align="left" style="width:35%" class="table table-bordered">
            <tr style="font-weight: bold">
                <td>Name</td>
                <td>Code</td>
                <td>Value</td>
            </tr>
            {stocks}
                <tr>
                    <td><a href="/History/stock/{Code}">{Name}</a></td>
                    <td>{Code}</td>
                    <td>{Value}</td>
                </tr>
            {/stocks}
        </table>

        <h3 align="right">Recent Movement</h3>

        <table align="right" style="width:35%" class="table table-bordered">
            <tr style="font-weight: bold">
                <td>Code</td>
                <td>Time</td>
                <td>Action</td>
                <td>Amount</td>
            </tr>
            {recentMove}
                <tr>
                    <td>{Code}</td>
                    <td>{Datetime}</td>
                    <td>{Action}</td>
                    <td>{Amount}</td>
                </tr>
            {/recentMove}
        </table>
    </div>
<div class="row">
        <h3 align="left">Players</h3>

        <table align="left" style="width:35%" class="table table-bordered">
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
        <h3 align="right">Recent Transactions</h3>

        <table align="right" style="width:35%" class="table table-bordered">
            <tr style="font-weight: bold">
              <td>Date time</td>
                <td>Agent</td>
                <td>Player</td>
                <td>Stock</td>
                <td>Transaction</td>
                <td>Quantity</td>
            </tr>
            {recentTran}
                <tr>
                    <td>{Datetime}</td>
                    <td>{Agent}</td>
                    <td>{Player}</td>
                    <td>{Stock}</td>
                    <td>{Trans}</td>
                    <td>{Quantity}</td>
                </tr>
            {/recentTran}
        </table>

</div>
