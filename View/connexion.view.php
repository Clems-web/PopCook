<div id="formContainer">
    <form id="formConnect" action="./connexion.php" method="POST">
        <div class="inputBlock">
            <input type="text" id="inputUsername" name="username" placeholder="Username" required>
        </div>
        <div class="inputBlock">
            <input type="password" id="inputUserPass" name="user-pass" placeholder="Password" required>
        </div>
        <button id="buttonConnect" type="submit">Se connecter</button>
    </form>
    <div id="subscriptionDiv">Vous n'avez pas de compte ? <a href="?controller=registration">S'inscrire</a></div>
</div>
