<div class="SEKCJAprawa" >
<div style="font-size: 140%;" id="comments-container"></div>

<script type="text/javascript">
    $(function() {
        $('#comments-container').comments({
            profilePictureURL: 'FILES/profile/1.jpg',
            roundProfilePictures: true,
            textareaRows: 2,
            enableReplying: true,
            enableEditing: true,
            enableUpvoting: true, //CHANGE
            enableDeleting: true,
            enableAttachments: false, //CHANGE
            enableDeletingCommentWithReplies: true,
            enableNavigation: true,
            postCommentOnEnter: false,
            forceResponsive: false, //CHANGE
            defaultNavigationSortKey: 'popularity', //popularity newest
            timeFormatter: function(time) {
                return moment(time).fromNow();
            },
            //tlumaczenia
            newestText: 'Newest',
            oldestText: 'Oldest',
            popularText: 'Popular',
            sendText: 'Send',
            replyText: 'Reply',
            editText: 'Edit',
            editedText: 'Edited',
            youText: 'You',
            saveText: 'Save',
            deleteText: 'Delete',
            viewAllRepliesText: 'Pokaz all __replyCount__ replies',
            hideRepliesText: 'Hide replies',
            noCommentsText: 'No comments',
            //
            getComments: function(success, error) {
                success(commentsArray);
            },
            postComment: function(data, success, error) {
                // nowy
                success(data);

                //console.log(JA_ID + " " + STRONA_ID + " " + data.content + " " + data.created + " " + data.parent)

                $.post("php/wstaw/komentarz.php", {
                    mojeID : JA_ID,
                    dzieloID: STRONA_ID,
                    tekst: data.content,
                    data: moment(data.created).format("YYYY-MM-DD HH:mm:ss"),
                    parent: data.idKom
                });

            },
            putComment: function(data, success, error) {
                // edycja
                success(data);

                $.post("php/update/komentarz.php", {
                    komentarz : data.content,
                    id_komentarza : data.idKom,
                    data: moment(data.modified).format("YYYY-MM-DD HH:mm:ss")
                });
            },
            deleteComment: function(data, success, error) {
                success();

                $.post("php/usun/komentarz.php", {
                    id: data.idKom
                });
            }
        });



    });
</script>


</div>