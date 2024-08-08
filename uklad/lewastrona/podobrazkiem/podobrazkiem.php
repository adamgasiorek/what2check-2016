<div class="tabs tabs-style-topline lewoo" >
    <nav>
        <ul>
            <li >
                <a href="#section-topline-1X" class="icon icon-file-text " ></a >
            </li >
            <li >
                <a href="#section-topline-2X" class="icon icon-info" ></a >
            </li >
            <li >
                <a href="#section-topline-3X" class="icon icon-share" ></a >
            </li >
            <li >
                <a href="#section-topline-4X" class="icon icon-warning" ></a >
            </li >

        </ul>
    </nav>
    <div class="content-wrap">
        <section  id="section-topline-1X" >
            <?php
            echo tlumaczenie($STRONA_ID,3);
            ?>
        </section >
        <section id="section-topline-2X" >
            <?php
            include('informacjepodobrazkiem.php');
            ?>
        </section >
        <section  id="section-topline-3X" >
            Udostepnij
        </section >
        <section id="section-topline-4X" >
            Zgłoś
        </section >

    </div>
</div>