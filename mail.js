function SendMail() {
    var params ={
        from_name : document.getElementById('fullname').value,
        Email_id : document.getElementById("email_id").value,
        Message : document.getElementById("message").value
    }
    emailjs.send("service_br7qp51", "template_775bxsk", params).then(function (res) {
        alert("Message Send Successfully")
})

}
