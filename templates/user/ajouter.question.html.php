<div class="rightcontain ajoutquestions">
    <div class="ajoutquestions">
        <form action="<?php WEBROOT ?>" method="post">
        <small style="color: green;"><?php if (isset($_SESSION['true'])) {echo "Nouvelle question Ajoutée Merci";unset($_SESSION['true']);} ?></small>
        <small style="color: red;"><?php if (isset($_SESSION['errorquestion'])) {echo $_SESSION['errorquestion'];} ?></small>
            <input type="hidden" name="controller" value="question">
            <input type="hidden" name="action" value="ajout">
            <div class="staticcontain">
                <div class="inputdiv question">
                    <label for="question">Question</label><input class="question" type="text" name="question" id="question" value="<?php if (isset($_SESSION['errorquestion'])) {echo $_SESSION['post']['question'];} ?>">
                    <small></small>
                </div>
                <div class="inputdiv nbrpts">
                    <label for="nbrpts">Nbre de points</label><div><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash-lg" id="minus" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8Z"/></svg><input class="nbrpts" type="text" name="nbrpts" id="nbrpts" value="<?php if (isset($_SESSION['errorquestion'])) {echo $_SESSION['post']['nbrpts'];unset($_SESSION['errorquestion']);} ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" id="plus" class="bi bi-plus-lg" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/></svg></div>
                    <small></small>
                </div>
                <div class="inputdiv typerep">
                    <select name="typerep" id="typerep">
                        <option value="checkbox">Choix Multiple</option>
                        <option value="radio">Choix Simple</option>
                        <option value="text">Text</option>
                    </select>
                    <span id="typerepbtn" class="plus">+</span>
                    <small></small>
                </div>
            </div>
            <div class="dynamiccontain"></div>
            <div class="submitcontain">
                <input type="submit" id="subcreerquestion" value="Creer">
            </div>
        </form>
    </div>
</div>