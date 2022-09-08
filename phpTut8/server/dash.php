<?php
    session_start();//start seesion

    if(isset($_SESSION['loggedIn'])) {
        //Collect data from global session variable
        $fName = $_SESSION['fName'];
        $lName = $_SESSION['lName'];
        $oName = $_SESSION['oName'];

        $names = $fName.' '.$lName;
        include 'partials/serverHeader.php';

        require '../../phpTutsDBConfig.php';

        $res = $db->query('SELECT * FROM categories ORDER BY category ASC')
?>
    <div class="container">
        <div class="row">
            <div class="col l8">
                <?php
                    $res1 = $db->query('SELECT articles.id, articles.article, articles.datePosted, articles.title, users.firstname, users.lastname, categories.id AS catId,  categories.category FROM articles, users, categories WHERE articles.userId = users.id AND articles.catId = categories.id');
                    $nmRws1 = $res1->num_rows;
                   
                        echo '<table class="striped">
                                <tr>
                                    <th>S/N</th>
                                    <th>Title</th>
                                    <th>category</th>
                                    <th>Posted By</th>
                                    <th>When</th>
                                    <th>Action</th>
                                </tr>';
                        if($nmRws1 > 0){
                            $a = 1;
                            while($rw1 = $res1->fetch_assoc()){
                                echo '<tr>
                                        <td>'.$a.'</td>
                                        <td>'.$rw1['title'].'</td>
                                        <td>'.$rw1['category'].'</td>
                                        <td>'.$rw1['firstname'].' '.$rw1['lastname'].'</td>
                                        <td>'.$rw1['datePosted'].'</td>
                                        <td data-id="'.$rw1['id'].'" data-title="'.$rw1['title'].'" data-article="'.$rw1['article'].'" data-catId="'.$rw1['catId'].'">
                                            <a href="../singleArticle.php?articleId='.$rw1['id'].'"><i class="material-icons">visibility</i></a>
                                            <a href="#" class="showEditBlogModal"><i class="material-icons">edit</i></a>
                                            <a href="#" class="showDeleteBlogModal"><i class="material-icons">delete</i></a>
                                        </td>
                                    </tr>';
            
                                $a++;
                            }
                        } else {
                            echo '<tr><td colspan="6">No blog article created yet.</td></tr>';
                        }
            
                        echo '</table>';
                    echo '  <!-- Edit Modal Structure -->
                            <div id="editArtModal" class="modal">
                                <div class="modal-content">
                                    <h4>Edit Blog Article</h4>
                                    <form action="articlesController.php" method="POST" id="editArticleForm">
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <input placeholder="Title" id="editArticleTitle" type="text" required class="validate" data-length="100">
                                                
                                            </div>
                                            <div class="input-field col s12">
                                                <select id="editArticleCat" required>
                                                    <option value="-">Choose Category</option>';
                                                        $res2 = $db->query('SELECT * FROM categories');
                                                        while($rw2 = $res2->fetch_assoc()){
                                                            echo '<option value="'.$rw2['id'].'">'.$rw2['category'].'</option>';
                                                        }
                                                    
                                                    
                                                echo '</select>
                                                <label>Categories</label>
                                            </div>
                                            <div class="input-field col s12">
                                                <textarea id="editArticle" class="materialize-textarea validate" required></textarea>
                                            </div>
                                            <input type="hidden" id="editArticleId"/>
                                            <div class="input-field col s12">
                                                <button class="btn waves-effect waves-light col s12" type="submit">Submit
                                                    <i class="material-icons right">send</i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>        
                            </div>';
                    echo '  <!-- Delete Modal Structure -->
                            <div id="delArtModal" class="modal">
                                <div class="modal-content center-align">
                                    <h4>Delete Blog Article</h4>
                                    <p>Are you sure you want to to delete this ariticle: <b><span id="delArticleTitle"></span></b>
                                    <input type="hidden" id="delArticleId"/>
                                    <p>
                                        <a class="waves-effect waves-light btn red" id="deleteArticle"><i class="material-icons left">thumb_up</i>Yes</a>
                                        <a class="waves-effect waves-light btn-flat yellow"><i class="material-icons left">thumb_down</i>No</a>
                                    </p>
                                </div>        
                            </div>';
                ?>
            </div>
            <div class="col l4">
                <h2>Create Blog Articles</h2>
                <form action="articlesController.php" method="POST" id="makeArticle" enctype="multipart/form-data">
                    <div class="row">
                        <div class="input-field col s12">
                            <input placeholder="Title" id="articleTitle" type="text" class="validate" data-length="100">
                            <label for="articleTitle">Article Title</label>
                        </div>
                        <div class="input-field col s12">
                            <select id="articleCat">
                                <option value="-">Choose Category</option>
                                <?php
                                    while($rw = $res->fetch_assoc()){
                                        echo '<option value="'.$rw['id'].'">'.$rw['category'].'</option>';
                                    }
                                ?>
                                
                            </select>
                            <label>Categories</label>
                        </div>
                        <div class="input-field col s12">
                            <textarea id="article" class="materialize-textarea"></textarea>
                            <label for="article">Article</label>
                        </div>
                        <div class="file-field input-field col s12">
                            <div class="btn">
                                <span>Image</span>
                                <input type="file" name="articleImg">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" required>
                                <label class="red-text">Size:Less than 500kb, Dim:1000x500pixels</label>
                            </div>
                        </div>
                        <div class="input-field col s12">
                            <button class="btn waves-effect waves-light col s12" type="submit">Submit
                                <i class="material-icons right">send</i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col l6">
            
            </div>
        </div>
    </div>
<?php
        include 'partials/serverFooter.php';
    } else {
        header('location: ../index.php');
    }
?>