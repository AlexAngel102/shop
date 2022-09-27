<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- CSS -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <link href="../../css/materialize.min.css" rel="stylesheet">
    <link href="../../css/extra.css" rel="stylesheet">

    <!-- JavaScript -->
    <script src="../../js/bootstrap.bundle.min.js"></script>
    <script src="../../js/materialize.min.js"></script>
    <script src="../../js/jquery-3.6.0.min.js"></script>
    <script src="../../js/main.js"></script>

    <title>Blog</title>
</head>
<header></header>

<body>

<div class="container align-center">
    <div class="d-inline-flex w-100">
        <div class="col row p-3">
            <div class="z-depth-3 waves-effect waves-light btn-large white-text" style="pointer-events: none">
                <i class="material-icons left">thumb_down</i>Negative: <span id="negativePosts"></span>
            </div>
        </div>
        <div class="col row p-3">
            <a href="/" class="z-depth-3 waves-effect waves-light btn-large white-text" style="pointer-events: none" id="mainLink">
                <i class="material-icons left">list</i>All posts: <span id="allposts"></span></a>
        </div>
        <div class="col row p-3">
            <div class="z-depth-3 waves-effect waves-light btn-large white-text" style="pointer-events: none">
                <i class="material-icons left">thumb_up</i>Positive: <span id="positivePosts"></span>
            </div>
        </div>
    </div>

    <div class="" id="postBlock"></div>
    <div class="container right" id="comments" hidden>
    </div>

    <div class="fixed-action-btn">
        <button class="btn-floating btn-large red pulse modal-trigger" id="addPostButton" data-bs-toggle="modal"
                data-bs-target="#postModal">
            <i class="large material-icons">mode_edit</i>
        </button>
    </div>
    <footer>
    </footer>

    <!--  Post template  -->
    <template id="postTemplate">
        <div class="card darken-1 fade show">
            <div class="card-content">
                <a href="" class="text-black post-link">
                    <div class="text-black">
                        <p class="card-title" name="visitore_name"></p>
                        <div>
                            <p class="card-body" name="post"></p>
                        </div>
                    </div>
                </a>
                <div class="rating rating_set" data-ajax="true">
                    <div class="rating__body">
                        <div class="rating__active"></div>
                        <div class="rating__items">
                            <input type="hidden" class="postId" value="">
                            <input type="radio" class="rating__item" name="rating" value="1">
                            <input type="radio" class="rating__item" name="rating" value="2">
                            <input type="radio" class="rating__item" name="rating" value="3">
                            <input type="radio" class="rating__item" name="rating" value="4">
                            <input type="radio" class="rating__item" name="rating" value="5">
                        </div>
                    </div>
                    <div class="rating__value"></div>
                </div>
                <div class="p-3"><span class="flex-column col right-align p-3" name="created_at"></span>
                </div>
                <div class="d-flex">
                </div>
                <button type="button" class="btn z-depth-3 white-text right" id="replyBtn" data-bs-toggle="modal"
                        data-bs-target="#replyModal" hidden>Reply
                </button>
            </div>
        </div>
    </template>

    <!-- Comment template-->
    <template id="commentTemplate">
        <div class="card darken-1">
            <div class="card-content">
                <div class="text-black h-50">
                    <p class="card-title" name="visitore_name">`${visitore_name}`</p>
                    <div class="">
                        <p class="card-body trunc" name="comment">`${comment}`</p>
                    </div>
                    <span class="flex-column col right-align p-3" name="created_at">`${created_at}`</span>
                </div>
            </div>
        </div>
</div>
<h6 hidden>No comments yet</h6>
</template>

<!-- Add post modal-->
<div class="modal fade postModal" id="postModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-3">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Add post</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/addpost" method="post" class="addPostForm" id="addPostForm" name="addPostForm">
                    <label for="username">Name</label>
                    <input type="text" class="addPost" name="visitor_name" id="username" required minlength="3">
                    <label for="postText">Text</label>
                    <textarea class="materialize-textarea addPost" name="post" id="postText" required minlength="2"
                              maxlength="1024"></textarea>
                </form>
            </div>
            <div class="d-flex right">
                <div class="flex-column px-3">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
                <div class="px-3 flex-column">
                    <button type="submit" class="btn btn-primary postBtn" form="addPostForm" id="postBtn"
                            name="postBtn">Apply
                    </button>
                </div>
                <p></p>
            </div>
        </div>
    </div>
</div>

<!-- Add comment modal -->
<div class="modal fade replyModal" id="replyModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-3">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Comment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="/addcomment" method="post" class="addCommentForm" id="addCommentForm"
                      name="addCommentForm">
                    <input type="hidden" name="post_id" class="postId" value="" id="commentPostId">
                    <label for="comment">Name</label>
                    <input type="text" class="comment" id="comment" name="visitor_name" required minlength="1">
                    <label for="comment">Your comment</label>
                    <textarea class="materialize-textarea comment" name="comment" id="comment" required minlength="1"
                              maxlength="250"></textarea>
                </form>
                <div class="d-flex right">
                    <div class="flex-column px-3">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                    <div class="px-3 flex-column">
                        <button type="submit" class="btn btn-primary commentBtn" form="addCommentForm" id="commentBtn"
                                name="commentBtn">Apply
                        </button>
                    </div>
                    <p></p>
                </div>
            </div>
        </div>
    </div>

</body>

</html>