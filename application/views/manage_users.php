    <div class="row">
        <h3 align="left">Players</h3>

        <table align="left" style="width:35%" class="table table-bordered">
            <tr style="font-weight: bold">
                <td>Avatar</td>
                <td>Player</td>
                <td>Cash</td>
            </tr>
            {players}
                <tr>
                    <td><img src="/uploads/{Player}.gif" width="50" height="50"></td>
                    <td><a href="/Portfolio/detail/{Player}">{Player}</a></td>
                    <td>{Cash}</td>
                </tr>
            {/players}
        </table>
    </div>
