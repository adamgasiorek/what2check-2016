<div class="ui middle aligned center aligned grid" >
    <div class="column" >
        <h2 class="ui teal image header" ><img src="img/logo.png" class="image" >
            <div class="content" >
                Zaloguj sie!
            </div >
        </h2 >
        <form action="php/login.php" method="POST" class="ui large form" >
            <div class="ui form segment" >
                <div class="field" >
                    <div class="ui massive left icon input" >
                        <i class="user icon" ></i >
                        <input type="text" name="login" placeholder="Login" >
                    </div >
                </div >
                <div class="field" >
                    <div class="ui massive left icon input" >
                        <i class="lock icon" ></i >
                        <input type="password" name="password" placeholder="Password" >
                    </div >
                </div >
                <div class="ui fluid huge teal submit button" >
                    Login
                </div >
            </div >

            <div class="ui error message" ></div >

            <?php
            if(isset($_GET['error']))
            {
                if($_GET['error'] == 1)
                {
                    echo '<div class="ui red message huge">
								Nie ma takiego konta lub zle haslo
							</div>';
                }
                else if($_GET['error'] == 2)
                {
                    echo '<div class="ui green message huge">
								Zaloguj sie ponownie
							</div>';
                }
                else if($_GET['error'] == 3)
                {
                    echo '<div class="ui green message huge">
								Pieknie sie zarejstrowales!
							</div>';
                }

            }
            ?>

        </form >

        <div class="ui message" >
            Nowy ?
            <a href="rejestracja.php" >Zarejestruj się!</a >
        </div >
    </div >
</div >