// var commentsArray = [
// {
//    "id": 1,
//    "parent": null,
//    "created": "2015-01-01",
//    "modified": "2015-01-01",
//    "content": "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Sed posuere interdum sem. Quisque ligula eros ullamcorper quis, lacinia quis facilisis sed sapien. Mauris varius diam vitae arcu.",
//    "fullname": "Simon Powell",
//    "profile_picture_url": "https://app.viima.com/static/media/user_profiles/user-icon.png",
//    "created_by_current_user": false,
//    "upvote_count": 15,
//    "user_has_upvoted": false
// },
// {
//    "id": 2,
//    "parent": null,
//    "created": "2015-01-12",
//    "modified": "2015-01-12",
//    "content": "Sed posuere interdum sem. Quisque ligula eros ullamcorper quis, lacinia quis facilisis sed sapien. Mauris varius diam vitae arcu.",
//    "fullname": "sss",
//    "profile_picture_url": "https://app.viima.com/static/media/user_profiles/user-icon.png",
//    "created_by_current_user": true,
//    "upvote_count": 2,
//    "user_has_upvoted": true
// }
// ]

var commentsArray;

$.post("php/pobierz/komentarze.php",
          {
             mojeID : JA_ID,
             dzieloID: STRONA_ID
          },function(data){
               commentsArray = $.parseJSON(data);
          });

