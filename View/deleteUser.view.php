<div id="containerDel">
    <div id="presentationDel">
        <h2>Attention !</h2>
        <p>
            Vous vous trouvez sur la page de SUPPRESSION de votre compte !
        </p>
        <p>
            Cette suppression entraînera la perte d'accès à votre compte PopCook ainsi que l'impossibilité de publier de
            nouvelles recettes avec ce même compte.
        </p>
        <p>
            Si vous êtes sûr(e) de votre décision, veuillez procéder en remplissant le formulaire ci-dessous.
        </p>
    </div>
    <div id="DelFormContainer">
        <form id="formDel" action="./deleteUser.php" method="POST">
            <div class="inputBlock">
                <input type="text" id="inputUsername" name="userName" placeholder="Pseudo" required>
                <input type="password" id="inputUserPass" name="userPass" placeholder="Mot de passe" required>
            </div>
            <button id="buttonConfirm" type="submit">Confirmer la supression de mon compte</button>
        </form>
    </div>
</div>
