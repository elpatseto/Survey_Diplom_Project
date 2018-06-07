
</tbody>
</table>
</div>
<legend class="title-bold">
    <a onclick="hideOther();" id="hideother">
        <h4 class="glyphicon glyphicon-chevron-right"></h4> Други действия <span class="caret"></span></a>
</legend>

<div class="row" id="other">
    <form method="post" action="makeAdmin.php" id="makeAdmin">
        <div class="colcol-md-6 col-xs-6 col-sm-6">
            <label>Повишете в администратор: </label>
        </div>
        <div class="col-md-6 col-xs-6 col-sm-6">
            <label>Понижете в потребител: </label>
        </div>
        <div class="colcol-md-6 col-xs-6 col-sm-6">
                        <input type="text"
                   name="userforadmin"
                   style="height: 35px;" placeholder="потребителско име" >
            <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-king"></span> ОК</button>
        </div>
    </form>
    <form method="post" action="removeAdmin.php" id="remove-admin">
        <div class="col-md-6 col-xs-6 col-sm-6">
            <input type="text"
                   name="userNoadmin"
                   style="height: 35px;" placeholder="потребителско име">
            <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-pawn"></span> ОК
            </button>
        </div>

    </form>
</div>
</div>
</div>
</fieldset>
</div>
</div>
</section>
