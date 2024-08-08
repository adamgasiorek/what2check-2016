<div class="ui middle aligned center aligned grid" >
    <div class="column" >
        <h2 class="ui teal image header" ><img src="img/logo.png" class="image" >
            <div class="content" >
                Zarejestruj się!
            </div >
        </h2 >
        <form action="php/rejestracja.php" method="POST" class="ui form" >
            <div class="ui stacked segment" >
                <div class="field" >
                    <div class="ui massive left icon input" >
                        <i class="user icon" ></i >
                        <input type="text" name="login" placeholder="Login" >
                    </div >
                </div >
                <div class="field" >
                    <div class="ui massive left icon input" >
                        <i class="mail icon" ></i >
                        <input type="text" name="email" placeholder="E-mail" >
                    </div >
                </div >
                <div class="field" >
                    <div class="ui massive left icon input" >
                        <i class="lock icon" ></i >
                        <input type="password" name="password" placeholder="Password" >
                    </div >
                </div >
                <div class="field" >
                    <div class="ui massive left icon input" >
                        <i class="lock icon" ></i >
                        <input type="password" name="password2" placeholder="Password" >
                    </div >
                </div >
                <div class="field" style="text-align: left;" >
                    <div class="ui checkbox">
                        <input type="checkbox" name="terms">
                        <label>I agree to the terms and conditions</label>
                    </div>
                </div>
                <div class="ui fluid huge teal submit button" >
                    Rejestruj
                </div >
            </div >

            <div class="ui error message" ></div >

            <?php
            if(isset($_GET['error']))
            {
                if($_GET['error'] == 1)
                {
                    echo '<div class="ui red message huge">
								Jest juz taki uzytkownik z tym emailem lub loginem
							</div>';
                }
            }
            ?>

        </form >

        <div class="ui message" >
            Masz konto ?
            <a href="login.php" >Zaloguj się!</a >
        </div >
    </div >
</div >