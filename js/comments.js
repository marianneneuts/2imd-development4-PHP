document.querySelector("#btnAddComment").addEventListener("click", function(e) {
    //alert("clicked");
    e.preventDefault();

    // postId?
    // comment txt
    let projectId = e.target.dataset.projectid;
    let text = document.querySelector("#commentText").value;

    console.log(projectId);
    console.log(text);

    // post naar database (AJAX)

    let formData = new FormData();

    formData.append('text', text);
    formData.append('projectId', projectId);

    fetch('ajax/savecomment.php', {
        method: 'POST',
        body: formData
    })
        .then(response => response.json())
        .then(result => {
            console.log("Success:", result);
            let newComment = document.createElement("li");
            newComment.innerHTML = result.body;
            document.querySelector(".post__comments__list").appendChild(newComment);
        })
        .catch(error => {
            console.log('Error:', error);
        });


    // antwoord ok? toon comment
    
});