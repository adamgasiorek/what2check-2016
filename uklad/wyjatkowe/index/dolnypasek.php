<div id="dolnypasek" >
    <ul id="filterOptions" class="ui horizontal bulleted list" >
        <li class="item" >
            <a class="all">
                <span class="fitrtekst" >All items</span >
                <span class="fitrikona icon icon-stack" ></span >
            </a>
        </li>
        <li class="active item" >
            <a class="1">
                <span class="fitrtekst" >Film</span >
                <span class="fitrikona icon icon-music" ></span >
            </a>
        </li >
        <li class="item" >
            <a class="2">
                <span class="fitrtekst" >Muzyka</span >
                <span class="fitrikona icon icon-music" ></span >
            </a>
        </li >
        <li class="item" >
            <a class="3">
                <span class="fitrtekst" >Artysci</span >
                <span class="fitrikona icon icon-users" ></span >
            </a>

        </li>
    </ul >

</div >



<script>
    

    $('a.all').on( 'click', function() {
        $('.data-1').show();
        $('.data-2').show();
        $('.data-3').show();
        $('.grid').masonry('layout');
    });

    $('a.1').on( 'click', function() {
        $('.data-1').show();
        $('.data-2').hide();
        $('.data-3').hide();
        $('.grid').masonry('layout');
    });

    $('a.2').on( 'click', function() {
        $('.data-1').hide();
        $('.data-2').show();
        $('.data-3').hide();
        $('.grid').masonry('layout');
    });

    $('a.3').on( 'click', function() {
        $('.data-1').hide();
        $('.data-2').hide();
        $('.data-3').show();
        $('.grid').masonry('layout');
    });

</script>
