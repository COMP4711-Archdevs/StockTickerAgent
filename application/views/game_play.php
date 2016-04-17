<div class="row">
    <div class="col-md-2">
    </div>
   
    <div class="col-md-2">
        <img height="200" width="200" src='{avatar}'>
    </div>
    <div class="col-md-3" style="font-size: xx-large; margin-left: 2em;">
        <div class="row text-danger">
            Name: <strong>{user}</strong>
        </div>
        <div class="row text-success">
          {info}
            Cash: {Cash}
          {/info}
        </div>
    </div>
    <div class="col-md-3">
        <div class="row text-primary" style="margin-top: 0px; text-align: center">
            <h4 class="text-info">GAME STATUS</h4>
                Round: {round}<br>
                {message}<br>
                Countdown: {countdown}
        </div>
    </div>
    <div class="col-md-2">
    </div>
</div>

<hr>

<div class="row stock-status">
    <div class="col-md-7">
        <div class="row">
            <h4 class="text-info">Your Holding Stocks</h4>
            <table style="width:100%">
                <tr class="text-success">
                    <th>CODE</th>
                    <th>VALUE</th>
                    <th>SELL</th>
                </tr>
                {holdings}
                <tr class="bg-info">
                    <td>{stockcode}</td>
                    <td>{quantity}</td>
                    <td>
                        <form action='/games/sell' method="POST">
                            <input type="hidden" name="code" value='{stock}'>
                            <input type="hidden" name="token" value='{token}'>
                            <input type="number" name="quantity" style="width: 3em" min="1">
                            <button type="submit" name="submitButton" class="btn btn-warning" value="submit">Sell</button>
                        </form>
                    </td>
                </tr>
                {/holdings}
            </table>
        </div>
       <div class="row">
           <h4 class="text-info">Active Stocks</h4>
           <table style="width:100%">
               <tr class="text-success">
                   <th>CODE</th>
                   <th>NAME</th>
                   <th>VALUE</th>
                   <th>BUY</th>
               </tr>
               {stocks}
               <tr class="bg-info">
                   <td>{Code}</td>
                   <td>{Name}</td>
                   <td>{Value}</td>
                   <td>
                       <form action='/Gameplay/buy' method="POST">
                           <input type="hidden" name="code" value='{code}'>
                           <input type="number" name="quantity" style="width: 3em" min="1">
                           <button type="submit" name="submitButton" class="btn btn-success" value="submit">Buy</button>
                       </form>
                   </td>
               </tr>
               {/stocks}
           </table>
       </div>
    </div>

    <div class="col-md-5">
        <h4 class="text-info">Market Trend</h4>
        <table style="width:100%">
            <tr class="text-success">
                <th>Datetime</th>
                <th>Code</th>
                <th>Action</th>
                <th>Amount</th>
            </tr>
            {recentMove}
            <tr class="bg-info">
                <td>{Datetime}</td>
                <td>{Code}</td>
                <td>{Action}</td>
                <td>{Amount}</td>
            </tr>
            {/recentMove}
        </table>
    </div>
</div>