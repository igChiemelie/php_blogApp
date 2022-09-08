<?php
    session_start();//start seesion

    if(isset($_SESSION['loggedIn'])) {
        if(isset($_POST['makeArticleAction'])){//create article
            
            $errMsg = "";
            // Validation
            
            if(isset($_POST['articleTitle']) && $_POST['articleTitle'] != ""){
                $articleTitle = $_POST['articleTitle'];
            } else {
                $errMsg .= '<li class="collection-item">Please Article Title shouldnt be empty.</li>';
            }

            if(isset($_POST['articleCat']) && $_POST['articleCat'] != ""){
                $articleCatId = $_POST['articleCat'];
            } else {
                $errMsg .= '<li class="collection-item">Please Select an article category.</li>';
            }

            if(isset($_POST['article']) && $_POST['article'] != ""){
                $article = $_POST['article'];
            } else {
                $errMsg .= '<li class="collection-item">Please type the article body.</li>';
            }

            // Upload Image
            if(isset($_FILES['articleImg']['name'])){//file is uploaded
                
                $uploadOk = 0;

                $fileName = $_FILES['articleImg']['name'];
                $fileExt = strrchr($fileName, ".");

                if($fileExt == '.jpg' || $fileExt == '.png'){
                    $targetDir = '../img/articleImages/';
                } else {
                    $uploadOk = 1;
                    $errMsg .= '<li class="collection-item">Please ensure the file is one of the follwoing file types: [jpg, png].</li>';
                }

                //check files dimension
                // list($width, $height, $type, $attr) = getimagesize($_FILES["articleImg"]['tmp_name']);
                // if($width > 1000 || $height > 500){
                //     $errMsg .= '<li class="collection-item">Image should be of dimension 1000x500pixel max.</li>';
                //     $uploadOk = 1;
                // }
                //TODO: check if file exists in folder
                  $filePath = $targetDir.'/'.basename($fileName);
                if(file_exists($filePath)){
                    $errMsg .= '<li class="collect-item">Sorry, file already exists.</li>';
                    $uploadOk = 1;
                }
                   


                // Check file size
                // if ($_FILES["articleImg"]["size"] > 500000) {
                //     $errMsg .= '<li class="collection-item">Sorry, your file larger than 500kb.</li>';
                //     $uploadOk = 1;
                // }

                if($uploadOk == 0){                   
              

                    if (move_uploaded_file($_FILES["articleImg"]["tmp_name"], $filePath)) {
                         $filePath = $targetDir.'/'.basename($fileName);
                        if($errMsg == ""){
                            require '../../phpTutsDBConfig.php';
            
                            $userId = $_SESSION['loggedIn'];
                            $res = $db->query('INSERT INTO articles (article, userId, catId, datePosted, title, fileName) VALUES ("'.$article.'", '.$userId.', '.$articleCatId.', NOW(), "'.$articleTitle.'", "'.$fileName.'")');
                            $inserted = $db->affected_rows;
            
                            if($inserted){
                                echo 200;
                            } else {
                                echo 501;
                            }
                            
                        } else {
                            echo 501;
                        }
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                } else {
                    echo '<ul>'.$errMsg.'</ul>';
                }
            }

            
        } else if(isset($_POST['editArtAction'])){//edit article
            $errMsg = "";
            // Validation
            
            // if(isset($_POST['title']) && $_POST['title'] != ""){
            //     $title = $_POST['title'];
            // } else {
            //     $errMsg .= '<li class="collection-item">Please Article Title shouldnt be empty.</li>';
            // }

            // if(isset($_POST['cat']) && $_POST['cat'] != ""){
            //     $catId = $_POST['cat'];
            // } else {
            //     $errMsg .= '<li class="collection-item">Please Select an article category.</li>';
            // }

            if(isset($_POST['article']) && $_POST['article'] != ""){
                $article = $_POST['article'];
            } else {
                $errMsg .= '<li class="collection-item">Please type the article body.</li>';
            }
            // $articleId = $_POST['id'];

            if($errMsg == ""){
                require '../../phpTutsDBConfig.php';
                echo 'i seee';

                // $res = $db->query('UPDATE articles SET article = "'.$article.'", catId ='.$catId.', title="'.$title.'" WHERE id = '.$articleId);
                // $updated = $db->affected_rows;

                // if($updated > 0){
                //     echo 200;
                // } else {
                //     echo 501;
                // }
                
            } else {
                echo 501;
            }
        } else if(isset($_POST['delArtAction'])){//delete article
            $errMsg = "";
            // Validation
            
            if(isset($_POST['id']) && $_POST['id'] != ""){
                $articleId = $_POST['id'];
            } else {
                $errMsg .= '<li class="collection-item">Please Article Title shouldnt be empty.</li>';
            }

            if($errMsg == ""){
                require '../../phpTutsDBConfig.php';

                $res = $db->query('DELETE FROM articles WHERE id = '.$articleId);
                $updated = $db->affected_rows;

                if($updated > 0){
                    echo 201;
                } else {
                    echo 501;
                }                
            } else {
                echo 501;
            }
        }
    } else {
        echo 501;
    }
?>