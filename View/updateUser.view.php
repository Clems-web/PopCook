<div id="SubFormContainer">
    <form id="formSub" action="./updateUser.php" method="POST">
        <div class="inputBlock">
            <input type="text" id="inputUsername" name="new-username" placeholder="Vôtre nouveau pseudo">
        </div>
        <div class="inputBlock">
            <input type="email" id="inputUserMail" name="old-user-mail" placeholder="Ancienne adresse mail">
            <input type="email" id="inputUserMail" name="new-user-mail" placeholder="Nouvelle adresse mail">
        </div>
        <div class="inputBlock">
            <input type="password" id="inputUserPass" name="old-user-pass" placeholder="Ancien mot de passe">
            <input type="password" id="inputUserPass" name="new-user-pass" placeholder="Nouveau mot de passe">
        </div>
        <button id="buttonConnect" type="submit">Modifier mes informations</button>
    </form>
</div>
