M.AutoInit();

$('.cyril').hide().fadeIn(5000);
setInterval(function () {
    $('.cyril').fadeOut(2000);
}, 2000);
setInterval(function () {
    $('.cyril').fadeIn(3000);
}, 3000);

$('.navbar-fixed').hide();
$(window).scroll(function (event) {
    var scrollpos = $(window).scrollTop();
    if (scrollpos <= 200) {
        $('.navbar-fixed').hide('slow');
    } else if (scrollpos > 450) {
        $('.navbar-fixed').show('slow');
    }
});

// $('.hideNav').on('load', function () {
// });


$('input#articleTitle').characterCounter();
// $('.datepicker').pickadate({
//     selectMonths: true,
//     selectYears: 200, 
//     format: 'yyyy/mm/dd'
// });

$('#goToReg').on('click', (e) => {
    e.preventDefault();

    $('#loginCard').addClass('hide');
    $('#regCard').removeClass('hide');
});

$('#goToLogin').on('click', (e) => {
    e.preventDefault();

    $('#regCard').addClass('hide');
    $('#loginCard').removeClass('hide');
});

$('#makeArticle').on('submit', function (e) {
    e.preventDefault();

    let articleTitle = $('#articleTitle').val();
    let articleCat = $('#articleCat').val();
    let article = $('#article').val();
    let articleImg = $('input[name="articleImg"]')[0].files[0];
    let makeArticleAction = true;

    let formData = new FormData();

    formData.append('articleTitle', articleTitle);
    formData.append('articleCat', articleCat);
    formData.append('article', article);
    formData.append('makeArticleAction', makeArticleAction);
    formData.append('articleImg', articleImg);

    let url = $(this).attr('action');
    let mtd = $(this).attr('method');

    $.ajax({
        type: mtd,
        url: url,
        data: formData,
        processData: false,
        contentType: false,
        success: (data) => {
            if (data == 200) {
                location.reload();
            } else if (data == 501) {
                M.toast({
                    html: 'Server Error! Please try again in 5 minutes.',
                    displayLength: 6500,
                    classes: 'error'
                });
            } else if (data == 401) {
                M.toast({
                    html: 'Unathorized Acces',
                    displayLength: 6500,
                    classes: 'error'
                });
            } else {
                M.toast({
                    html: data,
                    displayLength: 6500,
                    classes: 'error'
                })
            }
        }
    });
});

$('#loginForm').on('submit', function (e) {
    e.preventDefault();

    let email = $('#loginEmail').val();
    let pass = $('#loginPassword').val();
    let banye = true;
    let url = $(this).attr('action');
    let mtd = $(this).attr('method');

    if(email != "" && pass != ""){
        console.log('not empty');
    
        $.ajax({
            type: mtd,
            url: url,
            data: {
                'loginEmail': email,
                'loginPassword': pass,
                'banye': banye
            },
            success: (data) => {
                if (data == 200) {
                    window.location.href = "./server/dash.php";
                } else if (data == 501) {
                    M.toast({
                        html: 'Server Error! Please try again in 5 minutes.'
                    });
                } else if (data == 401) {
                    M.toast({
                        html: 'Unathorized Acces'
                    });
                }
            }
        });
    } else if (email == "" && pass == "") {
        alert('Ensure your fill all fields');
        // if (email == "") {
        //     alert('email field required');
        // }else if(pass == ""){
        //     alert('password required');
        // } 
        
    }else{
        if (email == "") {
        alert('email field required');
        }else if(pass == ""){
        alert('password required');
        }
    }
});


$('#regForm').submit(function (e) {
    e.preventDefault();

    let url = $(this).attr('action');
    let mtd = $(this).attr('method');
    let fName = $('#firstName').val();
    let lName = $('#lastName').val();
    let oName = $('#otherName').val();
    let pass = $('#password').val();
    let cPass = $('#cPassword').val();
    let email = $('#email').val();
    let gender = $('input[name="gender"]').val();
    let state = $('#state').val();

    if (fName != " " && lName != " " && gender != " " && state != " " && pass != " " && pass == cPass) {
        var formData = {
            firstName: fName,
            lastName: lName,
            oName: oName,
            password: pass,
            cPassword: cPass,
            gender: gender,
            state: state,
            email: email,
            debanye: true,
        }

        $.ajax({
            url: url,
            type: mtd,
            data: formData,
            success: function (data) {
                if (data == 200) {
                    window.location.href = "./server/dash.php";
                } else if (data == 501) {
                    M.toast({
                        html: 'Internal server error'
                    });
                }
            },
            error: function (err) {
                M.toast({
                    html: 'Network error!'
                });
            }
        });
    } else {
        M.toast({
            html: 'Please ensure all fields are completed correctly.'
        });
    }
});

//Commenting
$('#makeCommentForm').on('submit', function (e) {
    e.preventDefault();

    var articleComment = $('textarea[name="articleComment"]').val();
    var articleId = $('input[name="articleId"]').val();

    $.ajax({
        type: 'POST',
        url: './server/makeComment.php',
        data: {
            articleComment: articleComment,
            articleId: articleId,
            articleCommentAction: true
        },
        success: function (res) {
            if (res == 200) {
                location.reload();
            } else {
                M.toast({
                    html: 'Error! Comment not inserted',
                    classes: 'errorToast'
                });
            }
        },
        error: function (err) {
            console.log(err);
        }
    })
});


$('.showEditBlogModal').on('click', function (e) {
    e.preventDefault();

    let articleId = $(this).parents('td').attr('data-id');
    let articleTitle = $(this).parents('td').attr('data-title');
    let articleArt = $(this).parents('td').attr('data-article');
    let articleCatId = $(this).parents('td').attr('data-catId');

    $('#editArticleTitle').val(articleTitle);
    $('#editArticleCat').val(articleCatId);
    $('#editArticle').val(articleArt);
    $('#editArticleId').val(articleId);
    $('select').formSelect(); //re-render select 

    $('#editArtModal').modal('open'); //show modal
});


$('#editArticleForm').on('submit', function (e) {
    e.preventDefault();

    let cat = $('#editArticleCat').val();


    if (cat != '-') {

        let articleData = {
            title: $('#editArticleTitle').val(),
            cat: $('#editArticleCat').val(),
            article: $('#editArticle').val(),
            id: $('#editArticleId').val(),
            editArtAction: true
        }

        let url = $(this).attr('action');
        let mtd = $(this).attr('method');

        $.ajax({
            url: url,
            type: mtd,
            data: articleData,
            success: (res) => {
                if (res == 200) {
                    M.toast({
                        html: 'Article successfully updated!',
                        classes: 'success',
                        displayLength: 5000
                    });
                    setTimeout(() => {
                        location.reload();
                    }, 5000);
                } else {
                    M.toast({
                        html: res,
                        classes: error
                    });
                }
            },
            error: (err) => {
                M.toast({
                    html: err
                });
            }
        });
    }
});

$('.showDeleteBlogModal').on('click', function (e) {
    e.preventDefault();

    let articleId = $(this).parents('td').attr('data-id');
    let articleTitle = $(this).parents('td').attr('data-title');

    $('#delArticleTitle').val(articleTitle);
    $('#delArticleId').val(articleId);

    $('#delArtModal').modal('open'); //show modal
});


$('#deleteArticle').on('click', function (e) {
    e.preventDefault();

    let articleData = {
        id: $('#delArticleId').val(),
        delArtAction: true
    }

    $.ajax({
        url: 'articlesController.php',
        type: 'POST',
        data: articleData,
        success: (res) => {
            if (res == 201) {
                M.toast({
                    html: 'Article successfully deleted!',
                    classes: 'success',
                    displayLength: 5000
                });
                setTimeout(() => {
                    location.reload();
                }, 5000);
            } else {
                M.toast({
                    html: res,
                    classes: error
                });
            }
        },
        error: (err) => {
            M.toast({
                html: err
            });
        }
    })
});