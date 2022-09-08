<?php
    include 'partials/header.php';
    if(isset($_SESSION['loggedIn'])){
        require '../phpTutsDBConfig.php';

        $res = $db->query('SELECT articles.id, articles.article, articles.datePosted, articles.title, users.firstname, users.lastname, categories.id as catId,  categories.category FROM articles, users, categories WHERE articles.userId = users.id AND articles.catId = categories.id');
        $nmRws = $res->num_rows;
        echo '<div class="container">';
            echo '<table class="striped">
                    <tr>
                        <th>S/N</th>
                        <th>Title</th>
                        <th>category</th>
                        <th>By</th>
                        <th>When</th>
                        <th>Action</th>
                    </tr>';
            if($nmRws > 0){
                $a = 1;
                while($rw = $res->fetch_assoc()){
                    echo '<tr>
                            <td>'.$a.'</td>
                            <td>'.$rw['title'].'</td>
                            <td>'.$rw['category'].'</td>
                            <td>'.$rw['firstname'].' '.$rw['lastname'].'</td>
                            <td>'.$rw['datePosted'].'</td>
                            <td data-id="'.$rw['id'].'" data-title="'.$rw['title'].'" data-article="'.$rw['article'].'" data-catId="'.$rw['catId'].'">
                                <a href="#"><i class="material-icons">visibility</i></a>
                                <a href="#" class="showEditBlogModal"><i class="material-icons">edit</i></a>
                                <a href="#"><i class="material-icons">delete</i></a>
                            </td>
                        </tr>';

                    $a++;
                }
            } else {
                echo '<tr><td colspan="5">No blog article created yet.</td></tr>';
            }

            echo '</table>';
        echo '</div>';
        echo '  <!-- Modal Structure -->
                <div id="editArtModal" class="modal">
                    <div class="modal-content">
                        <h4>Edit Blog Article</h4>
                        <form action="articlesController.php" method="POST" id="makeArticle">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input placeholder="Title" id="articleTitle" type="text" class="validate" data-length="100">
                                    
                                </div>
                                <div class="input-field col s12">
                                    <select id="articleCat">
                                        <option value="-">Choose Category</option>';
                                            $res1 = $db->query('SELECT * FROM categories');
                                            while($rw = $res1->fetch_assoc()){
                                                echo '<option value="'.$rw['id'].'">'.$rw['category'].'</option>';
                                            }
                                        
                                        
                                    echo '</select>
                                    <label>Categories</label>
                                </div>
                                <div class="input-field col s12">
                                    <textarea id="article" class="materialize-textarea"></textarea>
                                </div>
                                <input type="hidden" id="articleId"/>
                                <div class="input-field col s12">
                                    <button class="btn waves-effect waves-light col s12" type="submit">Submit
                                        <i class="material-icons right">send</i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>        
                </div>';
    } else {
        //redirect to home page
        header('location: index.php');
    }

    include 'partials/footer.php';
?>