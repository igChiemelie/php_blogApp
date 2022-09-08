<?php
    include 'partials/header.php';

    require '../phpTutsDBConfig.php';
    if(isset($_GET['articleId'])){    
        $articleId = $_GET['articleId'];

        $res = $db->query('SELECT * FROM articles WHERE id = '.$articleId);
        $nmRws = $res->num_rows;
        $catId = 0;
        
?>
    <div class="container">
        <div class="row">
            <div class="col l12">
                <?php
                    if($nmRws > 0){
                        $rw = $res->fetch_assoc();
                        $catId = $rw['catId'];
                        echo '<h1>'.$rw['title'].' [<small class="grey-text">'.$rw['datePosted'].'</small>]</h1>';
                        //if this article has image
                            //display the image
                        echo '<div class="">
                                <img class="responsive-img materialboxed vG" src="./img/articleImages/'.$rw['fileName'].'" alt=""  width="100%"/>
                            </div>';
                        echo '<div><br>'.$rw['article'].'</div>';
                    } else {
                        echo '<h3>Article does not exist.</h3>';
                    }
                ?>
            </div>
        </div>

        <div class="row">
            <div class="col s12">
                <h5 id="comments">Comments</h5>
            </div>
            <?php
                require './includes/functions.php';
                
                if(isset($_SESSION['loggedIn'])){
                    echo '<div class="col s12">
                            <form id="makeCommentForm">
                                <div class="">
                                    <div class="input-field col s12">
                                        <textarea id="articleComment" class="materialize-textarea" name="articleComment"></textarea>
                                        <label for="textarea1">Your Comment</label>
                                    </div>
                                    <input type="hidden" name="articleId" value="'.$articleId.'"/>
                                </div>
                                <div class="">
                                    <div class="input-field col s12">
                                        <button class="btn waves-effect btnColor waves-light col s12" type="submit" name="articleCommentAction">Make Comment
                                            <i class="material-icons right">send</i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>';
                } else {
                    echo '<div><p class="col s12 centerTxt grey-text"><i>To make comment you need to <a class="modal-trigger" href="#regModal">Login</a></i></p></div>';
                }
                
                echo'<div class="col s12">';
                    $res3 = $db->query('SELECT comments.*, CONCAT(users.firstname, " ", users.lastname) as names FROM comments, users WHERE comments.articleId = '.$articleId.' AND comments.userId = users.id ORDER BY comments.datePosted DESC');
                    $numRw3 = $res3->num_rows;
                    echo '<div class="col s12"><ul class="collection" id="commentCollection">';    
                    if($numRw3 > 0){
                        while($rw5 = $res3->fetch_assoc()){
                            echo    '<li class="collection-item">
                                        <div class="row commentHead">
                                            <div class="left grey-text">'.$rw5['names'].'</div>
                                            <div class="right  grey-text">'.timer($rw5['datePosted']).'</div>
                                        </div>
                                        <div class="row">
                                            <p>'.$rw5['comment'].'</p>
                                            <div><a href="#!">REPLY</a></div>
                                        </div>
                                    </li>';
                                    // echo var_dump(($rw5['datePosted']));
                                    // echo print_r(timer($rw5['datePosted']));
                        }
                    } else {
                        echo '<li class="collection-item centerTxt"><small><i>No comment for this article</i></small></li>';
                    }
                    echo '</ul></div>';
                echo'</div>';
            ?>
        </div>
        <div class="row">
            <div class="col l12">
                <h5>Other Related Posts</h5>
            </div>
            <?php
                $res1 = $db->query('SELECT * FROM articles WHERE catId = '.$catId.' AND id <> '.$articleId.' LIMIT 2');
                    // <>,  NOT EQUAL TO , !=; 
                $nmRws1 = $res1->num_rows;

                if($nmRws1 > 0){
                    while($rw1 = $res1->fetch_assoc()){
                        echo '<div class="col s12 m12 l6">
                            <div class="card blue-grey darken-1 ">
                                <div class="card-content white-text">
                                    <span class="card-title">'.$rw1['title'].' <small>'.$rw1['datePosted'].'</small></span>
                                   <div class="nexxt"> '.substr($rw1['article'], 0, 150).'...</div>
                                </div>
                                <div class="card-action">
                                    <a href="singleArticle.php?articleId='.$rw1['id'].'">Read More</a>
                                </div>
                            </div>
                        </div>';
                    }
                } else {
                    echo '<div class="col l12 center-align"><i>No related post.</i></div>';
                }
            ?>
        </div>
    </div>
    
<?php
    } else {
        echo '<img src="./img/error404.jpg" width="100%"/>';
    }
    include 'partials/footer.php';
?>