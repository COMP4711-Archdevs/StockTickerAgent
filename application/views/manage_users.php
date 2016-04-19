    <div class="row">
        <h3 align="left">Players</h3>

        <table align="left" style="width:80%" class="table table-bordered">
            <tr style="font-weight: bold">
                <td>Avatar</td>
                <td>Player</td>
                <td>Cash</td>
                <td>Role</td>
                <td></td>
                <td></td>
            </tr>
            {players}
                <tr>
                    <td><img src="/uploads/{Player}.gif" width="50" height="50"></td>
                    <td><a href="/Portfolio/detail/{Player}">{Player}</a></td>
                    <td>{Cash}</td>
                    <td>{role}</td>
                    <td><a href="/Admin/edit/{Player}">Edit Player</a></td>
                    <td><a href="/Admin/delete/{Player}">Delete Player</a></td>
                </tr>
            {/players}
        </table>
    </div>
