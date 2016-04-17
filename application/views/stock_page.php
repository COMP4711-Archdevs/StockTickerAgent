<h3 align="center">Stocks</h3>

        <table align="center" style="width:70%" class="table table-bordered">
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