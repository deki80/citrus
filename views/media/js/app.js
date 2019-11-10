
document.getElementById("submit-btn").addEventListener("click", function(event){
    event.preventDefault();
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var text = document.getElementById("txt").value;
    var error = document.getElementById('error');

    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
        var formData = new FormData();
        formData.append('name', name);
        formData.append('email', email);
        formData.append('text', text);
        fetch("home/comment", {
            method: "POST",
            body:  formData
        })
            .then(function(response){
                return response.text().then(function (text) {
                    document.getElementById("comment").innerHTML = text;
                })
            })
    }else{
        error.innerHTML = "Email address is not valid";
    }
});
