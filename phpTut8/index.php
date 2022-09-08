<?php
    include 'partials/header.php';

    require '../phpTutsDBConfig.php';

?>
    <header class="">
        <div class="row section" style="margin-bottom: 0;">
            <div class="col s12 center  logo-only">
                <img alt="" src="img/logo.png" />
            </div>
            <div class="col s12 center no-pad-top">
                <div class="cyril">
                    <h1 class="intro white-text">Present your app in beautiful way with Kane.</h1>
                    <h6 class="white-text">Available on App Store and Play Store.</h6>
                </div>

                
                <a class="waves-effect waves-light btn-large orange " style="margin-top: 10px;"><i
                        class="material-icons left">cloud_download</i>Download
                    App
                </a>
            </div>

        </div>
    </header>
    
    <div class="container" style="margin-top: -6.50px;">
        <div class="row">
            <?php
            //GET all articles....$res
            $res = $db->query('SELECT articles.id, articles.fileName, articles.article, articles.datePosted, articles.title, users.firstname, users.lastname, categories.category FROM articles, users, categories WHERE articles.userId = users.id AND articles.catId = categories.id ORDER BY articles.datePosted DESC');
            //Get number of rows of articles returned....$nmRws
            $nmRws = $res->num_rows;
            
            if($nmRws > 0){//if $nmRws > 0
                //insert Blog articles into blog array
                while($row = $res->fetch_assoc()){
                    echo '<div class="col s12 m6 l6">
                            <div class="">
                                <div class="card blue-grey darken-1 pod">
                                    <div class="card-content white-text">
                                        <span class="card-title">'.substr($row['title'], 0, 5).'... <small><i>'.$row['datePosted'].'</i></small></span>
                                        <img class="responsive-img materialboxed vH" src="./img/articleImages/'.$row['fileName'].'" alt="" width="100%"/>
                                        <div class="next light darken-2"><p><i>'.substr($row['article'], 0, 50).'...</i></p></div>
                                    </div>
                                    <div class="card-action">
                                        <a href="singleArticle.php?articleId='.$row['id'].'">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>';
                }
            } 
            ?>
            
        </div>
    </div>
    
<?php
    include 'partials/footer.php';
?>
   